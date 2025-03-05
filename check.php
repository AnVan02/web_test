<title>Kiểm Tra Đơn Hàng</title>

<?php
    require "header.php";
?>

<?php if(isset($_SESSION["message"])):?>
    <script>
        function message() {
        window.alert("<?php echo $_SESSION["message"];?>");
        }
    </script>
<?php endif;?>

<!-- Banner -->
<div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">

<?php if(isset($_SESSION["message"])) {echo 'onload="message()"';unset($_SESSION["message"]);}?>

<!-- Main content -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/./">TRANG CHỦ</a></li>
        <li class="breadcrumb-item"><a href="../check.php">KIỂM TRA ĐƠN HÀNG</a></li>
    </ol>
</nav>
    <div class="tab">
        <h1>Kiểm tra đơn hàng</h1>
        <div style="width: 30%; height: 4px; background-color:red; margin-top: 5px;"></div>
        <br>
        <p>(Dành cho đơn đặt hàng online trên website)</p>
        <label for="order-code">Nhập mã đơn hàng để kiểm tra đơn hàng của bạn.</label><br><br>
        <input type="text" id="order-code">
        <button id="check_id">Kiểm tra</button>
        
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
            </tr>
        </table>
        
        <div id="order_content"></div>
    </div>
    <script>
        document.getElementById("check_id").addEventListener("click", function () {
            const orderCode = document.getElementById("order-code").value.trim();
            if (!orderCode) {
                alert("Vui lòng nhập mã đơn hàng");
                return;
            }

            fetch(`http://localhost/demo_test/api.php?order_code=${orderCode}`)
                .then(response => response.json())
                .then(data => {
                    const table = document.querySelector(".table");
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
                        // document.querySelector(".tab").innerHTML += `<div>${data.data.order}</div>`;
                        document.getElementById('order_content').innerHTML = data.data.order;
                    } else {
                        alert(data.message);
                        table.style.display = "none";
                        // clear order content
                        document.getElementById('order_content').innerHTML = "";
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert("Đã xảy ra lỗi khi kết nối với server!");
                });
        });
    </script>
        <!-- Closing div tags for the container and row -->
            </div>
        </div>
    </div>

<style>
    
    .tab {
        padding: 20px;
        background-color: white;
        margin: 20px auto;
        width: 80%;
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
    }
    .tab h1 {
        font-size: 24px;
        color: #333;
        display: inline-block;
        padding-bottom: 5px;
    }
    .tab p {
        color: red;
        font-size: 20px;
    }
    .tab label {
        font-size: 16px;
        color: #333;
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
        /* color: white; */
    }
</style>

<?php
    require "footer.php";
?>
