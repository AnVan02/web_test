<?php
include('../../config/config.php');

// Nhận các giá trị từ form
$data = $_GET['data'] ?? null;
$article_links = json_decode($data, true);
$article_link = $_GET['article_link'] ?? null;
$article_author = $_POST['article_author'] ?? null;
$article_title = $_POST['article_title'] ?? null;
$article_content = $_POST['article_content'] ?? null;
$article_summary = $_POST['article_summary'] ?? null;
$article_link = $_POST['article_link'] ?? null;
$article_link = trim($article_link); // Xóa khoảng trắng thừa ở đầu và cuối
$article_link = str_replace(' ', '-', $article_link); // Thay khoảng trắng bằng dấu gạch ngang
$article_image = $_FILES['article_image']['name'] ?? null;
$article_image_tmp = $_FILES['article_image']['tmp_name'] ?? null;
$article_image = $article_image ? time() . '_' . $article_image : null; // Tạo tên file ảnh duy nhất
$article_date = date('Y-m-d', time());
$article_date = $_POST['article_date'] ?? date('Y-m-d', time());
$article_status = $_POST['article_status'] ?? null;
$article_tab = $_POST['article_tab'] ?? null;


if (isset($_POST['article_add'])) {
    // Tạo article_link nếu rỗng
    if (empty($article_link)) {
        $article_link = uniqid('article_'); // Tạo link ngẫu nhiên nếu không nhập
    }

    // Kiểm tra article_link đã tồn tại
    $sql_check = "SELECT * FROM article WHERE article_link = '$article_link'";
    $query_check = mysqli_query($mysqli, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // Nếu article_link đã tồn tại, báo lỗi và dừng xử lý
        die("<script>
            alert('Lỗi: Đường dẫn bài viết  hoặc bài viết đã tồn tại. Vui lòng nhập đường dẫn khác.');
            window.history.back();
        </script>");
    }

    $sql_add = "INSERT INTO article(article_link, article_author, article_title, article_summary, article_content, article_image, article_date, article_status, article_tab) VALUE('" . $article_link . "', '" . $article_author . "', '" . $article_title . "', '" . $article_summary . "', '" . $article_content . "', '" . $article_image . "', '" . $article_date . "', '" . $article_status . "','". $article_tab. "')";
    mysqli_query($mysqli, $sql_add);
    move_uploaded_file($article_image_tmp, 'uploads/' . $article_image);
    header('Location: ../../index.php?action=article&query=article_list');

} elseif (isset($_POST['article_edit'])) {
    if ($_FILES['article_image']['name'] != '') {
        move_uploaded_file($article_image_tmp, 'uploads/' . $article_image);
        $sql = "SELECT * FROM article WHERE article_link = '$article_link' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        echo $article_image;
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['article_image']);
        }
        $sql_update = "UPDATE article SET  article_author='" . $article_author . "', article_title='" . $article_title . "', article_summary = '" . $article_summary . "', article_content = '" . $article_content . "', article_image = '" . $article_image . "', article_date = '" . $article_date . "', article_status = '" . $article_status . "',article_tab='".$article_tab."',  WHERE article_link = '$_GET[article_link]'";
        echo $sql_update;
    } else {
        $sql_update = "UPDATE article SET article_author='" . $article_author . "', article_title='" . $article_title . "', article_summary = '" . $article_summary . "', article_content = '" . $article_content . "', article_date = '" . $article_date . "', article_status = '" . $article_status . "',article_tab='". $article_tab. "'  WHERE article_link = '$_GET[article_link]'";
    }

    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=article&query=article_list');


} elseif (isset($_GET['deletecomment']) && $_GET['deletecomment'] == 1) {
    $comment_ids = json_decode($data);
    foreach ($comment_ids as $id) {
        $sql_delete_comment = "DELETE FROM comment WHERE comment_id = '" . $id . "'";
        mysqli_query($mysqli, $sql_delete_comment);
    }
    header('Location: ../../index.php?action=article&query=article_edit&article_link='.$article_link.'#article_comment');
} elseif (isset($_GET['acceptcomment']) && $_GET['acceptcomment'] == 1) {
    $comment_ids = json_decode($data);
    foreach ($comment_ids as $id) {
        $sql_update_comment = "UPDATE comment SET comment_status = 1 WHERE comment_id = '" . $id . "'";
        mysqli_query($mysqli, $sql_update_comment);
    }
    header('Location: ../../index.php?action=article&query=article_edit&article_link='.$article_link.'#article_comment');
} else {
    foreach ($article_links as $id) {
        $sql = "SELECT * FROM article WHERE article_link = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['article_image']);
        }
        $sql_delete = "DELETE FROM article WHERE article_link = '" . $id . "'";
        mysqli_query($mysqli, $sql_delete);
    }
    header('Location: ../../index.php?action=article&query=article_list');
}

// Truy vấn các bài viết thuộc tab
if (isset($_GET['tab'])) {
    $tab = mysqli_real_escape_string($mysqli, $_GET['tab']); // Lấy tham số tab từ URL

    $sql_tab = "SELECT * FROM article WHERE FIND_IN_SET('$tab', article_tab) > 0";
    $query_tab = mysqli_query($mysqli, $sql_tab);

    if (mysqli_num_rows($query_tab) > 0) {
        while ($row = mysqli_fetch_array($query_tab)) {
            echo "<h2><a href='tintuc.php?link=" . urlencode($row['article_link']) . "'>" . htmlspecialchars($row['article_title']) . "</a></h2>";
            echo "<p>" . htmlspecialchars($row['article_summary']) . "</p>";
        }
    } else {
        echo "Không có bài viết nào thuộc tab này.";
    }
}



