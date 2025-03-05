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

<!-- Banner -->
<div class="banner">
		<div class="container">
			<div class="row">
			<div class="col-lg-12 mb-3">


<?php if(isset($_SESSION["message"])) {echo 'onload="message()"';unset($_SESSION["message"]);}?>

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

            fetch(`https://localhost/demo_test/api.php?order_code=${orderCode}`)
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
	
</div>











<?php
    require "footer.php" ;
?>