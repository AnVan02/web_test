<title>Thông Tin Đặt Hàng</title>

<?php
require "../data/bank_info.php";
require "../header.php";
// Database connection
$servername = "localhost";
$username = "nvpbgqcv_banhang";
$password = "Vietson@123";
$dbname = "nvpbgqcv_banhang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Get orderID
$orderId_decoded = isset($_GET['orderId']) ? $_GET['orderId'] : '';
$orderId = base64_decode($orderId_decoded);

// Fetch order information from database
$query = "SELECT * FROM `order` WHERE `formatted_order_id` = ?";
$selectStmt = $conn->prepare($query);
$selectStmt->bind_param("s", $orderId);
$selectStmt->execute();
$result = $selectStmt->get_result();

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
}
else{
    $orderId = "";
}

?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('order-info').innerHTML = <?php echo json_encode($order);?>;
        });
    </script>

        <main>
            <?php if ($found): ?>
                <h3 ><b style='color: red ;font-weight: bolder;'>Đặt Hàng Thành Công<br>
                <small>Cảm ơn bạn đã đặt hàng ROSA .Vui lòng xem lại thông tin hoá đơn hàng & nhân viên sẽ liên hệ với quý khách trong thời gian sớm nhất</small></h3>
            
            <?php else: ?>
                <h3>Không Tìm Thấy Đơn Hàng</h3>
            <?php endif; ?>
            <h3 style ="font-size:22px">Thông tin đơn hàng  </h3>
            <h4>Hóa Đơn ID: <?php echo $orderId; ?></h4>
            <h4>Ngày Tạo: <?php echo $order_date; ?></h4>
            <br>
            <h3 style="font-size:22px" >THÔNG TIN KHÁCH HÀNG </h3>
            <p><strong>Tên Khách Hàng:</strong> <?php echo $name; ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo $phone; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
             
            <?php if ($shipping === 'home'): ?>
                <p><strong>Hình thức nhận hàng:</strong> Giao hàng tại nhà</p>
                <p><strong>Địa chỉ giao hàng:</strong> <?php echo $address; ?></p>
                <p><strong>Ghi chú khách hàng:</strong> <?php echo $note; ?></p>
           
            <?php elseif ($shipping === 'store'): ?>
                <p><strong>Hình thức nhận hàng:</strong> Nhận hàng tại đại lý uỷ quyền ROSA</p>
                <p><strong>Địa chỉ đại lý:</strong> <?php echo $address; ?></p>
                <p><strong>Ghi chú khách hàng:</strong> <?php echo $note; ?></p>
            <?php else: ?>
                <p><strong>Hình thức nhận hàng:</strong></p>
            <?php endif; ?>
           
            <h3>Nội Dung Hóa Đơn:</h3>
            <div id="order-info">
            </div>

            <?php if ($shipping === 'home'): ?>
                <h3>Thông Tin Chuyển Khoản:</h3>
                <p><strong>Tên tài khoản:</strong> <?php echo $accountName; ?></p>
                <p><strong>Số tài khoản:</strong> <?php echo $accountNumber; ?></p>
                <p><strong>Tên Ngân Hàng:</strong> <?php echo $bankName; ?></p>
                <div class="qr-code">
                    <img src=<?php echo $QRcode; ?> alt="QR Code" />
                </div>
            <?php endif; ?>
            
            <?php if ($shipping === 'store'): ?>
                <h3>Thông Tin Chuyển Khoản:</h3>
                <p><strong>Tên tài khoản:</strong> <?php echo $accountName; ?></p>
                <p><strong>Số tài khoản:</strong> <?php echo $accountNumber; ?></p>
                <p><strong>Tên Ngân Hàng:</strong> <?php echo $bankName; ?></p>
                <div class="qr-code">
                    <img src=<?php echo $QRcode; ?> alt="QR Code" />
                </div>
            <?php endif; ?>

            <a href="/index.php">Quay lại trang chủ</a>
        </main>
    </div>

    <!--<script src="../javascript/A3000A52-8-128.js"></script>-->

    
<?php require "../footer.php";?>




<style>
     
          /* Cơ bản thiết lập cho body và header */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    
    /* Nội dung chính */
    main {
        padding: 126px 120px; /* Thêm khoảng cách trên cùng để tránh header */
    }
    
    /* Các tiêu đề và đoạn văn bản */
    h3 {
        color: #FF3300;
        border-bottom: 2px solid #FF3300;
        padding-bottom: 5px;
    }
    
    p {
        line-height: 1.6;
        color: #000;
    }
    
    /* QR Code */
    .qr-code img {
        max-width: 350px; /* Maximum width */
        max-height: 350px; /* Maximum height */
        width: auto; /* Automatically adjust width while maintaining aspect ratio */
        height: auto; /* Automatically adjust height while maintaining aspect ratio */
        display: block; /* Ensure proper layout behavior */
    }
    
    

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 123px 20px; /* Giảm khoảng cách trên cùng cho điện thoại */
        }
    }
        </style>
    
</body>
</html>

.pList-logo-sec ul {
    display: flex
;
    align-items: center;
    justify-content: space-evenly;
    background: #282828;
    padding: 5px;