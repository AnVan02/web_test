<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Nếu dùng Composer
// require '../path/to/PHPMailer/src/PHPMailer.php'; // Nếu tải thủ công

if ($found) {
    $mail = new PHPMailer(true);
    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'tvdell789@gmail.com'; // Email của bạn
        $mail->Password = 'your-email-password'; // Mật khẩu ứng dụng Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Cấu hình người gửi
        $mail->setFrom('tvdell789@gmail.com', 'COMPUTER ');
        $mail->addAddress($email, $name); // Gửi đến khách hàng
        $mail->addReplyTo('tvdell789@gmail.com', 'COMPUTER');

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "Xác nhận đơn hàng #$orderId" ;
        $mail->Body    = "
            <h2>Cảm ơn bạn đã đặt hàng tại SHOP !</h2>
            <p><strong>Mã đơn hàng:</strong> $orderId</p>
            <p><strong>Ngày đặt:</strong> $order_date</p>
            <p><strong>Tên khách hàng:</strong> $name</p>
            <p><strong>Số điện thoại:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Địa chỉ giao hàng:</strong> $address</p>
            <p><strong>Nội dung đơn hàng:</strong></p>
            <div style='background:#f5f5f5;padding:10px;border-radius:5px;'>". nl2br(htmlspecialchars($order)) ."</div>
            <p><strong>Phương thức thanh toán:</strong> $</p>
            <p><strong>Số tài khoản:</strong> $accountNumber</p>
            <p><strong>Ngân hàng:</strong> $bankName</p>

            
            <p>Vui lòng thanh toán và chờ nhân viên liên hệ xác nhận đơn hàng của bạn</p>
            <p>Cảm ơn bạn đã mua sắm tại ROSA!</p>
        ";

        // Gửi email
        $mail->send();
        $conn ->query (" update orders SET email_sent = 1 where order_id = ".$row ['order_id']);
    }  catch (Exception $e) {
        echo "lỗi gửi email : {$mail -> ErrorInfo }";
    }   


    
   
}

$conn -> close ();

?>

