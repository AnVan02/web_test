<title>ROSA Computer AI</title>

<?php
// Hàm chuyển đổi tiêu đề thành tên file
function convertTitleToFileName($title) {
    // Thay thế các ký tự viết hoa tiếng Việt bằng ký tự thường
    $title = strtr($title, [
        'À' => 'à', 'Á' => 'á', 'Ạ' => 'ạ', 'Ả' => 'ả', 'Ã' => 'ã',
        'Â' => 'â', 'Ầ' => 'ầ', 'Ấ' => 'ấ', 'Ậ' => 'ậ', 'Ẩ' => 'ẩ', 'Ẫ' => 'ẫ',
        'Ă' => 'ă', 'Ằ' => 'ằ', 'Ắ' => 'ắ', 'Ặ' => 'ặ', 'Ẳ' => 'ẳ', 'Ẵ' => 'ẵ',
        'È' => 'è', 'É' => 'é', 'Ẹ' => 'ẹ', 'Ẻ' => 'ẻ', 'Ẽ' => 'ẽ',
        'Ê' => 'ê', 'Ề' => 'ề', 'Ế' => 'ế', 'Ệ' => 'ệ', 'Ể' => 'ể', 'Ễ' => 'ễ',
        'Ì' => 'ì', 'Í' => 'í', 'Ị' => 'ị', 'Ỉ' => 'ỉ', 'Ĩ' => 'ĩ',
        'Ò' => 'ò', 'Ó' => 'ó', 'Ọ' => 'ọ', 'Ỏ' => 'ỏ', 'Õ' => 'õ',
        'Ô' => 'ô', 'Ồ' => 'ồ', 'Ố' => 'ố', 'Ộ' => 'ộ', 'Ổ' => 'ổ', 'Ỗ' => 'ỗ',
        'Ơ' => 'ơ', 'Ờ' => 'ờ', 'Ớ' => 'ớ', 'Ợ' => 'ợ', 'Ở' => 'ở', 'Ỡ' => 'ỡ',
        'Ù' => 'ù', 'Ú' => 'ú', 'Ụ' => 'ụ', 'Ủ' => 'ủ', 'Ũ' => 'ũ',
        'Ư' => 'ư', 'Ừ' => 'ừ', 'Ứ' => 'ứ', 'Ự' => 'ự', 'Ử' => 'ử', 'Ữ' => 'ữ',
        'Ỳ' => 'ỳ', 'Ý' => 'ý', 'Ỵ' => 'ỵ', 'Ỷ' => 'ỷ', 'Ỹ' => 'ỹ',
        'Đ' => 'đ',
    ]);

    // Chuyển sang chữ thường với các ký tự ASCII còn lại
    $title = strtolower($title);

    // Thay thế các ký tự không phải chữ hoặc số bằng dấu gạch ngang
    $title = preg_replace('/[^a-z0-9\s]+/u', '', $title);
    $title = preg_replace('/\s+/', '-', $title);

    return $title . '.php';
}

// Tiêu đề bài viết
$tieuDeBaiViet = "ROSA Computer AI";

// Tên file mới
$tenFileMoi = convertTitleToFileName($tieuDeBaiViet);

// Đổi tên file
$tenFileCu = 'tintuc1.php';

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



<?php require "../header.php";?>
  <style>
    /* Reset */
        body, h1, h2, p, ul, li, a, img {
        margin: 0;
        padding: 0;
        font-size: 1rem;
        list-style: none;
        text-decoration: none;
        box-sizing: border-box;
        }

        body {
        font-family: 'Arial', sans-serif;
        line-height: 1.6;
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
        width: 100%;
        border-radius: 8px;
        margin-bottom: 20px;
        }

        .news-detail h2 {
        margin-top: 30px;
        margin-bottom: 20px;
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
</head>
<body>
  <section class="news-detail">
    <h3>ROSA Computer AI - Giải Pháp Toàn Diện Cho Nhà Phát Triển AI</h1>
    <div class="meta">
      <span>Tác giả: Admin</span> | 
      <span>Ngày đăng: 10/12/2024</span>
    </div>
    <img src="/assets/upload/news/1.jpg" alt="ROSA Computer AI">
    <p>
      **ROSA Computer AI** là dòng sản phẩm được thiết kế đặc biệt nhằm hỗ trợ toàn diện cho các nhà lập trình và phát triển trí tuệ nhân tạo (AI). Với các tính năng vượt trội và cấu hình mạnh mẽ, **ROSA AI PC** là sự lựa chọn hoàn hảo cho những ai mong muốn khai phá tiềm năng và đẩy mạnh sự nghiên cứu trong lĩnh vực AI.
    </p>
    <h2>Hiệu Năng Vượt Trội</h2>
    <p>
      **ROSA AI PC** được trang bị cấu hình mạnh mẽ với vi xử lý trung tâm (CPU) độc nhất, bộ nhớ RAM lớn, và các card đồ hoạ (GPU) cao cấp để đáp ứng các nhu cầu phức tạp của việc huấn luyện mô hình AI và phân tích dữ liệu lượng lớn. Khả năng xử lý nhanh chóng giúp tăng hiệu suất và tiết kiệm thời gian, cho phép người dùng tập trung hơn vào các nâng cao trong nghiên cứu AI.
    </p>
    <h2>Phần Mềm Và Khóa Học Tích Hợp</h2>
    <p>
      Ngoài cấu hình mạnh mẽ, dòng sản phẩm còn cung cấp các khóa học **Python cơ bản và nâng cao**, giúp người dùng tối ưu hóa việc đào tạo AI hoặc phát triển phần mềm liên quan. **ROSA AI PC** cũng cung cấp hỗ trợ kỹ thuật toàn diện cho người dùng.
    </p>
    <h2>Thiết Kế Tiện Dụng Và Thân Thiện</h2>
    <p>
      Sản phẩm không chỉ mạnh mẽ mà còn được thiết kế hiện đại với khả năng nâng cấp phần cứng dễ dàng, đáp ứng tốt các nhu cầu tương lai của người dùng.
    </p>
    <blockquote>
      "Hãy lựa chọn ROSA AI PC để khám phá tiềm năng và bước vào thời đại trí tuệ nhân tạo với công nghệ hàng đầu."
    </blockquote>
    <p>
      Với **ROSA AI PC**, các nhà phát triển có thể bắt đầu ngay với một hệ sinh thái sẵn sàng, đạt được thành tựu mới trong phát triển AI nhờ sự kết hợp hoàn hảo giữa công nghệ, hiệu năng và tiện lợi.
    </p>

    #ROSA
    #ROSAAI
    #MAYBOROSA
    
  </section>
<?php require "../footer.php";?>