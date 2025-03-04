<?php

header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); 
header('Access-Control-Allow-Headers: Content-Type'); 
header('Content-Type: application/json');

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'database';


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data)) {
    $order = $data['order'];
    $customerName = $data['customerName'];
    $customerPhone = $data['customerPhone'];
    $customerEmail = $data['customerEmail'];
    $shippingMethod = $data['shippingMethod'];
    $deliveryAddress = $data['deliveryAddress'];
    $customerNote = $data['customerNote'];
    $status = $data['status'];
    $order_date = $data['order_date'];

    $sql = "INSERT INTO `order` (`order`, `customer_name`, `customer_phone`, `customer_email`, `shipping_method`, `delivery_address`, `customer_note`, `status`, `order_date`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssss", $order, $customerName, $customerPhone, $customerEmail, $shippingMethod, $deliveryAddress, $customerNote, $status, $order_date);

        if ($stmt->execute()) {
            $orderId = $stmt->insert_id; // Lấy ID của đơn hàng mới chèn 
                // Truy vấn lại để lấy formatted_order_id
            $formattedOrderId = null;
            $query = "SELECT `formatted_order_id` FROM `order` WHERE `order_id` = ?";
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
            echo json_encode([
                'status' => 'error',
                'message' => 'Lỗi khi lưu dữ liệu vào cơ sở dữ liệu.',
                'error' => $stmt->error
            ]);
        }

        $stmt->close();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Không thể chuẩn bị câu lệnh SQL.',
            'error' => $conn->error
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Dữ liệu không hợp lệ.'
    ]);
}

$conn->close();
?>