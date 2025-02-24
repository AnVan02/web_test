<title>Tin Tức</title>
<!-- ket noi sql -->
<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="database";

    $conn= new mysqli ($host, $username ,$password,$database);

    // kiem tra ket noi

    if($conn->connect_errno){
        die("ket noi that bai: " .$conn ->connect_error);
    } 

    // láy trang hiện tại từ URL (mặt dịnh la trang 1 nếu không có tham so page)
    $page = insset ($_get ['page']) ? (int) $_get['page'] :1; 
    $limit =8; // số bài viết mỗi trang 
    $start = ($page - 1)* $limit;

    // lấy tông só bài viết 
    $sql_total ="SELECT COUNT (*) as total FROM news";
    $result_total = $conn ->query ($sql_total);
    $totalItems = $result_total->fetch_assoc()['total'];
    $totalPages = ceil($totalItems / $limit);

    //lay danh sach bai viet cho trang hien tai
    $sql = "SELECT * from news ORDER BY date DESC LIMIT $start , $limit";
    $result = $conn -> query($sql);

    // doc du lieu vao mang 
    $news = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
    }

    // Lấy tin tức nổi bật (bài viết đầu tiên trong danh sách)
    $featuredNews = $news[0] ?? null;

?>

<?php require "../header.php"; ?>

<!-- <?php require "news.php"; ?> -->

<?php
    // Lấy trang hiện tại từ URL (mặc định là trang 1 nếu không có tham số `page`)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Khởi tạo biến $page

    // Tin tức nổi bật (Featured News)
    $featuredNews = [
        'title' => 'Máy Tính Đồng Bộ là gì ? Máy Tính Đồng Bộ ROSA - Giải Pháp Hoàn Hảo Cho Hiệu Suất Và Độ Bền ',
        'image' => '../assets/upload/news/case_cpc_right_.jpg', 
        //  'date' => '18/12/2024',
        'author' => 'Admin', 
        'description' =>'Máy tính đồng bộ là loại máy tính đã được lắp ráp sẵn bởi các nhà sản xuất uy tín như Dell, HP,hoặc do các thương hiệu uy tín tiến hành lắp ráp . Các linh kiện trong máy đều là những hãng có thương hiệu có uy tín hàng đầu trên thị trường và đã được kiểm tra nghiêm ngặt về độ tương thích. Do đó, máy tính đồng bộ thường rất ổn định và bên bỉ....',
        'link' => 'may-tinh-dong-bo-la-gi.php',
        'author' => 'Admin', 
    ];

    // Cấu hình số bài viết mỗi trang
    // $limit = ($page == 1) ? 4 : 6; // Nếu trang là 1 thì hiển thị 4 bài, các trang còn lại hiển thị 6 bài
    $limit = 8;

    // Tính toán vị trí bắt đầu
    $start = ($page - 1) * $limit;

    // Tính tổng số bài viết và trang
    $totalItems = count($news);
    $totalPages = ceil($totalItems / $limit);

    // Lấy danh sách bài viết cho trang hiện tại
    $currentPageItems = array_slice($news, $start, $limit);


?>

<!-- Tin tức nổi bật -->
<?php if ($page == 1): ?> <!-- Kiểm tra nếu đang ở trang 1 --><
    <div class="featured-news">
        <h1 >Tin tức nổi bật</h1>
        <div class="news-item">
            <?php if (isset($featuredNews['image']) && file_exists($featuredNews['image'])): ?>
                <div class="news-image"><img src="<?= htmlspecialchars($featuredNews['image']); ?>" alt="Image"></div>
            <?php else: ?>
                <div class="news-image"><img src="default-image.jpg" alt="No Image"></div>
            <?php endif; ?>
            <div class="news-content">
                <h2><a href="<?= htmlspecialchars($featuredNews['link']); ?>"><?= htmlspecialchars($featuredNews['title']); ?></a></h2>
                <small><?= htmlspecialchars($featuredNews['date']); ?></small>
                <small>Người viết: <?= htmlspecialchars($featuredNews['author']); ?></small> <!-- Thêm dòng này -->
                <p class='description'><?= htmlspecialchars($featuredNews['description']); ?></p>

            </div>

        </div>
    </div>
<?php endif; ?> <!-- Kết thúc điều kiện kiểm tra trang 1 -->

