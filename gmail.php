<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Đảm bảo bạn đã cài PHPMailer

$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@gmail.com'; // Thay bằng email của bạn
    $mail->Password = 'your_email_password'; // Thay bằng mật khẩu ứng dụng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Cấu hình người gửi và người nhận
    $mail->setFrom('your_email@gmail.com', 'Shop Online');
    $mail->addAddress($customerEmail, $customerName);
    $mail->addReplyTo('your_email@gmail.com', 'Shop Online');

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = "Xác nhận đơn hàng #$formattedOrderId";
    $mail->Body = "
        <h2>Cảm ơn bạn đã đặt hàng!</h2>
        <p>Mã đơn hàng của bạn: <strong>$formattedOrderId</strong></p>
        <p><strong>Tên khách hàng:</strong> $customerName</p>
        <p><strong>Số điện thoại:</strong> $customerPhone</p>
        <p><strong>Email:</strong> $customerEmail</p>
        <p><strong>Địa chỉ giao hàng:</strong> $deliveryAddress</p>
        <p><strong>Ghi chú:</strong> $customerNote</p>
        <br>
        <p>Chúng tôi sẽ sớm liên hệ với bạn để xác nhận đơn hàng.</p>
        <p>Xin cảm ơn!</p>
    ";

    // Gửi email
    $mail->send();
    echo json_encode(['status' => 'success', 'message' => 'Đơn hàng đã gửi và email đã được gửi.']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Email không gửi được.', 'error' => $mail->ErrorInfo]);
}


?>