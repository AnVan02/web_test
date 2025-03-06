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
    $checkSql = "SELECT SOSERI_SP, SOSERI_PC, LOAI, TENSP, MASP, NGAYXUAT, THOIHANBH 
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
                   
                </div>
            </h3>
        </div>
        <div class="section-detail">
            <div class="border border-zinc-300 p-4 rounded mb-4">
                <div class="flex items-center">
                    <h3 style="color:dodgerblue;">Tra cứu thông tin sản phẩm </h3>
                </div>
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

            // Truy vấn dữ liệu theo SOSERI_PC và nhóm theo NGAYXUAT
            $stmt = $conn->prepare("
                SELECT SOSERI_SP,SOSERI_PC,LOAI,TENSP,MASP,NGAYXUAT,THOIHANBH
                FROM baohanh
                WHERE SOSERI_PC = ?
                ORDER BY NGAYXUAT ASC
            ");

            // Truy vấn dữ liệu pc lên đầu
            $stmt = $conn->prepare("
                SELECT SOSERI_SP, SOSERI_PC, LOAI, TENSP, MASP, NGAYXUAT, THOIHANBH
                FROM baohanh
                WHERE SOSERI_PC = ?
                ORDER BY 
                    CASE 
                        WHEN LOWER(LOAI) LIKE '%pc%' THEN 0  -- Bộ PC lên đầu
                        ELSE 1  -- Các linh kiện xuống sau
                    END, NGAYXUAT ASC
            ");
        
            
            $stmt->bind_param("s", $soseri_pc);
            $stmt->execute();
            $result = $stmt->get_result();

            echo '<h3 style ="text-align: center;">Thông Tin Bảo Hành</h3>';
            echo '<table border="1" cellspacing="0" cellpadding="5">';
            echo '<tr>
                    <th>Số Serial SP</th>
                    <th>Số Serial PC</th>
                    <th>Loại</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Ngày Xuất</th>
                    <th>Thời Hạn Bảo Hành</th>
                </tr>';
           
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td style="font-weight: bold;color:red">' . htmlspecialchars($row["SOSERI_SP"]) . '</td>';
                echo '<td style="font-weight:bold">'. htmlspecialchars($row["SOSERI_PC"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["LOAI"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["TENSP"]) . '</td>';
                echo '<td>' . htmlspecialchars($row["MASP"]) . '</td>';
                echo '<td>' . date("d-m-Y", strtotime($row["NGAYXUAT"])) . '</td>';
                echo '<td>' . htmlspecialchars($row["THOIHANBH"]) . ' tháng</td>';
                echo '</tr>'; 
            }
            echo '</table>';
        
        } else {
            echo '<p class="no-result">Không có thông tin bảo hành cho mã <span>' . htmlspecialchars($serial_sp) . '</span>.</p>';
        }
        $stmt->close();
    
    }
    
    
?>
</div>

<style>
    h2 {
        color: #333;
    }
    
    .p-4 {
        padding: 5.5rem !important;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
    }
    

    th {
        background: #007bff;
        color: white;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background: #f9f9f9;
    }

    tr:hover {
        background: #f1f1f1;
    }

    .no-result {
        color: red;
        font-size: 18px;
        margin-top: 20px;

    }
    /* CSS cho phần thông tin sản phẩm */
.section-detail {
    margin-top: 20px;
}

.section-title h3 {
    font-size: 24px;
    color: dodgerblue;
    margin-bottom: 10px;
    font-family: Arial, sans-serif;
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
    font-size: 15px;
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

.result-box p strong {
    color: dodgerblue;
}

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
   
  
