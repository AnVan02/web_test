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
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/bannerrosa2.jpg" class="img-fluid" alt="Sale Banner">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/bannerrosa3.jpg" class="img-fluid" alt="New Year Banner">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
  



<style>
/* Banner */
.banner {
    margin: 30px auto;
    width: 95%;
    max-width: 100%;
    border-radius: 10px;
    overflow: hidden;
}
.banner img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}
.carousel-control-prev-icon, .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 10px;
}
</style>
	 
</head>
<body>
<header>

<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "database"; 

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy 1 bài viết mới nhất
$sql = "SELECT article_tag, article_title, article_date, article_image, article_link 
        FROM article 
        ORDER BY article_date DESC 
        LIMIT 1";

$result = $conn->query($sql);
?>

<style>
    .news-container {
        display: flex;
        gap: 20px;
        justify-content: center;
    }
    .news-card {
        width: 350px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        background: white;
        transition: 0.3s;
    }
    .news-card:hover {
        transform: translateY(-5px);
    }
    .news-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .news-content {
        padding: 15px;
    }
    .news-title a {
        text-decoration: none;
        color: black;
        font-size: 18px;
        font-weight: bold;
    }
    .news-title a:hover {
        color: red;
    }
    @media (max-width: 768px) {
    .news-container {
        flex-direction: column;
        align-items: center;
    }
    .news-card {
        width: 90%;
    }
    .news-card img {
        height: 150px;
    }
    .news-title a {
        font-size: 16px;
    }
}

</style>

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
    
    <div class="news-card">
        <a href="/sanpham/ROSA-OFFICE.php">
            <img src="/assets/images/RSVP.jpg" alt="ROSA VĂN PHÒNG">
        </a>
        <div class="news-content">
            <p>Khuyên mãi<p>
            <div class="news-title">
                <a href="/sanpham/ROSA-OFFICE.php">ROSA VĂN PHÒNG</a>
            </div>
            <p>Cấu hình máy tính đồng bộ mạnh mẽ mang lại hiệu suất làm việc tối ưu.</p>
        </div>
    </div>
    
    <div class="news-card">
        <a href="/sanpham/ROSA-AI.php">
            <img src="/assets/images/AI.jpg" alt="ROSA AI">
        </a>

        <div class="news-content">
        <p>Khuyên mãi<p>
            <div class="news-title">
                <a href="/sanpham/ROSA-AI.php">ROSA AI</a>
            </div>
            <p>Giải pháp tối ưu cho lập trình và phát triển AI với cấu hình mạnh mẽ, bảo hành 3 năm.</p>
        </div>
    </div>
</div>

<!-- TỔNG QUAN VỀ SẢN PHÂM -->
<div class="container my-5">
    <h3><b style='color: red ;font-weight: bolder;'>DÒNG MÁY PHÙ HỢP VỚI BẠN </b></h3>
        <p>KHÁM PHÁ CÁC DÒNG MÁY ROSA PHÙ HỢP VỚI NHU CẤU SỬ DỤNG CỦA BẠN</p>
    <div class="container">
        <div class="grid">
            <div class="card">
                <!-- <img src="image.png" alt="ROSA Office" class="large"> -->
                <!-- <img src="Rosa_Office_I.png" alt="ROSA Office" class="small"> -->
                <h3>ROSA Office</h3>
                <p>Mang đến hiệu suất ổn định và tính năng bảo mật cao, hoàn hảo cho công việc văn phòng hàng ngày.</p>
                    <a href="product.php#vanphong" class="btn">KHÁM PHÁ</a>
                </div>
            <div class="card">
                <!-- <img src="image.png" alt="ROSA AI" class="large"> -->
                <!-- <img src="Rosa_Office_I.png" alt="ROSA AI" class="small"> -->
                <h3>ROSA AI</h3>
                <p>Tối ưu cho lập trình AI, với công cụ cải tiến và cấu hình mạnh mẽ để phát triển ứng dụng trí tuệ nhân tạo.</p>
                <a href="product.php#ai" class="btn">KHÁM PHÁ</a>
                </div>
            <div class="card">
                <!-- <img src="image.png" alt="ROSA Gaming" class="large"> -->
                <!-- <img src="Rosa_Office_I.png" alt="ROSA Gaming" class="small"> -->
                <h3>ROSA Gaming</h3>
                <p>Cấu hình cao và các card đồ họa mạnh mẽ, mang đến hiệu suất vượt trội cho các tựa game yêu thích.</p>
                <a href="product.php#gaming" class="btn">KHÁM PHÁ</a>
                </div>
            <div class="card">
                <!-- <img src="image.png" alt="ROSA Server" class="large"> -->
                <!-- <img src="Rosa_Office_I.png" alt="ROSA Server" class="small"> -->
                <h3>ROSA MINI </h3>
                <p>Tối ưu cho lập trình AI, với công cụ cải tiến và cấu hình mạnh mẽ để phát triển ứng dụng trí tuệ nhân tạo.</p>
                <a href="product.php#mini" class="btn">KHÁM PHÁ</a>
               </div>
        </div>
    </div>

