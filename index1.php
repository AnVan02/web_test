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
<?php require "data/dealers.php";?>

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
	<!-- <div class="main-banner1">
        <div class="banner-content">
            <H3><b style="color:#FFF">ROSA COMPUTER</b><p>
    
            <p style="color:#DCDCDC">Chuyên cung cấp máy tính đồng bộ mạnh mẽ, bảo hành 3 năm, đáp ứng mọi nhu cầu từ Văn Phòng, AI đến Gaming.</p>
            <a href="/aboutus.php" class="subscribe-btn">Xem thêm</a>
        </div>
        <div class="banner-image">
            <img src="/assets/images/nho1.jpg" alt="Gaming PC" />
        </div>
    </div> -->


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
    .main-banner1 {
        flex-direction: column; /* Đặt nội dung theo cột trên màn hình nhỏ */
        text-align: center; /* Căn giữa nội dung */
        max-width: 100%; /* Đảm bảo banner chiếm toàn bộ chiều rộng trên màn hình nhỏ */
        /* padding: 20px; Giảm padding cho thiết bị di động */
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
        max-width: 50%; /* Đảm bảo hình ảnh không vượt quá chiều rộng của banner */
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

<?php
$servername = "localhost"; // Thay bằng server của bạn
$username = "root";        // Thay bằng username database
$password = "";            // Thay bằng password database
$dbname = "database"; // Thay bằng tên database

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách bài viết mới nhất
$sql = "SELECT article_title, article_date, article_image, article_link 
        FROM article 
        ORDER BY article_date DESC 
        LIMIT 3";


$result = $conn->query($sql);
?>

    <style>
        /* CSS cho giao diện giống hình */
        .blog-container {
            display: flex;
            gap: 115px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .blog-card {
            width: 350px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background: white;
            transition: 0.3s;
        }
        .blog-card:hover {
            transform: translateY(-5px);
        }
        .blog-image {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        .blog-content {
            padding: 15px;
        }
        .blog-category {
            font-size: 14px;
            color: #888;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .blog-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .blog-date {
            font-size: 14px;
            color: #777;
        }
    </style>

<div class="blog-container">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="blog-card">
            <img src="/tintuc_test/admin/modules/blog/uploads/<?= htmlspecialchars($row['article_image']); ?>" alt="Featured Image">
        <div class="blog-content">
            <div class="blog-title"><?php echo $row['article_title']; ?></div>
                <div class="blog-date"><?php echo date("d/m/Y", strtotime($row['article_date'])); ?></div>
            </div>
        </div>
    <?php } ?>
</div>

<?php
$conn->close();
?>


    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<!-- <div class="section_title new_arrivals_title">
						<h2>SẢN PHẨM</h2>
					</div> -->
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<!-- <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter=".vanphong">ROSA VĂN PHÒNG</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".ai">ROSA AI</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".gamer">ROSA GAMER</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".mini">ROSA MINI PC</li>
						</ul> -->
					</div>
				</div>
			</div>

  <!--Văn phòng-->
    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <!-- <h3><b>VĂN PHÒNG</b></h3>
    <p></p>
    <div class="main-banner" style="background: linear-gradient(to right,#000000,#000000);">
        <div class="banner-content">
            <H3><b style="color:#FFF">VĂN PHÒNG</b></H3>
            <h5 style="color:#DCDCDC">Mang đến hiệu suất ổn định và tính năng bảo mật cao, hoàn hảo cho công việc văn phòng hàng ngày</h5>
        </div>
        <div class="banner-image">
            <img src="assets/images/VP.jpg" alt="Gaming PC" />
        </div>
    </div>    
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
    </div> -->
    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <!-- <h3><b>AI</b></h3>
    <div style="width: 100%; height: 4px; background-color:red; margin-top: 5px;"></div>
    <p></p>
    <div class="main-banner" style="background: linear-gradient(to right,#000000,#000000);">
        <div class="banner-content">
            <H3><b style="color:#FFF">AI</b></H3>
            <h5 style="color:#DCDCDC">
                Tối ưu cho lập trình AI, với công cụ cài sẵn và cấu hình mạnh mẽ để phát triển ứng dụng trí tuệ nhân tạo
            </h5>
        </div>
        <div class="banner-image">
            <img src="assets/images/AI.jpg" alt="Gaming PC" />
        </div>
    </div>

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
        </div>  -->
    <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <!-- <h3><b>GAMER</b></h3>
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
        </div> -->


      <br><br><!-- Tạo khoảng cách bằng thẻ br -->
    <!-- <h3><b>MINI PC</b></h3>
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
        </div> -->
    </div>
  <!-- TỔNG QUAN VỀ SẢN PHÂM -->
<div class="container my-5">
    <h3><b style='color: red ;font-weight: bolder;'>DÒNG MÁY PHÙ HỢP CHO BẠN </b></h3>
        <p>KHÁM PHÁ CÁC DÒNG MÁY ROSA PHÙ HỢP VỚI NHU CẤU SỬ DỤNG CỦA BẠN</p>
    <div class="container">
        <div class="grid">
            <div class="card">
                <!-- <img src="Rosa_Office_I.png" alt="ROSA Office" class="large"> -->
                <h3>ROSA Office</h3>
                <p>Mang đến hiệu suất ổn định và tính năng bảo mật cao, hoàn hảo cho công việc văn phòng hàng ngày.</p>
                    <a href="product.php#vanphong" class="btn">KHÁM PHÁ</a>
             </div>
            <div class="card">
                <!-- <img src="Rosa_Office_I.png" alt="ROSA AI" class="large"> -->
                <h3>ROSA AI</h3>
                <p>Tối ưu cho lập trình AI, với công cụ cải tiến và cấu hình mạnh mẽ để phát triển ứng dụng trí tuệ nhân tạo.</p>
                <a href="product.php#ai" class="btn">KHÁM PHÁ</a>
            </div>
            <div class="card">
                <!-- <img src="Rosa_Office_I.png" alt="ROSA Gaming" class="large"> -->
                <h3>ROSA Gaming</h3>
                <p>Cấu hình cao và các card đồ họa mạnh mẽ, mang đến hiệu suất vượt trội cho các tựa game yêu thích.</p>
                <a href="product.php#gaming" class="btn">KHÁM PHÁ</a>
            </div>
            <div class="card">
                <!-- <img src="Rosa_Office_I.png" alt="ROSA Server" class="large"> -->
                <h3>ROSA MINI </h3>
                <p>Tối ưu cho lập trình AI, với công cụ cải tiến và cấu hình mạnh mẽ để phát triển ứng dụng trí tuệ nhân tạo.</p>
                <a href="product.php#mini" class="btn">KHÁM PHÁ</a>
            </div>

        </div>
    </div>

    <!--software-->
    <div class="container my-5">
    <h3><b style='color: red ;font-weight: bolder;'>GIẢI PHÁP DÀNH CHO BẠN </b></h3>
        <p>KHÁM PHÁ KHOÁ HỌC & PHẦN MỀM AI THÚ VỊ MÀ ROSA MANG ĐẾN CHO BẠN</p>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>    

            .container-box {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .content {
                flex: 1;
                padding-right: 20px;
            }
            .image-container {
                flex: 1;
                max-width: 50%;
            }
            .image-container img {
                width: 100%;
                height: auto;
                border-radius: 10px;
            }
        </style>
    <div class="container my-5">
        <div class="container-box">
            <div class="content">
                <div class="accordion" id="accordionExample">
                    <!-- Mục khoá hoc -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                PYTHON CƠ BẢN
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Khóa học Python cơ bản giúp bạn xây dựng nền tảng vững chắc trong lập trình Python.</p>
                                <ul>
                                    <li>Mục tiêu của khóa học Python cơ bản là giúp người học xây dựng nền tảng vững chắc trong lập trình Python</li>
                                    <li>Khóa học sẽ hướng dẫn học viên từ những kiến thức cơ bản như cú pháp, biến, vòng lặp và hàm, đến các khái niệm phức tạp hơn như xử lý dữ liệu, làm việc với tệp tin, và giới thiệu một số thư viện phổ biến như NumPy và Pandas</li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mục khoá học -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                THỊ GIÁC MÁY TÍNH
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Khám phá thuật toán tiên phong trong lĩnh vực Thị giác máy tính.</p>
                                <ul>
                                    <li> Học viên sẽ nắm vững lý thuyết cốt lõi về cách hoạt động của YOLO, từ việc xử lý ảnh đến các phương pháp tối ưu hóa mô hình.</li>
                                    <li>Khoá học giải quyết hiệu quả các bài toán thực tiễn, đồng thời mở rộng cơ hội phát triển trong lĩnh vực AI đang không ngừng phát triển.</li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mục phần mềm -->
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                PHẦN MỀM QUẢN TRỊ DOANH NGHIỆP
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Nextcloud là một phần mềm mã nguồn mở cung cấp các giải pháp cloud.</p>
                                <ul>
                                    <li>Nextcloud là một phần mềm có mã nguồn mở cung cấp các giải pháp cloud, tạo và sử dụng các dịch vụ lưu trữ tệp cho các cá nhân và doanh nghiệp.</li>
                                    <li>Nextcloud có rất nhiều tính năng, mỗi tính năng sẽ có mục riêng. Nguyên tắc hoạt động của Nextcloud tương tự như Google Drive hay Owncloud. Cụ thể Nextcloud có những tính năng nổi bật </li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordio-botton collapsed" databs-toggle="collapse" data-bs-target="collapseThree">

                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p></p>
                                <ul>
                                    <li>Nextcloud là một phần mềm có mã nguồn mở cung cấp các giải pháp cloud, tạo và sử dụng các dịch vụ lưu trữ tệp cho các cá nhân và doanh nghiệp.</li>
                                    <li>Nextcloud có rất nhiều tính năng, mỗi tính năng sẽ có mục riêng. Nguyên tắc hoạt động của Nextcloud tương tự như Google Drive hay Owncloud. Cụ thể Nextcloud có những tính năng nổi bật </li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Khu vực hiển thị hình ảnh -->
            <div class="image-container">
                <img id="accordionImage" src="" alt="Hình ảnh minh họa">
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.accordion-button').forEach((button, index) => {
            button.addEventListener('click', () => {
                const imagePaths = ['image5.jpg', 'image2.jpg', 'image3.jpg'];
                document.getElementById('accordionImage').src = imagePaths[index];
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>

<!-- dịch vụ  -->
<div class="container my-5">
<h3><b style='color: red ;font-weight: bolder;'>HỖ TRỢ DỊCH VỤ</b></h3>
    <p>KHÁM PHÁ DỊCH VỤ HỖ TRỢ ĐẾN TỪ ROSA</p>
    <style>
        .card-container {
            display: flex;
            gap: 20px;
        }
        .card {
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card img {
            width: 100%;
            border-radius: 10px;
        }
        .explore-button {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
    <div class="container my-5">
        <div class="card-container">
            <div class="card">
                <h3>Dịch vụ doanh nghiệp</h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image1.jpg" alt="Dịch vụ doanh nghiệp">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
            <div class="card">
                <h3>Dịch vụ cá nhân</h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image2.jpg" alt="Dịch vụ cá nhân">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
            <div class="card">
                <h3>Hỗ trợ khách hàng</h3>
                <p>Netus proin orci ligula sociosqu ut hac magnis.</p>
                <img src="image3.jpg" alt="Hỗ trợ khách hàng">
                <a href="#" class="explore-button">Khám phá</a>
            </div>
        </div>
    </div>
<!-- questsion  -->
<div class="container my-5">
<h3><b style='color: red ;font-weight: bolder;'>Câu hỏi bạn đặt cho tôi</b></h3>
    <p>KHÁM PHÁ CÂU HỎI PHỔ BIẾN MÀ BẠN CHƯA BIẾT DẾN ROSA</p>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .faq-container {
            display: flex;
            gap: 40px;
            max-width: 1100px;
            margin: auto;
            padding: 40px 0;
        }
        .faq-left {
            width: 35%;
        }
        .faq-right {
            width: 65%;
        }
        .faq-title {
            color: red;
            font-size: 24px;
            font-weight: bold;
        }
        .faq-subtitle {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .tab-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        .tab-buttons button {
            border: 1px solid #ddd;
            background: none;
            padding: 10px 15px;
            border-radius: 20px;
            cursor: pointer;
        }
        .tab-buttons .active {
            background-color: red;
            color: white;
        }
        .contact-box {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
        .contact-box button {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
        }
        .accordion-button {
            font-weight: bold;
        }
    </style>
    <div class="faq-container">
        <!-- Phần bên trái -->
        <div class="faq-left">
            <div class="tab-buttons">
                <button class="active" onclick="setActive(this)">Tư vấn</button>
                <button onclick="setActive(this)">Cấu hình</button>
                <button onclick="setActive(this)">Bảo hành</button>
                <button onclick="setActive(this)">Giao hàng</button>
                <button onclick="setActive(this)">Phương thức thanh toán</button>
                <button onclick="setActive(this)">Nguồn gốc linh kiện</button>

            </div>
        </div>
        <!-- Phần bên phải -->
        <div class="faq-right">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Aptent lorem blandit donec iaculis metus?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Lorem finibus eget phasellus euismod urna?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Diam metus leo hendrerit, congue sodales donec.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    const faqData = {
        "Tư vấn": [
            { question: "Làm thế nào để nhận tư vấn?", answer: "Bạn có thể gọi hotline hoặc nhắn tin qua Zalo." },
            { question: "Tư vấn có mất phí không?", answer: "Dịch vụ tư vấn hoàn toàn miễn phí." }
        ],
        "Cấu hình": [
            { question: "Tôi có thể tuỳ chỉnh cấu hình không?", answer: "Có, bạn có thể tuỳ chỉnh linh kiện theo nhu cầu." },
            { question: "Có hỗ trợ ép xung không?", answer: "Chúng tôi hỗ trợ ép xung nếu yêu cầu." }
        ],
        "Phương thức thanh toán": [
            { question: "Có mấy phương thức thanh toán ", answer: "Có 2 phương thức chuyển khoản và chuyển tiên mặt " }
        ],
        "Bảo hành": [
            { question: "Thời gian bảo hành là bao lâu?", answer: "Thời gian bảo hành từ 12 đến 36 tháng tùy sản phẩm." },
            { question: "Bảo hành có điều kiện gì không?", answer: "Sản phẩm không bị rơi vỡ, vô nước, tự ý tháo rời." }
        ],
        "Giao hàng": [
            { question: "Thời gian giao hàng là bao lâu?", answer: "Thời gian giao hàng tuỳ thơi gian tỉnh thành đó " }
        ],
        "Nguồn gốc linh kiện": [
            { question: "Nguồn gốc linh kiên?", answer: "Thời gian bảo hành từ 12 đến 36 tháng tùy sản phẩm." },
            { question: "Bảo hành có điều kiện gì không?", answer: "Sản phẩm không bị rơi vỡ, vô nước, tự ý tháo rời." }
        ]
    };

    // Hàm cập nhật nội dung bên phải khi bấm vào tab
    function setActive(button) {
        // Loại bỏ class 'active' khỏi tất cả nút
        document.querySelectorAll(".tab-buttons button").forEach(btn => btn.classList.remove("active"));
        // Thêm class 'active' vào nút được bấm
        button.classList.add("active");

        // Lấy nội dung cần hiển thị
        const category = button.innerText;
        const faqList = faqData[category] || [];

        // Cập nhật nội dung phần FAQ bên phải
        const faqContainer = document.getElementById("faqAccordion");
        faqContainer.innerHTML = faqList.map((item, index) => `
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button ${index === 0 ? '' : 'collapsed'}" type="button" data-bs-toggle="collapse" data-bs-target="#faq${index}">
                        ${item.question}
                    </button>
                </h2>
                <div id="faq${index}" class="accordion-collapse collapse ${index === 0 ? 'show' : ''}" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">${item.answer}</div>
                </div>
            </div>
        `).join('');
    }
    // Khởi động: Đặt tab đầu tiên là "Tư vấn"
    document.addEventListener("DOMContentLoaded", () => {
        setActive(document.querySelector(".tab-buttons button"));
    });
    </script>


<!-- lấy tab từ sql  -->
<div class="container my-5">
    <h3><b style='color: red; font-weight: bolder;'>TIN TỨC VỀ ROSA</b></h3>
    <p>Nhiều nội dung thú vị xung quanh lĩnh vực công nghệ rosa</p>



    <?php
function dbconnect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    // Kết nối đến database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
}
// Lấy danh sách tab từ CSDL
$sql = "SELECT * FROM article";

// $result = $conn->query($sql);

?>
<div class ="article__tag">
    <strong>Thẻ: </strong>
        <?php
            $tabs= explode(',', $article['article']);
            foreach ($tabs as $tab ) {
                $tab = trim($tab);
                if(!empty($tab)) {
                    echo '<a href="/admin_post/tintuc/tag/' . urlencode($tab) . '" class="article_link">' . htmlspecialchars($tab) . '</a>';
                }
            
            }
        ?>
    </div>
</div>


</div>
    
    <!-- đại lý  -->
    <?php
    require "data/dealers.php"; // Giả sử bạn đã có dữ liệu đại lý trong file dealers.php

    // Khởi tạo biến
    $selectedProvince = $_POST['province'] ?? '';  // Đảm bảo giá trị province được giữ lại
    $selectedDistrict = $_POST['district'] ?? '';  // Đảm bảo giá trị district được giữ lại nếu có
    $agencies = [];
    $agencyDetail = null;
    $agencyIndex = $_POST['agencyIndex'] ?? null; // Lấy agencyIndex từ form POST

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy tỉnh và quận từ form
        $selectedProvince = $_POST['province'] ?? '';
        $selectedDistrict = $_POST['district'] ?? ''; // Lấy quận/huyện từ form
    
        // Nếu tỉnh được chọn, xử lý danh sách quận
        if ($selectedProvince && isset($agencyList[$selectedProvince])) {
            // Nếu quận được chọn, hiển thị đại lý của quận đó
            if ($selectedDistrict && isset($agencyList[$selectedProvince][$selectedDistrict])) {
                $agencies = $agencyList[$selectedProvince][$selectedDistrict];
            } else {
                // Nếu không chọn quận, hiển thị tất cả đại lý của tỉnh
                $agencies = [];
                foreach ($agencyList[$selectedProvince] as $districtAgencies) {
                    $agencies = array_merge($agencies, $districtAgencies);
                }
            }
    
            // Xử lý hiển thị chi tiết đại lý nếu có
            if ($agencyIndex === null && count($agencies) > 0) {
                $agencyIndex = 0; // Chọn đại lý đầu tiên mặc định
            }

            if ($agencyIndex !== null && isset($agencies[$agencyIndex])) {
                $agencyDetail = $agencies[$agencyIndex]; // Lấy thông tin chi tiết của đại lý
            }
            
            
        }
    }
?>

    <div class="container my-4">
        <h2 class="text-danger">Hệ thống đại lý ROSA</h2>

        <p>Tìm kiếm các đại lý của ROSA trên toàn quốc</p>

        <form method="POST" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Chọn tỉnh/thành phố:</label>
                    <select name="province" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Chọn Tỉnh/Thành phố --</option>
                        <?php foreach ($agencyList as $city => $districts): ?>
                            <option value="<?= $city ?>" <?= $selectedProvince == $city ? 'selected' : '' ?>><?= $city ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Chọn Quận/Huyện:</label>
                    <select name="district" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Chọn Quận/Huyện --</option>
                        <?php 
                        if ($selectedProvince) {
                            foreach (array_keys($agencyList[$selectedProvince]) as $district): ?>
                                <option value="<?= $district ?>" <?= $selectedDistrict == $district ? 'selected' : '' ?>><?= $district ?></option>
                            <?php endforeach; 
                        }
                        ?>
                    </select>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-md-6">
                <h4>Danh sách đại lý</h4>
                <?php if ($agencyDetail): ?>
                    <div class="right-panel agency-detail">
                        <h3 style="color: #FF0000;"><?= $agencyDetail[0] ?></h3>
                        <p><strong>Địa chỉ:</strong> <?= $agencyDetail[1] ?></p>
                        <p><strong>Số điện thoại:</strong> <?= $agencyDetail[2] ?></p>
                        <p><strong>Website:</strong> <a href="<?= $agencyDetail[3] ?>" target="_blank"><?= $agencyDetail[3] ?></a></p>
                        <?php if ($agencyDetail[4]): ?>
                            <!-- <div class="map">
                                <iframe src="<?= $agencyDetail[4] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div> -->
                        <?php else: ?>
                            <p>Chưa có địa chỉ Google Maps</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <h4>Bản đồ</h4>
                    <div class="map">
                        <iframe src="<?= $agencyDetail[4] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            </div>
        </div>
    </div>

    <script>
         // JavaScript xử lý việc chọn đại lý
    function selectAgency(index) {
        // Tạo form để gửi thông tin đến server
        const form = document.createElement('form');
        form.method = 'POST'; // Gửi dữ liệu dưới dạng POST
        form.action = ''; // Gửi đến chính trang này

        // Thêm dữ liệu cần thiết vào form
        form.innerHTML = `
            <input type="hidden" name="province" value="<?= $selectedProvince ?>" /> 
            <input type="hidden" name="district" value="<?= $selectedDistrict ?>" /> 
            <input type="hidden" name="agencyIndex" value="${index}" />
        `;

        // Gửi form khi người dùng chọn đại lý
        document.body.appendChild(form);
        form.submit(); // Gửi yêu cầu

        // Thay đổi màu sắc các đại lý (nút)
        const agencies = document.querySelectorAll('.agency-list li');
        agencies.forEach((agency, idx) => {
            agency.classList.remove('selected-agency'); // Xóa màu của các đại lý khác
            if (idx === index) {
                agency.classList.add('selected-agency'); // Thêm màu cho đại lý được chọn
            }
        });
    }

    // Nếu có đại lý được chọn mặc định, thêm lớp selected
    document.addEventListener('DOMContentLoaded', function() {
        const selectedAgencyIndex = <?= $agencyIndex ?? -1 ?>;
        if (selectedAgencyIndex >= 0) {
            const agencyItem = document.getElementById('agency-' + selectedAgencyIndex);
            if (agencyItem) {
                agencyItem.classList.add('selected-agency');
            }
        }
    });
        function initMap() {
            let map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: { lat: 10.7769, lng: 106.7009 } 
            });
            window.map = map;
        }

        function showOnMap(lat, lng) {
            let marker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: window.map
            });
            window.map.setCenter({ lat: lat, lng: lng });
            window.map.setZoom(15);
        }

        window.onload = initMap;
    </script>
<style>

.list-group-item {
    border-left: red;
    margin-bottom: 10px;
}


</style>

</div>
</div>

   
</header>

<style>
    body {
        background-color: #f8f9fa;
    }
    .banner {
    background-color: #f0f0f0;
    padding: 20px 0;
    }

    .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .row {
        display: flex;
        justify-content: space-between;
    }

    .col-md-4 {
        flex: 0 0 32%;
        max-width: 32%;
        box-sizing: border-box;
    }

    .banner_category {
        background-color: #ffffff;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .banner_category a {
        text-decoration: none;
        color: #333333;
        font-size: 18px;
        font-weight: bold;
    }

    .banner_category img {
        width: 100%;
        height: auto;
        margin-top: 10px;
        border-radius: 5px;
    }
    /*  */
        .title {
            color: red;
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
        .subtitle {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }
        .card {
            position: relative;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card img.large {
            width: 100%;
            border-radius: 10px;
        }
        .card img.small {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            background: white;
            padding: 10px;
        }
        .card h3 {
            margin: 60px 0 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

       
    /*  */
   
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }
    .grid {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(2, 2fr); /* Adjusted to fit all cards in one row */
    }
    .card {
        background: #f9f9f9;
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
    }
    .card img.small {
        width: 100px; /* Adjust this value to your desired image size */
        height: auto;
    }
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    
    /*banner nhỏ  */

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



<?php require "footer.php" ; ?>