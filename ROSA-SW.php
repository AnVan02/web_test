<title>Ứng Dụng ROSA</title>

<?php
require "header.php" ;
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/./">TRANG CHỦ</a></li>
        <li class="breadcrumb-item"><a href="..ROSA-SW.php">PHẦN MỀM ROSA</a></li>
    </ol>
</nav>
    <style>
  /* Reset và cơ bản */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    /* background-color: #f4f4f4; */
    color: #4a4a4a;
    padding: 0px;
    margin: 0;
    overflow-x: hidden; /* Ngăn cuộn ngang */
}

/* Main Content Section */
.content-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap; /* Cho phép các phần tử xuống dòng trên màn hình nhỏ */
    padding: 15px;
    margin-top: 42px;
}


.content-box {
    background-color: white;
    border: 1px solid #f2cccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 70%; /* Điều chỉnh chiều rộng cho điện thoại */
    margin-bottom: 20px;
}

.section-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #c72c41;
    border-bottom: 2px solid #e5b1b5;
    padding-bottom: 20px;
    margin-bottom: 20px;
}

.section-subtitle {
    font-size: 1.1rem;
    font-weight: 600;
    color: #c72c41;
    margin-bottom: 15px;
}

.section-text {
    font-size: 1rem;
    color: #555555;
    margin-top: 10px;
}

.section-list {
    list-style-type: disc;
    margin-left: 20px;
    color: #555555;
}

.section-list li {
    margin-bottom: 8px;
}

.highlight-box, .highlight-box1, .highlight-box2 {
    padding: 15px;
    border-radius: 10px;
    margin-top: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
}

.highlight-box1 {
    background-color: #f8d7da;
    border: 1px solid #f5c2c7;
}

.highlight-box2 {
    background-color: rgb(254, 249, 195);
    border: 1px solid #f5c2c7;
}

.highlight-box ul {
    padding-left: 20px;
}

.image-container {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

.image-container img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.btn:hover {
    background-color: #cc0000;
}

/* Technical Support Section */
.tech-support-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap; /* Cho phép các phần tử xuống dòng */
    margin-top: 40px;
}

.tech-support-box {
    background-color: white;
    border: 1px solid #f2cccc;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    text-align: center;
    width: 30%; /* Chiều rộng của các box hỗ trợ kỹ thuật */
    margin: 10px;
}

.tech-support-icon {
    background-color: white;
    border: 1px solid #f2cccc;
    border-radius: 50%;
    padding: 15px;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center; /* Căn giữa theo chiều dọc */
    justify-content: center; /* Căn giữa theo chiều ngang */
    margin: 0 auto; /* Đảm bảo phần tử này được căn giữa nếu nó là phần tử block */
}


.tech-support-box h3 {
    font-size: 1.25rem;
    color: #c72c41;
    margin-bottom: 20px;
}

.tech-support-box ul {
    list-style: none;
    padding-left: 0;
    color: #c72c41;
}

.tech-support-box ul li {
    margin-bottom: 10px;
}
/* banner */
.video-container {
    position: relative; /* Giữ video đúng vị trí */
    text-align: center; /* Căn giữa nội dung nếu cần */
    padding: 20px; /* Tạo khoảng cách xung quanh */
}

.video-container video {
    max-width: 100%; /* Đảm bảo không vượt quá khung chứa */
    height: auto; /* Tự động điều chỉnh chiều cao theo tỷ lệ */
    padding: 61px; /* Khoảng cách giữa video và khung */
    width: 80%; /* Thu nhỏ video, chiếm 80% chiều rộng khung chứa */
    border-radius: 10px; /* Bo tròn góc */
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); Hiệu ứng đổ bóng */
}

