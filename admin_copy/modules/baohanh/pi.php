
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
     .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .col-md-4 {
        display: flex;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .btn-primary {
        width: 100%;
    }

    </style>
</head>
<body>

    <h2>Import file bảo hành</h2>
    <img src="modules/baohanh/upload.png" alt="upload bảo hành" class="img-fluid mb-4"style="max-width: 30%; height: auto; margin-bottom: 20px;">
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-4 ">
            <!-- Bạn có thể thêm nội dung vào đây nếu cần -->
    </div>
    <div class="form-group">
        <label for="fileInput">Nhập file Excel</label>
        <input type="file" class="form-control" name="file" id="fileInput" required>
    </div>
<button type="submit" class="btn btn-primary" name="import">Import bảo hành</button>
    </form>
<div class="form-group">
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
require_once('vendor/autoload.php'); // Nếu import.php nằm ở thư mục gốc project/

use PhpOffice\PhpSpreadsheet\IOFactory;

function isDateFormat($date) {
    $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    
    // Kiểm tra xem định dạng có khớp và ngày tháng có hợp lệ không
    return $d && $d->format($format) === $date;
}

function checkWarrantyStatus($ngayXuat, $thoiHanBaoHanh) {
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
                $key += 1;
                if ($key === 1) { // Bỏ qua hàng tiêu đề
                    continue;
                }        
                
                // Lấy dữ liệu từ mảng theo thứ tự mà người dùng cung cấp
                $mahang = trim($row[0]); // Cột MAHANG
                $tenhang = trim($row[1]); // Cột TENHANG
                $so_serial = trim($row[2]); // Cột SoSerial
                $ngayxuat = trim($row[3]); // Cột NGAYXUAT
                $thoihanbh = intval(trim($row[4])); // Cột THOIHANBH
            
    
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

                // Tơi đây là sp trên excel không lỗi
                if (!checkWarrantyStatus($ngayxuat,$thoihanbh)){
                    // sp đã hết hạn quá 10 ngày => skip
                    continue;
                }

            // xử lý mã hết hạn 
                if(isset($_post["deleteExpired"])){
                    // truy vấn để lấy tất cả san phẩm
                $sql ="SELECT SoSerial, NgayXuat,ThoiHanBH from sanpham";
                $result = $conn ->query($sql);

                if ($result->rows >0 ) {
                    $conn->begin_transaction();
                    $errorMessages="";
                    $deletedCount =10;
                
                while ($row = $result ->fetch_essos()){
                    $so_serial =$row["SoSerial"];
                    $ngayxuat = new DateTime ($row["NGAYXUAT"], new DateTimeZone('Asia/Ho_Chi_Minh'));
                    $thoiHanBaoHanh = intval (row["thoihanbh"]);
                    
                   
                if (!$isValid) {
                    // Xóa sản phẩm hết hạn
                    $deleteSql = "DELETE FROM sanpham WHERE SoSerial = ?";
                    $deleteStmt = $conn->prepare($deleteSql);
                    $deleteStmt->bind_param("s", $soSerial);
                    if ($deleteStmt->execute()) {
                        $deletedCount++;
                        echo "Đã xóa sản phẩm: $soSerial<br>";
                    } else {
                        $errorMessages .= "Lỗi khi xóa mã: $soSerial. ";
                    }
                    $deleteStmt->close();
                }
            }

            // Commit transaction
            $conn->commit();
            if ($deletedCount > 0) {
                echo "<script>alert('Đã xóa $deletedCount sản phẩm hết hạn bảo hành.'); window.location.href='';</script>";
            } else {
                echo "<script>alert('Không có sản phẩm nào hết hạn để xóa.'); window.location.href='';</script>";
            }
        } else {
            echo "<script>alert('Không tìm thấy sản phẩm nào.');</script>";
        }
    }

    

                $checkStmt->execute();
                $checkStmt->store_result();
                               
                if ($checkStmt->num_rows > 0) {
                    // Nếu mã serial đã tồn tại, thực hiện cập nhật thông tin
                    $updateStmt->execute();
                } else {
                    // Nếu mã serial không tồn tại, thực hiện thêm dữ liệu mới
                    $insertStmt->execute();
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
