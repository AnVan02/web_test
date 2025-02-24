<?php
// Dữ liệu mẫu
$news = [
    'amd' => [
        'AMD Mở Rộng Dòng Zen 4 Bằng Việc Âm Thầm Ra Mắt  Ryzen 5 7400F, CPU 6 Lõi/12 Luồng Với Tốc Độ Lên Đến 4.7 GHz',
        '(CES 2025) AMD Ryzen AI Max 395+ Mini PC: GMK Công Bố Mini PC Sử Dụng Strix Halo',
        '(CES 2025) AMD Ra Mắt GPU Radeon RX 9070 XT & RX 9070: Nhận Đặt Hàng Trước Từ Ngày 23 Tháng 1',

    ],
    'intel' => [
        'Intel giới thiệu dòng CPU Core i13',
        'Intel hợp tác với các nhà sản xuất laptop',
        'Intel phát triển công nghệ AI mới'
    ],
    'nvidia' => [
        'NVIDIA tung ra card đồ họa RTX 4000',
        'NVIDIA cải thiện hiệu suất DLSS',
        'NVIDIA hợp tác với các studio game lớn'
    ],
    
];

// Nhận tham số category
$category = $_GET['category'] ?? 'amd';


// Kiểm tra và lấy tin tức tương ứng
if (array_key_exists($category, $news)) {
    foreach ($news[$category] as $article) {
        echo "<p>$article</p>";
    }
} else {
    echo "<p>Không có tin tức cho danh mục này.</p>";
}
?>
