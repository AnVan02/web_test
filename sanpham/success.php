<title>Thông Tin Đặt Hàng</title>

<?php
require "../data/bank_info.php";
require "../header.php";

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Get orderID
$orderId_decoded = isset($_GET['orderId']) ? $_GET['orderId'] : '';
$orderId = base64_decode($orderId_decoded);

// Fetch order information from database
$query = "SELECT * FROM `order` WHERE `order_id` = ?";
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

if ($result ->num_rows >0) {
    $found = true ;
    $row = $result -> fetch_assoc();
    $order = $row ['order'];
    $order_date = $row ['order_date'];
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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/./">TRANG CHỦ</a></li>
            <li class="breadcrumb-item"><a href="../succuss.php">THÔNG TIN ĐƠN HÀNG</a></li>
        </ol>
    </nav>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('order-info').innerHTML = <?php echo json_encode($order);?>;
        });
    </script>

    <main>
    
        
    <!-- <div class="letter-content"> -->
        <?php if ($found): ?>
            <h3 ><b style='color: red ;font-weight: bolder;'>Đặt Hàng Thành Công<br>
            <small>Cảm ơn bạn đã đặt hàng ROSA .Vui lòng xem lại thông tin hoá đơn hàng & nhân viên sẽ liên hệ với quý khách trong thời gian sớm nhất</small></h3>
        <?php else: ?>
            <h3>Không Tìm Thấy Đơn Hàng</h3>
        <?php endif; ?>
        
        
        
        <h3 style="font-size:22px" >THÔNG TIN KHÁCH HÀNG </h3>
        <p><strong>Tên Khách Hàng:</strong> <?php echo $name; ?></p>
        <p><strong>Số điện thoại:</strong> <?php echo $phone; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
            
        <?php if ($shipping === 'home'): ?>
            <p><strong>Hình thức nhận hàng:</strong> Giao hàng tại nhà</p>
            <p><strong>Địa chỉ giao hàng:</strong> <?php echo $address; ?></p>
            <p><strong>Ghi chú khách hàng:</strong> <?php echo $note; ?></p>
        <br>
        <?php elseif ($shipping === 'store'): ?>
            <p><strong>Hình thức nhận hàng:</strong> Nhận hàng tại đại lý uỷ quyền ROSA</p>
            <p><strong>Địa chỉ đại lý:</strong> <?php echo $address; ?></p>
            <p><strong>Ghi chú khách hàng:</strong> <?php echo $note; ?></p>
        <br>
        <?php else: ?>
            <p><strong>Hình thức nhận hàng:</strong></p>
        <?php endif; ?>
        
        <h3 style="font-size:22px" >THÔNG TIN HOÁ ĐƠN</h3>
        <h4>Hoá Đơn Id : <?php echo $orderId ;?></h4>
        <h4>Ngày Tạo : <?php echo $order_date ;?></h4>
        <br>

        <p><strong>Chi tiết Hoá Đơn</strong></p>
          

        <p><strong>Tổng cộng : </strong></p>

  

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
        
 
<!-- </div> -->

    <!--<script src="../javascript/A3000A52-8-128.js"></script>-->

    <br>
<div class ="container my-5">
    <h3><b style="color:red , font-weight: boder">Thông tin hỗ trợ</b></h3>
    <p>Tim hiểu thêm thông tin hỗ trợ khác từ ROSA sau khi bạn đã mua sản phẩm chúng tôi </p>
    
        <ul>
            <li><a href="../DSDL.php" >Danh sách đại lý</a></li>
            <li><a href="../baohanh.php" > Bảo hành </a></li>
            <li><a href="../CSBH.php" > Chính sách bảo hành </a></li>
            <li><a href="../index.php#cauhoi" > Câu hỏi thường gặp </a></li>
        </ul>

<div class="container my-5">
    <h3><b style ="color:red ; font-weight:boder">Tin tức ROSA </b></h3>
    <p>Bạn có thể khám phá them nhiều thông tin thú vị về công nghệ & giải pháp từ tin tức ROSA</p>

<?php 
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname="database";

    $conn = new mysqli ($servername , $username , $password , $dbname);
    $conn->set_charset ("utf8");


    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    // lấy 3 bài tin tức mới nhất 
    $sql = "SELECT article_tag, article_title, article_date, article_image, article_link 
        FROM article 
        ORDER BY article_date DESC 
        LIMIT 1";

    $result = $conn->query($sql);
    ?>

    </div>

    <div class="news-container">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="news-card">
            <a href="<?= htmlspecialchars($row['article_link']); ?>">
                <img src="/tintuc_test/admin/modules/blog/uploads/<?= htmlspecialchars($row['article_image']); ?>" alt="News Image">
            </a>
            <div class="news-content">
                <p>Tin tức<p>
                <div class="news-title">
                    <a href="<?= htmlspecialchars($row['article_link']); ?>">
                        <?= htmlspecialchars($row['article_title']); ?>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="new-card">
        <a href="product.php#vanphong"></a>
        <div class ="new-container">
            <p></p>
            <div class="new-title">
                <a href="product.php#vanphong">Văn Phòng</a>
            </div>
        </div>
    </div>
</main>
        
<?php require "../footer.php";?>
 
<style>
     
          /* Cơ bản thiết lập cho body và header */
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color:rgb(255, 251, 251);
        color: #333;
    }
    .continer {
        max-width: 1350px;
        margin: 0 auto ;
        padding : 0, 20px;

    }
    .letter-content {
        /* background-color:#F8F8FF; */
        padding: 30px;
        border-radius: 8px;
        max-width: 70%;
        margin: 20px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    
    /* Nội dung chính */
    main {
        padding: 0px 117px; /*Thêm khoảng cách trên cùng để tránh header*/
    }
    
    /* Các tiêu đề và đoạn văn bản */
    h3 {
        color: #FF3300;
        border-bottom: 2px rgb(247, 7, 7);
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
    .container my-5 {
        max-width: 1350px;
        margin:0 auto;
        display : flex;
        flex-wrap: wrap;
        justify-content: flex-end;
    }
    
    /* css bai viết tin tức */
    .new-container{
        display : flex;
        gap :20px;
        justify-content:center;
        max-width:1356px;
        margin: 0 auto; 
        padding : 0 20px;
    }


    .container {
        max-width: 1350px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap; /* Ensures responsiveness */
        justify-content: flex-end; /* Pushes content to the right */
    }

    .container .support-section,
    .container .news-section {
        width: 100%; /* Full width on smaller screens */
        max-width: 350px; /* Limit width for alignment */
        margin-left: 20px; /* Space between sections */
    }

    /* Bố cục chính */
    .order-container {
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

    /* Responsive Design */
    @media (max-width: 768px) {
        main {
            padding: 123px 20px; /* Giảm khoảng cách trên cùng cho điện thoại */
        }
        .container {
        flex-direction: column; /* Stacks content vertically on smaller */
        }

    }
    </style>
