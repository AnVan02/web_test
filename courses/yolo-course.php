<title>Thị Giác Máy Tính</title>
<?php require "../header.php" ;?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        
        #banner video {
            display: block !important; /* Đảm bảo video luôn hiển thị */
        }

        #showcase {
            min-height: 400px;
            background: red;
            color: #fff;
            text-align: center;
            padding: 50px 0;
        }
        #showcase h2 {
            font-size: 55px;
            margin: 0;
        }
        #showcase p {
            font-size: 20px;
            margin-top: 10px;
        }
        .slogan {
            text-align: center;
            margin-top: 30px;
            padding: 90px;
            background: #fff;
            /* border-top: 2px solid red; */
        }
        .slogan h2 {
            /*font-size: 120px;*/
            margin: 0;
            color: red;
        }
        .slogan p {
            font-size: 18px;
            margin-top: 10px;
        }
        #banner {
            position: relative;
            width: 100%;
            height: 500px; /* Chiều cao của banner */
            overflow: hidden;
            background: white; /* Nền màu trắng */
            margin-top: -87px; /* Khoảng cách giữa slogan và video */
            display: flex; /* Sử dụng flexbox để căn giữa video */
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
        }
        .video-container {
            width: 80%; /* Chiều rộng khung chứa video */
            height: 100%; /* Chiều cao khung chứa video */
            border-radius: 20px; /* Bo tròn góc khung chứa video */
            overflow: hidden; /* Ẩn phần video vượt ra ngoài khung */
        }
        #banner video {
            width: 100%; /* Chiều rộng video */
            height: 100%; /* Chiều cao video */
            object-fit: cover; /* Đảm bảo video phủ kín khung chứa */
        }
        .content {
            padding: 20px;
            background: #f4f4f4;
            margin-top: 20px;
            border: 1px solid #ddd;
        }
        .content h3 {
            color: red;
        }
        .content p {
            line-height: 1.6;
        }
        .content ul {
            list-style: none;
            padding: 0;
        }
        .content ul li {
            background: #fff;
            margin-bottom: 10px;
            padding: 10px;
            border-left: 5px solid red;
        }
        .content ul ul {
            margin-left: 20px; /* Thụt lề cho danh sách con */
        }

    </style>

