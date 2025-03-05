

<?php
// Bật hiển thị lỗi để debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Bao gồm tệp kết nối cơ sở dữ liệu
include('..admin_copy/config/config.php');

// Kiểm tra nếu `link` được truyền qua URL
if (!isset($_GET['link']) || empty($_GET['link'])) {
    die("Không tìm thấy link bài viết.");
}

// Lấy link bài viết từ URL và xử lý để tránh lỗi SQL Injection
$article_link = mysqli_real_escape_string($mysqli, $_GET['link']); 

// Truy vấn bài viết chính
$sql_article = "SELECT * FROM article WHERE article_link = '$article_link' LIMIT 1";
$query_article = mysqli_query($mysqli, $sql_article);

// Kiểm tra nếu xảy ra lỗi truy vấn SQL
if (!$query_article) {
    die("Lỗi truy vấn SQL: " . mysqli_error($mysqli));
}

// Kiểm tra nếu không tìm thấy bài viết
if (mysqli_num_rows($query_article) === 0) {
    die("Bài viết không tồn tại hoặc đã bị xóa.");
}

// Lấy dữ liệu bài viết
$article = mysqli_fetch_assoc($query_article);

// Truy vấn danh sách "Bài viết khác" (ngoại trừ bài viết hiện tại)
$sql_other_articles = "SELECT * FROM article WHERE article_link != '$article_link' ORDER BY article_date DESC LIMIT 5";
$query_other_articles = mysqli_query($mysqli, $sql_other_articles);
?>

<section class="article">
    <div class="container">
        <div class="article__content">
            <h1><?= htmlspecialchars($article['article_title']); ?></h1>
            <div class="article-info">
                <span><?= htmlspecialchars($article['article_date']); ?></span>
                <span><?= htmlspecialchars($article['article_author']); ?></span>
            </div>
            <div class="article__context"><?= htmlspecialchars_decode($article['article_content']); ?></div> 
            <div class="article__summary"><?= htmlspecialchars_decode($article['article_summary']); ?></div>
            
            <div class="article__tag">
                <strong>Thẻ: </strong> 
                <?php
                    $tabs = explode(',', $article['article_tab']);
                    foreach ($tabs as $tab) {
                        $tab = trim($tab);
                        if (!empty($tab)) {
                            echo '<a href="/admin_post/tintuc/tag/' . urlencode($tab) . '" class="article_link">' . htmlspecialchars($tab) . '</a>';
                        }
                    }
                ?>
            </div>
        </div>

        <!-- BÀI VIẾT KHÁC -->
        <section class="related-articles">
            <h2>Bài viết khác</h2>
            <ul>
                <?php while ($other_article = mysqli_fetch_assoc($query_other_articles)) : ?>
                    <li>
                        <a href="tintuc/<?= htmlspecialchars($featuredNews['article_link']); ?>">
                            <img src="<?= htmlspecialchars($other_article['article_image']); ?>" alt="<?= htmlspecialchars($other_article['article_title']); ?>">
                            <div>
                                <h3><?= htmlspecialchars($other_article['article_title']); ?></h3>
                                <p>Cập nhật ngày <?= htmlspecialchars($other_article['article_date']); ?></p>
                            </div>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    </div>
</section>

<style>
/* CSS styles */

body {
    font-family: 'Arial', sans-serif;
    line-height: 1.8;
    color: #333;
    background: #f9f9f9;
    margin: 0;
    font-size: 18px;
}

h1 {
    font-size: 40px;
}

.article-info {
    display: flex;
    gap: 10px;
    align-items: center;
}

.article {
    padding: 20px 0;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    border-radius: 8px;
}

.container {
    width: 90%;
    margin: 0 auto;
}

.article__content {
    padding: 40px 10%;
    background: #fff;
    border-radius: 8px;
    margin: 30px auto;
    max-width: 1200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    line-height: 2;
}

.article__content h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #222;
}

.article__context {
    font-size: 1.2rem;
    line-height: 2;
    color: #444;
    margin-bottom: 20px;
    text-align: justify;
}

.article__tag {
    margin-top: 10px;
}

.article__tag strong {
    font-size: 17px;
    color: #333;
    margin-right: 5px;
}

.article__tag a {
    display: inline-block;
    background: #f5f5f5;
    color: #222;
    padding: 4px 19px;
    border-radius: 8px;
    font-size: 14px;
    margin-right: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.article__tag a:hover {
    background-color: rgb(223, 6, 45);
    color: #FFFFFF;
}

/* Bài viết khác */
.related-articles {
    margin-top: 30px;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.related-articles h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

.related-articles ul {
    list-style: none;
    padding: 0;
}

.related-articles li {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.related-articles img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 15px;
}

.related-articles h3 {
    font-size: 18px;
    color: #222;
}

.related-articles p {
    font-size: 14px;
    color: #777;
}

@media screen and (max-width: 600px) {
    .article__content h1 {
        font-size: 2rem;
    }

    .article__context {
        font-size: 1rem;
    }

    .related-articles img {
        width: 60px;
        height: 60px;
    }

    .related-articles h3 {
        font-size: 16px;
    }
}
</style>

