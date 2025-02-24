
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
        h2 { text-align: center; margin-bottom: 20px; }
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
        .form-group { margin-bottom: 15px; }
        .btn-primary, .btn-danger { width: 100%; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
   
        <h2>Import file bảo hành</h2>
        <div class="text-center">
            <img src="modules/baohanh/up.png" alt="upload bảo hành" class="img-fluid mb-4" style="max-width: 40%;">
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fileInput">Nhập file Excel</label>
                <input type="file" class="form-control" name="file" id="fileInput" required>
            </div>
            <button type="submit" class="btn btn-primary" name="import">Import bảo hành</button>
        </form>

        <div class="form-group mt-4">
            <form action="" method="post">
                <button type="submit" class="btn btn-danger" name="deleteExpired">Xóa tất cả mã hết hạn</button>
            </form>
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

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "123";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function isDateFormat($date) {
    return preg_match("/^([0-9]{1,2})[\/\-]([0-9]{1,2})[\/\-]([0-9]{4})$/", $date);
}

function convertDateFormat($date) {
    if (preg_match("/^([0-9]{1,2})[\/\-]([0-9]{1,2})[\/\-]([0-9]{4})$/", $date, $matches)) {
        $day = (int)$matches[1];
        $month = (int)$matches[2];
        $year = (int)$matches[3];
        return sprintf('%02d/%02d/%04d', $day, $month, $year); // Chuyển thành d/m/Y
    }
    return null;
}

function checkWarrantyStatus($ngayXuat, $thoiHanBaoHanh) {
    $ngayXuat = DateTime::createFromFormat('d/m/Y', $ngayXuat);
    if (!$ngayXuat) return false;
    
    $ngayHienTai = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
    $thoiHanBaoHanh = (int) $thoiHanBaoHanh / 12;

    $interval = $ngayHienTai->diff($ngayXuat);
    $soNam = $interval->y;
    
    if ($soNam > $thoiHanBaoHanh) return false;
    if ($soNam < $thoiHanBaoHanh) return true;
    
    if ($interval->m > 0) return false;
    return $interval->d <= 10;
}

// Phần xử lý upload và insert/update
if (isset($_POST["import"])) {
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        try {
            $spreadsheet = IOFactory::load($_FILES["file"]["tmp_name"]);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            $conn->begin_transaction();
            $errorMessages = "";
            $countInserted = 0;
            $countUpdated = 0;

            foreach ($data as $key => $row) {
                $key += 1;
                if ($key === 1) continue;

                $mahang = trim($row[0] ?? '');
                $tenhang = trim($row[1] ?? '');
                $so_serial = trim($row[2] ?? '');
                $ngayxuat = convertDateFormat(trim($row[3] ?? ''));
                $thoihanbh = !empty($row[4]) ? intval(trim($row[4])) : 0;

                error_log("Dòng $key - Ngày xuất trước khi insert: $ngayxuat");

                if (empty($mahang) || empty($tenhang) || empty($so_serial)) {
                    $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Mã Hàng/Tên Hàng/Số Seri đang trống\n";
                    continue;
                }

                if (!isDateFormat($ngayxuat)) {
                    $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Ngày '$ngayxuat' phải có định dạng dd/mm/yyyy\n";
                    continue;
                }

                $checkStmt = $conn->prepare("SELECT SoSerial FROM sanpham WHERE SoSerial = ?");
                $checkStmt->bind_param("s", $so_serial);
                $checkStmt->execute();
                $checkStmt->store_result();

                if ($checkStmt->num_rows > 0) {
                    $updateStmt = $conn->prepare("UPDATE sanpham SET MAHANG = ?, TENHANG = ?, NGAYXUAT = ?, THOIHANBH = ? WHERE SoSerial = ?");
                    $updateStmt->bind_param("sssis", $mahang, $tenhang, $ngayxuat, $thoihanbh, $so_serial);
                    if ($updateStmt->execute()) {
                        $countUpdated++;
                        error_log("Cập nhật thành công: $so_serial với ngày $ngayxuat");
                    } else {
                        error_log("Lỗi cập nhật: " . $updateStmt->error);
                    }
                } else {
                    $insertStmt = $conn->prepare("INSERT INTO sanpham (SoSerial, MAHANG, TENHANG, NGAYXUAT, THOIHANBH) VALUES (?, ?, ?, ?, ?)");
                    $insertStmt->bind_param("ssssi", $so_serial, $mahang, $tenhang, $ngayxuat, $thoihanbh);
                    if ($insertStmt->execute()) {
                        $countInserted++;
                        error_log("Thêm mới thành công: $so_serial với ngày $ngayxuat");
                    } else {
                        error_log("Lỗi thêm mới: " . $insertStmt->error);
                    }
                }
            }

            if (!empty($errorMessages)) {
                $conn->rollback();
                echo "<script>alert(" . json_encode($errorMessages) . "); window.location.href='';</script>";
            } else {
                $conn->commit();
                $message = "Cập nhật thành công! ";
                if ($countInserted > 0) $message .= "Thêm mới: $countInserted. ";
                if ($countUpdated > 0) $message .= "Cập nhật: $countUpdated.";
                echo "<script>alert(" . json_encode($message) . "); window.location.href='';</script>";
            }

        } catch (Exception $e) {
            $conn->rollback();
            error_log("Error: " . $e->getMessage());
            echo "<script>alert('Có lỗi xảy ra: " . addslashes($e->getMessage()) . "'); window.location.href='';</script>";
        }
    }
}
$conn->close();
?>