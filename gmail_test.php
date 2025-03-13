<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Load thư viện PHPMailer

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";


$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra orderId từ URL
if (!isset($_GET['orderId']) || empty($_GET['orderId'])) {
    die("❌ Lỗi: Không có orderId!");
}

$orderId_decoded = base64_decode($_GET['orderId']);

if (!$orderId_decoded) {
    die("❌ Lỗi: Mã hóa OrderId không hợp lệ!");
}

// Lấy thông tin đơn hàng
$query = "SELECT * FROM `order` WHERE `formatted_order_id` = ?";
$selectStmt = $conn->prepare($query);
$selectStmt->bind_param("s", $orderId_decoded);
$selectStmt->execute();
$result = $selectStmt->get_result();

if ($result->num_rows === 0) {
    die("❌ Không tìm thấy đơn hàng!");
}

$row = $result->fetch_assoc();
$email = $row['customer_email'] ?? '';
$name = $row['customer_name'] ?? '';

if (empty($email) || empty($name)) {
    die("❌ Lỗi: Thiếu thông tin khách hàng!");
}

// Gửi email xác nhận
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vanan0210200@gmail.com'; // Gmail của bạn
    $mail->Password = 'iarw csdj bmfd iyls'; // Mật khẩu ứng dụng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('vanan02102002@gmail.com', 'Shop Công Nghệ ');
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = "Xác nhận đặt hàng thành công!";
    $mail->Body = "Chào <b>$name</b>, <br>Cảm ơn bạn đã đặt hàng tại shop chúng tôi!<br> Mã đơn hàng: <b>$orderId_decoded</b>";

    $mail->send();
    echo "✅ Email xác nhận đã được gửi thành công!";
} catch (Exception $e) {
    echo "❌ Lỗi gửi email: {$mail->ErrorInfo}";
}
?>
