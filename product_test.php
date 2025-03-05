<title>Sản Phẩm ROSA</title>

<?php require "header.php" ;?>
<?php require "data/common.php"; ?>

<div class="banner">
<div class="container">
	<div class="row">
	<div class="col-lg-12 mb-3">         
        <div class="container">
        	<div class="title">
        		<h3>Cấu Hình Máy Bộ ROSA</h3>
        		<p>ROSA PC cung cấp ba dòng sản phẩm tối ưu: PC Văn Phòng, PC AI và PC Gaming, đáp ứng mọi nhu cầu công việc và giải trí</p>
        	</div>
        	
        	 <!--Văn phòng-->
            <div class="main-banner">
            <div class="banner-content">
                <p style="color:#FFF" >VĂN PHÒNG</p>
        		<h5 style="color:#DCDCDC">Mang đến hiệu suất ổn định và tính năng bảo mật cao, hoàn hảo cho công việc văn phòng hàng ngày</h5>
            </div>
            <div class="banner-image">
                <img src="assets/images/vp.png" alt="Gaming PC" />
            </div>
            </div>     
                <div class="product-group">
                    <div class="card">
        			<div class="image-container">
        				<a href=<?= $rosa_office_n100->page ?>>
        					<img src=<?= $rosa_office_n100->image ?> alt="vanphong">
        				</a>
        			</div>
                        <div class="details">
                            <h3 style="color: red;"><?= $rosa_office_n100->title ?></h3>
                            	<p><?= $rosa_office_n100->subtitle ?></p>
                            <div class="key-specs">
                                <?= $rosa_office_n100->content ?>
                            </div>
                            <div class="price"><?= $rosa_office_n100->price ?></div>
                            <a href=<?= $rosa_office_n100->page ?> class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                    
                    <div class="card">
        			<div class="image-container">
        				<a href=<?= $rosa_office_1->page ?>>
        					<img src=<?= $rosa_office_1->image ?> alt="vanphong">
        				</a>
        			</div>
                        <div class="details">
                            <h3 style="color: red;"><?= $rosa_office_1->title ?></h3>
                            	<p><?= $rosa_office_1->subtitle ?></p>
                            <div class="key-specs">
                                <?= $rosa_office_1->content ?>
                            </div>
                            <div class="price"><?= $rosa_office_1->price ?></div>
                            <a href=<?= $rosa_office_1->page ?> class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                    
                    <div class="card">
        			<div class="image-container">
        				<a href=<?= $rosa_office_2->page ?>>
        					<img src=<?= $rosa_office_2->image ?> alt="vanphong">
        				</a>
        			</div>
                        <div class="details">
                            <h3 style="color: red;"><?= $rosa_office_2->title ?></h3>
        					<p><?= $rosa_office_2->subtitle ?></p>
                            <div class="key-specs">
                                <?= $rosa_office_2->content ?>
                            </div>
                            <div class="price"><?= $rosa_office_2->price ?></div>
                            <a href=<?= $rosa_office_2->page ?> class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                </div>
        
                 <!--AI-->
        	<div class="main-banner">
                <div class="banner-content">
                    <p style="color:#FFF">AI</p>
                    <h5 style="color:#DCDCDC">
                        Tối ưu cho lập trình AI, với công cụ cài sẵn và cấu hình mạnh mẽ để phát triển ứng dụng trí tuệ nhân tạo
                    </h5>
                </div>
                <div class="banner-image">
                    <img src="assets/images/ai.png" alt="Gaming PC" />
                </div>
            </div>
                <div class="product-group ">
                    <div class="card">
                        <div class="image-container">
        				<a href=<?= $rosa_ai->page ?>>
                            <img src=<?= $rosa_ai->image ?> alt="ai">
        				</a>
                        </div>
                        <div class="details">
                            <h3 style="color: red;"><?= $rosa_ai->title ?></h3>
        					<p><?= $rosa_ai->subtitle ?></p>
                            <div class="key-specs">
                                <?= $rosa_ai->content ?>
                            </div>
                            <div class="price"><?= $rosa_ai->price ?></div>
                            <a href=<?= $rosa_ai->page ?> class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                </div>
                
                <!--Mini PC-->
            <div class="main-banner" style=" background: linear-gradient(to right,#000000,#000000);">
            <div class="banner-content">
                <p style="color:#FFF" >Mini PC</p>
        		<h5 style="color:#DCDCDC">Lựa chọn hoàn hảo cho không gian làm việc gọn gàng, cung cấp hiệu suất cao và khả năng đa nhiệm mượt mà với thiết kế nhỏ gọn, thích hợp cho cả văn phòng và nhu cầu sử dụng hàng ngày</h5>
            </div>
            <div class="banner-image">
                <img src="assets/images/mini.jpg" alt="Mini PC" style="width: 100%; height: auto"/>
            </div>
            </div> 
            <div class="product-group ">
                    <div class="card">
        			<div class="image-container">
        				<a href=<?= $rosa_mini_1->page ?>>
        					<img src=<?= $rosa_mini_1->image ?> alt="Mini PC">
        				</a>
        			</div>
                        <div class="details">
                            <h3 style="color: red;"><?= $rosa_mini_1->title ?></h3>
                            	<p><?= $rosa_mini_1->subtitle ?></p>
                            <div class="key-specs">
                                <?= $rosa_mini_1->content ?>
                            </div>
                            <div class="price"><?= $rosa_mini_1->price ?></div>
                            <a href=<?= $rosa_mini_1->page ?> class="shop-button">Mua ngay</a>
                        </div>
                    </div>
                    
                <!--GAMER-->
                <div class="main-banner">
                    <div class="banner-content">
                        <p style="color:#FFF" >GAMING</p>
                        <h5 style="color:#DCDCDC">Trang bị cấu hình đỉnh cao và các card đồ họa mạnh mẽ, mang đến hiệu suất vượt trội cho các tựa game yêu thích. Máy tính này giúp bạn trải nghiệm đồ họa sắc nét và chơi game mượt mà, ngay cả với các tựa game nặng</h5>
                    </div>
                    <div class="banner-image">
                        <img src="assets/images/GAMER.png" alt="Gaming PC" />
                    </div>
                </div>
            		<div class="">
            			<div class="image-co">
                    <div class="product-group gaming">
                        
                        <div class="card">
                            <div class="image-container">
            				<a href=<?= $rosa_gamer_x3d->page ?>>
                                <img src=<?= $rosa_gamer_x3d->image ?> alt="gaming">
            				</a>
                            </div>
                            <div class="details">
                                <h3 style="color: red;"><?= $rosa_gamer_x3d->title ?></h3>
                                <p><?= $rosa_gamer_x3d->subtitle ?></p>
                                <div class="key-specs">
                                    <?= $rosa_gamer_x3d->content ?>
                                </div>
                                <div class="price"><?= $rosa_gamer_x3d->price ?></div>
                                <a href=<?= $rosa_gamer_x3d->page ?> class="shop-button">Mua ngay</a>
                            </div>
                        </div>
                        
                        <div class="image-co">
                            <div class="image-co">
                            <div class="product-group gaming">
                                <div class="card">
                                    <div class="image-container">
                                        <a href=<?= $rosa_office_1 ->page ?>>
                                            <img src=<?= $rosa_office_1 -> image ?> alt= "gaming">
                                        </a>
                                    </div> 
                                    <div class="details">
                                        <h3 style= "color:red;"><?= $rosa_office_1 ->price ?></div>
                                        <p><?=$rosa_office_1 ->content ?></p>
                                    </div>
                                    <div class="price"> <?= $rosa_office_1->price ?></div>
                                    <a href=<?= $rosa_office_1->page ?> class="shop-button"> Mua ngay</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="image-co">
                            <div class="image-co">
                            <div class="product-group gaming">
                                <div class="card">
                                    
                                </div>  
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
        <style>
            
            
        .body {
            font-family:'Arial', sans-serif; 
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .title h1 {
            font-size: 28px;
            margin: 10px 0;
            font-family: 'Arial',sans-serif; 
        }
        
        .title p {
            color: #666;
        }
        .title {
        	display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            text-align: center; 
            margin-bottom: 20px; 
            font-family: 'Arial', sans-serif;
            color: #333; 
        }
        .card {
            display: flex;
            flex-direction: row;
            align-items: center; 
            gap: 20px; 
            border: 1px solid #ddd;
            border-radius: 8px; 
            padding: 16px;
            margin-bottom: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }
        
        .image-container {
            flex-shrink: 0; 
        	width: 300px; 
        	height: 300px;
        	overflow: hidden; 
        	display: flex;
        	justify-content: center;
        	align-items: center; 
        }
        
        .image-container img {
            width: 100%; 
        	height: 100%; 
        	object-fit: contain;
        	object-position: center; 
        }
        
        .details {
            display: flex;
            flex-direction: column; 
            justify-content: space-between;
        }
        
        .details h3 {
            margin: 0 0 8px;
            font-size: 18px;
            color: red; 
            font-family: 'Arial', sans-serif; 
        }
        
        .key-specs {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }
        
        .price {
            font-size: 18px;
            font-weight: bold;
            color: red;
            margin-top: 10px;
        }
        
        p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #4F4F4F;
            font-family: 'Arial', sans-serif;
        }
        
        .shop-button {
            display: inline-block;
            width: 300px; 
            text-align: center;
            background-color: #ff0000;
            color: white;
            padding: 10px 0;
            text-decoration: none;
            border-radius: 5px;
            font-size: 15px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        
        .shop-button:hover {
            background-color: #FF0000; 
        }
        
        @media (max-width: 768px) {
        body {
            font-size: 14px;
        }
        
        .title h1 {
            font-size: 22px;
        }
        
        .card {
            flex-direction: column; 
            gap: 20px; 
        }
        
        
        .image-container img {
            width: 100%; 
            height: auto; 
        }
        
        
        .key-specs {
            font-size: 12px;
        }
        
        .price {
            font-size: 16px;
        }
        
        .shop-button {
            width: 100%;
            padding: 12px 0;
        }
        
        .details h3 {
            font-size: 16px; 
        }
        
        p {
            font-size: 14px; 
        }
        
        }
        .banner-image img {
            max-width: 100%; 
            height: 200px; 
        }
        
        
        .image-container img {
            width: 100%; 
            height: auto;
            object-fit: cover; 
        }
        
        
        .main-banner {
            display: flex; 
            align-items: center;
            justify-content: space-between;
            background: linear-gradient(to right, #336699, #000000);
            padding: 50px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            
            .main-banner {
                flex-direction: column; 
                padding: 20px;
            }
        }
        
        .product-group {
            display: grid; 
            grid-template-columns: 1fr; 
            gap: 20px;
        }
        	
        </style>
        
        <?php
            require "footer.php" ;
        ?>