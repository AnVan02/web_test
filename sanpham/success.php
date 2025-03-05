<?php
require "../data/bank_info.php";
require "../header.php";

// Kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận orderId từ URL
$orderId_decoded = isset($_GET['orderId']) ? $_GET['orderId'] : '';
$orderId = base64_decode($orderId_decoded);

// Truy vấn dữ liệu đơn hàng
$query = "SELECT * FROM `order` WHERE `formatted_order_id` = ?";
$selectStmt = $conn->prepare($query);
$selectStmt->bind_param("s", $orderId);
$selectStmt->execute();
$result = $selectStmt->get_result();

// Khởi tạo biến mặc định
$order = "";
$order_date = "";
$name = "";
$phone = "";
$email = "";
$shipping = "";
$address = "";
$note = "";
$found = false;

if ($result->num_rows > 0) {
    $found = true;
    $row = $result->fetch_assoc();
    $order = $row['order'];
    $order_date = $row['order_date'];
    $name = $row['customer_name'];
    $phone = $row['customer_phone'];
    $email = $row['customer_email'];
    $shipping = $row['shipping_method'];
    $address = $row['delivery_address'];
    $note = $row['customer_note'];
} else {
    $orderId = "";
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đặt Hàng</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #FF3366;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
            border-bottom: 2px solid #FF3366;
            padding-bottom: 5px;
        }
        p {
            font-size: 14px;
            line-height: 1.5;
            margin: 5px 0;
        }
        .order-info {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }
        .table-order {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table-order th, .table-order td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }
        .table-order th {
            text-align: left;
            font-weight: bold;
        }
        .price {
            text-align: right;
            font-weight: bold;
            color: #FF3366;
        }
        .qr-code {
            text-align: center;
            margin-top: 15px;
        }
        .qr-code img {
            width: 150px;
            height: auto;
        }
        .back-home {
            display: block;
            text-align: center;
            padding: 10px;
            margin-top: 15px;
            background: #FF3366;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        @media (max-width: 768px) {
            main {
                padding: 15px;
            }
            h3 {
                font-size: 16px;
            }
            p, .table-order th, .table-order td {
                font-size: 13px;
            }
            .qr-code img {
                width: 120px;
            }
        }
    </style>
</head>
<body>
    <main>
        <?php if ($found): ?>
            <h3>Đặt Hàng Thành Công<br><small>Nhân viên sẽ liên hệ với quý khách trong thời gian sớm nhất</small></h3>
        <?php else: ?>
            <h3>Không Tìm Thấy Đơn Hàng</h3>
        <?php endif; ?>
        
        <h4>Hóa Đơn ID: <?php echo htmlspecialchars($orderId); ?></h4>
        <h4>Ngày Tạo: <?php echo htmlspecialchars($order_date); ?></h4>
        <br>
        <p><strong>Tên Khách Hàng:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($phone); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
         
        <?php if ($shipping === 'home'): ?>
            <p><strong>Hình thức nhận hàng:</strong> Giao hàng tại nhà</p>
            <p><strong>Địa chỉ giao hàng:</strong> <?php echo htmlspecialchars($address); ?></p>
            <p><strong>Ghi chú khách hàng:</strong> <?php echo htmlspecialchars($note); ?></p>
       
        <?php elseif ($shipping === 'store'): ?>
            <p><strong>Hình thức nhận hàng:</strong> Nhận hàng tại đại lý uỷ quyền ROSA</p>
            <p><strong>Địa chỉ đại lý:</strong> <?php echo htmlspecialchars($address); ?></p>
            <p><strong>Ghi chú khách hàng:</strong> <?php echo htmlspecialchars($note); ?></p>
        <?php else: ?>
            <p><strong>Hình thức nhận hàng:</strong> Không xác định</p>
        <?php endif; ?>
       
        <h3>Nội Dung Hóa Đơn:</h3>
        <div class="order-info">
            <?php echo nl2br(htmlspecialchars($order)); ?>
        </div>

        <?php if ($shipping === 'home' || $shipping === 'store'): ?>
            <h3>Thông Tin Chuyển Khoản:</h3>
            <p><strong>Tên tài khoản:</strong> <?php echo htmlspecialchars($accountName); ?></p>
            <p><strong>Số tài khoản:</strong> <?php echo htmlspecialchars($accountNumber); ?></p>
            <p><strong>Tên Ngân Hàng:</strong> <?php echo htmlspecialchars($bankName); ?></p>
            <div class="qr-code">
                <img src="<?php echo htmlspecialchars($QRcode); ?>" alt="QR Code" />
            </div>
        <?php endif; ?>

        <a href="/index.php" class="back-home">Quay lại trang chủ</a>
    </main>
</body>
</html>

<?php
$selectStmt->close();
$conn->close();
?>
