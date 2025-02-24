<title>(CES 2025) Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super</title>
<?php
function convertTitleToFileName($title) {
    // Thay thế các ký tự tiếng Việt có dấu thành không dấu
    $title = strtr($title, [
        'à'=>'a','á'=>'a','ạ'=>'a','ả'=>'a','ã'=>'a',
        'â'=>'a','ầ'=>'a','ấ'=>'a','ậ'=>'a','ẩ'=>'a','ẫ'=>'a',
        'ă'=>'a','ằ'=>'a','ắ'=>'a','ặ'=>'a','ẳ'=>'a','ẵ'=>'a',
        'è'=>'e','é'=>'e','ẹ'=>'e','ẻ'=>'e','ẽ'=>'e',
        'ê'=>'e','ề'=>'e','ế'=>'e','ệ'=>'e','ể'=>'e','ễ'=>'e',
        'ì'=>'i','í'=>'i','ị'=>'i','ỉ'=>'i','ĩ'=>'i',
        'ò'=>'o','ó'=>'o','ọ'=>'o','ỏ'=>'o','õ'=>'o',
        'ô'=>'o','ồ'=>'o','ố'=>'o','ộ'=>'o','ổ'=>'o','ỗ'=>'o',
        'ơ'=>'o','ờ'=>'o','ớ'=>'o','ợ'=>'o','ở'=>'o','ỡ'=>'o',
        'ù'=>'u','ú'=>'u','ụ'=>'u','ủ'=>'u','ũ'=>'u',
        'ư'=>'u','ừ'=>'u','ứ'=>'u','ự'=>'u','ử'=>'u','ữ'=>'u',
        'ỳ'=>'y','ý'=>'y','ỵ'=>'y','ỷ'=>'y','ỹ'=>'y',
        'đ'=>'d',
        'À'=>'A','Á'=>'A','Ạ'=>'A','Ả'=>'A','Ã'=>'A',
        'Â'=>'A','Ầ'=>'A','Ấ'=>'A','Ậ'=>'A','Ẩ'=>'A','Ẫ'=>'A',
        'Ă'=>'A','Ằ'=>'A','Ắ'=>'A','Ặ'=>'A','Ẳ'=>'A','Ẵ'=>'A',
        'È'=>'E','É'=>'E','Ẹ'=>'E','Ẻ'=>'E','Ẽ'=>'E',
        'Ê'=>'E','Ề'=>'E','Ế'=>'E','Ệ'=>'E','Ể'=>'E','Ễ'=>'E',
        'Ì'=>'I','Í'=>'I','Ị'=>'I','Ỉ'=>'I','Ĩ'=>'I',
        'Ò'=>'O','Ó'=>'O','Ọ'=>'O','Ỏ'=>'O','Õ'=>'O',
        'Ô'=>'O','Ồ'=>'O','Ố'=>'O','Ộ'=>'O','Ổ'=>'O','Ỗ'=>'O',
        'Ơ'=>'O','Ờ'=>'O','Ớ'=>'O','Ợ'=>'O','Ở'=>'O','Ỡ'=>'O',
        'Ù'=>'U','Ú'=>'U','Ụ'=>'U','Ủ'=>'U','Ũ'=>'U',
        'Ư'=>'U','Ừ'=>'U','Ứ'=>'U','Ự'=>'U','Ử'=>'U','Ữ'=>'U',
        'Ỳ'=>'Y','Ý'=>'Y','Ỵ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y',
        'Đ'=>'D'
    ]);

    // Chuyển sang chữ thường
    $title = strtolower($title);

    // Thay thế các ký tự không phải chữ hoặc số bằng dấu gạch ngang
    $title = preg_replace('/[^a-z0-9\s]+/u', '', $title);
    $title = preg_replace('/\s+/', '-', $title);

    return $title . '.php';
}

// Tiêu đề bài viết
$tieuDeBaiViet = "(CES 2025)Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super";

// Tên file mới
$tenFileMoi = convertTitleToFileName($tieuDeBaiViet);


// Đổi tên file
$tenFileCu = 'tintuc38.php';


?>

