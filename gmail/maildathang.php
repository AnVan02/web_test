<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';// load thư viên PHPMailer

$mail = new PHPMailer(true);
    
    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'vanan02102002@gmail.com'; // Email của bạn
        $mail->Password = 'iarw csdj bmfd iyls'; // Mật khẩu ứng dụng Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Cấu hình người gửi
        $mail->setFrom('vanan02102002@gmail.com', 'Shop ');
        $mail->addReplyTo('vanan02102002@gmail.com', 'Shop ');
        $mail->addAddress($email, $name); // Gửi đến khách hàng


        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "Xác nhận đơn hàng #$orderId";
        $mail->Body    = "
            <h2>Cảm ơn bạn đã đặt hàng!</h2>
            <p><strong>Mã đơn hàng:</strong> $orderId</p>
            <p><strong>Ngày đặt:</strong> $order_date</p>
            <p><strong>Tên khách hàng:</strong> $name</p>
            <p><strong>Số điện thoại:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Địa chỉ giao hàng:</strong> $address</p>
            <p><strong>Nội dung đơn hàng:</strong></p>
            <div style='background:#f5f5f5;padding:10px;border-radius:5px;'>". nl2br(htmlspecialchars($order)) ."</div>
            <p><strong>Phương thức thanh toán:</strong> Chuyển khoản ngân hàng</p>
            <p><strong>Số tài khoản:</strong> $accountNumber</p>
            <p><strong>Ngân hàng:</strong> $bankName</p>
            <p>Vui lòng thanh toán và chờ nhân viên liên hệ xác nhận đơn hàng.</p>
            <p>Cảm ơn bạn đã mua sắm tại Shop!</p>
        ";

        // Gửi email
        $mail->send();
    } catch (Exception $e) {
        echo "Lỗi gửi email: {$mail->ErrorInfo}";
    }



?>