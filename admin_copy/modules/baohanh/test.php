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
require_once('vendor/autoload.php'); // Nếu import.php nằm ở thư mục gốc project/

use PhpOffice\PhpSpreadsheet\IOFactory;

// Database connection
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "123"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function isDateFormat($date) {
    // $format = 'Y-m-d';
    // $d = DateTime::createFromFormat($format, $date);
    
    // // Kiểm tra xem định dạng có khớp và ngày tháng có hợp lệ không
    // return $d && $d->format($format) === $date;
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

function checkWarrantyStatus($ngayXuat, $thoiHanBaoHanh) 
{
    // Chuyển đổi ngày xuất sang đối tượng DateTime
    $ngayXuat = new DateTime($ngayXuat);
    // Lấy thời gian hiện tại
    $ngayHienTai = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
    // Chuyển thời hạn bỏ hành từ tháng qua năm
    $thoiHanBaoHanh = (int) $thoiHanBaoHanh/12;

    // So sánh năm
    $namXuat = (int) $ngayXuat->format('Y');
    $namHienTai = (int) $ngayHienTai->format('Y');
    $soNam = $namHienTai - $namXuat;
    if ($soNam > $thoiHanBaoHanh) {
        return false; // Hết hạn
    } elseif ($soNam < $thoiHanBaoHanh) {
        return true; // Còn hạn
    }
    // Nếu năm bằng nhau, kiểm tra tiếp tháng
    $monthXuat = (int) $ngayXuat->format('m');
    $monthHienTai = (int) $ngayHienTai->format('m');
    if ($monthHienTai > $monthXuat) {
        return false; // Hết hạn
    } elseif ($monthHienTai < $monthXuat) {
        return true; // Còn hạn
    }
    // nêu băng nhau kiêm tra tiếp theo ngày
    $ngayHienTai_ = (int) $ngayHienTai->format('d') - 10;
    $ngayXuat_ = (int) $ngayXuat->format('d');
    if ($ngayHienTai_ > $ngayXuat_) {
        return false; // // Hết hạn
    } else {
        return true; // Còn hạn
    }
}
     // Xử lý xóa mã hết hạn
if (isset($_POST["deleteExpired"])) 
{
    $soSerial = "";

    $deleteSql = "DELETE FROM sanpham WHERE SoSerial = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("s", $soSerial);


    // iterate over each entry
    $sql = "SELECT * FROM sanpham";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $soSerial = $row["SOSERIAL"];
        $ngayXuat =$row["NGAYXUAT"];
        $thoiHanBaoHanh = $row["THOIHANBH"];

        // if (!checkWarrantyStatus($ngayXuat, $thoiHanBaoHanh)){
        //     $deleteStmt->execute();
        // }
    }

    // Commit transaction
    $conn->commit();

    echo "<script>alert('Xoá Hoàn Tất'); window.location.href='';</script>";
}

