<?php
// Chỉ gửi email nếu tìm thấy đơn hàng
if ($found) {
    require 'vendor/autoload.php'; // Load thư viện PHPMailer
   

    $mail = new PHPMailer(true);
    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tvdell789@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        // Thông tin người gửi & nhận
        $mail->setFrom('tvdell789@gmail.com', 'ROSA Store');
        $mail->addAddress($email, $name, $phone);

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "Email xác nhận đơn hàng - $orderId";
        $mail->Body = "
            <h2>Cảm ơn bạn đã đặt hàng tại ROSA</h2>
            <p>vui lòng xác nhận đơn hàng </p>
            <p><strong>Hóa đơn ID:</strong> $orderId</p>
            <p><strong>Ngày tạo:</strong> $order_date</p>
            <p><strong>Tên khách hàng:</strong> $name</p>
            <p><strong>Số điện thoại:</strong> $phone</p>
            <p><strong>Ghi chú khách hàng:</strong></p>
            <p><strong>Địa chỉ giao hàng:</strong> $address</p>
            <p><strong>Phương thức nhận hàng: </strong> " . ($shipping === 'home' ? 'Giao hàng tận nơi' : 'Nhận tại đại lý') . "</p>
            
            <h3>Sản phẩm đã đặt:</h3>
            <p>$order</p>
            <br>
            <p><em>Nếu có thắt mắt vui long liên hệ với chúng tôi </em></p>
        ";

        
        // Gửi email
        if ($mail->send()) {
            echo "<p style='color:green;'>✅ Email xác nhận đã được gửi thành công!</p>";
        } else {
            echo "<p style='color:red;'>❌ Gửi email thất bại. Vui lòng thử lại!</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color:red;'>⚠️ Lỗi gửi email: {$mail->ErrorInfo}</p>";
    }
}


?>