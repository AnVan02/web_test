<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$response = ["success" => false, "message" => "Lỗi xử lý API"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response["message"] = "Lỗi kết nối database";
    echo json_encode($response);
    exit;
}

if (isset($_GET['order_code'])) {
    $order_code = $_GET['order_code'];

    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_code = ?");
    $stmt->bind_param("s", $order_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $customer_email = $row["customer_email"]; // Thêm trường email trong database
        $data = [
            "formatted_order_id" => $row["order_code"],
            "customer_name" => $row["customer_name"],
            "customer_phone" => $row["customer_phone"],
            "order_date" => $row["order_date"],
            "status" => $row["status"]
        ];

        // Gửi email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'vanan02102002@gmil.com'; // Thay bằng email của bạn
            $mail->Password = ''; // Thay bằng mật khẩu ứng dụng Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('vanan02102002@gmil.com', 'Cửa hàng ABC');
            $mail->addAddress($customer_email, $row["customer_name"]);

            $mail->isHTML(true);
            $mail->Subject = "Thông tin đơn hàng của bạn";
            $mail->Body = "
                <h3>Xin chào {$row["customer_name"]},</h3>
                <p>Đơn hàng của bạn có thông tin như sau:</p>
                <ul>
                    <li><b>Mã đơn hàng:</b> {$row["order_code"]}</li>
                    <li><b>Ngày đặt hàng:</b> {$row["order_date"]}</li>
                    <li><b>Trạng thái:</b> {$row["status"]}</li>
                </ul>
                <p>Cảm ơn bạn đã mua hàng!</p>
            ";

            $mail->send();
            $response = ["success" => true, "message" => "Thông tin đơn hàng đã gửi về email!", "data" => $data];
        } catch (Exception $e) {
            $response["message"] = "Gửi email thất bại: " . $mail->ErrorInfo;
        }
    } else {
        $response["message"] = "Không tìm thấy đơn hàng";
    }
    $stmt->close();
}

$conn->close();
echo json_encode($response);
exit;
?>
