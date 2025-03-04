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
<!-- <link rel="stylesheet" type="text/css" href="assets/styles/main_styles.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="assets/styles/responsive.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->

    <!-- Top Header -->
    <div class="header-top">
        <div class="logo_brand">
            <!-- <div class="logo_container">
                <a href="index.php"><img src="assets/images/rosa.png" alt="Logo"></a>
            </div> -->
            <div class="brand_text">THƯƠNG HIÊU MÁY TÍNH BỘ HÀNG ĐẦU VIỆT NAM</div>
        </div>
        <div class="contact_info">
            <span><i class="fa fa-phone"></i> (028) 39293770 - (028) 39293765</span>
            <span><i class="fa fa-envelope"></i>support@rosacomputer.ai</span>
            <div class="language-selector">
                <i class="fa fa-globe"></i>
                <select id="languageSelect">
                    <option value="vi">Vietnamese</option>
                    <option value="en">English</option>
                </select>
            </div>
        </div>

        <script>
            function changeLanguage(lang) {
                document.getElementById("selected-language").innerText = lang;
                alert("Bạn đã chọn: " + lang);
                // Thêm xử lý chuyển đổi ngôn ngữ tại đây
            }
        </script>
        </div>
    </div>

    <!-- Main Header -->
    <header class="header">
        <div class="container d-flex align-items-center justify-content-between py-2">
            <div class="logo_container">
                <a href="index.php"><img src="assets/images/rosa.png" alt="Logo"></a>
            </div>
            <nav class="nav_container d-none d-md-block">
                <ul class="d-flex">
                    <li><a id="home" href="index.php">TRANG CHỦ</></li>
                    <li><a id="about" href="aboutus.php">GIỚI THIỆU</></li>
                    <li><a id="products" href="product.php">SẢN PHẨM</></li>
                    <!-- <li><a href="#">Ứng Dụng ROSA <i class="fas fa-chevron-down" style="margin-left: 15px"></i></a>
                        <ul class="submenu">
                            <li><a href="ROSA-SW.php">Phần Mềm ROSA</a></li>
                            
                            <li class="has-submenu">
                                <a href="#">Khóa Học <i class="fas fa-chevron-right"style="margin-left: 57%"></i></a>
                                <ul class="submenu">
                                    <li><a href="courses/python-course.php">Python Cơ Bản</a></li>
                                    <li><a href="courses/yolo_course.php">Thị Giác Máy Tính </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                    <li><a href="tintuc.php">TIN TỨC</a></li>
                    <li><a href="check.php">KIỂM TRA ĐƠN HÀNG</a></li>
                    <li><a href="baohanh_test.php">BẢO HÀNH</a></li>
                </ul>
            </nav>
            <div class="hamburger_container d-md-none">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="hamburger_menu">
        <div class="hamburger_close"><i class="fa fa-times"></i></div>
        <ul class="list-unstyled p-3">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="aboutus.php">Giới Thiệu</a></li>
            <li><a href="product.php">Sản phẩm</a></li>
            <li><a href="phanmen.php">Ứng Dụng ROSA</a></li>
            <li><a href="check.php">Kiểm Tra Hoá Đơn</a></li>
        </ul>
    </div>

    <script>
        document.querySelector('.hamburger_container').addEventListener('click', function() {
            document.querySelector('.hamburger_menu').classList.add('show');
        });
        document.querySelector('.hamburger_close').addEventListener('click', function() {
            document.querySelector('.hamburger_menu').classList.remove('show');
        });

        document.addEventListener("DOMContentLoaded", function() {
    const languageSelect = document.getElementById("languageSelect");

    // Load ngôn ngữ từ Local Storage (nếu có)
    let currentLang = localStorage.getItem("lang") || "vi";
    languageSelect.value = currentLang;
    loadLanguage(currentLang);

    languageSelect.addEventListener("change", function() {
        let selectedLang = this.value;
        localStorage.setItem("lang", selectedLang); // Lưu vào Local Storage
        loadLanguage(selectedLang);
    });

    function loadLanguage(lang) {
        fetch("translations.json")
            .then(response => response.json())
            .then(data => {
                document.getElementById("home").innerText = data[lang]["home"];
                document.getElementById("about").innerText = data[lang]["about"];
                document.getElementById("products").innerText = data[lang]["products"];
            });
    }
});

    </script>
        <style>
       
