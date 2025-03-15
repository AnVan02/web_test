<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../data/bank_info.php';
require '../header.php';
require 'vendor/autoload.php'; // PHPMailer

// Kết nối database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy orderId từ URL
$orderId_decoded = isset($_GET['orderId']) ? $_GET['orderId'] : '';
$orderId = base64_decode($orderId_decoded);

// Lấy thông tin đơn hàng từ database
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

    // Gửi email xác nhận đơn hàng
    sendOrderEmail($orderId, $order, $order_date, $name, $phone, $shipping, $email, $address, $note);
} else {
    $orderId = "";
}


function sendOrderEmail($orderId, $order, $order_date, $name, $phone, $shipping, $email, $address, $note) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vanan02102002@gmail.com'; // Thay bằng email của bạn
        $mail->Password = 'djre jwmk kaqr zdkh'; // Mật khẩu ứng dụng Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        // Gửi email cho khách hàng
        $mail->setFrom('vanan02102002@gmail.com', 'ROSA COMPUTER');
        $mail->addAddress($email, $name);
        $mail->addReplyTo('vanan02102002@gmail.com', 'ROSA COMPUTER');

        $mail->isHTML(true);
        $mail->Subject = '🛒 Xác nhận đơn hàng #'.$orderId.' tại ROSA COMPUTER';

        $mail->Body = "
        <h2>✅ Cảm ơn bạn đã đặt hàng tại ROSA COMPUTER</h2>
        <p><strong>🆔 Mã đơn hàng:</strong> $orderId</p>
        <p><strong>📅 Ngày đặt hàng:</strong> $order_date</p>
        <p><strong>👤 Họ tên:</strong> $name</p>
        <p><strong>📞 Số điện thoại:</strong> $phone</p>
        <p><strong>📍 Địa chỉ:</strong> $address</p>
        <p><strong>🚚 Phương thức nhận hàng:</strong> $shipping</p>
        <p><strong>📝 Ghi chú:</strong> $note</p>
        <hr>
        <h3>🛍 Chi tiết đơn hàng:</h3>
        <p>$order</p>
        <p><strong>💳 Thanh toán:</strong> Trả tiền khi nhận hàng (COD)</p>
        <p>📞 Nếu có bất kỳ thắc mắc nào, vui lòng liên hệ hotline: <strong>1900 1234</strong>.</p>
        <p>🎯 Cảm ơn bạn đã tin tưởng mua hàng tại ROSA COMPUTER!</p>
        ";

        $mail->send();

        // Gửi thông báo cho admin
        sendAdminNotification($orderId, $order, $order_date, $name, $phone, $shipping, $email, $address, $note);

    } catch (Exception $e) {
        error_log("Email xác nhận không gửi được. Lỗi: {$mail->ErrorInfo}");
    }
}

// Gửi email thông báo cho admin
function sendAdminNotification($orderId, $order, $order_date, $name, $phone, $shipping, $email, $address, $note) {
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

        // Gửi cho admin
        $mail->setFrom('vanan02102002@gmail.com', 'ROSA COMPUTER');
        $mail->addAddress('vanan02102002@gmail.com', 'Admin ROSA Computer'); // Thay email admin tại đây
        $mail->addReplyTo('vanan02102002@gmail.com', 'ROSA COMPUTER');

        $mail->isHTML(true);
        $mail->Subject = '🔔 Đơn hàng mới #'.$orderId.' tại ROSA COMPUTER';

        $mail->Body = "
        <h2>🔔 THÔNG BÁO ĐƠN HÀNG MỚI</h2>
        <p><strong>🆔 Mã đơn hàng:</strong> $orderId</p>
        <p><strong>📅 Ngày đặt hàng:</strong> $order_date</p>
        <p><strong>👤 Khách hàng:</strong> $name</p>
        <p><strong>📞 Số điện thoại:</strong> $phone</p>
        <p><strong>✉ Email:</strong> $email</p>
        <p><strong>📍 Địa chỉ:</strong> $address</p>
        <p><strong>🚚 Phương thức nhận hàng:</strong> $shipping</p>
        <p><strong>📝 Ghi chú:</strong> $note</p>
        <hr>
        <h3>🛍 Chi tiết đơn hàng:</h3>
        <p>$order</p>
        <p>📞 Admin cần kiểm tra đơn hàng ngay trên hệ thống!</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Email admin không gửi được. Lỗi: {$mail->ErrorInfo}");
    }
}

