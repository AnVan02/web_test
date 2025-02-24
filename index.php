<title>ROSA</title>

<?php if(isset($_SESSION["message"])):?>

	<script>

		function message() {
		window.alert("<?php echo $_SESSION["message"];?>");
		}
		
	</script>
<?php endif;?>
<?php require "data/common.php"; ?>
<?php require "header.php";?>
<head>
<!-- Banner bự-->
<div class="banner">
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <img src="assets/images/bannerrosa2.jpg" class="img-fluid" alt="Sale Banner">
                    </div>
                    
                    <div class="carousel-item">
                        <img src="assets/images/bannerrosa3.jpg" class="img-fluid" alt="New Year Banner">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>


<?php if(isset($_SESSION["message"])) {echo 'onload="message()"';unset($_SESSION["message"]);}?>

	 
	 <!-- Banner nhỏ -->
	<div class="main-banner1">
    <div class="banner-content">
        <H3><b style="color:#FFF">ROSA COMPUTER</b><p>
 
		<p style="color:#DCDCDC">Chuyên cung cấp máy tính đồng bộ mạnh mẽ, bảo hành 3 năm, đáp ứng mọi nhu cầu từ Văn Phòng, AI đến Gaming.</p>
        <a href="/aboutus.php" class="subscribe-btn">Xem thêm</a>
    </div>
    <div class="banner-image">
        <img src="/assets/images/nho1.jpg" alt="Gaming PC" />
    </div>
</div>
<div class="main-banner2">
    <div class="banner-content">
        <H3><b style="color:#FFF">ROSA VĂN PHÒNG</b><p>
     
		<p style="color:#DCDCDC">Cấu hình máy tính đồng bộ mạnh mẽ mang lại hiệu suất làm việc tối ưu. </p>
        <a href="/sanpham/ROSA-OFFICE.php" class="subscribe-btn">Xem thêm</a>
    </div>
    <div class="banner-image">
        <img src="/assets/images/RSVP.jpg" alt="Gaming PC" />
    </div>
</div>
<div class="main-banner2">
    <div class="banner-content">
        <H3><b style="color:#FFF">ROSA AI</b><p>
        
		<p style="color:#DCDCDC">
            Giải pháp tối ưu cho lập trình và phát triển AI với cấu hình mạnh mẽ, bảo hành 3 năm, sẵn sàng cùng bạn cho hành trình sáng tạo chinh phục mọi thử thách.		</p>
        <a href="/sanpham/ROSA-AI.php" class="subscribe-btn">Xem thêm</a>
    </div>
    <div class="banner-image">
        <img src="/assets/images/AI.jpg" alt="Gaming PC" />
    </div>
</div>


