<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';// load thư viên PHPMailer

$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'vanan02102002@gmail.com'; // Replace with your email
    $mail->Password = 'iarw csdj bmfd iyls'; // Replace with your email app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom('vanan02102002@gmail.com', 'admin');
    $mail->addAddress('', 'khach hang'); // Replace with recipient's email and name

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Gửi mail xác nhận ';
    $mail->Body    = '<p>Gưi mail thành công  <strong>HTML email</strong> mail xác nhân thông tin .</p>';
    $mail->AltBody = 'This is a plain-text version of the email body.';

    $mail->send();
    echo 'Gửi mail thanh công!';
} catch (Exception $e) {
    echo "mail bị lỗi . Error: {$mail->ErrorInfo}";
}

?>