?>

<main class="order-container">
    <div class="order-info">
      <?php if ($found): ?>
            <h3 style="color: red; font-weight: bold;">ĐẶT HÀNG THÀNH CÔNG </h3>
            <p>Cảm ơn bạn đã đặt hàng từ ROSA. Vui lòng kiểm tra lại thông tin hoá đơn nhân viên sẽ liên hệ với quý khách trong thời gian sớm nhất.</p>
            <?php else: ?>
                <h3>KHÔNG TÌM THẤY ĐƠN HÀNG</h3>
            <?php endif; ?>
            
            <h4>Hóa Đơn ID: <?php echo $orderId; ?></h4>
            <h4>Ngày Tạo: <?php echo $order_date; ?></h4>
            <br>
            <h5 style="color: red; font-weight: bold;" >THÔNG TIN KHÁCH HÀNG</h3>
                <div style="width: 100%; height: 1px; background-color:#DDDDDD; margin-top: 5px;"></div><br>

            <p><strong>Tên Khách Hàng:</strong> <?php echo $name; ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo $phone; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            
            <h5 style="color: red; font-weight: bold;" >THÔNG TIN GIAO HÀNG</h3>
                <div style="width: 100%; height: 1px; background-color:#DDDDDD; margin-top: 5px;"></div><br>
             
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

            <div style="width: 100%; height: 1px; background-color:#DDDDDD; margin-top: 5px;"></div><p></p>
            
            <h5 style="color: red; font-weight: bold;">NỘI DUNG HOÁ ĐƠN:</h3>
            <div id="order-info"><?php echo $order ?></div>
       
            <div style="width: 100%; height: 1px; background-color:#DDDDDD; margin-top: 5px;"></div><p></p>

            <?php if ($shipping === 'home'): ?>
                <h3 style="color: red; font-weight: bold;">THÔNG TIN CHUYỂN KHOẢN :</h3><br>
             
                <p><strong>Tên tài khoản:</strong> <?php echo $accountName; ?></p>
                <p><strong>Số tài khoản:</strong> <?php echo $accountNumber; ?></p>
                <p><strong>Tên Ngân Hàng:</strong> <?php echo $bankName; ?></p>
                <div class="qr-code">
                    <img src=<?php echo $QRcode; ?> alt="QR Code" />
                </div>
            <?php endif; ?>
            
            <?php if ($shipping === 'store'): ?>
                <h3 style="color: red; font-weight: bold;">THÔNG TIN CHUYỂN KHOẢN:</h3><br>

                <p><strong>Tên tài khoản:</strong> <?php echo $accountName; ?></p>
                <p><strong>Số tài khoản:</strong> <?php echo $accountNumber; ?></p>
                <p><strong>Tên Ngân Hàng:</strong> <?php echo $bankName; ?></p>
                <div class="qr-code">
                    <img src=<?php echo $QRcode; ?> alt="QR Code" />
                </div>
            <?php endif; ?>

    </div>
    
        <div class ="support-news">
            <div class ="subport-section">
            <h3>Thông Tin Hỗ Trợ</h3>
            <p>Tim hiểu thêm thông tin hỗ trợ khác từ ROSA khi mua sản phẩm </p>
            <ul >
                <li><a href="../CSBH.php">Chính sách bảo hành</a></li>
                <li><a href="../DSDL.php">Danh sách đại lý</a></li>
                <li><a href="../baohanh.php">Bảo hành</a></li>
                <li><a href="../index.php#cauhoi">Câu hỏi thường gặp</a></li>
            </ul>
        </div>
       <div class="news-section">
            <h3>Tin Tức ROSA</h3>
            <p>Bạn có thể khám phá thêm nhiều thông tin thú vị về công nghệ và giải pháp từ tin tức ROSA</p>
            <?php
            $newsQuery = "SELECT article_title, article_link, article_image, article_date FROM article ORDER BY article_date DESC LIMIT 4";
            $newsResult = $conn->query($newsQuery);
            while ($news = $newsResult->fetch_assoc()): ?>
                <div class="news-card">
                    <a href="<?= htmlspecialchars($news['article_link']); ?>">
                        <img src="/tintuc_test/admin/modules/blog/uploads/<?= htmlspecialchars($news['article_image']); ?>" alt="News Image">
                    </a>
                    <div class="news-content">
                        <div class="news-title">
                            <a href="tintuc_test/tintuc/<?= htmlspecialchars($news['article_link']); ?>">
                                <?= htmlspecialchars($news['article_title']); ?>
                            </a>
                        </div>
                        <p class="news-date">Cập nhật ngày <?= htmlspecialchars(date("d/m/Y", strtotime($news['article_date']))); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <br>