if (isset($_POST["import"])) {
    // Kiểm tra nếu có file được upload
    if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["file"]["tmp_name"];
        
        // Kiểm tra xem file đã được tải lên chưa
        var_dump($_FILES["file"]); // Debug thông tin file

        try {
            // Load file Excel
            $spreadsheet = IOFactory::load($fileTmpPath);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            // Bắt đầu transaction
            $conn->begin_transaction();
            $errorMessages = ""; // Danh sách lỗi
            $countInserted = 0; // Đếm số lượng mã đã thêm
            $countUpdated = 0; // Đếm số lượng mã đã cập nhật

            // Prepare data
            $mahang = "Cột MAHANG";
            $tenhang = "Cột TENHANG";
            $so_serial = "Cột SoSerial";
            $ngayxuat = "Cột NGAYXUAT";
            $thoihanbh = "Cột THOIHANBH";

            // bind seri extraction
            $checkStmt = $conn->prepare("SELECT SoSerial FROM sanpham WHERE SoSerial = ?"); 
            $checkStmt->bind_param("s", $so_serial);

            // bind inserting seri
            $insertStmt = $conn->prepare("INSERT INTO sanpham (SoSerial, MAHANG, TENHANG, NGAYXUAT, THOIHANBH) VALUES (?, ?, ?, ?, ?)");
            $insertStmt->bind_param("ssssi", $so_serial, $mahang, $tenhang, $ngayxuat, $thoihanbh);

            // bind updating seri
            $updateStmt = $conn->prepare("UPDATE sanpham SET MAHANG = ?, TENHANG = ?, NGAYXUAT = ?, THOIHANBH = ? WHERE SoSerial = ?");
            $updateStmt->bind_param("sssis", $mahang, $tenhang, $ngayxuat, $thoihanbh, $so_serial);

            // Lặp qua từng hàng trong dữ liệu để kiểm tra mã serial
            foreach ($data as $key => $row) {
                // Lấy dữ liệu từ mảng theo thứ tự mà người dùng cung cấp
                $mahang = trim($row[0]); // Cột MAHANG
                $tenhang = trim($row[1]); // Cột TENHANG
                $so_serial = trim($row[2]); // Cột SoSerial
                $ngayxuat = trim($row[3]); // Cột NGAYXUAT
                $thoihanbh = intval(trim($row[4])); // Cột THOIHANBH

                $key += 1;
                if ($key === 1) { 
                    if (count($row) < 5){
                        $errorMessages .= "Số lượng cột không hợp lệ. Phải có ít nhất 5 cột" ;
                        break;
                    }
                    if (($mahang !== "Mã hàng") || ($tenhang !== "Tên hàng") || ($so_serial !== "Số Serial") || ($ngayxuat !== "Ngày c.từ")){
                        $errorMessages .= "Thứ tự/Tên cột không đúng. Thứ tự cột phải là: Mã hàng, Tên hàng, Số Serial, Ngày c.từ" ;
                        break;
                    }

                    // check hoàn tất => Bỏ qua hàng tiêu đề
                    continue;
                }        

                // Kiểm tra các trường hợp sai
                if (empty($mahang) || empty($tenhang) || empty($so_serial)) {
                    $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Mã Hàng/Tên Hàng/Số Seri đang trống" ;
                    break;
                }
                elseif (!isDateFormat($ngayxuat)){
                    $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Ngày sai format" ;
                    break;
                }
                elseif ($thoihanbh === 0){
                    $errorMessages .= "Cập nhật lỗi ở hàng {$key}: Thời hạn bảo hành không phải số" ;
                    break;
                }

                // // Tơi đây là sp trên excel không lỗi
                // if (!checkWarrantyStatus($ngayxuat,$thoihanbh)){
                //     // sp đã hết hạn quá 10 ngày => skip
                //     continue;
                // }
            
                $checkStmt->execute();
                $checkStmt->store_result();
                               
                if ($checkStmt->num_rows > 0) {
                    // Nếu mã serial đã tồn tại, thực hiện cập nhật thông tin
                    $updateStmt->execute();
                } else {
                    // Nếu mã serial không tồn tại, thực hiện thêm dữ liệu mới
                    $insertStmt->execute();
                }         
                if (!empty($errorMessages)) {
                    foreach ($errorMessages as $message) {
                        echo $message . "<br>"; // Hoặc xử lý theo cách bạn muốn
                    }
                }
            }
            
            // break tới đay!
            if (!empty($errorMessages)) {
                $conn->rollback(); // Rollback transaction nếu có lỗi
                echo "<script>alert('$errorMessages'); window.location.href='';</script>";
                throw new Exception("FORMAT ERROR");
            } else {
                $conn->commit(); // Commit transaction nếu không có lỗi
                echo "<script>alert('Cập nhật dữ liệu Excel thành công!'); window.location.href='';</script>";
            }


            // close all prepares
            $checkStmt->close();
            $updateStmt->close();
            $insertStmt->close();

        } catch (Exception $e) {
            // Rollback transaction nếu có lỗi
            $conn->rollback();
         //   $conn->close();
            echo "Lỗi: " . $e->getMessage();
            error_log("Error: " . $e->getMessage(), 3, 'errors.log'); // Ghi log lỗi vào file
        }

        // Đóng kết nối sau khi hoàn tất
        $conn->close();
    } else {

        echo "Lỗi khi upload file: " . $_FILES["file"]["error"];
        error_log("File upload error: " . $_FILES["file"]["error"], 3, 'errors.log'); // Ghi log lỗi vào file
    }
}
?>
