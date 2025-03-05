<title>Popup Khuyến Mãi</title>

<?php
$servername = "localhost";
$username = "root"; // Thay bằng user database của bạn
$password = ""; // Nếu có mật khẩu, hãy điền vào
$dbname = "database"; // Thay bằng tên database thực tế của bạn

// Kết nối database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn lấy ảnh mới nhất
$sql = "SELECT image_url FROM popup ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$image_url = "default.jpg"; // Ảnh mặc định nếu không có ảnh nào trong DB
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image_url = $row['image_url'];
}

$conn->close();
?>

<!-- Popup -->
<div class="popup-overlay" id="popup">
    <div class="popup-content">
        <button class="popup-close" id="popup-close">&times;</button>
        <img src="<?php echo $image_url; ?>" alt="Khuyến Mãi" class="popup-image" id="popup-img" onerror="hidePopup()">
    </div>
</div>

<script>
    const popup = document.getElementById('popup');
    const popupImage = document.getElementById('popup-img');
    const closeButton = document.getElementById('popup-close');

    // Kiểm tra ảnh có tồn tại hay không trước khi hiển thị popup
    function checkImageExists(url, callback) {
        const img = new Image();
        img.src = url;
        img.onload = function () {
            callback(true);
        };
        img.onerror = function () {
            callback(false);
        };
    }

    // Ẩn popup nếu ảnh không tải được
    function hidePopup() {
        popup.style.display = 'none';
    }

    window.onload = function () {
        checkImageExists(popupImage.src, function (exists) {
            if (exists) {
                popup.style.display = 'flex'; // Hiển thị popup nếu ảnh hợp lệ

                // Tự động đóng popup sau 30 giây
                setTimeout(function () {
                    popup.style.display = 'none';
                }, 30000);
            } else {
                hidePopup();
            }
        });
    };

    // Đóng popup khi bấm nút đóng
    closeButton.onclick = function () {
        popup.style.display = 'none';
    };

    // Đóng popup khi bấm ra ngoài nội dung popup
    popup.onclick = function (event) {
        const popupContent = document.querySelector('.popup-content');
        if (!popupContent.contains(event.target)) {
            popup.style.display = 'none';
        }
    };

    // Đóng popup khi nhấn phím "Esc"
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            popup.style.display = 'none';
        }
    });
</script>

<style>
    /* Popup Background */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(27, 26, 26, 0.7);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    /* Popup Content */
    .popup-content {
        border-radius: 16px;
        width: 30%;
        padding: 20px;
        text-align: center;
        position: relative;
        color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    /* Close Button */
    .popup-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #f0f0f0;
        border: none;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
    }

    .popup-close:hover {
        background: rgb(235, 18, 2);
        color: rgb(247, 247, 247);
    }

    /* Popup Image */
    .popup-image {
        width: 120%;
        margin-bottom: 20px;
        border-radius: 8px;
    }
</style>
