<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Nếu dùng Composer
// Hoặc include trực tiếp nếu tải về thư mục phpmailer
// require 'phpmailer/src/PHPMailer.php';
// require 'phpmailer/src/SMTP.php';
// require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP của Gmail
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@gmail.com'; // Email của bạn
    $mail->Password   = 'your-email-password'; // Mật khẩu ứng dụng (App Password)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Thiết lập email người gửi
    $mail->setFrom('your-email@gmail.com', 'Tên Cửa Hàng');
    $mail->addAddress($customerEmail, $customerName); // Gửi cho khách hàng

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = "Xác nhận đơn hàng #$formattedOrderId";
    $mail->Body    = "
        <h3>Xin chào $customerName,</h3>
        <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>
        <p><strong>Mã đơn hàng:</strong> $formattedOrderId</p>
        <p><strong>Ngày đặt:</strong> $order_date</p>
        <p><strong>Phương thức vận chuyển:</strong> $shippingMethod</p>
        <p><strong>Địa chỉ giao hàng:</strong> $deliveryAddress</p>
        <p><strong>Ghi chú:</strong> $customerNote</p>
        <p>Chúng tôi sẽ sớm liên hệ với bạn để xác nhận đơn hàng.</p>
        <p>Trân trọng,</p>
        <p><strong>Đội ngũ hỗ trợ cửa hàng</strong></p>
    ";

    // Gửi email
    $mail->send();
} catch (Exception $e) {
    error_log("Không thể gửi email. Lỗi: {$mail->ErrorInfo}");
}


?>