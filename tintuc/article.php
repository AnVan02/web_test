<?php
    // Bao gồm tệp kết nối
    include('admin_copy/config/config.php');

    // Kiểm tra nếu `id` được truyền qua URL
    if (!isset($_GET['id'])) {
        die("Không tìm thấy id của bài viết.");
    }

    $article_id = (int)$_GET['id'];

    // Truy vấn bài viết dựa trên `article_id`
    $sql_article = "SELECT * FROM article WHERE article_id = $article_id LIMIT 1";
    $query_article = mysqli_query($mysqli, $sql_article);

    if (!$query_article) {
        die("Lỗi truy vấn SQL: " . mysqli_error($mysqli));
    }

    // Kiểm tra nếu không tìm thấy bài viết
    if (mysqli_num_rows($query_article) === 0) {
        die("Bài viết không tồn tại hoặc đã bị xóa.");
    }

    $article = mysqli_fetch_assoc($query_article);

    // Truy vấn bình luận đã được duyệt
    $sql_article = "SELECT * FROM article WHERE article_id = $article_id AND article_status = 1 ORDER BY article_date DESC";
    $query_article = mysqli_query($mysqli, $sql_article);
    $article_total = mysqli_num_rows($query_article);
?>

<section class="article">
    <div class="container">
        <div class="article__content">
            <h1><?= htmlspecialchars($article['article_title']); ?></h1>
            <span><?= htmlspecialchars($article['article_date']); ?></span>
            <div class="article__context"><?= htmlspecialchars_decode($article['article_content']); ?></div>
            <div class="article__summary"><?= htmlspecialchars_decode($article['article_summary']); ?></div>
        </div>
    </div>
</section>

<style>

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

/* Article Section */
.article {
    padding: 20px 0;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    max-width: 800px;
    border-radius: 8px;
}

.container {
    width: 90%;
    margin: 0 auto;
}

/* Article Content */
.article__content {
    padding: 20px;
}

.article__content h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #222;
    /* text-align: center; */
}

.article__content span {
    display: block;
    font-size: 0.9rem;
    color: #777;
    margin-bottom: 20px;
    /* text-align: center; */
}

.article__context {
    font-size: 1rem;
    line-height: 1.8;
    color: #444;
    margin-bottom: 20px;
    text-align: justify;
}


/* Mobile Responsive */
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