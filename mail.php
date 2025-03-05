<?php
    $to = "vanan02102002@gmail.com"; // Địa chỉ email nhận thông báo
    $subject = "Có đơn hàng mới từ website!";
    
    $message = "
    <html>
    <head>
        <title>Thông báo đơn hàng mới</title>
    </head>
    <body>
        <h2>Thông tin đơn hàng mới</h2>
        <p><strong>Mã đơn hàng:</strong> ".$order_code."</p>
        <p><strong>Họ tên khách hàng:</strong> ".$customer_name."</p>
        <p><strong>Số điện thoại:</strong> ".$customer_phone."</p>
        <p><strong>Ngày đặt hàng:</strong> ".$order_date."</p>
        <p><strong>Tổng tiền:</strong> ".number_format($total_price, 0, ',', '.')." VND</p>
    </body>
    </html>
    ";

    // Thiết lập header để gửi email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@yourwebsite.com" . "\r\n";

    // Gửi email
    mail($to, $subject, $message, $headers);
?>
