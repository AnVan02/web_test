<?php
    // local
    $mysqli = new mysqli ("localhost","nvpbgqcv_banhang","Vietson@123","nvpbgqcv_banhang");
   
    //newpost
   //$mysqli = new mysqli("","","","");

    // Check connection
    if ($mysqli->connect_errno) {
        die("kết nối cơ sơ dữ liệu thất bại: ".$mysqli ->connect_error);
    }
// Set charset to UTF-8
$mysqli->set_charset("utf8");
?>

