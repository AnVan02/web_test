<div class="benefit mt-2">
				<div class="container">
					<div class="row benefit_row">
						<div class="col-lg-3 benefit_col">
							<div class="benefit_item d-flex flex-row align-items-center">
								<!-- <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div> -->
								<div class="benefit_content mr-1">
								<h6>Bảo hành 3 năm</h6>
								<!-- <p>Sản phẩm chính hãng với bảo hành tối thiểu 1 năm</p> -->
								</div>
							</div>
						</div>
						<div class="col-lg-3 benefit_col">
							<div class="benefit_item d-flex flex-row align-items-center">
								<!-- <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div> -->
								<div class="benefit_content mr-1">
									<h6>Linh kiên chính hãng</h6>
									<!-- <p>Có nhiều cách thanh toán</p> -->
								</div>
							</div>
						</div>
						<div class="col-lg-3 benefit_col">
							<div class="benefit_item d-flex flex-row align-items-center">
								<!-- <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div> -->
								<div class="benefit_content">
									<h6>Thanh toán dễ dàng</h6>
									<!-- <p>Có thể đổi trả hàng bị lỗi trong 30 ngày</p> -->
								</div>
							</div>
						</div>
						<div class="col-lg-3 benefit_col">
							<div class="benefit_item d-flex flex-row align-items-center">
								<!-- <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div> -->
								<div class="benefit_content">
									<h6>Giao hàng tận nơi</h6>
									<!-- <p>8h sáng - 17h30 chiều</p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-0">
				<!-- Newsletter -->

				<!--<div class="newsletter mt-5 container">-->
				<!--	<div class="row">-->
				<!--		<div class="col-lg-6">-->
				<!--			<div-->
				<!--				class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">-->
				<!--				<h4>Nhận tin tức</h4>-->
				<!--				<p>Theo dõi để nhận ưu đãi mới nhất của chúng tôi</p>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--		<div class="col-lg-6">-->
				<!--			<form action="post">-->
				<!--				<div-->
				<!--					class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">-->
				<!--					<input id="newsletter_email" type="email" placeholder="Nhập email của bạn"-->
				<!--						required="required" data-error="Valid email is required.">-->
				<!--					<button id="newsletter_submit" type="submit"-->
				<!--						class="newsletter_submit_btn trans_300"-->
				<!--						value="Submit">subscribe</button>-->
				<!--				</div>-->
				<!--			</form>-->
				<!--		</div>-->
				<!--	</div>-->
				<!--</div>-->
					<!-- Footer -->
					<footer class="footer" id="footer">
						<div class="footer-main">
							<div class="container">
								<div class="row">
									<!-- About Us -->
									<div class="col-lg-4 col-md-12 footer-widget footer-about">
										<div class="footer-logo">
											<img src="assets/images/rosa.png" alt="Footer Logo">
										</div>
										<h4 class="title">CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT</h4>
										<p class="desc"style=" font-size: 16px; color:#000000" >CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT luôn cung cấp sản phẩm
											chính hãng, thông tin rõ ràng, và chính sách ưu đãi lớn cho khách hàng.
										</p>
									</div>
									<!-- Contact Info -->
									<div class="col-lg-4 col-md-12 footer-widget">
										<h3 class="widget-title">Thông Tin Công Ty</h3>
										<ul class="list-info">
											<li style=" font-size: 16px; color:#000000">Phòng KD : (028) 39293770 - (028) 39293765</li>
											<li style=" font-size: 16px; color:#000000">Phòng kỹ thuật & Bảo hành : (028) 39260996</li>
											<li style=" font-size: 16px;"><b href="support@rosacomputer.ai">support@rosacomputer.ai</b>
											</li>
											<li style=" font-size: 16px; color:#000000">Thửa đất số 13A, Tờ bản đồ C2, Khu phố 1B, Phường An Phú, Thành phố Thuận An, Tỉnh Bình Dương, Việt Nam</li>
											<li style=" font-size: 16px; color:#000000"><strong>Chi nhánh & TTBH HCM: </strong> 150 Ter, đường Bùi Thị Xuân, phường Phạm Ngũ Lão, Quận 1, TP. Hồ Chí Minh .</li>
											<li style=" font-size: 16px; color:#000000"><strong>Chi nhánh Hà Nội: </strong>Chi nhánh Hà Nội: Tầng 4, Tòa nhà Viet Tower, số 01 phố Thái Hà, P. Trung Liệt, Q. Đống Đa, TP Hà Nội</li>
											
										</ul>
									</div>
									<!-- Policies -->
									<div class="col-lg-4 col-md-12 footer-widget">
										<h3 class="widget-title">Về ROSA</h3>
										<ul class="list-info">
											<li style=" font-size: 16px, color:#0000FF"><a href="/DSDL.php">Danh Sách Đại Lý </a></li>
											<li style=" font-size: 16px, color:#0000FF"><a href="/CSBH.php">Chính Sách Bảo Hành</a></li>
											<?php

												$count_file = "total_count.txt";

												$visitor_file = "visitor_count.txt";

												$user_ip = $_SERVER['REMOTE_ADDR'];
												
												$total_count_default = 88888;
												$total_count_real = file_exists($count_file) ? (int)file_get_contents($count_file) : 1;
												$total_count_display = $total_count_default + $total_count_real;

												$visitor_ips = file_exists($visitor_file) ? file($visitor_file, FILE_IGNORE_NEW_LINES) : [];

												if (!in_array($user_ip, $visitor_ips)) {
													$visitor_ips[] = $user_ip;
													file_put_contents($visitor_file, implode(PHP_EOL, $visitor_ips) . PHP_EOL);
												}

												$total_count_real++;

												file_put_contents($count_file, $total_count_real);

												// Số lượng người truy cập duy nhất
												$unique_visitors_default = 11111;
												$unique_visitors_real = count($visitor_ips);
												$unique_visitors_display = $unique_visitors_default + $unique_visitors_real;
												?>

											
												<body>
													<p style=" font-size: 16px; color:#000000">Số lượt truy cập duy nhất: <?php echo $unique_visitors_display; ?></p>
													<p style=" font-size: 16px; color:#000000">Tổng số lượt truy cập: <?php echo $total_count_display; ?></p>
												</body>
												</html>
											
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- Footer Bottom -->
						<div id="foot-bot">
							<div class="container">
							<p>&copy; 2024</span> Bản quyền thuộc về <a href="https://rosacomputer.vn/">CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT</a></p>
							</div>
						</div>
					</footer>

					<style>
						/* General Footer Styling */
						.footer {
							/*background-color: #ffff;*/
							padding: 40px 0;
						}

						.footer-main {
							border-bottom: 1px solid #ddd;
							padding-bottom: 20px;
						}

						.footer-logo img {
							max-width: 100%;
							height: auto;
						}

						.title {
							font-size: 22px;
							color: #333;
							margin-top: 15px;
							margin-bottom: 15px;
						}

						.desc {
							font-size: 14px;
							color: #666;
						}

						.widget-title {
							font-size: 18px;
							color: #333;
							margin-bottom: 15px;
							font-weight: bold;
						}

						.list-info {
							list-style: none;
							padding: 0;
							margin: 0;
						}

						.list-info li {
							margin-bottom: 10px;
							font-size: 14px;
							color: #555;
						}

						.list-info b {
							color: #FF0000;
							/* Bootstrap's red color */
							text-decoration: none;
						}
						.mt-2, .my-2 {
							margin-top: 8.5rem !important;
						}

						/*.list-info a:hover {*/
						/*	text-decoration: underline;*/
						/*}*/

						/* Footer Bottom Styling */
						#foot-bot {
							/* background-color: #FF0000; */
							color: #111111;
							padding: 1px 0;
						}

						#foot-bot p {
							text-align: center;
							margin: 0;
							font-size: 14px;
						}

						#foot-bot a {
							color: #00000;
							text-decoration: none;
						}

						/*#foot-bot a:hover {*/
						/*	text-decoration: underline;*/
						/*}*/

						/* Responsive Design */
						@media (max-width: 768px) {
							.footer-widget {
								text-align: center;
								margin-bottom: 20px;
							}
						}
					</style>
				</div>
			</div>
			</div>
		</footer>
	</div>
</div>



<a href="https://www.messenger.com/t/304785579388246" target="_blank">
  <div class="float-right" style="z-index:2; position: fixed; right:5px; bottom: 240px;" data-toggle="modal" data-target="#dialog1">
    <img style="width:53px;" src="/assets/upload/user/mess.png">
  </div>
</a>

<a href="https://zalo.me/909749126673606301" target="_blank">
  <div class="float-right" style="z-index:2; position: fixed; right:5px; bottom: 180px;" data-toggle="modal" data-target="#dialog1">
    <img style="width:55px;" src="/assets/upload/user/zalo.png">
  </div>
</a>




<script src="/assets/js/jquery-3.2.1.min.js"></script>
<script src="/assets/styles/bootstrap4/popper.js"></script>
<script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/assets/js/jquery-3.2.1.min.js"></script>
<script src="/assets/styles/bootstrap4/popper.js"></script>
<script src="/assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/assets/plugins/easing/easing.js"></script>
<script src="/assets/js/custom.js"></script>
<script src="/assets/js/products_carts.js"></script>