/* Responsive Design */
@media (max-width: 768px) {
    body {
        padding: 20px;
    }
    .content-container {
        margin-top: 92px;
    }
   
    #banner {
        display: block; /* Đảm bảo hiển thị trên màn hình nhỏ */
    }
    .video-container {
        position: relative; /* Giữ video đúng vị trí */
        text-align: center; /* Căn giữa nội dung nếu cần */
        padding: 20px; /* Tạo khoảng cách xung quanh */
    }
    .video-container video {
        padding: 0px; /* Padding nhỏ hơn trên di động */
        width: 103%; /* Đặt chiều rộng video gần hết màn hình */
        height:47%;
    }
}



    .content-container {
        padding: 0;
        
    }

    .content-box {
        padding: 5px; /* Giảm padding trên màn hình nhỏ để tiết kiệm không gian */
    }

    .section-title {
        font-size: 1.2rem; /* Giảm kích thước font nếu cần */
    }
    .section-subtitle {
        font-size: 1rem;
    }

    .section-text {
        font-size: 0.95rem;
    }

    .image-container img {
        max-width: 90%;
    }

    .highlight-box1, .highlight-box2 {
        padding: 10px;
    }

    .tech-support-box {
        width: 69%;
        padding: 24px;
        margin: 13px 0;
    }

    .tech-support-icon {
        width: 40px;
        height: 40px;
        padding: 10px;
    }

    .tech-support-box h3 {
        font-size: 1rem;
    }
}

@media (max-width: 500px) {
    .content-box {
        /*width: 100%;*/
        padding: 70px;
        overflow: visible; /* Đảm bảo không bị cắt nội dung */
        display: block; /* Đảm bảo hiển thị dưới dạng block */
    }


    .tech-support-box {
        width: 100%;
        padding: 15px;
    }

    .image-container img {
        max-width: 80%;
    }
}

    </style>

    <!-- Main Content Section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <div class="content-container">
        <div class="content-box">
            <h3 class="section-title">Giới thiệu phần mềm</h3>
            <div>
                <!-- Hệ thống khóa học đa dạng -->
                <div>
                    <h3 class="section-subtitle">Hệ thống khóa học đa dạng:</h3>
                    <ul class="section-list">
                        <li>ROSA cung cấp hệ thống bài giảng đa dạng, từ cơ bản đến nâng cao, giúp người dùng dễ dàng tiếp cận với lập trình và ứng dụng AI.</li>
                    </ul>
                </div>
                <!-- Thiết kế tối ưu cho người học -->
                <div>
                    <h3 class="section-subtitle">Thiết kế tối ưu cho người học:</h3>
                    <ul class="section-list">
                        <li>Phù hợp cho cả người mới bắt đầu và chuyên gia muốn nâng cao kỹ năng.</li>
                        <li>Cung cấp các bài giảng video chất lượng cao, bài tập thực hành, và dự án thực tế.</li>
                    </ul>
                </div>
                <!-- Trải nghiệm học tập chủ động -->
                <div>
                    <h3 class="section-subtitle">Trải nghiệm học tập chủ động:</h3>
                    <ul class="section-list">
                        <li>Người dùng có thể học theo tốc độ riêng của mình.</li>
                        <li>Tăng cường kỹ năng với các bài tập thực hành và dự án ứng dụng thực tế.</li>
                    </ul>
                </div>
                <!-- Giải pháp toàn diện -->
                <div>
                    <h3 class="section-subtitle">Giải pháp toàn diện:</h3>
                    <ul class="section-list">
                        <li>Phần mềm được tích hợp độc quyền với các sản phẩm máy bộ ROSA, mang lại hiệu năng vượt trội cho các nhu cầu học tập và phát triển công nghệ.</li>
                        <li>Kết nối lý thuyết với thực hành, giúp bạn tự tin ứng dụng kiến thức vào môi trường thực tế.</li>
                    </ul>
                </div>

                <!-- Mục tiêu -->
                <div class="highlight-box"style="background:#FEE2E2; padding: 20px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                    <h3 class="section-subtitle"style >Mục tiêu:</h3>
                    <p class="section-text">Đồng hành cùng bạn trên con đường chinh phục trí tuệ nhân tạo, công nghệ mới:</p>
                    <ul class="section-list">
                        <li>Cung cấp kiến thức vững chắc về lập trình Python.</li>
                        <li>Giúp bạn phát triển kỹ năng thực hành thông qua các dự án thực tế.</li>
                        <li>Đưa trí tuệ nhân tạo đến tay người dùng.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
      <!-- Phần video banner -->
    <section id="banner">
    <div class="video-container">
        <video id="video1" autoplay muted controls>
            <source src="/assets/upload/study/demoROSA.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ video.
        </video>
     <p style="font-style: italic">Video giới thiệu phần mềm ROSA</p>
    </div>
