

<!DOCTYPE html>
<div class="container my-5">
    <h3><b style='color: red ;font-weight: bolder;'>THÔNG TIN HỖ TRỢ  </b></h3>
    <div style="width: 10%; height: 2px; background-color:red; margin-top: 1px;"></div>
        <p>Hãy tim kiếm thông mọi thông tin hỗ trợ từ ROSA </p>
    </div>
</div>

    <div class="sidebar"style="display:flex">
        <ul>
            <li onclick="showSection('HDMH')" class="active">01 Hướng dẫn mua hàng</li>
            <li onclick="showSection('CDBH')">02 Chế độ bảo hành</li>
            <li onclick="showSection('CSDT')">03 Chính sách đổi trả</li>
            <li onclick="showSection('CDTL')">04 Cài đặt & thiết lập</li>
            <li onclick="showSection('CHTG')">05 Câu hỏi thường gặp</li>
        </ul>
    </div>
    
    <div class="content">
        <div id="HDMH" class="section active">
            <h1>Hướng dẫn mua hàng</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Lorem ipsum dolor amet, consectetur adipiscing elit.</strong></p>
            <p>Massa massa eu id lacus risus nibh Phasellus. Mauris imperdiet lobortis in...</p>
        </div>
        <div id="CDBH" class="section">
            <h1>Chế độ bảo hành</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Bảo hành sản phẩm trong vòng 12 tháng.</strong></p>
            <p>Thông tin chi tiết về chính sách bảo hành...</p>
        </div>
        <div id="CSDT" class="section">
            <h1>Chính sách đổi trả</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Chính sách đổi trả trong vòng 7 ngày.</strong></p>
            <p>Điều kiện và quy trình đổi trả...</p>
        </div>
        <div id="CDTL" class="section">
            <h1>Cài đặt & Thiết lập</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Hướng dẫn cài đặt sản phẩm.</strong></p>
            <p>Các bước thực hiện cài đặt...</p>
        </div>
        <div id="CHTG" class="section">
            <h1>Câu hỏi thường gặp</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Những câu hỏi phổ biến từ khách hàng.</strong></p>
            <p>Giải đáp thắc mắc thông dụng...</p>
        </div>
    </div>
    
