<?php
// Nạp thư viện PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Máy chủ SMTP của Gmail
    $mail->SMTPAuth   = true;
    $mail->Username   = 'vanan02102002@gmail.com'; // Thay bằng email của bạn
    $mail->Password   = 'jlfc xzll fppq gcsz'; // Thay bằng mật khẩu ứng dụng Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Cấu hình người gửi và người nhận
    $mail->setFrom('vanan02102002@gmail.com', 'Admin');
    $mail->addAddress('vanan02102002@gmail.com', 'Người nhận'); // Email người nhận

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = 'Test gửi email từ PHP';
    $mail->Body    = 'Đây là email test gửi từ PHP sử dụng PHPMailer.';

    // Gửi email
    $mail->send();
    echo '✅ Email đã được gửi thành công!';
} catch (Exception $e) {
    echo "❌ Gửi email thất bại. Lỗi: {$mail->ErrorInfo}";
}
