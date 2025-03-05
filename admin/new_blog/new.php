<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: index.php');
    exit;
}

// Xử lý đăng tin tức
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    
    // Xử lý upload ảnh
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    // Lưu tin tức vào cơ sở dữ liệu (cần thêm mã kết nối và lưu trữ)
    // ...
    echo "Tin tức đã được đăng!";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Tin Tức</title>
</head>
<body>
    <h1>Đăng Tin Tức</h1>
    <a href="logout.php">Đăng Xuất</a>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>
        <label for="image">Tải lên ảnh:</label><br>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        <input type="submit" value="Đăng Tin">
    </form>
</body>
</html> 

<style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

h1 {
    color: #333;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #5cb85c;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #4cae4c;
}
</style>