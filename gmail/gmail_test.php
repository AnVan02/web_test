<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include Composer's autoloader

$mail = new PHPMailer(true);
try {
    // Your email configuration code here...
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
// kêt nối database
function dbconnect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    // Kết nối đến database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    return $conn;
}

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server của Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'vanan0210200@gmail.com'; // Thay bằng email gửi
    $mail->Password = getenv('iarw csdj bmfd iyls'); // Mật khẩu được lấy từ biến môi trường
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Cấu hình email người gửi
    $mail->setFrom('vanan0210200@gmail.com', 'ROSA Store');
    
    // Email người nhận (khách hàng)
    $mail->addAddress($email, $name, $phone); // $email là email khách hàng lấy từ database

    // kiem tra email ()
    

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = "Xác nhận đơn hàng #$orderId";
    $mail->Body = "
        <h3>Cảm ơn bạn đã đặt hàng tại ROSA!</h3>
        <p><strong>Hóa Đơn ID:</strong> $orderId</p>
        <p><strong>Ngày Tạo:</strong> $order_date</p>
        <p><strong>Tên khách hàng :</strong>$name</p>
        <p><strong>Địa chỉ:</strong> $address</p>
        <p><strong>Số điện thoại:</strong> $phone</p>
        <p><strong>Hình thức nhận hàng:</strong> " . ($shipping == 'home' ? 'Giao hàng tận nhà' : 'Nhận tại cửa hàng') . "</p>
        <p><strong>Email:</strong> $email</p>
        <p>Đơn hàng sẽ được giao trong thời gian sớm nhất !</p>
    ";

    // Gửi email
    $mail->send();
    echo "Email xác nhận đã gửi thành công!";
} catch (Exception $e) {
    echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
}

?>