/* Định dạng menu chính */
.header_nav {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-wrap: wrap;
}

.header_nav li {
    position: relative;
    margin: 0 15px;
}

.header_nav li a {
    text-decoration: none;
    color: #333;
    font-size: 16px;
    font-weight: 600;
    padding: 10px 15px;
    display: block;
    transition: color 0.3s ease-in-out;
}

.header_nav li a:hover {
    color: #007bff;
}

/* Định dạng submenu */
.submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    list-style: none;
    padding: 0;
    margin: 0;
    min-width: 200px;
    z-index: 999;
}

.submenu li {
    position: relative;
}

.submenu li a {
    display: block;
    padding: 10px;
    color: #333;
    white-space: nowrap;
    font-size: 14px;
}

.submenu li a:hover {
    background: #f8f8f8;
    color: #007bff;
}

/* Hiển thị submenu khi hover */
.header_nav li:hover > .submenu {
    display: block;
}

/* Định dạng submenu con (cấp 2) */
.has-submenu {
    position: relative;
}

.has-submenu .submenu {
    top: 0;
    left: 100%;
    margin-left: 10px;
}

/* Responsive: Menu dạng dọc khi trên màn hình nhỏ */
@media (max-width: 768px) {
    .nav_container {
        flex-direction: column;
    }

    .header_nav {
        flex-direction: column;
        width: 100%;
    }

    .header_nav li {
        width: 100%;
        text-align: center;
    }

    .submenu {
        position: relative;
        width: 100%;
        box-shadow: none;
    }

    .has-submenu .submenu {
        left: 0;
        margin-left: 0;
    }
}

        
        .header-top {
            background: #f8f8f8;
            font-size: 14px;
            padding: 5px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .logo_brand {
            display: flex;
            align-items: center;
        }
        .logo_container img {
            max-width: 120px;
            height: auto;
        }
        .brand_text {
            font-size: 16px;
            /* font-weight: bold; // in đậm */
            color: #333;
            margin-left: 40%;
            white-space: nowrap;
        }
        .contact_info {
            font-size: 14px;
            color: #333;
            display: flex;
            align-items: center;
        }
        .contact_info i {
            margin-right: 5px;
            color: #007bff;
        }

        .contact_info span {
            margin-left: 15px;
        }
        /* Main Navigation */
        .header {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .nav_container ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        .nav_container ul li {
            margin: 0 15px;
        }
        .nav_container ul li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .nav_container ul li a:hover {
            color: #007bff;
        }
        /* Mobile Menu */
        .hamburger_container {
            display: none;
            font-size: 24px;
            cursor: pointer;
        }
        .hamburger_menu {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: 250px;
            height: 100%;
            background-color: white;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            padding-top: 60px;
        }
        .hamburger_menu.show {
            display: block;
        }
        .hamburger_close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
        }
        .language-selector {
            display: flex;
            align-items: center;
            font-size: 14px;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            background: white;
        }
        .language-selector i {
            margin-right: 5px;
            color: #007bff;
        }
        .language-dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
            list-style: none;
            padding: 5px 0;
            width: 120px;
            z-index: 10;
        }
        .dropdown-menu li {
            padding: 8px 12px;
            cursor: pointer;
        }
        .dropdown-menu li:hover {
            background: #f1f1f1;
        }
        .language-dropdown:hover .dropdown-menu {
            display: block;
        }
        .language-selector {
            margin-left: 20px; /* Tạo khoảng cách giữa email và selector */
            display: flex;
            align-items: center;
        }

            .language-selector select {
            padding: 3px 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .nav_container ul {
                display: none;
            }
            .hamburger_container {
                display: block;
            }
            .contact_info {
                display: none;
            }
        }
        @media (max-width: 768px) {
        .logo_brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .brand_text {
            font-size: 12px; /* Giảm kích thước chữ để phù hợp */
            margin-top: 5px;
        }

        .logo_container img {
            max-width: 120px; /* Giảm kích thước logo */
        }
}


    </style>



