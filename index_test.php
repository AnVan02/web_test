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
                    <img src="/assets/images/Banner Intel.png" class="img-fluid" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="/assets/images/banner3.jpg" class="img-fluid" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="/assets/images/banner4.jpg" class="img-fluid" alt="...">
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
        <p>ROSA COMPUTER</p>
		<p style="color:#DCDCDC">Chuyên cung cấp máy tính đồng bộ mạnh mẽ, bảo hành 3 năm, đáp ứng mọi nhu cầu từ Văn Phòng, AI đến Gaming.</p>
        <a href="/aboutus.php" class="subscribe-btn">Xem thêm</a>
    </div>
    <div class="banner-image">
    <img src="VP.jpg" alt="Gaming PC">
    </div>
</div>
<div class="main-banner2">
    <div class="banner-content">
        <p>ROSA VĂN PHÒNG</p>
		<p style="color:#DCDCDC">Cấu hình máy tính đồng bộ mạnh mẽ mang lại hiệu suất làm việc tối ưu. </p>
        <a href="/sanpham/ROSA-OFFICE.php" class="subscribe-btn">Xem thêm</a>
    </div>
    <div class="banner-image">
    <img src="VP.jpg" alt="Gaming PC">
    </div>
</div>
<div class="main-banner3">
    <div class="banner-content">
        <p>ROSA AI</p>
		<p style="color:#DCDCDC">
            Giải pháp tối ưu cho lập trình và phát triển AI với cấu hình mạnh mẽ, bảo hành 3 năm, sẵn sàng cùng bạn cho hành trình sáng tạo chinh phục mọi thử thách.		</p>
        <a href="/sanpham/ROSA-AI.php" class="subscribe-btn">Xem thêm</a>
    </div>
    <div class="banner-image">
        <img src="/assets/images/nho3.jpg" alt="Gaming PC" />
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
.main-banner3 {
    display: flex; /* Sử dụng Flexbox để căn chỉnh */
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: space-between; /* Căn giữa theo chiều ngang */
    background: linear-gradient(to right, #000000,#000000); /* Màu nền gradient */
    padding: 30px; /* Tăng padding để làm cho banner lớn hơn */
    border-radius: 10px;
    background-color: #112233; /* Màu nền phía sau */
    margin: 0 auto 15px; /* Căn giữa banner và khoảng cách dưới */
    max-width: 1073px; /* Tăng chiều rộng tối đa cho banner */
}


/* Khoảng cách giữa các banner */
.main-banner1 + .main-banner2,
.main-banner2 + .main-banner3 {
    margin-top: 10px; /* Khoảng cách giữa các banner */
}

.banner-content {
    flex: 1; /* Chiếm 50% chiều rộng */
    color: #000; /* Màu chữ */
}
.subscribe-btn {
    background-color: red; /* Màu nền đỏ */
    color: white; /* Màu chữ trắng */
    padding: 10px 20px; /* Khoảng cách bên trong */
    text-decoration: none; /* Bỏ gạch chân */
    border-radius: 5px; /* Bo góc */
    display: inline-block; /* Hiển thị như một khối nội tuyến */
}

.subscribe-btn:hover {
    background-color: darkred; /* Màu nền khi di chuột qua */
}

.banner-content h5 {
    font-size: 1.2rem; /* Tăng kích thước chữ tiêu đề */
    margin-bottom: 10px; /* Giảm khoảng cách dưới tiêu đề */
}

.banner-content p {
    font-size: 1rem; /* Tăng kích thước chữ mô tả */
    margin-bottom: 15px; /* Giảm khoảng cách dưới mô tả */
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
    .main-banner1, .main-banner2, .main-banner3 {
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
            <h3>Cấu Hình Máy Bộ ROSA</h3>
            <p>Đáp ứng mọi nhu cầu với 3 dòng sản phẩm chính: Văn Phòng, AI và Gaming. Cấu hình máy tính đồng bộ mạnh mẽ, hoạt động ổn định bảo hành 3 năm.</p>
        </div>
        <h3>Văn Phòng</h3>
        <div class="product-group vanphong">
            <div class="card">
			<div class="image-container">
				<a href=<?= $rosa_office_n100->page ?>>
					<img src=<?= $rosa_office_n100->image ?> alt="vanphong">
				</a>
			</div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_office_n100->title ?></h3>
                    	<p><?= $rosa_office_n100->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_office_n100->content ?>
                    </div>
                    <div class="price"><?= $rosa_office_n100->price ?></div>
                    <a href=<?= $rosa_office_n100->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
            
            <div class="card">
			<div class="image-container">
				<a href=<?= $rosa_office_1->page ?>>
					<img src=<?= $rosa_office_1->image ?> alt="vanphong">
				</a>
			</div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_office_1->title ?></h3>
                    	<p><?= $rosa_office_1->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_office_1->content ?>
                    </div>
                    <div class="price"><?= $rosa_office_1->price ?></div>
                    <a href=<?= $rosa_office_1->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
            
            <div class="card">
			<div class="image-container">
				<a href=<?= $rosa_office_2->page ?>>
					<img src=<?= $rosa_office_2->image ?> alt="vanphong">
				</a>
			</div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_office_2->title ?></h3>
					<p><?= $rosa_office_2->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_office_2->content ?>
                    </div>
                    <div class="price"><?= $rosa_office_2->price ?></div>
                    <a href=<?= $rosa_office_2->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
        </div>
		
        <h3>AI</h3>
        <div class="product-group ai">
            <div class="card">
                <div class="image-container">
				<a href=<?= $rosa_ai->page ?>>
                    <img src=<?= $rosa_ai->image ?> alt="ai">
				</a>
                </div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_ai->title ?></h3>
					<p><?= $rosa_ai->subtitle ?>.</p>
                    <div class="key-specs">
                        <?= $rosa_ai->content ?>
                    </div>
                    <div class="price"><?= $rosa_ai->price ?></div>
                    <a href=<?= $rosa_ai->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
        </div>
		<!--<div class="">-->
		<!--	<div class="image-co">-->
		
		<h3>Mini PC</h3>
        <div class="product-group vanphong">
            <div class="card">
			<div class="image-container">
				<a href=<?= $rosa_mini_1->page ?>>
					<img src=<?= $rosa_mini_1->image ?> alt="vanphong">
				</a>
			</div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_mini_1->title ?></h3>
                    	<p><?= $rosa_mini_1->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_mini_1->content ?>
                    </div>
                    <div class="price"><?= $rosa_mini_1->price ?></div>
                    <a href=<?= $rosa_mini_1->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
            <div class="card">
			<div class="image-container">
				<a href=<?= $rosa_mini_2->page ?>>
					<img src=<?= $rosa_mini_2->image ?> alt="vanphong">
				</a>
			</div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_mini_2->title ?></h3>
					<p><?= $rosa_mini_2->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_mini_2->content ?>
                    </div>
                    <div class="price"><?= $rosa_mini_2->price ?></div>
                    <a href=<?= $rosa_mini_2->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
        </div>
        
        <h3>GAMER</h3>
        <div class="product-group gaming">
            <div class="card">
                <div class="image-container">
				<a href=<?= $rosa_gamer_x3d->page ?>>
                    <img src=<?= $rosa_gamer_x3d->image ?> alt="gaming">
				</a>
                </div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_gamer_x3d->title ?></h3>
                    <p><?= $rosa_gamer_x3d->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_gamer_x3d->content ?>
                    </div>
                    <div class="price"><?= $rosa_gamer_x3d->price ?></div>
                    <a href=<?= $rosa_gamer_x3d->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
            
            <div class="card">
                <div class="image-container">
				<a href=<?= $rosa_gamer_1->page ?>>
                    <img src=<?= $rosa_gamer_1->image ?> alt="gaming">
				</a>
                </div>
                <div class="details">
                    <h3 style="color: red;"><?= $rosa_gamer_1->title ?></h3>
                    <p><?= $rosa_gamer_1->subtitle ?></p>
                    <div class="key-specs">
                        <?= $rosa_gamer_1->content ?>
                    </div>
                    <div class="price"><?= $rosa_gamer_1->price ?></div>
                    <a href=<?= $rosa_gamer_1->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
            
            <div class="card">
                <div class="image-container">
				<a href=<?= $rosa_gamer_2->page ?>>
                    <img src=<?= $rosa_gamer_2->image ?> alt="gaming">
				</a>
                </div>
                <div class="details">
				<h3 style="color: red;"><?= $rosa_gamer_2->title ?></h3>
				<p><?= $rosa_gamer_2->subtitle ?> </p>
                    <div class="key-specs">
                        <?= $rosa_gamer_2->content ?>
                    </div>
                    <div class="price"><?= $rosa_gamer_2->price ?></div>
                    <a href=<?= $rosa_gamer_2->page ?> class="shop-button">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</header>
	<style>
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
		

		/* Container for the product card */
		.card {
			display: flex; /* Sử dụng Flexbox */
			flex-direction: row; /* Căn theo hàng ngang */
			align-items: center; /* Căn nội dung theo chiều dọc */
			gap: 100px; /* Khoảng cách giữa ảnh và nội dung */
			border: 1px solid #ddd; /* Viền của khung */
			border-radius: 8px; /* Bo góc */
			padding: 16px;
			margin-bottom: 20px; /* Khoảng cách giữa các sản phẩm */
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng */
		}

		/* Image container */
		.image-container {
			flex-shrink: 0; /* Không cho phép phần tử co lại */
			width: 300px; /* Thiết lập chiều rộng cố định cho container */
			height: 300px; /* Thiết lập chiều cao cố định nếu cần */
			overflow: hidden; /* Ẩn phần ảnh vượt ra ngoài */
			display: flex; /* Đảm bảo container sử dụng flexbox */
			justify-content: center; /* Canh giữa ảnh trong container */
			align-items: center; /* Căn giữa theo chiều dọc */
		}


		.image-container img {
			width: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều rộng */
			height: 100%; /* Đảm bảo ảnh chiếm toàn bộ chiều cao */
			object-fit: contain; /* Đảm bảo ảnh không bị cắt xén và giữ tỷ lệ */
			object-position: center; /* Căn giữa ảnh trong container */
		}




		/* Details container */
		.details {
			/* flex: 1; Nội dung chiếm không gian còn lại */
			display: flex;
			flex-direction: column; /* Nội dung bên trong xếp dọc */
			justify-content: space-between;
		}

		/* Styling for product titles */
		.details h3 {
			margin: 0 0 8px;
			font-size: 18px;
			color: red; /* Màu đỏ nổi bật */
		}

		/* Key specifications styling */
		.key-specs {
			font-size: 14px;
			color: #666;
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

