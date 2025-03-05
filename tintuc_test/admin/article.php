<?php
// Bao gồm tệp kết nối
include('config/config.php');

// Kiểm tra nếu article_id được truyền qua URL
if (!isset($_GET['article_id'])) {
    die("Không tìm thấy bài viết. Vui lòng thử lại.");
}
$article_id = $_GET['article_id'];

// Kiểm tra nếu kết nối cơ sở dữ liệu tồn tại
if (!isset($mysqli)) {
    die("Kết nối cơ sở dữ liệu chưa được thiết lập.");
}

// Truy vấn bài viết
$sql_article = "SELECT * FROM article WHERE article_id = $article_id LIMIT 1";
$query_article = mysqli_query($mysqli, $sql_article);

// Truy vấn bình luận đã được duyệt
$sql_comment = "SELECT * FROM comment WHERE article_id = '$article_id' AND comment_status = 1";
$query_comment = mysqli_query($mysqli, $sql_comment);
$comment_total = mysqli_num_rows($query_comment);
?>
<!-- Bắt đầu phần hiển thị bài viết -->
<section class="article">
    <?php
    while ($row = mysqli_fetch_array($query_article)) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="article__content d-flex justify-center">
                        <div class="article__container pd-section">
                            <h1 class="article__heading h2"><?php echo $row['article_title'] ?></h1>
                            <span class="article__date d-block"><?php echo $row['article_date'] ?></span>
                            <div class="article__context h4">
                                <?php echo $row['article_content'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="comment pd-section">
        <div class="container">
            <div class="article__box">
                <div class="blog__comment">
                    <div class="comment__container">
                        <h3 class="comment__heading"><?php echo $comment_total ?> bình luận</h3>
                        <div class="comment__items">
                            <?php while ($comment_item = mysqli_fetch_array($query_comment)) {
                            ?>
                                <div class="comment__item">
                                    <span class="comment__content d-block h4"><?php echo $comment_item['comment_content'] ?></span>
                                    <span class="comment__info d-block"><?php echo $comment_item['comment_name'] ?> - <?php echo $comment_item['comment_date'] ?></span>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="comment__form">
                        <h3 class="h3 form__heading">Thêm mới bình luận</h3>
                        <form action="pages/handle/comment.php?article_id=<?php echo $article_id ?>" method="POST">
                            <div class="form__container">
                                <div class="row">
                                    <div class="col" style="--w-md: 6;">
                                        <div class="w-100 form__input">
                                            <input class="btn w-100" type="text" placeholder="Tên" name="comment_name" value="">
                                        </div>
                                    </div>
                                    <div class="col" style="--w-md: 6;">
                                        <div class="w-100 form__input">
                                            <input class="btn w-100" type="email" placeholder="Email" name="comment_email" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="--w-md: 12;">
                                        <div class="w-100 form__input">
                                            <textarea class="btn w-100" placeholder="Nội dung bình luận" name="comment_content" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="comment__warning">
                                            Bình luận chỉ được xuất bản khi đã được phê duyệt.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" name="comment" class="btn comment__btn">Bình luận</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