<!--software-->

<div class="container my-5">
<h3><b style='color: red ;font-weight: bolder;'>GIẢI PHÁP PHẦN MỀM KHOÁ HỌC CHO BẠN</b></h3>
    <p>KHÁM PHÁ KHOÁ HỌC & PHẦN MỀM AI THÚ VỊ MÀ ROSA MANG ĐẾN CHO BẠN</p>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container img {
            width: 820px;
            height: 430px;
            border-radius: 10px;
            object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
            max-width: 100%; /* Giữ responsive trên màn hình nhỏ */
        }
        @media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    .accordion-body {
        font-size: 14px;
        line-height: 1.6;
        text-align: justify; /* Căn đều văn bản */
        max-width: 90%; /* Giới hạn độ rộng chữ */
        margin: 0 auto; /* Căn giữa */
    }

    .accordion-button {
        font-size: 15px;
        font-weight: bold;
        padding: 10px;
    }

    .accordion-item {
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .accordion-body ul {
        padding-left: 15px;
    }

    .accordion-body li {
        margin-bottom: 5px;
    }

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 15px;
    }

    .image-container img {
        width: 100%;
        height: auto;
        max-width: 350px;
        border-radius: 8px;
    }
}




    </style>
    <div class="container my-5">
        <div class="container-box">
            <div class="content">
                <div class="accordion" id="accordionExample">
                    <!-- Mục 1 -->
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
                                    <li>Khóa học này bao gồm các khái niệm cốt lõi như biến, vòng lặp, hàm, và cấu trúc dữ liệu căn bản. Từng bước, bạn sẽ học cách viết mã dễ hiểu, hiệu quả và làm quen với những ứng dụng đơn giả</li>
                                    <li>Khóa học này sẽ giúp bạn làm chủ các kiến thức nền tảng về Python, từ cú pháp cơ bản đến việc sử dụng các thư viện phổ biến như NumPy và Pandas</li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mục 2 -->
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
                                    <li>Khóa học này được thiết kế để phù hợp với mọi đối tượng, từ người mới bắt đầu đến những chuyên gia muốn nâng cao kiến thức.</li>
                                    <li>Khóa học sẽ là nền tảng vững chắc để bạn xây dựng các giải pháp thông minh, giải quyết hiệu quả các bài toán thực tiễn, đồng thời mở rộng cơ hội phát triển trong lĩnh vực AI đang không ngừng phát triển.</li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                    <!-- Mục 3 -->
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
                                    <li>Với hình thức lưu trữ theo cấu trúc thư mục thông thường, người dùng có thể lưu files trên các server riêng. Nexcloud cung cấp quyền kiểm soát hai bên, vì thế người dùng có thể quyết định được nơi lưu trữ ảnh, tài liệu và cấp phép truy cập cho người khác một cách tiện lợi.</li>
                                </ul>
                                <a href="#" class="explore-link">Khám phá</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Khu vực hiển thị hình ảnh -->
            <div class="image-container">
                <img id="accordionImage" src="tải xuống.png" alt="Hình ảnh minh họa">
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.accordion-button').forEach((button, index) => {
            button.addEventListener('click', () => {
                const imagePaths = ['tải xuống.png', 'tải xuống.png', 'tải xuống.png'];
                document.getElementById('accordionImage').src = imagePaths[index];
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>

<!-- CÂU HỎI LIÊN QUAN  -->
<div class="container my-5">
<h3><b style='color: red ;font-weight: bolder;'>CÂU HỎI LIÊN QUAN ĐẾN ROSA  </b></h3>
    <p>Những câu hỏi phổ biển nhất có thể bạn chưa biết đến ROSA</p>
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
                <button onclick="setActive(this)">Sản phẩm & linh kiện</button>
                <p style="color:red , font-size: 18px;">Bạn không có câu trả lời mình cần trong danh sách này? Hãy gửi câu hỏi cho chung tôi tại đây nhé !</p>
                <a href="https://zalo.me/your-link" 
                    style="display: inline-block; padding: 10px 25px; font-size: 16px; font-weight: bold; 
                            color: white; background-color: red; border: none; border-radius: 25px; 
                            cursor: pointer; text-decoration: none; text-align: center; 
                            transition: background 0.3s ease; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);">
                        Liên hệ
                    </a>


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
            { question: "Rosa hiện tại có chi nhánh không ?", answer: "Hiện tại Rosa chỉ có một địa chỉ giao dịch duy nhất tại địa chỉ 150 Ter Bùi Thị Xuân , Phường Phạm Ngũ Lão ,Quận 1 , TP HCM " },
            { question: "Tôi muốn hỏi giờ làm việc chính thức của Rosa để có thể sắp xếp tới xem và mua hàng .", answer: "Giờ làm việc của Rosa  được thông báo trên website Rosa, cụ thể như sau Bán hàng: Thứ 2 – Thứ 7"},
            { question: "Rosa hiện tại có bán hàng trên các website và sàn thương mại điện tử không ?", answer: "Hiện tại  Rosa có  nhiều kênh bán hàng , có thể kể tới như Store online , mua bằng ví điện tử , thông qua đại lý… Nhưng để được hỗ trợ kịp thời và tốt nhất chúng tôi khuyến khích quý khách mua trược tiếp tại   store chính thức  và thông qua website Rosacomputer.ai ." },
            { question: "Rosa có link facebook không ?", answer: "Rosa có link facebook không ?:<a href https://www.facebook.com/profile.php?id=61559427752479" }
            
        ],
        "Cấu hình": [
            { question: "Tôi có thể tuỳ chỉnh cấu hình không?", answer: "Có, bạn có thể tuỳ chỉnh linh kiện theo nhu cầu." },
            { question: "Có hỗ trợ ép xung không?", answer: "Chúng tôi hỗ trợ ép xung nếu yêu cầu." }

        ],
        "Phương thức thanh toán": [
            { question: "Có mấy phương thức thanh toán ", answer: "Có 2 phương thức chuyển khoản và chuyển tiên mặt " }
        ],

        "Bảo hành": [
            {question: "Tôi mua hàng Rosa rồi , sau này có vấn đề về bảo hành thì liên hệ tại đâu ?", answer:"Thông tin về chính sách bảo hành được Rosa công bố rộng rãi trên website của mình, tại đường dẫn sau Hoặc bạn có thể liên hệ trực tiếp tại địa chỉ chính thức của Rosa : 150 Ter Bùi Thị Xuân , Phường Phạm Ngũ Lão ,Quận 1 , TP HCM ."},
            { question: "Hiện tại máy bộ Rosa bảo hành 3 năm theo quy định của hãng .", answer: "Hiện tại máy bộ Rosa bảo hành 3 năm theo quy định của hãng ." },
            { question: "Số Điện Thoại trung tâm bảo hành Rosa ", answer: "(028) 39260996" }
        ],
        "Giao hàng": [
            { question: "Thời gian giao hàng là bao lâu?", answer: "Thời gian giao hàng tuỳ thơi gian tỉnh thành đó " }
        ],

        "Sản phẩm & linh kiện": [
            { question: "Hiện tại Rosa có sản phẩm gì ?", answer: "Hiện tại sản phẩm chính của Rosa là máy bộ bao gồm rất nhiều lựa chọn , đủ đáp ứng nhu cầu của quý khách hàng ." },
            { question: "Hiện tại sản phẩm chính của Rosa bao gồm những sản phẩm gì ?", answer: "ROSA AI , ROSA VĂN PHÒNG , ROSA GAMER " },
            { question: "ROSA AI là gì?", answer:"ROSA AI PC được thiết kế cho lập trình và phát triển AI, tích hợp cấu hình mạnh mẽ cùng các công cụ cài sẵn, sẵn sàng cho hành trình sáng tạo của bạn."}
        
        
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
    body {
        background-color: #f8f9fa;
    }
    .container-box {
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        /* align-items: center; */
    }
    .content {
        flex: 1;
        padding-right: 30px;
    }
    .content h2 {
        font-size: 1.8rem;
        font-weight: bold;
    }
    .content ul {
        padding-left: 20px;
    }
    .content ul li {
        list-style: none;
        position: relative;
        padding-left: 20px;
        margin-bottom: 8px;
    }
    .content ul li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: red;
        font-size: 1.2rem;
    }
    .explore-link {
        color: red;
        font-weight: bold;
        text-decoration: none;
    }
    .explore-link:hover {
        text-decoration: underline;
    }
    .image-container {
        flex: 1;
    }
    .image-container img {
        width: 100%;
        border-radius: 10px;
    }
    .accordion-p {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }
    .accordion-p:not(.collapsed) {
        color: red;
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