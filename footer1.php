<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Kết nối MySQL
$servername = "localhost"; // Thay đổi nếu cần
$username = "root"; // Thay đổi theo MySQL của bạn
$password = ""; // Nếu có mật khẩu, hãy thêm vào
$dbname = "rosa_db"; // Thay đổi thành tên database của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("❌ Kết nối MySQL thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (!empty($email)) {
        if (emailExists($email, $conn)) {
            echo "❌ Email này đã được đăng ký trước đó!";
        } else {
            if (sendEmailToAdmin($email)) {
                saveEmail($email, $conn);
                echo "✅ Email đã gửi và lưu thành công!";
            } else {
                echo "❌ Gửi email thất bại!";
            }
        }
    } else {
        echo "❌ Vui lòng nhập email.";
    }
}

// Hàm kiểm tra email đã tồn tại trong CSDL
function emailExists($email, $conn) {
    $stmt = $conn->prepare("SELECT email FROM subscribers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $exists = $stmt->num_rows > 0;
    $stmt->close();
    return $exists;
}

// Hàm lưu email vào MySQL
function saveEmail($email, $conn) {
    $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();
}

// Hàm gửi email đến admin
function sendEmailToAdmin($userEmail) {
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
        $mail->Subject = "📩 Thông báo từ ROSA";
        $mail->Body = "
            <h3>Thông tin người dùng:</h3>
            <p><strong>Email:</strong> $userEmail</p>
            <p>Thông báo email để nhận các thông tin mới nhất từ ROSA.</p>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

$conn->close(); // Đóng kết nối
?>