<style>
.main-banner1 {
    display: flex; /* Sử dụng Flexbox để căn chỉnh */
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: space-between; /* Căn giữa theo chiều ngang */
    background: linear-gradient(to right, #0b011c, #0b011c); /* Màu nền gradient */
    padding: 30px; /* Tăng padding để làm cho banner lớn hơn */
    border-radius: 10px;
    background-color: #112233; /* Màu nền phía sau */
    margin: 0 auto 15px; /* Căn giữa banner và khoảng cách dưới */
    max-width: 1073px; /* Tăng chiều rộng tối đa cho banner */
}
.main-banner2 {
    display: flex; /* Sử dụng Flexbox để căn chỉnh */
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: space-between; /* Căn giữa theo chiều ngang */
    background: linear-gradient(to right,#000000,#000000); /* Màu nền gradient */
    padding: 30px; /* Tăng padding để làm cho banner lớn hơn */
    border-radius: 10px;
    background-color: #112233; /* Màu nền phía sau */
    margin: 0 auto 15px; /* Căn giữa banner và khoảng cách dưới */
    max-width: 1073px; /* Tăng chiều rộng tối đa cho banner */
}



/* Khoảng cách giữa các banner */
.main-banner1 + .main-banner2 {
    margin-top: 10px; /* Khoảng cách giữa các banner */
}
.carousel-item img {
    width: 100%;
    height: auto;
    max-height: 700px;
    object-fit: cover;
}

.carousel-caption h5, 
.carousel-caption p {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 10px;
    border-radius: 5px;
}


.banner-content {
    flex: 1; /* Chiếm 50% chiều rộng */
    color: #000; /* Màu chữ */
}
.subscribe-btn {
    background-color: red; /* Màu nền đỏ */
    color: white; /* Màu chữ trắng */
    padding: 4px 12px; /* Khoảng cách bên trong */
    text-decoration: none; /* Bỏ gạch chân */
    border-radius: 5px; /* Bo góc */
    display: inline-block; /* Hiển thị như một khối nội tuyến */
    font-size: 20px;

}

.subscribe-btn:hover {
    background-color: darkred; /* Màu nền khi di chuột qua */
}

.banner-content h5 {
    font-size: 1.2rem; /* Tăng kích thước chữ tiêu đề */
    margin-bottom: 10px; /* Giảm khoảng cách dưới tiêu đề */
}

.banner-content p {
    font-size: 18px; /* Tăng kích thước chữ mô tả */
    margin-bottom: 20px; /* Giảm khoảng cách dưới mô tả */
    color: #FFFAF0;
}

.banner-image {
    flex: 1; /* Chiếm 50% chiều rộng */
    text-align: right; /* Căn phải cho hình ảnh */
}

.banner-image img {
    max-width: 80%; /* Tăng kích thước hình ảnh */
    height: auto; /* Giữ tỷ lệ hình ảnh */
}

/* Responsive Design */
@media (max-width: 768px) {
    .main-banner1, .main-banner2 {
        flex-direction: column; /* Đặt nội dung theo cột trên màn hình nhỏ */
        text-align: center; /* Căn giữa nội dung */
        max-width: 100%; /* Đảm bảo banner chiếm toàn bộ chiều rộng trên màn hình nhỏ */
        padding: 20px; /* Giảm padding cho thiết bị di động */
    }

    .banner-image {
        margin-top: 10px; /* Giảm khoảng cách giữa nội dung và hình ảnh */
    }

    .banner-content h5 {
        font-size: 1.5rem; /* Tăng kích thước chữ tiêu đề cho dễ đọc trên di động */
    }

    .banner-content p {
        font-size: 1.1rem; /* Tăng kích thước chữ mô tả cho dễ đọc trên di động */
    }

    .banner-image img {
        max-width: 100%; /* Đảm bảo hình ảnh không vượt quá chiều rộng của banner */
    }
}

</style>
	 
</head>
<body>
<header>



<style>
	/* Tổng container */
.ads-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin: 20px;
    background: #f9f9f9;
    padding: 10px;
}

/* Banner dọc */
.left-banner, .right-banner {
    width: 15%; /* Chiếm 15% mỗi bên */
    text-align: center;
}

.left-banner img, .right-banner img {
    width: 100%;
    border-radius: 10px;
}

/* Nội dung chính */
.main-content {
    width: 70%; /* Chiếm 70% cho nội dung */
    text-align: center;
}

.main-content h2 {
    font-size: 24px;
    margin-bottom: 15px;
    color: #ff5722;
}

.deals {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
}

.deal-item {
    width: calc(100% / 5 - 10px); /* Chia đều 5 phần tử */
    text-align: center;
}

.deal-item img {
    width: 100%;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.deal-item p {
    font-size: 14px;
    margin-top: 5px;
    color: #333;
    font-weight: bold;
}
</style>

    <div class="container">
        <div class="title">
            <br><br><!-- Tạo khoảng cách bằng thẻ br -->
            <h3><b style='color:red'>Cấu Hình Máy Bộ ROSA</b></h3>
            <p>Đáp ứng mọi nhu cầu với 3 dòng sản phẩm chính: Văn Phòng, AI và Gaming. Cấu hình máy tính đồng bộ mạnh mẽ, hoạt động ổn định bảo hành 3 năm.</p>
        </div>
    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <h3><b>VĂN PHÒNG</b></h3>
    <div style="width: 100%; height: 4px; background-color:red; margin-top: 5px;"></div>
    <p></p>
    <div class="product-group vanphong">
        
        <?php 
            $vp_list = [$rosa_office_n100, $rosa_office_1, $rosa_office_2 ];

            foreach ($vp_list as $product) {
                ?>
                <div class="card">
                    <div class="image-container">
                        <a href="<?= htmlspecialchars($product->page) ?>">
                            <img src="<?= htmlspecialchars($product->image) ?>" alt="vanphong">
                        </a>
                    </div>
                    <div class="details">
                        <h3 style="color: red; font-size: 21px; text-align: center;font-weight: bold;"><?= htmlspecialchars($product->title) ?></h3>
                        <p><?= htmlspecialchars($product->subtitle) ?></p>
                        <div class="key-specs">
                            <?= $product->content  ?>
                        </div>
                        <div class="price"><?= htmlspecialchars($product->price) ?></div>
                        <a href="<?= htmlspecialchars($product->page) ?>" class="shop-button">Mua ngay</a>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <h3><b>GAMER</b></h3>
    <div style="width: 100%; height: 4px; background-color:red; margin-top: 5px;"></div>
        <p></p>
        <div class="product-group vanphong">
            <?php 
                $gaming_list = [$rosa_gamer_x3d, $rosa_gamer_1, $rosa_gamer_2];

                foreach ($gaming_list as $product) {
                    ?>
                    <div class="card">
                        <div class="image-container">
                            <a href="<?= htmlspecialchars($product->page) ?>">
                                <img src="<?= htmlspecialchars($product->image) ?>" alt="gaming">
                            </a>
                        </div>
                        <div class="details">
                            <h3 style="color: red; font-size: 21px; text-align: center;font-weight: bold;"><?= htmlspecialchars($product->title) ?></h3>
                            <p><?= htmlspecialchars($product->subtitle) ?></p>
                            <div class="key-specs">
                                <?= $product->content ?>
                            </div>
                            <div class="price"><?= htmlspecialchars($product->price) ?></div>
                            <a href="<?= htmlspecialchars($product->page) ?>" class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
      <br><br><!-- Tạo khoảng cách bằng thẻ br -->
        <h3><b>MINI PC</b></h3>
        <div style="width: 100%; height: 4px; background-color:red; margin-top: 5px;"></div>
        <p></p>
            <div class="product-group vanphong">
                <?php 
                    $mini_list = [$rosa_mini_1 , $rosa_mini_2];
    
                    foreach ($mini_list as $product) {
                        ?>
                        <div class="card">
                            <div class="image-container">
                                <a href="<?= htmlspecialchars($product->page) ?>">
                                    <img src="<?= htmlspecialchars($product->image) ?>" alt="mini">
                                </a>
                            </div>
                            <div class="details">
                                <h3 style="color: red; font-size: 21px; text-align: center;font-weight: bold;"><?= htmlspecialchars($product->title) ?></h3>
                                <p><?= htmlspecialchars($product->subtitle) ?></p>
                                <div class="key-specs">
                                    <?= $product->content  ?>
                                </div>
                                <div class="price"><?= htmlspecialchars($product->price) ?></div>
                                <a href="<?= htmlspecialchars($product->page) ?>" class="shop-button">Mua ngay</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
        </div>
    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <h3><b>AI</b></h3>
    <div style="width: 100%; height: 4px; background-color:red; margin-top: 5px;"></div>
    <p></p>
        <div class="product-group ai">
            <?php 
                $ai_list = [$rosa_ai ];

                foreach ($ai_list as $product) {
                    ?>
                    <div class="card">
                        <div class="image-container">
                            <a href="<?= htmlspecialchars($product->page) ?>">
                                <img src="<?= htmlspecialchars($product->image) ?>" alt="ai">
                            </a>
                        </div>
                        <div class="details">
                            <h3 style="color: red; font-size: 21px; text-align: center;font-weight: bold;"><?= htmlspecialchars($product->title) ?></h3>
                            <p><?= htmlspecialchars($product->subtitle) ?></p>
                            <div class="key-specs">
                                <?= $product->content  ?>
                            </div>
                            <div class="price"><?= htmlspecialchars($product->price) ?></div>
                            <a href="<?= htmlspecialchars($product->page) ?>" class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    
    </div>
</header>

<style>

    .product-group {
        display: grid; 
        grid-template-columns: repeat(3, 1fr); /* 3 sản phẩm trên 1 hàng cho máy tính */
        gap: 20px; /* Khoảng cách giữa các sản phẩm */
    }
    
    .card {
        display: flex;
        flex-direction: column; /* Đặt các phần tử bên trong thẻ card theo chiều dọc */
        align-items: center; /* Căn giữa các phần tử bên trong */
        border: 1px solid #ddd;
        border-radius: 8px; 
        gap: 20px;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 20px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        width: 100%; /* Đảm bảo thẻ card chiếm toàn bộ chiều rộng */
    }
    
    .image-container {
        width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng */
        height: auto; /* Chiều cao tự động để giữ tỷ lệ hình ảnh */
        overflow: hidden; 
        display: flex;
        justify-content: center;
        align-items: center; 
    }
    h3 {
        font-size: 25px;
    }
    .image-container img {
        width: 100%; 
        height: auto; /* Đảm bảo hình ảnh không bị méo */
        object-fit: contain; /* Giữ tỷ lệ hình ảnh */
        object-position: center; 
    }

    .details {
        display: flex;
        flex-direction: column; /* Đảm bảo các chi tiết nằm theo chiều dọc */
        justify-content: flex-start; /* Căn chỉnh các phần tử ở đầu */
        margin-top: 10px; /* Khoảng cách giữa hình ảnh và chi tiết */
        width: 100%; /* Đảm bảo chi tiết chiếm toàn bộ chiều rộng */
        flex-grow: 1; /* Cho phép chi tiết mở rộng nếu cần */
    }

    .details h3 {
        margin: 0 0 8px;
        font-size: 18px;
        color: red; 
        font-family: 'Arial', sans-serif;
    }

    .key-specs {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    .price {
        font-size: 18px;
        font-weight: bold;
        color: red;
        margin-top: 10px;
    }
    
    .shop-button {
        display: inline-block;
        width: 100%; /* Đảm bảo nút mua chiếm toàn bộ chiều rộng */
        text-align: center;
        background-color: #ff0000;
        color: white;
        padding: 10px 0;
        text-decoration: none;
        border-radius: 5px;
        font-size: 15px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        margin-top: 10px; /* Khoảng cách giữa giá và nút mua */
    }

    .shop-button:hover {
        background-color: #FF0000; 
    }

    .main-banner {
        display: flex; 
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(to right, #336699, #000000);
        padding: 50px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .banner-image img {
        max-width: 100%; 
        height: 200px; 
    }

/* Media Queries */
@media (max-width: 768px) {
    .product-group {
        display: flex; /* Sử dụng flexbox cho điện thoại */
        flex-direction: column; /* Sắp xếp theo chiều dọc */
        gap: 20px; /* Khoảng cách giữa các sản phẩm */
    }

    .main-banner {
        flex-direction: column; 
        padding: 20px;
    }

    .title h3 {
        font-size: 22px;
    }

    .details h3 {
        font-size: 16px; 
    }

    .key-specs {
        font-size: 12px;
    }

    .price {
        font-size: 16px;
    }

    .shop-button {
        padding: 12px 0;
    }
}
        
    .a{
        max-width:10px;
        margin :20px auto;
        padding: 0 20px;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 0 20px;
    }

    .title {
        text-align: center;
        margin-bottom: 20px;
    }
    .title h1 {
        font-size: 28px;
        margin: 10px 0;
    }
    .title p {
        color: #666;
    }
    .card-content {
        min-height: 250px; /* Chiều cao tối thiểu cho phần nội dung */
        overflow: hidden; /* Ẩn nội dung thừa nếu vượt quá chiều cao */
    }

    /* Nút mua ngay */
    .card-footer {
        margin-top: 10px; /* Tạo khoảng cách giữa phần nội dung và nút */
        text-align: center;
    }

    .card {
        display: flex;
        flex-direction: column; /* Thay đổi từ row thành column để ảnh ở trên và chi tiết ở dưới */
        align-items: center; /* Căn giữa các phần tử */
        gap: 20px;
        justify-content: space-between; /* Căn đều nội dung bên trong */
        height: 100%; /* Đảm bảo chiều cao đồng nhất */
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .image-container {
        width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng của thẻ */
        height: 250px; /* Cố định chiều cao ảnh */
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .image-container img {
        width: 100%;
        height: 90%;
        object-fit: cover;
        object-position: center;
    }

    .details {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* text-align: center; */
    }

    .details h3 {
        font-size: 18px;
        color: red;
        margin: 10px 0;
        font-family:'Arial', sans-serif;
    }

    .details p {
        font-size: 16px;
        color: #000000;
        margin: 10px 0;
    }

    .key-specs {
        font-size: 14px;
        color: #333;
        line-height: 1.5;
    }

    .price {
        font-size: 18px;
        font-weight: bold;
        color: red;
        margin: 10px 0;
    }

    .shop-button {
        display: block;
        width: 100%;
        text-align: center;
        background-color: #ff0000;
        color: white;
        padding: 10px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .shop-button:hover {
        background-color: #cc0000;
    }


    /* Styling for product titles */
    .details h3 {
        margin: 0 0 8px;
        font-size: 18px;
        color: red; /* Màu đỏ nổi bật */
    }

    /* Key specifications styling */
    .key-specs {
        font-size: 15px;
        color: #00000;
        line-height: 1.6;
    }

    /* Price styling */
    .price {
        font-size: 18px;
        font-weight: bold;
        color: red;
        margin-top: 10px;
    }

    p {
        font-size: 16px;
        margin-bottom: 10px; /* Khoảng cách giữa đoạn văn và nút */
        color: #4F4F4F;
    }

    .shop-button {
        display: inline-block; /* Đảm bảo hiển thị như một khối */
        width: 300px; /* Đặt chiều rộng cố định */
        text-align: center; /* Canh giữa chữ trong nút */
        background-color: #ff0000;
        color: white;
        padding: 10px 0; /* Khoảng cách trên và dưới */
        text-decoration: none;
        border-radius: 5px; /* Bo góc nút */
        font-size: 15px; /* Kích thước chữ riêng cho nút */
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .shop-button:hover {
        background-color: #FF0000; /* Hiệu ứng hover */
    }
    
	@media (max-width: 768px) {
    .card {
        flex-direction: column; /* Vẫn giữ layout ngang trên điện thoại */
        gap: 10px; /* Giảm khoảng cách giữa ảnh và nội dung */
        padding: 10px; /* Giảm padding để tối ưu không gian */
    }

    .image-container img {
        width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng */
        height: auto; /* Giữ tỷ lệ ảnh */
    }

    .details h3 {
        font-size: 16px; /* Giảm kích thước font tiêu đề */
    }
    
    p {
        font-size: 14px; /* Giảm kích thước chữ */
    }

    .key-specs {
        font-size: 12px; /* Giảm kích thước font cho thông số */
    }

    .price {
        font-size: 16px; /* Giảm kích thước giá */
    }

    /* Điều chỉnh nút "Mua ngay" */
    .shop-button {
        width: 100%; /* Đặt nút shop chiếm toàn bộ chiều rộng */
        padding: 12px 0; /* Thêm padding cho nút */
    }
}

	</style>

<?php require "footer.php"; ?>

