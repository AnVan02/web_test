<title>Kiểm Tra Đơn Hàng</title>

<?php
    require "header.php" ;
?>

<?php if(isset($_SESSION["message"])):?>
	<script>
		function message() {
		window.alert("<?php echo $_SESSION["message"];?>");
		}
	</script>
<?php endif;?>
<head>
<!-- Banner -->
<div class="banner">
		<div class="container">
			<div class="row">
			<div class="col-lg-12 mb-3">
    <!-- <body class="h-100" style="background-image: ">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="assets/images/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="assets/images/3.jpg" class="d-block w-100" alt="...">
        </div>
    
    </div>
    </div> -->

<?php if(isset($_SESSION["message"])) {echo 'onload="message()"';unset($_SESSION["message"]);}?>


    <style>
        */
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
            display: inline-block;
            padding-bottom: 5px;
        }
        .tab p {
            color: red;
            font-size: 14px;
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
        .container button:hover {
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
	<!-- Main content -->
    <div class="tab">
        <h1>Kiểm tra đơn hàng</h1>
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

            fetch(`http://localhost:9090/test/api.php?order_code=${orderCode}`)
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

	 <!-- Banner -->
	
</div>
<style>
	body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

.letter-content {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    max-width: 800px;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}

.letter-content p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 15px;
}

.letter-content strong {
    font-size: 18px;
    color: #000;
    display: block;
    margin-bottom: 20px;
}

.contact {
    background-color: #ffffff;
    padding: 20px;
    margin-top: 20px;
    border-radius: 8px;
    max-width: 800px;
    margin: 20px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}

.contact h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 15px;
}

.contact p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 15px;
}

.contact ul {
    list-style: none;
    padding: 0;
}

.contact ul li {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
}

</style>

<?php
    require "footer.php" ;
?>