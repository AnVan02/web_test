<div class="benefit mt-2">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_content mr-1">
                        <h6>Bảo hành 3 năm</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_content mr-1">
                        <h6>Linh kiện chính hãng</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_content">
                        <h6>Thanh toán dễ dàng</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_content">
                        <h6>Giao hàng tận nơi</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-sections">
		<!-- THÔNG TIN CÔNG TY -->
			<div class="footer-column">
				<h3>THÔNG TIN CÔNG TY </h3>
				<p>Thửa đất số 13A, Tờ bản đồ C2, Khu phố 1B, Phường An Phú, Thành phố Thuận An, Tỉnh Bình Dương</p>
				<p>Chi nhánh & TTBH HCM: 150 Ter, đường Bùi Thị Xuân, phường Phạm Ngũ Lão, Quận 1, TP. Hồ Chí Minh .</p>
				<p>Chi nhánh Hà Nội: Chi nhánh Hà Nội: Tầng 4, Tòa nhà Viet Tower, số 01 phố Thái Hà, P. Trung Liệt, Q. Đống Đa, TP Hà Nội</p>
			</div>
		<!-- HƯỚNG DẪN KHÁCH HÀNG -->
			<div class="footer-column">
				<h3>CHÍNH SÁCH CÔNG TY</h3>
				<ul class="list-info">
                        <li><a href="CSDL.php">CHÍNH SÁCH ĐẠI LÝ</a></li>
                        <li><a href="CSBH.php">CHÍNH SÁCH BẢO HÀNH</a></li>
                    </ul>
			</div>
		<!-- PHẦN MỀM & KHÓA HỌC -->
			<div class="footer-column">
				<h3>PHẦN MỀM & KHÓA HỌC</h3>
				<ul class="list-info">
                        <li><a href="courses/pytho-count.php">PYTHON CƠ BẢN</a></li>
                        <li><a href="courses/yolo-course.php">THỊ GIÁC MÁY TÍNH</a></li>
                        <li><a href="courses/Nextcloud.php">PHẦN MỀM QUẢN TRỊ DOANH NGHIỆP</a></li>
                    </ul>
                </div>
		<!-- CỘNG ĐỒNG ROSA -->
            <div class="footer-column">
                <h3>CÔNG ĐỒNG ROSA</h3>
				<ul class="list-info">
					<li><a href="https://www.facebook.com/people/ROSA-AI-Computer/61559427752479/"><i class="fab fa-facebook" style="color:#1877F2;"></i> ROSA</a></li>
					<li><a href="#"><i class="fab fa-youtube" style="color:#FF0000;"></i> ROSA</a></li>
					<li><i class="fas fa-envelope" style="color:#D44638;"></i> support@rosacomputer.ai</li>
					<li><i class="fas fa-phone-alt" style="color:#FF0000;"></i> Phòng kinh doanh: (028)39293770 - (028)39293765 </li>
					<li><i class="fas fa-phone-alt" style="color:#FF0000;"></i> Phòng kỹ thuật: (028) 39260996</li>

				</ul>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="container">
            <p>&copy; 2024 Bản quyền thuộc về <a href="https://rosacomputer.vn/">CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT</a></p>
        </div>
    </div>

</footer>

<style>
.row {
    display: flex;
    /* flex-wrap: nowrap; Ngăn các cột xuống dòng */
    margin-right: -15px;
    margin-left: -15px;
    justify-content: space-between;
}

.footer {
    background-color: #f8f8f8;
    padding: 10px 0;
    font-family: Arial, sans-serif;
}
.container {
   
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}
.footer-sections {
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap; /* Ngăn các cột xuống dòng */
    gap: 20px;
}
.footer-column {
    width: 23%; /* Điều chỉnh kích thước để giống hình */
    padding: 20px;
    text-align: left;
}
.footer-column h3 {
    font-size: 22px;
    color: rgb(255, 13, 13);
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.footer-column h3::after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    background-color: rgb(255, 4, 4);
    margin-top: 8px;
}

.footer-column p::before {
    content: "\1F3E0"; /* Unicode cho icon nhà */
    margin-right: 10px;
}

.footer-column ul {
    list-style: none;
    padding: 0;
}
.footer-column ul li a {
    text-decoration: none;
    color: #111111;
    font-size: 16px;
    display: block;
    padding: 5px 0;
}
.footer-column ul li a:hover {
    color: red;
}

#foot-bot p {
    text-align: center;
    margin: 0;
    padding: 10px 0;
    font-size: 19px;
    background-color:rgb(234, 228, 228);
}
@media (max-width: 768px) {
    .footer-sections {
        flex-direction: column; /* Xếp các cột theo chiều dọc */
        align-items: center;
        text-align: center;
    }
    .footer-column {
        width: 100%; /* Chiếm toàn bộ chiều rộng */
        padding: 10px 0;
    }
}
.benefit {
    background-color: #fff;
    padding: 20px 0;
    border: 1px solid #ddd; /* Viền khung */
    margin-top: 20px;
}
.benefit_row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    text-align: center;
}
.benefit_col {
    flex: 1;
    min-width: 200px;
    padding: 10px;
}
.benefit_item {
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f9f9f9; /* Nền khung */
    padding: 25px;
    border-radius: 5px;
    border: 1px solid #ddd;
}
.benefit_content h6 {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

@media (max-width: 768px) {
    .benefit_row {
        flex-direction: column;
        align-items: center;
    }
}
</style>