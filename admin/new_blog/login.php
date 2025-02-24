<?php
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Hủy phiên
session_destroy();

// Chuyển hướng về trang đăng nhập
header("location: /index.php");
exit;
?>