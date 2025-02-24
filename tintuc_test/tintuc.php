<?php require "../header.php" ?>

<?php
// Bật hiển thị lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php
// Bao gồm tệp kết nối
include('../tintuc_test/admin/config/config.php');

// Kiểm tra nếu `link` được truyền qua URL
if (!isset($_GET['link']) || empty($_GET['link'])) {
    die("Không tìm thấy link bài viết.");
}

// Lấy link bài viết từ URL và xử lý để tránh lỗi SQL Injection
$article_link = mysqli_real_escape_string($mysqli, $_GET['link']); 

// Truy vấn bài viết dựa trên `article_link`
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
                        $tags = explode(',', $article['article_tag']);
                        foreach ($tags as $tag) {
                            $tag = trim($tag);
                            if (!empty($tag)) {
                                echo '<a href="../tintuc/tag/' . urlencode($tag) . '" class="article_link">' . htmlspecialchars($tag) . '</a>';
                            }
                        }
                    ?>
                </div>
        </div>
    </div>
</section>

<style>
/* CSS styles giữ nguyên */


body, h2, p, ul, li, a, img {
    font-family: Arial, sans-serif;
    line-height: 1.8;
    margin: 0;
    padding: 0;
    font-size:16px;
    list-style: none;
    text-decoration: none;
    box-sizing: border-box;
    /*background-color: #f9f9f9;*/
    color: #333;
}

 body {
     
    font-family: 'Arial', sans-serif;
    line-height: 1.8;
    color: #333;
    background: #f9f9f9;
    margin: 0;
    }
    
h1{
    font-size: 40px;
}

.article-info {
    display: flex;
    text-indent: 5px;
    align-items: center;
}
.article_date {
    color: blue;
}

.article_author {
    color: green;
}
.article {
    padding: 20px 0;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    /*max-width: 50%;*/
    border-radius: 8px;
    
}
.container {
    width: 90%;
    margin: 0 auto;
}
.article__content {
    padding: 60px 10%;
    background: #fff;
    border-radius: 8px;
    margin: 30px auto;
    max-width: 1200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

.article__content h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #222;
}
.article__content span {
    display: block;
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 20px;
}
.article__context {
    font-size: 1rem;
    line-height: 1.8;
    color: #444;
    margin-bottom: 20px;
    text-align: justify;
}
/*css tab*/
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
    background-color: rgb(223 6 45 / var(--tw-bg-opacity, 1));
    color: #FFFFFF; /* Màu chữ trắng */
}





@media screen and (max-width: 600px) {
    .article__content h1 {
        font-size: 1.5rem;
    }
    .article__content span {
        font-size: 0.8rem;
    }
    .article__context,
    .article__summary {
        font-size: 0.9rem;
    }
}




</style>



<?php require "../footer.php" ?>