</main>
<style>
/* Bố cục chính: Hai cột */
.order-container {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    max-width: 1200px;
    margin: 20px auto;
    gap: 20px;

}

/* Cột bên trái - Thông tin đơn hàng */
.order-info {
    flex: 2; /* Chiếm 2/3 không gian */
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Cột bên phải - Thông tin hỗ trợ & Tin tức */
.support-news {

    flex: 1; /* Chiếm 1/3 không gian */
    display: flex;
    flex-direction: column;
    gap: 20px;
}

/* Hộp hỗ trợ & tin tức */
.support-section, .news-section {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


/* Mã QR */
.qr-code {
    display: flex;
    justify-content: center;
    /*align-items: center;*/
    margin: 20px 0;
}

.qr-code img {
    max-width: 350px;
    height: auto;
    border: 2px solid #ddd;
    border-radius: 8px;
    padding: 5px;
    background: white;
}

/* Phần tiêu đề "Thông tin hỗ trợ" */
.subport-section h3 {
    color: red;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}
/* Phần tiêu đề "Tin tuc ROSA" */
.news-section h3 {
    color: red;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;

}

/* Văn bản mô tả */
.support-section p {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
    font-family: Arial, sans-serif;

}

/* Danh sách hỗ trợ */
.support-section ul {
    list-style: none;
    padding: 0;
   
}

.support-section ul li {
    display: flex;
    align-items: center;
    font-size: 16px;
    font-weight: 500;
    padding: 8px 0;
    transition: color 0.3s ease-in-out;
}


/* Hiệu ứng hover */
.support-section ul li:hover {
    color: red;
}

/* bỏ gạch chân dưới chữ */
a:hover, a:focus {
    text-decoration: none;
}
.news-card img {
    width: 165px;
    height: auto;
    /*display: block;*/
    margin: 0 auto 10px;
    border-radius: 5px;
}
/*vùng tin tuc*/
.news-section {
    font-family: Arial, sans-serif;
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
/*vùng hỗ trợ*/
.subport-section {
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}


.news-card {
    display: flex;
    align-items: center;
    gap: 15px; /* Khoảng cách giữa ảnh và nội dung */
    margin-bottom: 15px;
    padding: 10px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.news-card img {
    width: 100px;  /* Kích thước ảnh */
    height: 80px;
    border-radius: 5px;
    object-fit: cover;
}

.news-content {
    flex: 1; /* Để nội dung mở rộng theo chiều ngang */
}

.news-title a {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    text-decoration: none;
    display: block;
    margin-bottom: 5px;
}

.news-title a:hover {
    color: #007bff;
}

.news-date {
    font-size: 12px;
    color: #888;
}


/* Responsive cho mobile */
@media (max-width: 768px) {
    .order-container {
        flex-direction: column; /* Xếp chồng lên nhau khi màn hình nhỏ */
    }
    
    .order-info, .support-news {
        flex: 1;
    }

    .qr-code img {
        max-width: 120px; /* Thu nhỏ QR trên màn hình nhỏ */
    }
}

</style>
<?php require "../footer.php"; ?>