</section>

<script>
    const video1 = document.getElementById('video1');

    video1.addEventListener('ended', () => {
        video1.style.display = 'none';
        video2.style.display = 'block';
        video2.play();
    });
</script>

    <!-- Hướng dẫn sử dụng phần mềm -->
    <div class="content-container">
        <div class="content-box">
            <h2 class="section-title">Hướng dẫn sử dụng phần mềm</h2>
            <h3 class="section-subtitle">Khởi chạy ứng dụng</h3>
            <p class="section-text">Để sử dụng được phần mềm, vui lòng khởi chạy ứng dụng ROSA với biểu tượng như ảnh dưới đây trên màn hình Desktop của bạn.</p>
            <div class="image-container">
                <img src="/assets/images/b.jpg" alt="Hình ảnh ứng dụng ROSA">
            </div>
            <h3 class="section-subtitle">Giao diện của ứng dụng</h3>
            <p class="section-text">Dưới đây là giao diện của ứng dụng ROSA khi bạn khởi chạy thành công.</p>
            <div class="image-container">
                <img src="/assets/images/ungdung.jpg" style alt="Hình ảnh giao diện ứng dụng">
            </div>
            <div class="highlight-box1">
                <h3 class="section-subtitle">Thông tin quan trọng</h3>
                <ul class="section-list">
                    <li>Mỗi máy bộ <span style="color:#DC2626; font-weight: bold;">ROSA ID</span> đều được trang bị một ROSA ID duy nhất, được hiển thị ở góc trái màn hình.</li>
                    <li>Phần mềm sẽ tự động kích hoạt và cung cấp các khóa học tương ứng với cấu hình máy của bạn.</li>
                    <li>Mỗi khóa học đều có phần tóm tắt ngắn gọn trước khi đi vào bài giảng chi tiết.</li>
                    <li>Để khám phá toàn bộ nội dung, vui lòng nhấn vào nút <span style="color:#DC2626; font-weight: bold;">‘Xem thêm’</span>dưới mỗi phần tóm tắt.</li>
                    <li>Phần mềm sẽ <span style="color:#DC2626; font-weight: bold;">tự động cập nhật </span> các bài giảng mới nhất khi ROSA tiến hành xuất bản.</li>
                    <div class="highlight-box2 bg-yellow-100 p-4 border border-yellow-300 rounded-lg flex items-center">
                        <b class="font-bold text-gray-800">
                            <span class="fas fa-bell" style="color: gold; margin-right: 10px;"></span>
                            Hãy chủ động liên hệ với bộ phận chăm sóc khách hàng của chúng tôi nếu bạn có nhu cầu nâng cấp máy bộ để sở hữu các khóa học thú vị hơn.
                        </b>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <!-- Technical Support Section -->
    <div class="tech-support-container">
        <div class="tech-support-box">
            <div class="tech-support-icon">
                <i class="fas fa-headset"></i>
            </div>
            <h3 class="section-subtitle">Hỗ trợ kỹ thuật:</h3>
            <ul>
                <li>Nếu gặp bất kỳ vấn đề nào trong quá trình sử dụng, hãy liên hệ với đội ngũ kỹ thuật của chúng tôi.</li>
                <li>Vui lòng cung cấp  <span style="color: red; font-weight: bold;">ROSA ID</span> để được hỗ trợ nhanh chóng và chính xác nhất.</li>
            </ul>
        </div>
    </div>

<?php
    require "footer.php" ;
?>
