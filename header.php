<!DOCTYPE html>
<html lang="en">
<title>ROSA</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/styles/bootstrap4/bootstrap.min.css">
<link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="assets/styles/responsive.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
<body class="h-100">
    <!-- Header -->
    <header class="header trans_300">
        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <!-- Logo -->
                        <div class="logo_container col-2 col-lg-3 float-left">
                            <a href="index.php"><span></span></a>
                            <img src="assets/images/rosa.png" alt="Logo">
                        </div>

                        <!-- Navigation -->
                        <div class="col-lg-9 col-10 float-right">
                            <nav class="navbar row">
                                <!-- Search form -->
                                <form method="post" class="col-lg-8 col-1 float-left" action="" onchange="search()">
                                    <div class="navbar-search input-group input-group-lg">
                                        <input type="text" class="form-control" id="searchbox" placeholder="Nhập tên sản phẩm cần tìm..." name="search">
                                        <div class="input-group-append">
                                            <a id="btnsearch">
                                                <input type="submit" value="Tìm kiếm" class="btn btn-outline-primary btn-lg">
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <!-- Main navigation menu -->
                                <div class="row p-2">
                                    <div class="nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                                        <ul class="header_nav">
                                            <li><a href="index.php">TRANG CHỦ</a></li>
                                            <li><a href="aboutus.php">GIỚI THIỆU</a></li>
                                            <li><a href="product.php">SẢN PHẨM</a></li>
                                            <li><a href="phanmen.php">ỨNG DỤNG ROSA</a></li>
                                            <li><a href="check.php">KIỂM TRA ĐƠN HÀNG</a></li>
                                            <li><a href="baohanh_test.php">BẢO HÀNH </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Hamburger icon for mobile -->
                                <div class="hamburger_container col-6 float-right">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hamburger menu (will be shown in mobile) -->
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <div class="hamburger_menu_content text-right">
            <ul class="menu_top_nav">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="aboutus.php">Giới Thiệu</a></li>
                <li><a href="product.php">Sản phẩm</a></li>
                <li><a href="phanmen.php">Ứng Dụng ROSA</a></li>
                <li><a href="check.php">Kiểm Tra Hoá Đơn</a></li>
            </ul>
        </div>
    </div>
</body>
<script>
    // Lấy các phần tử cần thiết
const hamburger = document.querySelector('.hamburger_container');
const closeBtn = document.querySelector('.hamburger_close');
const menu = document.querySelector('.hamburger_menu');
const overlay = document.querySelector('.fs_menu_overlay');

// Khi nhấn vào hamburger, hiển thị menu
hamburger.addEventListener('click', function() {
    menu.classList.add('show');
    overlay.classList.add('show');
});

// Khi nhấn vào nút đóng hoặc overlay, ẩn menu
closeBtn.addEventListener('click', function() {
    menu.classList.remove('show');
    overlay.classList.remove('show');
});

overlay.addEventListener('click', function() {
    menu.classList.remove('show');
    overlay.classList.remove('show');
});

</script>
<style>
/* Cơ bản thiết lập cho body và header */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

/* Thiết lập header */
.header {
    background-color: #fff;
    /* padding: -7px 0; */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Container chứa menu */
.main_nav_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    max-width: 100%;
}

/* Logo */
.logo_container {
    flex: 1;
}

.logo_container img {
    max-width: 100%;
    height: auto;
}

/* Navbar (Menu chính) */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}
/* Thiết lập cơ bản cho logo */
.logo_container img {
    max-width: 100%;  /* Đảm bảo logo không vượt quá chiều rộng của container */
    height: auto;     /* Giữ tỷ lệ khung hình của logo */
}

/* Form tìm kiếm */
.navbar-search {
    display: flex;
    flex: 1;
    max-width: 400px;
}

.navbar-search input {
    width: 100%;
    padding: 10px;
}

.navbar-search .input-group-append {
    background-color: transparent;
}

/* Menu chính */
.nav_container ul {
    display: flex;
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.nav_container ul li {
    margin: 0 15px;
}

.nav_container ul li a {
    text-decoration: none;
    color: #333;
    font-size: 13px;
    transition: color 0.3s ease;
}

.nav_container ul li a:hover {
    color: #007bff;
}

/* Hamburger icon */
.hamburger_container {
    position: absolute;  /* Đặt vị trí tuyệt đối */
    left: 95px;          /* Khoảng cách từ bên trái */
    top: 21px;           /* Khoảng cách từ trên */
    cursor: pointer;
}

.hamburger_container i {
    font-size: 30px;
    color: #333;
}

/* Hamburger menu (menu cho thiết bị di động) */
.hamburger_menu {
    display: none;
    position: fixed;
    top: 0;
    right: 0;
    width: 230px;
    height: 100%;
    background-color: white;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    overflow-y: auto;
    padding-top: 60px;
    transition: transform 0.3s ease;
}

.hamburger_menu.show {
    display: block;
    transform: translateX(0);
}

.hamburger_menu_content {
    padding: 20px;
}

.hamburger_menu_content ul {
    list-style-type: none;
    padding: 0;
}

.hamburger_menu_content ul li {
    margin: 20px 0;
}

.hamburger_menu_content ul li a {
    font-size: 18px;
    color: #333;
    text-decoration: none;
}

.hamburger_menu_content ul li a:hover {
    color: #007bff;
}

/* Nút đóng hamburger menu */
.hamburger_close {
    position: absolute;
    top: 20px;
    right: 20px;
    font-size: 30px;
    color: #333;
    cursor: pointer;
}

/* Media Queries cho thiết bị di động */
@media (max-width: 768px) {
    /* Ẩn menu chính trên di động */
    .navbar ul {
        display: none;
    }

    /* Hiển thị menu khi hamburger được mở */
    .navbar.show ul {
        display: flex;
        flex-direction: column;
        padding: 20px 0;
        width: 100%;
    }

    /* Hiển thị hamburger icon trên di động */
    .hamburger_container {
        display: block;
    }

    /* Container của menu sẽ căn chỉnh hợp lý */
    .nav_container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    /* Thiết lập cơ bản cho logo */
    .logo_container img {
        max-width: 200%;  /* Đảm bảo logo không vượt quá chiều rộng của container */
        height: auto;     /* Giữ tỷ lệ khung hình của logo */
    }
    /* Tùy chỉnh form tìm kiếm trên di động */
    .navbar-search {
        max-width: 200px;
    }

    /* Tùy chỉnh lại các item trong menu hamburger */
    .hamburger_menu_content ul li {
        margin: 15px 0;
    }

    .hamburger_menu_content ul li a {
        font-size: 16px;
    }
}

/* Media Queries cho máy tính lớn */
@media (min-width: 769px) {
    /* Hiển thị menu chính trên máy tính */
    .navbar ul {
        display: flex;
        justify-content: space-around;
    }

    /* Giới hạn chiều rộng form tìm kiếm trên máy tính */
    .navbar-search {
        max-width: 300px;
    }

    /* Tùy chỉnh phần hamburger icon trên máy tính */
    .hamburger_container {
        display: none;
    }
}

</style>