<!-- Tin tức thường xuyên -->
<div class="news-container">
    <?php
    if (empty($currentPageItems)) {
        echo "<p>Không có bài viết nào để hiển thị.</p>";
    } else {
        foreach ($currentPageItems as $item) {
            echo "<div class='news-item'>";
            
            if (isset($item['image']) && file_exists($item['image'])) {
                echo "<div class='news-image'><img src='" . htmlspecialchars($item['image']) . "' alt='Image'></div>";
            } else {
                echo "<div class='news-image'><img src='default-image.jpg' alt='No Image'></div>";
            }
            
            echo "<div class='news-content'>";
            echo "<h2><a href='" . htmlspecialchars($item['link']) . "'>" . htmlspecialchars($item['title']) . "</a></h2>";
            echo "<small>" . htmlspecialchars($item['date']) . "</small>";
            echo "<p class='description'>" . htmlspecialchars($item['description']) . "</p>";
            echo "</div>"; // Close .news-content
            echo "</div>"; // Close .news-item
        }
    }
    ?>

</div>
<!-- thanh phân trang  -->
<div class="pagination">
    <?php
    for ($i = 1; $i <= $totalPages; $i++) {
        $active = ($i == $page) ? "class='active'" : "";
        echo "<a href='?page=$i' $active>$i</a>";
    }
    ?>
</div>



<style>
body {
    font-family: 'Arial', sans-serif;
    background: #f7f7f7;
    line-height: 1.6;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Featured news section */
.featured-news {
    padding: 117px 15%;
    margin-bottom: 50px;
    background-color: #f5f5f5;
    border-radius: 16px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.featured-news h1 {
    font-size: 3em;
    color: #1769ff;
    margin-bottom: 20px;
    text-align: center;
}

.featured-news .news-item {
    display: flex;
    flex-direction: row;
    background: #ffffff;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    height: 350px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.featured-news .news-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
}

.featured-news .news-image {
    flex: 0 0 50%;
}

.featured-news .news-image img {
    width: 59%;
    height: 95%;
    object-fit: cover;
    border-radius: 0;
}

.featured-news .news-content {
    flex: 1;
    padding: 1px;
    background-color: #ffffff;
}

.featured-news .news-content h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
    color: #2d3436;
    font-weight: 600;
}

.featured-news .news-content .date {
    font-size: 1em;
    color: #7f8c8d;
    margin-bottom: 10px;
}

.featured-news .news-content .description {
    font-size: 1em;
    color: #2d3436;
    line-height: 1.6;
}

/* Regular news section */
.news-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    padding: 130px 4%;
}

.news-item {
  display: flex;
  flex-direction: row;
  background: #ffffff;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 10px; /* Thêm bo tròn cho thẻ .news-item */
}

.news-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.news-image {
    flex: 0 0 40%;
}

.news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0;
}

.news-content {
    flex: 1;
    padding: 15px;
}

.news-content .title {
    font-size: 1.2em;
    font-weight: bold;
    color: #2d3436;
    margin-bottom: 8px;
    
}

.news-content .title a {
    color: #2d3436;
    text-decoration: none;
    transition: color 0.3s ease;
}

.news-content .title a:hover {
    color: #6c5ce7;
}

.news-content .date {
    font-size: 0.9em;
    color: #7f8c8d;
    margin-bottom: 8px;
}

.news-content .description {
    font-size: 0.95em;
    color: #2d3436;
    line-height: 1.6;
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
    /* Featured news section */
    .featured-news {
        padding: 113px 5%;
    }

    .featured-news .news-item {
        flex-direction: column;
        height: auto;
    }

    .featured-news .news-image img {
        width:89%;
        height: auto;
    }

    /* Regular news section */
    .news-container {
        grid-template-columns: 1fr;
        /* padding: 0px; */
    }

    .news-item {
        flex-direction: column;
        height: auto;
    }

    .news-image img {
        height: 250px;
        object-fit: cover;
    }

    .news-content .title {
        font-size: 1.1em; /* Slightly smaller font on mobile */
    }

    .news-content .description {
        font-size: 0.9em;
    }

    /* Text links and font size adjustments */
    .news-content .title a {
        font-size: 16px;
        color: #0984e3;
    }
}

@media (max-width: 480px) {
    /* Adjustments for very small screens like phones in portrait mode */
    body {
        font-size: 14px;
    }

    .featured-news h3 {
        font-size: 1.5em;
    }

    .news-item .title {
        font-size: 1.1em;
    }
}

/* Thanh phân trang */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 30px 0;
}

.pagination a {
    color: #333;
    font-size: 1rem;
    padding: 8px 12px;
    margin: 0 4px;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: all 0.3s ease;
}
.a, h2{
    color :#000000;
    font-size: 20px;
}
.pagination a.active {
    background-color: #6c5ce7;
    color: white;
    border: 1px solid #6c5ce7;
}

.pagination a:hover {
    background-color: #f1f1f1;
    color: #333;
    border: 1px solid #6c5ce7;
}


</style>

<?php require "../footer.php"; ?>