<script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
    }
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        /* display: flex; */
        flex-direction: column;
        margin: 0;
        padding: 0;
    }
    .sidebar {
        width: 250px;
        background:rgb(207, 198, 198);
        padding: 20px;
        height: 100vh;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar li {
        padding: 10px;
        margin-bottom: 10px;
        background: #fff;
        border-radius: 5px;
        cursor: pointer;
        flex-direction: row
    }
    .sidebar li.active {
        background: red;
        color: white;
    }
    .content {
        flex: 1;
        padding: 20px;
    }
    .content img {
        width: 100%;
        border-radius: 10px;
    }
    h1 {
        font-size: 24px;
    }
    .section {
        display: none;
    }
    .section.active {
        display: block;
    }
</style>

<?php
// Khởi động session
session_start();

// Nhập tệp common.php
include 'data/common.php';

// Lấy tên tệp hiện tại (loại bỏ đường dẫn)
$current_page = basename($_SERVER['PHP_SELF']); // Ví dụ: "ROSA-OFFICE.php"

// Danh sách sản phẩm đã được chọn (lưu trong session nếu có)
$selected_products = isset($_SESSION['random_products']) ? $_SESSION['random_products'] : [];

// Lọc danh sách sản phẩm
$filtered_list_sp = array_filter($list_sp, function ($product) use ($current_page, $selected_products) {
    // Lấy tên file từ đường dẫn của sản phẩm
    $product_page = basename($product->page);

    // Loại bỏ sản phẩm thuộc trang hiện tại
    if (strcasecmp($product_page, $current_page) === 0) {
        return false;
    }

    // Loại bỏ sản phẩm đã được chọn trước đó
    foreach ($selected_products as $selected) {
        if ($selected->title === $product->title) {
            return false;
        }
    }

    return true; // Giữ lại sản phẩm không bị loại
});

// Kiểm tra số lượng sản phẩm có thể hiển thị
$num_products_to_display = 3; // Số sản phẩm muốn hiển thị
if (count($filtered_list_sp) < $num_products_to_display) {
    echo "<p>Không có đủ sản phẩm để hiển thị.</p>";
    return;
}

// Chọn ngẫu nhiên số sản phẩm cần hiển thị từ danh sách đã lọc
$random_products = [];
$used_indexes = [];
$filtered_list_array = array_values($filtered_list_sp); // Chuyển danh sách về mảng có chỉ mục

while (count($random_products) < $num_products_to_display) {
    $random_index = rand(0, count($filtered_list_array) - 1);
    if (!in_array($random_index, $used_indexes)) {
        $random_products[] = $filtered_list_array[$random_index];
        $used_indexes[] = $random_index;
    }
}

// Lưu danh sách sản phẩm đã chọn vào session
$_SESSION['random_products'] = $random_products;

// Hiển thị các sản phẩm
echo "<div style='display: flex; justify-content: center; align-items: center; text-align: center; height:30px;'>
    <h3><b style='color:red'>Các sản phẩm khác - </b> Khám phá các máy bộ tương tự</h3></div>";

echo "<div class='product-container'>"; // Container Flexbox
foreach ($random_products as $product) {
    // Sửa đường dẫn đúng cách
    $product_page = ltrim($product->page, '/'); // Loại bỏ ký tự `/` thừa ở đầu nếu có
    $product_page = preg_replace('/^(sanpham\/)+/', 'sanpham/', $product_page); // Loại bỏ dư "sanpham/"
    $product_url = "/{$product_page}";

    // Hiển thị sản phẩm
    echo "<div class='product-item'>"; // Thêm class cho mỗi sản phẩm
    echo "<a href='$product_url'>"; // Đưa link bao quanh hình ảnh
    echo "<img src='../$product->image' alt='{$product->title}' onerror=\"this.src='default-image.png';\" style='display: block; margin: auto;'>";     echo "</a>";
    echo "<h3 class='product-title'>{$product->title}</h3>";
    echo "<p>{$product->subtitle}</p>";
    echo "<ul>";
    foreach (explode("\n", $product->content) as $line) {
        echo "<li>$line</li>";
    }
    echo "</ul>";
    echo "<b class='product-price'> {$product->price}</b>";
    echo "<a href='$product_url'style='margin-top: 5%;'>Mua ngay</a>";
    echo "</div>";
}
echo "</div>";
?>


<style>

.product-container {
    display: flex;
    flex-wrap: wrap; /* Cho phép xuống hàng nếu không đủ không gian */
    justify-content: space-between; /* Khoảng cách đều giữa các sản phẩm */
    gap: 20px; /* Khoảng cách giữa các sản phẩm */
    margin: 20px 0; /* Khoảng cách trên và dưới cho container */
    width: 100%; /* Chiều rộng toàn bộ container */
    text-align: left; /* Căn chỉnh các nội dung về phía trái */
}

.product-item {
    flex: 1 1 calc(25% - 20px); /* 4 sản phẩm trên 1 hàng */
    /* flex: 1 1 calc(16.66% - 20px); */ /* Nếu muốn 6 sản phẩm trên 1 hàng */
    border: 1px solid #ccc; /* Viền cho sản phẩm */
    border-radius: 10px; /* Bo góc cho sản phẩm */
    padding: 16px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
    /*display: flex;*/
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    text-align: left;
    height: auto;
    margin-top: 5%;

}


.product-price {
    align-self: flex-start; /* Đặt giá bên trái */
    margin-top: 10px; /* Tạo khoảng cách giữa giá và các phần tử khác */
    font-size: 18px;
    color:#FF0000;
}

.product-title {
    color: #000;
    font-size: 25px;
    align-self: flex-start; /* Đẩy giá về phía bên trái */
    margin-top: 16px; /* Khoảng cách phía trên giá */
    text-align: left; /* Căn chỉnh nội dung bên trong sang trái */
    width: 100%; /* Đảm bảo giá chiếm toàn bộ chiều rộng */
    font-weight: bold;
}
.product-item img {
    width: 100% !important;
    max-width: 290px !important;
    height: 250px !important;
    object-fit: cover !important;
    object-position: center !important;
    border-radius: 10px !important;
}

.product-item h3 {
    font-size: 16px;
    margin: 10px 0;
    color: red;
}

.product-item p {
    font-size: 16px;
    color: #000000;
    margin: 23px 0;
    align-self: flex-start; /* Đẩy giá về phía bên trái */
    text-align: left; /* Căn chỉnh các nội dung về phía trái */
}

.product-item ul {
    list-style-type: none; /* Bỏ dấu chấm ở đầu dòng */
    padding: 0; /* Bỏ khoảng cách bên trái */
    margin: 0; /* Bỏ khoảng cách bên ngoài */
}

.product-item li {
    margin-bottom: 4px; /* Khoảng cách giữa các dòng */
}

/* Chỉ áp dụng CSS cho nút "Mua ngay" */
.product-item a:last-of-type {
    display: inline-block;
    width: 100%; /* Nút mua sẽ rộng toàn bộ thẻ */
    text-align: center;
    background-color: #ff0000;
    color: white;
    padding: 10px 0;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.product-item a:last-of-type:hover {
    background-color: #cc0000; /* Màu khi hover */
}

/* Không áp dụng kiểu cho thẻ a bọc hình ảnh */
.product-item a img {
    display: block; /* Giữ nguyên hiển thị của hình ảnh */
    width: 100%; /* Giữ kích thước hình ảnh */
    height: auto;
    border: none;
    background: none;
    padding: 0;
}

@media (max-width: 768px) {
    .product-item {
        flex: 1 1 calc(50% - 20px); /* 2 sản phẩm trên 1 hàng khi màn hình nhỏ */
    }
}

@media (max-width: 480px) {
    .product-item {
        flex: 1 1 100%; /* 1 sản phẩm trên 1 hàng khi màn hình rất nhỏ */
    }
}
</style>
