<?php
require "header.php";

function dbconnect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    // Kết nối đến database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    return $conn;
}

// Hàm kiểm tra và xóa sản phẩm hết hạn
function checkAndRemoveExpired($SOSERI_SP, $currentDate){
    $conn = dbconnect();

    // Xóa sản phẩm đã hết hạn bảo hành
    $deleteSql = "DELETE FROM baohanh WHERE SOSERI_SP  = ? AND DATE_ADD(NGAYXUAT, INTERVAL THOIHANBH MONTH) < ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("ss", $SOSERI_SP, $currentDate);
    $stmt->execute();
    $stmt->close();

    // Truy vấn để lấy thông tin sản phẩm còn bảo hành
    $checkSql = "SELECT SOSERI_SP, SOSERI_PC,`LOAI`, `TENSP`, `MASP`, `NGAYXUAT`, `THOIHANBH` 
                FROM baohanh WHERE SOSERI_SP = ?";

    $stmt = $conn->prepare($checkSql );
    $stmt->bind_param("s", $SOSERI_SP);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
?>
<div class="main-content fl-right">
    <div class="section" id="detail-blog-wp">
        <div class="section-head clearfix">
            <h3 class="section-title">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center">
                        <h3 style="color:dodgerblue;">Tra cứu thông tin sản phẩm </h3>
                    </div>
                </div>
            </h3>
        </div>
        <div class="section-detail">
            <div class="border border-zinc-300 p-4 rounded mb-4">
                <form name="test" action="#" method="POST">
                    <input name="search" type="text" placeholder="NHẬP MÃ SERIAL SẢN PHẨM CẦN TÌM" 
                        class="border border-zinc-300 p-2 rounded w-full" style="width: 80%"/>
                    <button type="submit" class="bg-blue-500 text-red p-2 rounded" 
                        style="background-color:#FF3333; border: none; color:#FFFFFF; width: 15%">
                        Tra cứu 
                    </button>
                </form>
            </div>
        </div>
        <?php
if (isset($_POST['search'])) {
    $serial_sp = $_POST['search'];
    $conn = dbconnect();

    // Lấy SOSERI_PC tương ứng với SOSERI_SP
    $stmt = $conn->prepare("SELECT SOSERI_PC FROM baohanh WHERE SOSERI_SP = ?");
    $stmt->bind_param("s", $serial_sp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $soseri_pc = $row['SOSERI_PC'];
        $stmt->close();

        // Truy vấn thông tin tất cả sản phẩm thuộc cùng SOSERI_PC
        $stmt = $conn->prepare("SELECT 
            GROUP_CONCAT(SOSERI_SP ORDER BY NGAYXUAT SEPARATOR ', ') AS SOSERI_SP,
            SOSERI_PC,
            GROUP_CONCAT(LOAI ORDER BY NGAYXUAT SEPARATOR ', ') AS LOAI,
            GROUP_CONCAT(TENSP ORDER BY NGAYXUAT SEPARATOR ', ') AS TENSP,
            GROUP_CONCAT(MASP ORDER BY NGAYXUAT SEPARATOR ', ') AS MASP,
            GROUP_CONCAT(NGAYXUAT ORDER BY NGAYXUAT SEPARATOR ', ') AS NGAYXUAT,
            GROUP_CONCAT(THOIHANBH ORDER BY NGAYXUAT SEPARATOR ', ') AS THOIHANBH
        FROM baohanh WHERE SOSERI_PC = ?");
        
        $stmt->bind_param("s", $soseri_pc);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        echo '<div class="result-box">';
        echo '<p><strong>Số Serial PC:</strong> <span>' . htmlspecialchars($data["SOSERI_PC"]) . '</span></p>';
        echo '<p><strong>Số Serial SP:</strong> <span>' . htmlspecialchars($data["SOSERI_SP"]) . '</span></p>';
        echo '<p><strong>Loại:</strong> <span>' . htmlspecialchars($data["LOAI"]) . '</span></p>';
        echo '<p><strong>Tên sản phẩm:</strong> <span>' . htmlspecialchars($data["TENSP"]) . '</span></p>';
        echo '<p><strong>Mã sản phẩm:</strong> <span>' . htmlspecialchars($data["MASP"]) . '</span></p>';
        echo '<p><strong>Ngày xuất:</strong> <span>' . htmlspecialchars($data["NGAYXUAT"]) . '</span></p>';
        echo '<p><strong>Thời hạn bảo hành:</strong> <span>' . htmlspecialchars($data["THOIHANBH"]) . ' tháng</span></p>';
        echo '</div>';
    } else {
        echo '<p class="no-result">Chưa có thông tin liên quan hoặc mã <span>' . htmlspecialchars($serial_sp) . '</span> đã hết hạn bảo hành.</p>';
    }

    $stmt->close();
}
?>
        

</div>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 150px;
}

    

form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

form input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 80%;
    font-size: 16px;
}

form button {
    padding: 10px;
    background-color: #FF3333;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    width: 15%;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #e60000;
}

/* CSS cho phần thông tin sản phẩm */
.section-detail {
    margin-top: 20px;
}

.section-title h3 {
    font-size: 24px;
    color: dodgerblue;
    margin-bottom: 10px;
}

.section-detail .create-date {
    margin-bottom: 20px;
}

.border {
    border: 1px solid #e0e0e0;
    padding: 15px;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.border input {
    font-size: 16px;
}

.result-box {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    background-color: #F9F9F9;
}

.result-box p {
    font-size: 16px;
    margin: 5px 0;
}
/* màu chữ cho form  */
.result-box p strong {
    color: dodgerblue;
}

/* màu chữ nội dung  */
.result-box p span {
    font-weight: bold;
    color: #FF0000;
}

.no-result {
    color: #FF0000;
    font-weight: bold;
}

/* CSS cho khối chứa form */
.flex {
    display: flex;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}

.mb-4 {
    margin-bottom: 20px;
}

/* Điều chỉnh khi màn hình nhỏ */
@media screen and (max-width: 768px) {
    form {
        flex-direction: column;
    }

    form input,
    form button {
        width: 100%;
        margin-bottom: 10px;
    }

    form button {
        width: 100%;
    }
}
         
    </style>


<?php
require 'footer.php';

?>
   
  
