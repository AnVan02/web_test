<title>Tin Tức</title>
<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'database';

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Lấy danh sách bài viết
    $sql = "SELECT * FROM article WHERE article_status = 1 ORDER BY article_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $news = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $news = [];
    }

    // Lấy bài viết nổi bật
    $sqlFeatured = "SELECT * FROM article WHERE article_status = 1 ORDER BY article_date DESC LIMIT 1";
    $resultFeatured = $conn->query($sqlFeatured);

    if ($resultFeatured->num_rows > 0) {
        $featuredNews = $resultFeatured->fetch_assoc();
    } else {
        $featuredNews = null;
    }

    // Lấy trang hiện tại từ URL
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Số bài viết mỗi trang
    $limit = ($page == 1) ? 4 : 6;

    // Tính toán vị trí bắt đầu
    $start = ($page - 1) * $limit;

    // Tính tổng số bài viết và trang
    $totalItems = count($news);
    $totalPages = ceil($totalItems / $limit);

    // Lấy danh sách bài viết cho trang hiện tại
    $currentPageItems = array_slice($news, $start, $limit);
?>

<div class="featured-news">
    <h1>Tin tức nổi bật</h1>
    <?php if ($featuredNews): ?>
        <div class="news-item">
            <div class="news-image">
                <img src="<?= htmlspecialchars($featuredNews['article_image']); ?>" alt="Featured Image">
            </div>
            <div class="news-content">
                <h2>
                    <a href="article.php?id=<?= htmlspecialchars($featuredNews['article_id']); ?>">
                        <?= htmlspecialchars($featuredNews['article_title']); ?>
                    </a>
                </h2>
                <small>Ngày: <?= htmlspecialchars($featuredNews['article_date']); ?></small>
                <small>Người viết: <?= htmlspecialchars($featuredNews['article_author']); ?></small>
                <p class="description">
                    <?=$featuredNews['article_content']; ?>
                </p>
            </div>
        </div>
    <?php else: ?>
        <p>Không có bài viết nổi bật.</p>
    <?php endif; ?>
</div>

<div class="news-container">
    <?php foreach ($currentPageItems as $item): ?>
        <div class="news-item">
            <div class="news-image">
                <img src="admin_copy/modules/blog/upload<?= htmlspecialchars($item['article_image']); ?>" alt="Image">
            </div>
            <div class="news-content">
                <h2>
                    <a href="article.php?id=<?= htmlspecialchars($item['article_id']); ?>">
                        <?= htmlspecialchars($item['article_title']); ?>
                    </a>
                </h2>
                <small>Ngày: <?= htmlspecialchars($item['article_date']); ?></small>
                <small>Người viết: <?= htmlspecialchars($item['article_author']); ?></small>
                <p class="description">
                    <?=$featuredNews['article_content']; ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i; ?>" <?= $i == $page ? "class='active'" : ""; ?>><?= $i; ?></a>
    <?php endfor; ?>
</div>

<?php $conn->close(); ?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background: #f7f7f7;
        line-height: 1.6;
        color: #333;
        margin: 0;
        padding: 0;
    }

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
        width: 100%;
        height: 100%;
        object-fit: cover;
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
        border-radius: 10px;
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
    }

    .news-content {
        flex: 1;
        padding: 15px;
    }

    .news-content .title a {
        font-size: 16px;
        color: #2d3436;
        text-decoration: none;
        transition: color 0.3s ease;
    }

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

    .pagination a.active {
        background-color: #6c5ce7;
        color: white;
        border: 1px solid #6c5ce7;
    }
</style>