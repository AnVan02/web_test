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

// Database connection
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "123";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["import"])) {
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["file"]["tmp_name"];
        $fileType = $_FILES["file"]["type"];
        $allowedTypes = [
            'application/vnd.ms-excel',               // MIME type for .xls files
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'  // MIME type for .xlsx files
        ];

        // Check if the uploaded file is of an allowed type
        if (!in_array($fileType, $allowedTypes)) {
            echo "<script>alert('Chỉ cho phép upload các file Excel (.xls hoặc .xlsx)!'); window.location.href='';</script>";
        } else {
            try {
                // Load file Excel
                $spreadsheet = IOFactory::load($fileTmpPath);
                $worksheet = $spreadsheet->getActiveSheet();
                $data = $worksheet->toArray();

                // Bắt đầu transaction
                $conn->begin_transaction();
                $errorMessages = "";

                // Prepare statements
                $checkStmt = $conn->prepare("SELECT SoSerial FROM sanpham WHERE SoSerial = ?");
                $insertStmt = $conn->prepare("INSERT INTO sanpham (SoSerial, MAHANG, TENHANG, NGAYXUAT, THOIHANBH) VALUES (?, ?, ?, ?, ?)");
                $updateStmt = $conn->prepare("UPDATE sanpham SET MAHANG = ?, TENHANG = ?, NGAYXUAT = ?, THOIHANBH = ? WHERE SoSerial = ?");

                foreach ($data as $key => $row) {
                    $key += 1;
                    if ($key === 1) continue; // Bỏ qua hàng tiêu đề

                    $mahang = trim($row[0]);
                    $tenhang = trim($row[1]);
                    $so_serial = trim($row[2]);
                    
                  // Xử lý ngày xuất - chuyển từ m/d/Y sang d/m/Y
                    $ngayxuat = trim($row[3]);
                    if (!empty($ngayxuat)) {
                        // Sử dụng đúng định dạng với Y/m/d
                        $date = DateTime::createFromFormat('m/d/Y', $ngayxuat);
                        if ($date) {
                            // Đảm bảo ngày, tháng có số 0 nếu cần
                            $ngayxuat = $date->format('d/m/Y');
                        } else {
                            $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Ngày xuất không đúng định dạng (m/d/Y).";
                            break;
                        }
                    }
                    $thoihanbh = intval(trim($row[4]));
                    // Validation
                    if (empty($mahang) || empty($tenhang) || empty($so_serial)) {
                        $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Mã Hàng/Tên Hàng/Số Seri đang trống";
                        break;
                    }
                    elseif ($thoihanbh === 0) {
                        $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Thời hạn bảo hành không phải số";
                        break;
                    }

                    // Check if serial exists
                    $checkStmt->bind_param("s", $so_serial);
                    $checkStmt->execute();
                    $checkStmt->store_result();

                    if ($checkStmt->num_rows > 0) {
                        // Update existing record
                        $updateStmt->bind_param("sssis", $mahang, $tenhang, $ngayxuat, $thoihanbh, $so_serial);
                        $updateStmt->execute();
                    } else {
                        // Insert new record
                        $insertStmt->bind_param("ssssi", $so_serial, $mahang, $tenhang, $ngayxuat, $thoihanbh);
                        $insertStmt->execute();
                    }
                }

                if (!empty($errorMessages)) {
                    $conn->rollback();
                    echo "<script>alert('$errorMessages'); window.location.href='';</script>";
                    throw new Exception("FORMAT ERROR");
                } else {
                    $conn->commit();
                    echo "<script>alert('Cập nhật dữ liệu Excel thành công!'); window.location.href='';</script>";
                }

                // Close statements
                $checkStmt->close();
                $updateStmt->close();
                $insertStmt->close();

            } catch (Exception $e) {
                $conn->rollback();
                echo "Lỗi: " . $e->getMessage();
                error_log("Error: " . $e->getMessage(), 3, 'errors.log');
            }

            $conn->close();
        }
    } else {
        echo "Lỗi khi upload file: " . $_FILES["file"]["error"];
        error_log("File upload error: " . $_FILES["file"]["error"], 3, 'errors.log');
    }
}
?>
