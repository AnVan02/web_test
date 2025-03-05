
<div class="container footer-contact">
<div class="footer-newsletter">
    <h3 style="color: red;">Nhận thông tin từ ROSA.</h3>
    <p>Đăng ký email để nhận các thông tin mới nhất từ ROSA</p>

    <form action="send_email.php" method="POST">
        <input type="email" name="email" placeholder="Email của bạn" required 
               style="padding: 10px; border: none; border-radius: 20px; width: 200px; text-align: center;">
        <button type="submit" 
                style="padding: 10px 20px; background-color: red; color: white; border: none; border-radius: 20px; cursor: pointer;">
            ĐĂNG KÝ
        </button>
    </form>
</div>


    <div class="footer-support">
        <h3  style="color:red" >Thông tin hỗ trợ.</h3>
        <p>Kinh doanh: (028) 39293770 - (028) 39293765</p>
        <p>Kỹ thuật & bảo hành: (028) 39260996</p>
    </div>
    <div class="footer-social">
        <h3  style="color:red">Liên kết social</h3>
        <p>Theo dõi ROSA tại các kênh mạng xã hội</p>
        <a href="https://www.facebook.com/people/ROSA-AI-Computer/61559427752479/"><i class="fab fa-facebook" style="color:#1877F2" ></i></a>
        <a href="https://www.linkedin.com/in/rosa-ai-computer-20980b352/"><i class="fab fa-linkedin" style="color:#1877F2" ></i></a>
        <!-- <a href="#"><i class="fab fa-youtube" style="color:#FF0000"></i></a>
        <a href="#"><i class="fab fa-tiktok" style="color:#000000"></i></a> -->
    </div>
</div>
<br/>

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
                        <li><a href="#">CHÍNH SÁCH ĐẠI LÝ</a></li>
                        <li><a href="#">CHÍNH SÁCH BẢO HÀNH</a></li>
                    </ul>
			</div>
		<!-- PHẦN MỀM & KHÓA HỌC -->
			<div class="footer-column">
				<h3>PHẦN MỀM & KHÓA HỌC</h3>
				<ul class="list-info">
                        <li><a href="#">PYTHON CƠ BẢN</a></li>
                        <li><a href="#">THỊ GIÁC MÁY TÍNH</a></li>
                        <li><a href="#">QUẢN TRỊ DOANH NGHIỆP</a></li>
                    </ul>
                </div>
		<!-- CỘNG ĐỒNG ROSA -->
            <div class="footer-column">
                <h3>CÔNG ĐỒNG ROSA</h3>
				<ul class="list-info">
					<li><a href="https://www.facebook.com/people/ROSA-AI-Computer/61559427752479/"><i class="fab fa-facebook" style="color:#1877F2;"></i> ROSA AI COMPUTER</a></li>
					<li><a href="https://www.linkedin.com/in/rosa-ai-computer-20980b352/"><i class="fab fa-linkedin" style="color:#1877F2;;"></i> ROSA AI COMPUTER</a></li>
					<li><i class="fas fa-envelope" style="color:#FF0000;"></i> support@rosacomputer.ai</li>
					<li><i class="fas fa-phone-alt" style="color:#FF0000;"></i> Phòng kinh doanh: (028) 39293770 - (028) 39293765</li>
					<li><i class="fas fa-phone-alt" style="color:#FF0000;"></i> Phòng kỹ thuật: (028) 39260996</li>

				</ul>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="container" >
            <p>&copy; 2024 Bản quyền thuộc về <a href="https://rosacomputer.vn/">CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT</a></p>
        </div>
    </div>

</footer>

<style>
    .footer-contact {
    display: flex;
    justify-content: space-between;
    background:rgb(235, 231, 231);
    padding: 20px;
    border-radius: 8px;
    margin-top: 20px;
    flex-direction: row
}
.footer-newsletter, .footer-support, .footer-social {
    flex: 1;
    padding: 10px;
  
}
.btn-subscribe {
    background: red;
    color: white;
    border: none;
    padding: 5px 20px;
    border-radius: 5px;
    cursor: pointer;
}
a {
    color: #FF0000;
}
.btn-subscribe:hover {
    background: darkred;
}
.footer-social a {
    margin: 0 5px;
    font-size: 20px;
    color: #555;
}
.footer-social a:hover {
    color: red;
}
.row {
    display: flex;
    flex-wrap: nowrap; /* Ngăn các cột xuống dòng */
    margin-right: -15px;
    margin-left: -15px;
    justify-content: space-between;
}
.footer {
    background-color:#edeaea;
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
    color: #666;
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
    border-radius: 8px; /* Bo góc khung */
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
    padding: 10px;
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