<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$response = ["success" => false, "message" => "Lỗi xử lý API"];

// Kết nối database
$servername = "localhost"; // Đổi theo cấu hình của bạn
$username = "root"; 
$password = ""; 
$dbname = "database"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $response["message"] = "Lỗi kết nối database";
    echo json_encode($response);
    exit;
}

if (isset($_GET['order_code'])) {
    $order_code = $_GET['order_code'];
    
    // Truy vấn lấy thông tin đơn hàng
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_code = ?");
    $stmt->bind_param("s", $order_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $data = [
            "formatted_order_id" => $row["order_code"],
            "customer_name" => $row["customer_name"],
            "customer_phone" => $row["customer_phone"],
            "order_date" => $row["order_date"],
            "status" => $row["status"]
        ];

        $response = ["success" => true, "data" => $data];
    } else {
        $response["message"] = "Không tìm thấy đơn hàng";
    }
    $stmt->close();
}

$conn->close();
echo json_encode($response);
exit;

?>
    <title>Kiểm Tra Đơn Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .tab {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tab h1 {
            font-size: 24px;
            color: #333;
        }

        .tab p {
            color: red;
            font-size: 14px;
        }

        .tab input[type="text"] {
            padding: 10px;
            width: 200px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .tab button {
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .tab button:hover {
            background-color: black;
        }

        .table {
            display: none;
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

    <div class="tab">
        <h1>Kiểm tra đơn hàng</h1>
        <p>(Dành cho đơn đặt hàng online trên website)</p>
        <label for="order-code">Nhập mã đơn hàng:</label><br><br>
        <input type="text" id="order-code">
        <button id="check_id">Kiểm tra</button>

        <table class="table" id="order_table">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
            </tr>
        </table>

        <div id="order_content"></div>
    </div>

    <script>
        document.getElementById("check_id").addEventListener("click", async function () {
            const orderCode = document.getElementById("order-code").value.trim();

            if (!orderCode) {
                alert("Vui lòng nhập mã đơn hàng");
                return;
            }

            try {
                const response = await fetch(`http://localhost/demo_test/api.php?order_code=${orderCode}`);

                if (!response.ok) {
                    throw new Error(`Lỗi server: ${response.status}`);
                }

                const data = await response.json();
                console.log("API Response:", data);

                const table = document.getElementById("order_table");

                // Xóa dữ liệu cũ trong bảng, chỉ giữ lại tiêu đề
                table.innerHTML = `
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                    </tr>
                `;

                if (data.success) {
                    const row = `
                        <tr>
                            <td>${data.data.formatted_order_id}</td>
                            <td>${data.data.customer_name}</td>
                            <td>${data.data.customer_phone}</td>
                            <td>${data.data.order_date}</td>
                            <td>${data.data.status}</td>
                        </tr>
                    `;
                    table.style.display = "table";
                    table.innerHTML += row;
                    document.getElementById('order_content').innerHTML = "Đơn hàng đã được tìm thấy.";
                } else {
                    alert(data.message);
                    table.style.display = "none";
                    document.getElementById('order_content').innerHTML = "Không tìm thấy đơn hàng.";
                }
            } catch (err) {
                console.error("Lỗi:", err);
                alert("API không phản hồi đúng JSON! Kiểm tra console để xem chi tiết.");
            }
        });
    </script>

</body>
</html>
