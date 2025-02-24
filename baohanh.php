<?php
require "header.php";

function dbconnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}

// Kiểm tra và xóa sản phẩm hết hạn bảo hành
function checkAndRemoveExpired($SOSERI, $currentDate) {
    $conn = dbconnect();

    // Kiểm tra sản phẩm có tồn tại không
    $checkExistSql = "SELECT * FROM sanpham WHERE SOSERI_SP = ? OR SOSERI_PC = ?";
    $stmt = $conn->prepare($checkExistSql);
    $stmt->bind_param("ss", $SOSERI, $SOSERI);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Xóa sản phẩm hết hạn bảo hành
        $deleteSql = "DELETE FROM sanpham WHERE (SOSERI_SP = ? OR SOSERI_PC = ?) 
                      AND DATE_ADD(NGAYXUAT, INTERVAL THOIHANBH MONTH) < ?";
        $stmt = $conn->prepare($deleteSql);
        $stmt->bind_param("sss", $SOSERI, $SOSERI, $currentDate);
        $stmt->execute();
        $stmt->close();
    }

    // Truy vấn sản phẩm còn bảo hành
    $checkSql = "SELECT * FROM sanpham WHERE SOSERI_SP = ? OR SOSERI_PC = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ss", $SOSERI, $SOSERI);
    $stmt->execute();
    return $stmt->get_result();
}
?>

<div class="main-content fl-right">
    <div class="section" id="detail-blog-wp">
        <div class="section-head clearfix">
            <h3 class="section-title">Tra cứu thông tin sản phẩm</h3>
        </div>
        <div class="section-detail">
            <div class="border p-4 rounded">
                <form name="searchForm" action="#" method="POST">
                    <input name="search" type="text" placeholder="Nhập số Serial sản phẩm cần tìm" 
                        class="input-field" required/>
                    <button type="submit" class="search-btn">Tra cứu</button>
                </form>
            </div>
        </div>

        <?php
    if (isset($_POST['search'])) {
        $search = trim($_POST['search']);
        $currentDate = date('Y-m-d');
        $result = checkAndRemoveExpired($search, $currentDate);
        
        if ($result->num_rows > 0) {
            echo '<table>
                    <thead>
                        <tr>
                            <th>Thông tin</th> <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $result->fetch_assoc()) {
                function printRow($label, $value) {
                    if ($value !== null && trim($value) !== '' && strtoupper($value) !== 'N/A') {
                        echo '<tr><td><strong>' . htmlspecialchars($label) . '</strong></td><td>' . htmlspecialchars($value) . '</td></tr>';
                    }
                }
                printRow("Serial SP", $row["SOSERI_SP"]);
                printRow("Serial PC", $row["SOSERI_PC"]);
                printRow("Tên sản phẩm", $row["TENSP"]);
                printRow("Mã sản phẩm", $row["MASP"]);
                printRow("CPU", $row["CPU"]);
                printRow("Serial CPU", $row["SOSERI_CPU"]);
                printRow("Mã CPU", $row["MASP_CPU"]);
                printRow("RAM", $row["RAM"]);
                printRow("Serial RAM", $row["SOSERI_RAM"]);
                printRow("Mã RAM", $row["MASP_RAM"]);
                printRow("SSD", $row["SSD"]);
                printRow("Serial SSD", $row["SOSERI_SSD"]);
                printRow("Mã SSD", $row["MASP_SSD"]);
                printRow("VGA", $row["VGA"]);
                printRow("Serial VGA", $row["SOSERI_VGA"]);
                printRow("Mã VGA", $row["MASP_VGA"]);
                printRow("Main", $row["MAIN"]);
                printRow("Serial Main", $row["SOSERI_MAIN"]);
                printRow("Mã Main", $row["MASP_MAIN"]);
                printRow("Ngày xuất", date("d-m-Y", strtotime($row["NGAYXUAT"])));
                printRow("Thời hạn bảo hành", $row["THOIHANBH"] . ' tháng');
            }
            echo '</tbody></table>';
        } else {
            echo '<p>Không tìm thấy sản phẩm</p>';
        }
    }
    ?>
</div>

<style>
body {
    font-family: Arial, sans-serif;
    padding: 20px;
}

.input-field {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 80%;
}

.search-btn {
    padding: 10px;
    background-color: #FF3333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

table {
    width: 60%;
    border-collapse: collapse;
    margin: 20px auto;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background: #4CAF50;
    color: #fff;
    font-weight: bold;
}

tr:nth-child(even) {
    background: #f9f9f9;
}

tr:hover {
    background: #e1f5e1;
    transition: 0.2s;
}
</style>

<?php
require 'footer.php';
?>