</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/./">TRANG CHỦ</a></li>
            <li class="breadcrumb-item"><a href="../courses/yolo-course.php">THỊ GIÁC MÁY TÍNH</a></li>
        </ol>
    </nav>
    <!-- Phần slogan -->
    <div class="slogan">
        <h2>Khóa Học YOLO</h2>
        <p>Khám phá thuật toán tiên phong trong lĩnh vực Thị giác máy tính</p>
    </div>

     <!-- Phần video banner  -->
    <section id="banner">
        <div class="video-container">
            <video id="video1" autoplay muted>
                <source src="/assets/upload/study/VideoOutput4.mp4" type="video/mp4">
                Trình duyệt của bạn không hỗ trợ video.
            </video>
            <video id="video2" muted style="display: none;">
                <source src="/assets/upload/study/SegmentedOutput.mp4" type="video/mp4">
                Trình duyệt của bạn không hỗ trợ video.
            </video>
        </div>
    </section>
    <script>
        const video1 = document.getElementById('video1');
        const video2 = document.getElementById('video2');

        video1.addEventListener('ended', () => {
            video1.style.display = 'none';
            video2.style.display = 'block';
            video2.play();
        });

        video2.addEventListener('ended', () => {
            video2.style.display = 'none';
            video1.style.display = 'block';
            video1.play();
        });
    </script>

    <div class="container">
        <section class="content">
            <h3>Giới thiệu khóa học</h2>
            <p>YOLO (You Only Look Once) là một trong những thuật toán tiên phong trong lĩnh vực Thị giác máy tính, 
            nổi bật với khả năng xử lý hình ảnh và video nhanh chóng, hiệu quả. Khóa học này được thiết kế để phù hợp với mọi đối tượng, 
            từ người mới bắt đầu đến những chuyên gia muốn nâng cao kiến thức. Chúng tôi không chỉ tập trung cung cấp kiến thức lý thuyết mà còn khơi gợi tư duy sáng tạo, giúp bạn tự tin áp dụng các kỹ năng đã học vào thực tế. Khóa học sẽ là nền tảng vững chắc để bạn xây dựng các giải pháp thông minh, giải quyết hiệu quả các bài toán thực tiễn, đồng thời mở rộng cơ hội phát triển trong lĩnh vực AI đang không ngừng phát triển.</p>
            
            <h3>Thị giác máy tính là gì ?</h3>
            <p>Thị giác máy tính (Computer Vision) là một lĩnh vực trong trí tuệ nhân tạo (AI) tập trung vào việc giúp máy tính "nhìn" và “hiểu” nội dung của hình ảnh, video, hoặc các dữ liệu trực quan khác, được ứng dụng trong đa lĩnh vực như : </p>
            <ul>
                <li>Y tế: Phân tích hình ảnh y khoa (X-quang, MRI) để hỗ trợ chẩn đoán.</li>
                <li>Giao thông: Phát hiện phương tiện, người đi bộ, biển báo trong xe tự hành.</li>
                <li>An ninh: Nhận diện khuôn mặt, giám sát và phát hiện hành vi bất thường.</li>
                <li>Công nghiệp: Kiểm tra chất lượng sản phẩm tự động.</li>
                <li>Thương mại: Gợi ý sản phẩm, tìm kiếm bằng hình ảnh.</li>
            </ul>
            
            <h3>Tại sao cần học YOLO?</h2>
            <p>Học YOLO không chỉ giúp bạn nắm vững một thuật toán tiên tiến mà còn mở ra nhiều cơ hội trong lĩnh vực AI. 
            Với khả năng ứng dụng đa dạng và dễ dàng tích hợp cùng các công nghệ như OpenCV, TensorFlow hay Pytorch, 
            YOLO hỗ trợ bạn xây dựng các hệ thống thông minh và đáp ứng nhu cầu thực tiễn. 
            Đây là nền tảng để bạn phát triển sự nghiệp và thúc đẩy sáng tạo trong việc giải quyết các bài toán hiện đại.</p>
            
            <h3>Mục tiêu khóa học</h2>
            <p>Khóa học này được thiết kế để cung cấp kiến thức toàn diện về YOLO và cách ứng dụng trong thực tế.</p>
            <ul>
                <li>Hiểu rõ nền tảng YOLO: Học viên sẽ nắm vững lý thuyết cốt lõi về cách hoạt động của YOLO, từ việc xử lý ảnh đến các phương pháp tối ưu hóa mô hình.</li>
                <li>Thực hành trên dự án thực tế: Cung cấp các bài tập thực hành với các dự án thực tế, bao gồm phát hiện đối tượng, phân đoạn ảnh, và triển khai trên các nền tảng khác nhau.</li>
                <li>Kỹ năng tích hợp: Hướng dẫn cách kết hợp YOLO với OpenCV, Python, và các thư viện AI khác để xây dựng các ứng dụng mạnh mẽ.</li>
            </ul>
      
            <h3>Nội dung khóa học</h2>
            <ul>
                <li>Chương 1: Giới thiệu chung về YOLO và Thị giác máy tính
                    <ul>
                        <li>Khám phá khái niệm cơ bản, lịch sử phát triển của YOLO.</li>
                        <li>Tìm hiểu các bài toán điển hình mà YOLO có thể giải quyết.</li>
                        <li>Nắm vững quy trình hoạt động và phân tích các ứng dụng thực tế.</li>
                    </ul>
                </li>
                <li>Chương 2: Hướng dẫn cơ bản về YOLO và ứng dụng
                    <ul>
                        <li>Làm quen với các mô hình YOLO tương ứng với nhiều tác vụ khác nhau.</li>
                        <li>Tích hợp YOLO với OpenCV để xây dựng các ứng dụng cơ bản.</li>
                        <li>Thực hành sử dụng YOLO trong các dự án đầu tiên.</li>
                    </ul>
                </li>
                <li>Chương 3: Chuẩn bị dữ liệu cho mô hình
                    <ul>
                        <li>Hướng dẫn cách thu thập và tạo bộ dữ liệu phù hợp với các bài toán thực tiễn.</li>
                        <li>Sử dụng các công cụ hỗ trợ gán nhãn và định dạng dữ liệu cho YOLO.</li>
                        <li>Tìm hiểu các tiêu chuẩn về dữ liệu trong quá trình huấn luyện mô hình.</li>
                    </ul>
                </li>
                <li>Chương 4: Huấn luyện mô hình YOLO với dữ liệu tùy chỉnh
                    <ul>
                        <li>Thiết lập môi trường huấn luyện và cấu hình tham số cho mô hình.</li>
                        <li>Áp dụng dữ liệu tự tạo vào quá trình huấn luyện.</li>
                        <li>Đánh giá và cải thiện hiệu suất của mô hình qua các chỉ số tiêu chuẩn.</li>
                    </ul>
                </li>
                <li>Chương 5: Xây dựng ứng dụng thực tế với YOLO
                    <ul>
                        <li>Tích hợp YOLO vào ứng dụng giao diện đồ họa với PyQt.</li>
                        <li>Xây dựng ứng dụng web cơ bản để triển khai và thử nghiệm mô hình.</li>
                        <li>Đưa mô hình vào thực tế để giải quyết các bài toán cụ thể.</li>
                    </ul>
                </li>
            </ul>
            
            <h3>Sau khi kết thúc khóa học, học viên sẽ:</h3>
            <ul>
                <li> Nắm bắt được một thuật toán quan trọng trong lĩnh vực Thị giác máy tính.</li>
                <li> Được trang bị kĩ năng cần thiết để phát triển các ứng dụng AI tiên tiến.</li>
                <li> Tự tạo được ứng dụng AI đầu tiên của mình.</li>
            </ul>
            <p style="font-weight: bold; font-size: 18px; color: red; background-color: #f9f9f9; padding: 10px; border-radius: 5px;">
                Đây là cơ hội để bạn trở thành một chuyên gia trong lĩnh vực AI mạnh mẽ, hãy mua ngay máy bộ ROSA AI để sỡ hữu khóa học này!
            </p>
        </section>
    </div>

   
<?php require "../footer.php" ;?>