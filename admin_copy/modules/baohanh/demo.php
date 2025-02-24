<?php
// Nhập tất cả các file cần thiết
require_once('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "123"; // Thay bằng tên CSDL của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

function isDateFormat($date) {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

function checkWarrantyStatus($ngayXuat, $thoiHanBaoHanh) 
{
    $ngayXuat = new DateTime($ngayXuat);
    $ngayHienTai = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
    $thoiHanBaoHanh = (int) $thoiHanBaoHanh/12;

    $namXuat = (int) $ngayXuat->format('Y');
    $namHienTai = (int) $ngayHienTai->format('Y');
    $soNam = $namHienTai - $namXuat;

    if ($soNam > $thoiHanBaoHanh) {
        return false; 
    } elseif ($soNam < $thoiHanBaoHanh) {
        return true; 
    }

    $monthXuat = (int) $ngayXuat->format('m');
    $monthHienTai = (int) $ngayHienTai->format('m');
    if ($monthHienTai > $monthXuat) {
        return false; 
    } elseif ($monthHienTai < $monthXuat) {
        return true; 
    }

    $ngayHienTai_ = (int) $ngayHienTai->format('d') - 10;
    $ngayXuat_ = (int) $ngayXuat->format('d');
    return $ngayHienTai_ <= $ngayXuat_;
}

if (isset($_POST["import"])) {
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["file"]["tmp_name"];
        try {
            $spreadsheet = IOFactory::load($fileTmpPath);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            $conn->begin_transaction();
            $errorMessages = ""; 
            $countInserted = 0; 
            $countUpdated = 0; 

            $checkStmt = $conn->prepare("SELECT SoSerial FROM sanpham WHERE SoSerial = ?"); 
            $checkStmt->bind_param("s", $so_serial);

            $insertStmt = $conn->prepare("INSERT INTO sanpham (SoSerial, MAHANG, TENHANG, NGAYXUAT, THOIHANBH) VALUES (?, ?, ?, ?, ?)");
            $insertStmt->bind_param("ssssi", $so_serial, $mahang, $tenhang, $ngayxuat, $thoihanbh);

            $updateStmt = $conn->prepare("UPDATE sanpham SET MAHANG = ?, TENHANG = ?, NGAYXUAT = ?, THOIHANBH = ? WHERE SoSerial = ?");
            $updateStmt->bind_param("sssis", $mahang, $tenhang, $ngayxuat, $thoihanbh, $so_serial);

            foreach ($data as $key => $row) {
                $mahang = trim($row[0]);
                $tenhang = trim($row[1]);
                $so_serial = trim($row[2]);
                $ngayxuat = trim($row[3]);
                $thoihanbh = intval(trim($row[4]));

                if ($key === 0) continue; 

                if (empty($mahang) || empty($tenhang) || empty($so_serial)) {
                    $errorMessages .= "Lỗi ở hàng {$key}: Mã Hàng/Tên Hàng/Số Seri đang trống<br>";
                    continue;
                }
                if (!isDateFormat($ngayxuat)){
                    $errorMessages .= "Lỗi ở hàng {$key}: Ngày sai format<br>";
                    continue;
                }
                if ($thoihanbh === 0){
                    $errorMessages .= "Lỗi ở hàng {$key}: Thời hạn bảo hành không phải số<br>";
                    continue;
                }

                if (!checkWarrantyStatus($ngayxuat, $thoihanbh)){
                    continue;
                }

                $checkStmt->execute();
                $checkStmt->store_result();

                if ($checkStmt->num_rows > 0) {
                    $updateStmt->execute();
                    $countUpdated++;
                } else {
                    $insertStmt->execute();
                    $countInserted++;
                    

                    
                }         
            }

            if (!empty($errorMessages)) {
                echo $errorMessages;
            } else {
                $conn->commit();
                echo "Đã thêm {$countInserted} mã và cập nhật {$countUpdated} mã thành công.";
                
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo "Lỗi trong khi import file: " . $e->getMessage();
        }
    } else {
        echo "Không có file nào được tải lên.";
    }
}
?>
