<?php
include('admin_copy/config/config.php');


if (!isset($_GET['tab']) || empty($_GET['tab'])) {
    die("Vui lòng chọn một tab.");
}

$tab = mysqli_real_escape_string($mysqli, $_GET['tab']);

// Truy vấn bài viết có chứa tab này (FIND_IN_SET cho danh sách tab dạng "tab1,tab2,tab3")
$sql = "SELECT article_title, article_link, LEFT(article_content, 150) AS article_excerpt FROM article WHERE FIND_IN_SET('$tab', article_tab) > 0 ORDER BY article_date DESC";
$query = mysqli_query($mysqli, $sql);

if (!$query) {
    die("Lỗi truy vấn SQL: " . mysqli_error($mysqli));
}

?>
    <title>Bài viết thuộc tab: <?= htmlspecialchars($tab); ?></title>
   
<div class="container">
    <section class="article-list">
        <h1>Bài viết về: <?= htmlspecialchars($tab); ?></h1>
        <?php
        if (mysqli_num_rows($query) > 0) 
        {
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='article-item'>";
                echo "<h2><a href='/admin_post/tintuc/" . urlencode($row['article_link']) . "'>" . htmlspecialchars($row['article_title']) . "</a></h2>";
                echo "";
                echo "" . htmlspecialchars($row['article_excerpt']) . "";
                echo "</div>";
            }
        } else {
            echo "Không có bài viết nào trong tab này";
        }
    ?>
    </section>
</div>
<style> 
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }
   
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .pagination a {
        padding: 10px 20px;
        margin: 0 5px;
        background-color: #0066cc;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .pagination a:hover {
        background-color: #004d99;
    }

    .pagination a.active {
        background-color: #003366;
    }

    .container {
        width: 80%;
        margin: auto;
        padding: 20px;
    }
    .article-list {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }
    .article-list h1 {
        font-size: 2rem;
        color: #222;
    }
    .article-item {
        border-bottom: 1px solid #ddd;
        padding: 15px 0;
    }
    .article-item:last-child {
        border-bottom: none;
    }
    .article-item h2 {
        font-size: 1.5rem;
    }
    .article-item p {
        color: #555;
    }
    .article-item a {
        text-decoration: none;
        color: #0066cc;
        font-weight: bold;
    }
    .article-item a:hover {
        color: #004d99;
    }
</style>

