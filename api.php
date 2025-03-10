<?php

header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); 
header('Access-Control-Allow-Headers: Content-Type, Authorization'); 
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'database';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Kết nối thất bại: " . $conn->connect_error]));
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (!empty($data)) {
        $order = $data['order'] ?? '';
        $customerName = $data['customerName'] ?? '';
        $customerPhone = $data['customerPhone'] ?? '';
        $customerEmail = $data['customerEmail'] ?? '';
        $shippingMethod = $data['shippingMethod'] ?? '';
        $deliveryAddress = $data['deliveryAddress'] ?? '';
        $customerNote = $data['customerNote'] ?? '';
        $status = "Đang xử lý";

        $timezone = new DateTimeZone('Asia/Ho_Chi_Minh');
        $currentDateTime = new DateTime('now', $timezone);
        $order_date = $currentDateTime->format('Y-m-d H:i:s');

        $sql = "INSERT INTO `orders` (`order_details`, `customer_name`, `customer_phone`, `customer_email`, `shipping_method`, `delivery_address`, `customer_note`, `status`, `order_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssssss", $order, $customerName, $customerPhone, $customerEmail, $shippingMethod, $deliveryAddress, $customerNote, $status, $order_date);

            if ($stmt->execute()) {
                $orderId = $stmt->insert_id; 
                $query = "SELECT `formatted_order_id` FROM `orders` WHERE `order_id` = ?";
                if ($selectStmt = $conn->prepare($query)) {
                    $selectStmt->bind_param("i", $orderId);
                    if ($selectStmt->execute()) {
                        $result = $selectStmt->get_result();
                        if ($row = $result->fetch_assoc()) {
                            $formattedOrderId = $row['formatted_order_id'];
                        }
                    }
                    $selectStmt->close();
                }
                $encodedOrderId = base64_encode($formattedOrderId);
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Đơn hàng đã được gửi thành công.',
                    'order_id' => $encodedOrderId,
                    'orderDetails' => $data
                ]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi lưu dữ liệu vào cơ sở dữ liệu.', 'error' => $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Không thể chuẩn bị câu lệnh SQL.', 'error' => $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ.']);
    }
} elseif ($method === 'GET') {
    $orderCode = $_GET['order_code'] ?? '';

    if (empty($orderCode)) {
        echo json_encode(["success" => false, "message" => "Vui lòng nhập mã đơn hàng!"]);
        exit;
    }

    $sql = "SELECT * FROM `orders` WHERE `formatted_order_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $orderCode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
        preg_match('/Tổng Cộng:\s([\d,]+)đ/', $order['order_details'], $matches);
        $total = $matches[1] ?? 'Không xác định';

        echo json_encode([
            "success" => true,
            "data" => [
                "order_id" => $order['order_id'],
                "formatted_order_id" => $order['formatted_order_id'],
                "customer_name" => $order['customer_name'],
                "customer_phone" => $order['customer_phone'],
                "order_date" => $order['order_date'],
                "total_price" => $total,
                "status" => $order['status'],
                "order_details" => $order['order_details']
            ]
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "Không tìm thấy đơn hàng!"]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Phương thức không được hỗ trợ!']);
}

$conn->close();
?>