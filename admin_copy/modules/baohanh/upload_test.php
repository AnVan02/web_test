<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import File Bảo Hành</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ced4da;
        }
   
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            color: #fff;
            background-color: #94bbe9;
            border-color: #007bff;
        }   
        .btn-danger:hover {
        color: #fff;
        background-color: #e994aa;
        border-color: #bd2130;
        }
        .form-group {
            margin-bottom: 15px;
        }

        .btn-primary, .btn-danger {
            width: 100%;
        }

        /* Căn giữa hình ảnh */
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
        <h2>Import file bảo hành</h2>
        <div class="text-center">
            <img src="modules/baohanh/up.png" alt="upload bảo hành" class="img-fluid mb-4" style="max-width: 30%; height: auto;">
        </div>

        <!-- Form for importing Excel file -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileInput">Nhập file Excel</label>
                <input type="file" class="form-control" name="file" id="fileInput" required>
            </div>
            <button type="submit" class="btn btn-primary" name="import">Import bảo hành</button>
        </form>

        <div class="form-group mt-4">
            <!-- Separate form for deleting expired codes -->
            <!-- <form action="" method="post">
                <button type="submit" class="btn btn-danger" name="deleteExpired">Xóa tất cả mã hết hạn</button>
            </form> -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;

// Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Khi người dùng nhấn Import
if (isset($_POST["import"])) {
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["file"]["tmp_name"];
        $fileType = $_FILES["file"]["type"];
        $allowedTypes = [
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];

        if (!in_array($fileType, $allowedTypes)) {
            echo "<script>alert('Chỉ chấp nhận file Excel (.xls hoặc .xlsx)!'); window.location.href='';</script>";
        } else {
            try {
                // Đọc file Excel
                $spreadsheet = IOFactory::load($fileTmpPath);
                $worksheet = $spreadsheet->getActiveSheet();
                $data = $worksheet->toArray();

                // Bắt đầu transaction
                $conn->begin_transaction();
                $errorMessages = "";

                // Chuẩn bị truy vấn
                $checkStmt = $conn->prepare("SELECT SOSERI_SP FROM sanpham WHERE SOSERI_SP = ?");
                $insertStmt = $conn->prepare("INSERT INTO sanpham (SOSERI_SP, SOSERI_PC, TENSP, MASP,NGAYXUAT, THOIHANBH) VALUES (?, ?, ?, ?, ?, ?)");
                $updateStmt = $conn->prepare("UPDATE sanpham SET SOSERI_PC = ?, TENSP = ?, MASP = ?, NGAYXUAT = ?, THOIHANBH = ? WHERE SOSERI_SP = ?");

                foreach ($data as $key => $row) {
                    if ($key === 0) continue; // Bỏ qua dòng tiêu đề

                    // Lấy dữ liệu từ từng dòng
                    $SOSERI_SP = trim($row[0]);
                    $SOSERI_PC = trim($row[1]);
                    $loai = trim($row[2]);
                    $TENSP =trim($row[3]);
                    $NGAYXUAT = trim($row[4]);
                    $THOIHANBH =trim($row[5]);
                    


                    // Kiểm tra xem MASP có bị thiếu không
                    if (empty($MASP)) {
                        $errorMessages .= "Lỗi dòng {$key}: Thiếu mã sản phẩm (MASP).\\n";
                        continue; // Bỏ qua dòng này và tiếp tục xử lý dòng tiếp theo
                    }

                    // Xử lý ngày xuất - chuyển từ m-d-Y sang d-m-Y
                    $NGAYXUAT = trim ($row [9]);
                    if(!empty ($NGAYXUAT)){
                        // sử dụng đúng định dạng d-m-Y
                        $date = DateTime:: createFromFormat('m/d/Y', $ngayxuat);
                    } else {
                        $errorMessages .="Cập nhập giỏ hàng {$key} ngay xuất không đúng dinh đạng (m/d/Y).";
                        break ;
                    }
        
                    // Xử lý thời hạn bảo hành
                    $THOIHANBH = intval(trim($row[10]));

                    // Kiểm tra serial đã tồn tại chưa
                    $checkStmt->bind_param("s", $SOSERI_SP);
                    $checkStmt->execute();
                    $checkStmt->store_result();

                    if ($checkStmt->num_rows > 0) {
                        // Update bản ghi nếu đã tồn tại
                        $updateStmt->bind_param("sssssis", $SOSERI_PC,$loai, $TENSP, $MASP, $NGAYXUAT, $THOIHANBH, $SOSERI_SP);
                        $updateStmt->execute();
                    } else {
                        // Thêm bản ghi mới nếu chưa tồn tại
                        $insertStmt->bind_param("ssssssi", $SOSERI_SP, $SOSERI_PC, $TENSP, $MASP,$loai, $NGAYXUAT, $THOIHANBH);
                        $insertStmt->execute();
                    }
                }

                // Nếu có lỗi, rollback dữ liệu
                if (!empty($errorMessages)) {
                    $conn->rollback();
                    echo "<script>alert('$errorMessages'); window.location.href='';</script>";
                } else {
                    $conn->commit();
                    echo "<script>alert('Upload file dữ liệu thành công!'); window.location.href='';</script>";
                }

                // Đóng statement
                $checkStmt->close();
                $updateStmt->close();
                $insertStmt->close();

            } catch (Exception $e) {
                $conn->rollback();
                echo "Lỗi: " . $e->getMessage();
                error_log("Error: ".$e ->getMessage(),3,'errors.log');
            }

            // Đóng kết nối
            $conn->close();
        }
    } else {
        echo "Lỗi khi upload file: " . $_FILES["file"]["error"];
        error_log ("file upload error: ".$_FILES["file"]["error"],3,'errors.log');
    }
    
}
?>
