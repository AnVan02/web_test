<?php
include('../../config/config.php');

// Nhận các giá trị từ form
$data = $_GET['data'] ?? null;
$article_links = json_decode($data, true);
$article_link = $_GET['article_link'] ?? null;
$article_author = $_POST['article_author'] ?? null;
$article_title = $_POST['article_title'] ?? null;
$article_summary = $_POST['article_summary'] ?? null;
$article_content = $_POST['article_content'] ?? null;
$article_link = $_POST['article_link'] ?? null;
$article_link = trim($article_link); // Xóa khoảng trắng thừa ở đầu và cuối
$article_link = str_replace(' ', '-', $article_link); // Thay khoảng trắng bằng dấu gạch ngang
$article_image = $_FILES['article_image']['name'] ?? null;
$article_image_tmp = $_FILES['article_image']['tmp_name'] ?? null;
$article_image = $article_image ? time() . '_' . $article_image : null;
$article_date = date('Y-m-d', time());
$article_status = $_POST['article_status'] ?? null;
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

    // Thêm bài viết vào cơ sở dữ liệu
    $sql_add = "INSERT INTO article (article_author, article_title, article_summary, article_content, article_image, article_date, article_status, article_link)
                VALUES ('$article_author', '$article_title', '$article_summary', '$article_content', '$article_image', '$article_date', '$article_status', '$article_link')";

    if (mysqli_query($mysqli, $sql_add)) {
        // Upload ảnh nếu có
        if ($article_image) {
            move_uploaded_file($article_image_tmp, 'uploads/' . $article_image);
        }
        header('Location: ../../index.php?action=article&query=article_list');
    } else {
        die("Lỗi SQL: " . mysqli_error($mysqli));
    }
    if ($article_image) {
        // Kiểm tra xem file có được tải lên không
        if (is_uploaded_file($article_image_tmp)) {
            // Di chuyển file đến thư mục 'uploads/'
            if (move_uploaded_file($article_image_tmp, 'uploads/' . $article_image)) {
                echo "Ảnh đã được tải lên: " . $article_image;
            } else {
                die("Lỗi: Không thể di chuyển file tới thư mục uploads.");
            }
        } else {
            die("Lỗi: File không được tải lên.");
        }
    } else {
        echo "Không có ảnh nào được tải lên.";
    }
    
    
} elseif (isset($_POST['article_edit'])) {
    // Xử lý cập nhật bài viết
    if ($article_image) {
        move_uploaded_file($article_image_tmp, 'uploads/' . $article_image);
        $sql = "SELECT * FROM article WHERE article_link = '$article_link' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['article_image']); // Xóa ảnh cũ
        }
    }

    $sql_update = "UPDATE article 
                   SET article_author='$article_author', article_title='$article_title', article_summary='$article_summary', 
                       article_content='$article_content', article_image='$article_image', article_date='$article_date', 
                       article_status='$article_status', article_link='$article_link' 
                   WHERE article_link = '$article_link'";

    if (mysqli_query($mysqli, $sql_update)) {
        header('Location: ../../index.php?action=article&query=article_list');
    } else {
        die("Lỗi SQL: " . mysqli_error($mysqli));
    }
} elseif (isset($_GET['deletecomment']) && $_GET['deletecomment'] == 1) {

    // Xóa bình luận
    $comment_ids = json_decode($data, true);
    foreach ($comment_ids as $id) {
        $sql_delete_comment = "DELETE FROM comment WHERE comment_id = '$id'";
        mysqli_query($mysqli, $sql_delete_comment);
    }
    header('Location: ../../index.php?action=article&query=article_edit&article_link=' . $article_link . '#article_comment');
} elseif (isset($_GET['acceptcomment']) && $_GET['acceptcomment'] == 1) {

    // Duyệt bình luận
    $comment_ids = json_decode($data, true);
    foreach ($comment_ids as $id) {
        $sql_update_comment = "UPDATE comment SET comment_status = 1 WHERE comment_id = '$id'";
        mysqli_query($mysqli, $sql_update_comment);
    }
    header('Location: ../../index.php?action=article&query=article_edit&article_link=' . $article_link . '#article_comment');
} else {
    // Xóa bài viết
      foreach ($article_ids as $id) {
        $sql = "SELECT * FROM article WHERE article_link = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['article_image']);
        }
        $sql_delete = "DELETE FROM article WHERE article_id = '" . $id . "'";
        mysqli_query($mysqli, $sql_delete);
    }
    header('Location: ../../index.php?action=article&query=article_list');
}
?>
