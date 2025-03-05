<title>Về Chúng Tôi</title>

<?php
    require "header.php" ;
?>

<?php if(isset($_SESSION["message"])):?>
	<script>
		function message() {
		window.alert("<?php echo $_SESSION["message"];?>");
		}
	</script>
<?php endif;?>
<head>
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/./">TRANG CHỦ</a></li>
        <li class="breadcrumb-item"><a href="aboutus.php">GIỚI THIỆU VỀ ROSA</a></li>
    </ol>
</nav>
<!-- Banner -->
<div class="banner">
	<div class="row">
	<div class="col-lg-12 mb-3">
		<body class="h-100" style="background-image: ">
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<!--<div class="carousel-item active">-->
			<!--	<img src="assets/images/blog1.jpg" class="d-block w-100" alt="...">-->
			<!--</div>-->
		
		</div>
	</div> 
    

<?php if(isset($_SESSION["message"])) {echo 'onload="message()"';unset($_SESSION["message"]);}?>

    
	<!-- Main content -->
     	 <!-- Banner nhỏ -->
	<div class="main-banner1">
    <div class="banner-content">
        <b style="color:#DCDCDC">SỨ MỆNH </b>
        <p></p>
		<h5 style="color:#DCDCDC">
        Thương hiệu ROSA, thuộc CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT, mang đến máy tính bộ chất lượng cao, mạnh mẽ và bền bỉ, đáp ứng nhu cầu học tập, công việc và giải trí của người Việt. ROSA cam kết nâng cao hiệu quả làm việc và trải nghiệm người dùng với các sản phẩm công nghệ đáng tin cậy.
        </h5>
        
    </div>
    <div class="banner-image">
        <img src="assets/images/blog3.png" alt="Gaming PC" />
    </div>
</div>
<div class="main-banner2">
    <div class="banner-content">
        <b style="color:#DCDCDC">TẦM NHÌN</b>
        <p></p>
		<h5 style="color:#DCDCDC">
        ROSA hướng đến vị trí thương hiệu máy tính bộ hàng đầu Việt Nam, góp phần phát triển công nghệ trong nước và nâng cao vị thế hàng Việt. Với nỗ lực không ngừng cải tiến, ROSA tạo ra sản phẩm tiên tiến, mang đậm dấu ấn Việt, trở thành niềm tự hào và lựa chọn tin cậy của người tiêu dùng</h5>
    </div>
    <div class="banner-image">
        <img src="assets/images/blog.jpg" alt="Gaming PC" />
    </div>
</div>

	<style>
        * {
    box-sizing: border-box; /* Đảm bảo padding và border nằm trong kích thước tổng thể */
}
.main-banner1 {
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
h5 {
    font-size: 15px;
}

b {
     font-size:17px;
}

.banner-content {
    flex: 1; /* Chiếm 50% chiều rộng */
    color: #000; /* Màu chữ */
}

.banner-content h1 {
    font-size: 2rem; /* Giảm kích thước chữ tiêu đề */
    margin-bottom: 8px; /* Giảm khoảng cách dưới tiêu đề */
}

.banner-content p {
    font-size: 1rem; /* Giảm kích thước chữ mô tả */
    margin-bottom: 15px; /* Giảm khoảng cách dưới mô tả */
    color: #FFFAF0;
}

.banner-image {
    flex: 1; /* Chiếm 50% chiều rộng */
    text-align: right; /* Căn phải cho hình ảnh */
}

.banner-image img {
    max-width: 80%; /* Giảm kích thước hình ảnh */
    height: auto; /* Giữ tỷ lệ hình ảnh */
}

/* Responsive Design */
@media (max-width: 768px) {
    .main-banner1, .main-banner2 {
        flex-direction: column; /* Đặt nội dung theo cột trên màn hình nhỏ */
        text-align: center;
        padding: 20px; /* Giảm padding cho màn hình nhỏ */
    }

    .banner-image {
        margin-top: 15px; /* Khoảng cách giữa nội dung và hình ảnh */
    }
}


</style>



<?php
    require "footer.php" ;
?>