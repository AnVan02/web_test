<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 

// Tên tệp lưu danh sách email đã đăng ký
$emailFile = 'email.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (!empty($email)) {
        if (emailExists($email, $emailFile)) {
            echo "❌ Email này đã được đăng ký trước đó!";
        } else {
            if (sendEmailToAdmin($email)) {
                saveEmail($email, $emailFile);
                echo "✅ Email đã gửi thành công!";
            } else {
                echo "❌ Gửi email thất bại!";
            }
        }
    } else {
        echo "❌ Vui lòng nhập email.";
    }
}

// Hàm kiểm tra email đã tồn tại
function emailExists($email, $emailFile) {
    if (!file_exists($emailFile)) {
        return false;
    }

    $emails = file($emailFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return in_array($email, $emails);
}

// Hàm lưu email vào tệp
function saveEmail($email, $emailFile) {
    file_put_contents($emailFile, $email . PHP_EOL, FILE_APPEND | LOCK_EX);
}


// Hàm gửi email đến admin
function sendEmailToAdmin($userEmail)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vanan02102002@gmail.com'; 
        $mail->Password = 'djre jwmk kaqr zdkh'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        $mail->setFrom('vanan02102002@gmail.com', 'ROSA COMPUTER');
        $mail->addAddress('vanan02102002@gmail.com', 'Admin');
        $mail->addAddress('tvdell789@gmail.com', 'Admin 1');
        
        

        $mail->isHTML(true);
        $mail->Subject = "📩 EMAIL NHẬN TIN NHẮN MỚI NHẤT TỪ ROSA";
        $mail->Body = "
          <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
            <div style='max-width: 70%; margin: auto; background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);'>
                <!-- Tiêu đề -->
                <img src='https://rosacomputer.vn/assets/images/rosa.png' alt='ROSA Computer AI' style='max-width: 150px; margin-bottom: 10px;'>
                <div style='text-align: center;'>
                    <h2 style='color: #ff1d1d;'> THÔNG BÁO TỪ WEBSITE ROSA </h2>
                    <p style='color: #4CAF50; font-size: 16px;font-family: Arial, sans-serif;'><strong>✔ THÔNG TIN ĐẮNG KÝ EMAIL NHẬN THÔNG TIN MỚI  NHẤT TỪ ROSA : https://rosacomputer.vn </strong></p>
                </div>
                    <table style='width: 70%; font-size: 15px; font-family: Arial, sans-serif;'>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td style='color: rgb(255, 65, 40);'>$userEmail</td>
                        </tr>
                    </table>
                        <hr style='border: 1px solid #ddd; margin: 20px 0;'>
            <p style='font-family: Arial, sans-serif; text-align: center; font-size: 15px; color: #ff1d1d;'> GỬI THÔNG TIN MỚI NHẤT ĐẾN VỚI KHÁCH HÀNG  🚀</p><br>
            <div style='text-align: center'>
                <a href='https://rosacomputer.vn/' style='color: red; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px;'>
                    <img src='https://img.icons8.com/ultraviolet/96/domain.png' alt='Facebook' style='height:25px; vertical-align: middle;'>ROSA COMPUTER AI
                </a>
                <a href='https://www.facebook.com/people/ROSA-AI-Computer/61559427752479/' style='color: red; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px;'>
                    <img src='https://img.icons8.com/fluency/96/facebook-new.png' alt='Facebook' style='height:25px; vertical-align: middle;'>ROSA COMPUTER AI
                </a>
                <a href='https://www.linkedin.com/in/rosa-ai-computer-20980b352/' style='color: red; padding: 10px 15px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 5px;'>
                    <img src='https://img.icons8.com/color/96/linkedin.png' alt='LinkedIn' style='height:25px; vertical-align: middle;'>ROSA COMPUTER AI
                </a>
            </div>
            <p style='font-family: Arial, sans-serif; text-align: center; font-size: 15px; color: #ff1d1d;'>Đội ngũ hỗ trợ - ROSA COMPUTER<br>Email: support@rosacomputer.ai | Hotline:  (028) 39293770 - (028) 39293765</p></div>
        </body>";


        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