<?php require "../header.php" ?>
<section class="news-detail">
    <h1>(CES 2025) Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super</h1>
    <div class="meta">
        <span>Tác giả: Admin</span> | 
        <span>Ngày đăng: 10/01/2025</span>
    </div>
     <p>
        Palit Microsystems, một nhà lãnh đạo toàn cầu trong công nghệ đồ họa, đã ra mắt Pandora, máy tính AI đầu tiên của hãng được trang bị NVIDIA Jetson Orin NX Super. Có sẵn trong các cấu hình 8 GB và 16 GB, Pandora cung cấp lần lượt 117 và 157 AI TOPS, giúp đáp ứng nhu cầu về tính toán AI tại biên có hiệu suất cao. Với kích thước nhỏ gọn 123x145x66 mm và nặng chỉ 470 g, Pandora được thiết kế cho các môi trường hạn chế về không gian, nơi mà hiệu suất và hiệu quả là điều cần thiết. Hệ thống làm mát chủ động của nó đảm bảo hiệu suất nhiệt tối ưu, cho phép hoạt động ổn định trong các tác vụ đòi hỏi cao. Được xây dựng để xử lý các tải công việc AI phức tạp tại biên, Pandora nổi bật trong các ứng dụng như bán lẻ thông minh, giáo dục, robot, và AI tạo sinh, trở thành giải pháp linh hoạt cho nhiều ngành công nghiệp.     
     
    </p>
        <img src="/assets/upload/news/38a.jpg" alt="Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super">
    <p>
        Các tính năng của Pandora Pandora cung cấp khả năng kết nối toàn diện với nhiều tùy chọn I/O, bao gồm hai cổng Ethernet 1G, bốn cổng USB có chức năng OTG, giao diện HDMI 2.0 và khả năng nhập/xuất âm thanh, đảm bảo tích hợp liền mạch với các thiết bị ngoại vi cho các ứng dụng AI đa dạng. Được trang bị SSD 128 GB cài sẵn, Pandora có khả năng mở rộng tiên tiến với bốn khe M.2 hỗ trợ đồng thời SSD, Wi-Fi và các mô-đun 5G/LTE. Các tính năng như đầu vào MIPI, UART 14 chân bổ sung, và giao diện CAN bus tăng cường khả năng tương thích với robot, phương tiện tự hành và hệ thống công nghiệp, mang lại tính linh hoạt vượt trội.     
    </p>

    <p>
     Thiết kế của Pandora hỗ trợ dễ dàng tùy chỉnh với đế tháo rời, đơn giản hóa việc tích hợp các thành phần. Các nhà phát triển có thể tạo vỏ tùy chỉnh in 3D cho các dự án riêng biệt, làm cho Pandora trở nên lý tưởng cho các nguyên mẫu và ứng dụng chuyên biệt.
    
    </p>
       <img src="/assets/upload/news/38b.jpg" alt="Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super">
    <p>
        Ngoài ra, Pandora còn bao gồm phần mềm quản lý tích hợp cho việc kiểm soát thiết bị tập trung, cho phép giám sát thời gian thực, khắc phục sự cố và quản lý vận hành nhiều thiết bị, giảm thiểu thời gian chết và hợp lý hóa quy trình làm việc một cách hiệu quả.     
        
    </p>
    <b>Ứng dụng trong các ngành công nghiệp</b>

    <p>
        Bán lẻ thông minh: Tăng cường tương tác khách hàng Sử dụng Mô hình Thị giác-Ngôn ngữ (VLM) và AI tạo sinh, Pandora phân tích nhân khẩu học của khách hàng theo thời gian thực, giúp các nhà bán lẻ cung cấp quảng cáo cá nhân hóa qua bảng hiệu kỹ thuật số. Phương pháp này tối ưu hóa chiến lược tiếp thị đồng thời tăng cường sự tham gia của khách hàng, cung cấp giải pháp mở rộng cho các môi trường bán lẻ.    
    </p>
    <p>
        Giáo dục thông minh: Thúc đẩy học tập tương tác Pandora sử dụng nhận dạng đối tượng và Text-to-Speech (TTS) để cung cấp các công cụ giảng dạy tương tác thời gian thực. Nó nhận diện các vật phẩm do học sinh cầm và cung cấp phản hồi âm thanh, trong khi Retrieval-Augmented Generation (RAG) hỗ trợ hiểu văn bản, thúc đẩy các môi trường học tập tập trung vào STEM và toàn diện.    
    </p>
    <img src="/assets/upload/news/38c.jpg" alt="Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super">

    <p>
    Robot và Tự động hóa: Cho phép các ứng dụng AI tiên tiến Với nhiều tùy chọn I/O và tích hợp với nền tảng NVIDIA Isaac cùng ROS2, Pandora trở nên lý tưởng cho robot và tự động hóa. Các nhà phát triển có thể tăng cường các dây chuyền lắp ráp tự động, tự động hóa kho hàng và điều    
    </p>
        <p>#CES:2025 </p> 
        <p>#Palit</p>
        <P>#ROSA</P>
        <p><em>Nguồn: <a href="https://www.techpowerup.com/330852/palit-announces-pandora-a-compact-ai-computer-powered-by-nvidia-jetson-orin-nx-super">Palit Announces Pandora, a Compact AI Computer Powered by NVIDIA Jetson Orin NX Super</a></em></p>   
     

   
</section>

<style>
    /* Reset */
    body, h1, h2, p, ul, li, a, img {
    margin: 0;
    padding: 0;
    font-size:16px;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
    }

    body {
    font-family: 'Arial', sans-serif;
    line-height: 1.8;
    color: #333;
    background: #f9f9f9;
    margin: 0;
    }


    /* News Detail Section */
    .news-detail {
    padding: 110px 10%;
    background: #fff;
    border-radius: 8px;
    margin: 30px auto;
    max-width: 1200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .news-detail h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    color: #222;
    }

    .news-detail .meta {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 20px;
    }

    .news-detail img {
    width:90%;
    border-radius: 8px;
    margin-bottom: 20px;
    }

    .news-detail h2 {
    margin-top: 30px;
    font-size: 1.8rem;
    color: #ec4242;
    }

    .news-detail p {
    margin: 15px 0;
    line-height: 1.8;
    }
 

    .news-detail blockquote {
    margin: 30px 0;
    padding: 20px;
    font-style: italic;
    background: #f1f1f1;
    border-left: 4px solid #eb4747;
    }

</style>


<?php require "../footer.php" ?>