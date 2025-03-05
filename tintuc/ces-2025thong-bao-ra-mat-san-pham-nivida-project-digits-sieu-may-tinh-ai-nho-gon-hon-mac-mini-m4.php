<title>(CES 2025) Thông Báo Ra Mắt Sản Phẩm: NIVIDA Project DIGITS – Siêu Máy Tính AI Nhỏ Gọn Hơn Mac Mini M4</title>
<?php
// Hàm chuyển đổi tiêu đề thành tên file
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
$tieuDeBaiViet = "(CES 2025)Thông Báo Ra Mắt Sản Phẩm: NIVIDA Project DIGITS – Siêu Máy Tính AI Nhỏ Gọn Hơn Mac Mini M4";

// Tên file mới
$tenFileMoi = convertTitleToFileName($tieuDeBaiViet);

// Đổi tên file
$tenFileCu = 'thong-bao-ra-mat-san-pham-nivida-project-digits-sieu-may-tinh-ai-nho-gon-hon-mac-mini-m4.php';

// if (file_exists($tenFileCu)) {
//     if (rename($tenFileCu, $tenFileMoi)) {
//         echo "Đổi tên file thành công: $tenFileMoi";
//     } else {
//         echo "Không thể đổi tên file.";
//     }
// } else {
//     echo "File cũ không tồn tại.";
// }
?>

<?php require "../header.php" ?>
<section class="news-detail">
    <h1>(CES 2025) Thông Báo Ra Mắt Sản Phẩm: NIVIDA Project DIGITS – Siêu Máy Tính AI Nhỏ Gọn Hơn Mac Mini M4</h1>
    <div class="meta">
        <span>Tác giả: Admin</span> | 
        <span>Ngày đăng: 08/01/2025</span>
    </div>
 
    <p>Chúng tôi hân hạnh giới thiệu sản phẩm mới nhất từ NVIDIA, Project DIGITS, một siêu máy tính AI nhỏ gọn nhưng mạnh mẽ. Với kích thước nhỏ nhắn hơn Mac Mini M4 của Apple, Project DIGITS được thiết kế dành cho các nhà nghiên cứu, những người yêu thích AI, và các doanh nghiệp nhỏ mong muốn khảm phá các dự án AI cá nhân tại nhà.</p>

    <img src="/assets/upload/news/n.jpg" alt="Máy Tính Đồng bộ ">

    
      <h2>Công Suất Vượt Trội</h2>
      <p>Với sức mạnh đáng kinh ngạc, Project DIGITS được trang bị chip GB10 Grace BlackWell mới nhất, kết hợp GPU NVIDIA Blackwell và các lõi CUDA thế hệ mới, cùng với Lõi Tensor thế hệ thứ năm. CPU NVIDIA Grace bên trong bao gồm 20 lõi tiết kiệm năng lượng, được MediaTek thiết kế dựa trên nền tảng ARM, mang đến hiệu suất cao và tính ổn định tuyệt vời.</p>
      <img src="/assets/upload/news/a.jpg" alt="Máy Tính Đồng bộ ">

   
      <h2>Hiệu Năng Lớn</h2>
      <p>Mỗi Project DIGITS được trang bị bộ nhớ thống nhất 128GB và dung lượng lưu trữ SSD NVMe lên đến 4TB. Nó có thể chạy các mô hình ngôn ngữ lớn lên đến 200 tỷ tham số. Đối với những nhu cầu cao hơn, hai Project DIGITS có thể kết nối với nhau để đạt tới 405 tỷ tham số.</p>
      <img src="/assets/upload/news/b.jpg" alt="Máy Tính Đồng bộ ">


      <h2>Tiết Kiệm Năng Lượng</h2>
      <p>Khác với các siêu máy tính trước đây, Project DIGITS sử dụng nguồn điện gia đình bình thường, giúp giảm thiểu đáng kể chi phí và tiết kiệm năng lượng mà vẫn đảm bảo hiệu suất vượt trội.</p>
      <img src="/assets/upload/news/c.jpg" alt="Máy Tính Đồng bộ ">

      <h2>Hệ Điều Hành Mạnh Mẽ</h2>
      <p>Project DIGITS chạy hệ điều hành NVIDIA DGX dựa trên Linux, kết nối với NVIDIA DGX Cloud, mang đến môi trường phát triển AI tối ưu cho các nhà nghiên cứu và doanh nghiệp nhỏ.</p>
      <img src="/assets/upload/news/d.jpg" alt="Máy Tính Đồng bộ ">

      <h2>Phát Triển AI Cá Nhân và Doanh Nghiệp Nhỏ</h2>
      <p>Project DIGITS đáp ứng nhu cầu xây dựng các trợ lý ảo AI cá nhân hoặc dành cho các tổ chức nhỏ như nhà thờ, chùa, trường học, và công ty. Việc triển khai các dự án AI trở nên dễ dàng và hiệu quả hơn bao giờ hết.</p>

      <h2>Giới Thiệu ROSA AI</h2>
      <p>Song song với Project DIGITS, chúng tôi xin giới thiệu Máy bộ ROSA AI, một giải pháp toàn diện cho học tập và phát triển AI. ROSA AI cung cấp các công cụ cài sẵn và cấu hình máy tính đồng bộ mạnh mẽ, đáp ứng mọi nhu cầu lập trình và nghiên cứu AI của bạn.</p>
    
        <div class="tdb-block-inner">
          <ul class="tdb-tags" style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center;">
            <li style="margin-right: 15px; font-weight: bold; font-size: 16px; color: #333;">
              <span>Tags:</span>
            </li>
            <li style="margin-right: 10px;">
              <a href="" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#CES2025</a>
            </li>
            
             <li style="margin-right: 10px;">
              <a href="" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#NIVIDA</a>
            </li>
            
            <li style="margin-right: 10px;">
              <a href="https://rosacomputer.vn/" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#ROSA</a>
            </li>
            <li style="margin-right: 10px;">
              <a href="https://rosacomputer.vn/product.php" style="text-decoration: none; font-size: 14px; color: #FF0000; padding: 5px 5px">#MAYBO</a>
            </li>
          </ul>
        </div>


</section>

<style>
    /* Reset */
    body, h1, h2, p, ul, li, a, img {
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
    font-size: 17px;
    }

    body {
    font-family: "SF Pro Display", 'Arial', sans-serif;
    line-height: 1.8;
    color: #333;
    background: #f9f9f9;
    margin: 0;
    }
    #banner video {
    width: 100%; /* Chiều rộng video */
    height: 100%; /* Chiều cao video */
    object-fit: cover; /* Đảm bảo video phủ kín khung chứa */
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
    width: 100%;
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