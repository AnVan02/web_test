<div id="simplePopup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup()">×</span>
                <h2>THÔNG TIN ĐẶT HÀNG</h2>
                <div class="product-info">
                    <table style="border-spacing: 10px 0; border-collapse: separate;">
                        <tr>
                            <th>Sản phẩm</th>
                            <!-- <th>Giá tiền</th> -->
                            <th>Số lượng</th>
                            
                        </tr>
                        <tr>
                            <td class="product-details">
                                 <img src="<?php echo $images; ?>" alt="Product">
                                <div>
                                    <span class="product-name" id="payment-title"><?php echo $pcName; ?></span>
                                    <span class="prodcut-name" id="payment-cpu"></span>
                                    <span class="prodcut-name" id="payment-main"></span>
                                    <span class="prodcut-name" id="payment-vga"></span>
                                    <span class="prodcut-name" id="payment-ram"></span>
                                    <span class="prodcut-name" id="payment-ssd"></span>
                                    <span class="prodcut-name" id="payment-case"></span>
                                    <span class="prodcut-name" id="payment-psu"></span>
                                    <span class="prodcut-name" id="payment-cooler"></span>
                                    <span class="prodcut-name" id="payment-os"></span>
                                    <span class="prodcut-name" id="payment-addon"></span>
                                    <span class="prodcut-name" id="payment-extra"></span>
                                    

                                </div>
                            </td>
                            <!-- <td class="product-unit-price">
                                <div>
                                    <span id="unit-price">0</span>
                                </div>
                            </td> -->
                            <td>
                                <div class="quantity-control">
                                    <button onclick="decreaseQuantity()">-</button>
                                    <input type="number" id="quantity" value="1" min="1" readonly>
                                    <button onclick="increaseQuantity()">+</button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- manhinh -->
                        <tr id="payment-monitor">
                            <td class="product-details">
                                <img src="" alt="Product" id="monitor-img">
                                <div>
                                    <span class="product-name" id="monitor-name"></span>
                                </div>
                            </td>
                            <!-- <td class="product-unit-price">
                                <div>
                                    <span id="monitor-unit-price">0</span>
                                </div>
                            </td> -->
                            <td>
                                <div class="quantity-control">
                                    <button id="monitor-quantity" onlick="increaseQuantity">1</button>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- voucher -->
                        <tr id="payment-voucher">
                            <td class="product-details">
                                <img src="" alt="Product" id="voucher-img">
                                <div>
                                    <span class="product-name" id="voucher-name"></span>
                                </div>
                            </td>
                            <td>
                                <div class="quantity-control">
                                    <button id="voucher-quantity" onlick="increaseQuantity">1</button>
                                </div>
                            </td>
                        </tr>

                    </table>
                    <div class="summary-total" style="display: flex; justify-content:  flex-end;"> 
                        <span style="margin-right: 10px;">Tổng Cộng:</span>
                        <span id="totalPricePayment">0</span>
                    </div>

                </div>

                <form id="orderForm">
                <label style='font-weight: bold;' >Thông tin khách hàng</label>
                 <!-- Sử dụng type="tel" và pattern để yêu cầu nhập đúng định dạng số điện thoại -->
                    <input type="text" placeholder="Họ và Tên" required>
                    <div class="form-row">
                        <input type="tel" placeholder="Số điện thoại" required title="Số điện thoại phải có 10 chữ số">
                        <!-- Sử dụng type="email" để đảm bảo định dạng email hợp lệ -->
                        <input type="email" placeholder="Email">
                    </div>
                  <!-- Thông tin chuyển khoản -->
                <label style='font-weight: bold;'>Phương thức thanh toán</label>  

                <div class="bank-info">
                    <p>Tên tài khoản: CÔNG TY TNHH ĐIỆN TỬ VÀ TIN HỌC TOÀN VIỆT<p>
                    <p>Số tài khoản: 0381000415803</p>
                    <p>Ngân hàng: VIETCOMBANK-CHI NHÁNH THỦ ĐỨC</p>
                </div>
                    
                <!-- Trong phần delivery-method của form -->
                <div class="delivery-method">
                    <label style='font-weight: bold;'>Phương thức nhận hàng</label>
                    <div class="delivery-options">
                        <label>
                            <input type="radio" name="delivery" value="store" checked onchange="toggleDeliveryInfo()">
                            <img src="https://img.icons8.com/?size=48&id=117508&format=png&color=000000"/>
                            <span>Nhận Tại Shop</span>
                        </label>
                        <label>
                            <input type="radio" name="delivery" value="home" onchange="toggleDeliveryInfo()">
                            <img src="https://img.icons8.com/?size=48&id=wFfu6zXx15Yk&format=png&color=000000"/>
                            <span>Nhận Tại Nhà</span>
                        </label>
                    </div>
                </div>

                    <!-- Thêm div để chứa thông tin giao hàng động -->
                    <div id="delivery-info">
                    </div>
                    <textarea placeholder="Lưu ý của khách hàng"></textarea>
                    
                    <button type="submit" class="order-button">Đặt hàng</button>
                </form>
            </div>
        </div>
        <style>
         /* cuộn product */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
        }

        .specs-table {
            position: sticky; /* Đặt vị trí cố định */
            top: 120; /* Đặt vị trí cố định ở trên cùng */
            z-index: 0; /* Đảm bảo nó nằm trên các phần tử khác */
            padding: 16px;
        }

        .scroll-area {
            max-height: calc(110vh - 150px); /* Chiều cao tối đa cho khu vực cuộn */
            overflow-y: auto; /* Cho phép cuộn dọc */
            padding: 16px;
            margin-top: 16px; /* Khoảng cách giữa bảng và khu vực cuộn */
        }

        .config-section {
            margin-bottom: 20px; /* Khoảng cách giữa các phần cấu hình */
        }

        .summary-total {
            margin-top: 20px; /* Khoảng cách trên cho tổng cộng */
        }
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            overflow: hidden; /* Ngừng hiển thị thanh cuộn */

        }
        .bank-info {
            border: 1px solid #d3d4d6;
            border-radius: 8px;
            padding: 15px;
            
            font-family: 'Arial', sans-serif;
        }

        .bank-info label {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            display: block;
            
            
        }

        .bank-info .bank-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .bank-info p {
            margin: 5px 0;
            color: #555;
        }

        .bank-info strong {
            color: #000;
        }
        /* Dấu nhân ở góc trên bên phải */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            font-weight: bold;
            color: #000;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #ff0000;
        }

        .popup-content {
            position: relative;
            background-color: white;
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            max-height: 90vh;
            overflow-y: auto;
          
        }
        .popup h2 {
            color: #ff0000;
            margin-bottom: 20px;
            text-align: center;
        }

        .product-info table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .product-info th {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .product-details {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .product-details img {
            width: 200px;
            height: auto;
        }

        .product-name {
            display: block;
            font-weight: bold;
        }

        .product-price {
            display: center;
            color: #666;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 5px;
            justify-content: center;
        }

        .quantity-control button {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: white;
            cursor: pointer;
        }

        .quantity-control input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .grand-total {
            text-align: right;
            font-size: 1.2em;
            font-weight: bold;
            margin: 15px 0;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        #orderForm {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row input {
            flex: 1;
        }
        
        input, textarea {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .delivery-method {
            margin: 15px 0;
        }

        .delivery-options {
            display: flex;
            gap: 20px;
            margin-top: 5px;
        }

        .shipping-note {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            margin: 15px 0;
        }

        .shipping-note ul {
            padding-left: 20px;
            margin: 5px 0;
        }

        .order-button {
            background-color: #ff0000;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .order-button:hover {
            background-color: #cc0000;
        }
        .store-info {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            margin: 15px 0;
        }

        .store-info p {
            margin: 0;
            color: #333;
        }
        .delivery-options {
        display: flex;
        gap: 20px;
        margin: 10px 0;
    }

        .delivery-options label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .delivery-options label:hover {
            background-color: #f8f9fa;
        }

        .delivery-options i {
            color: #0d6efd;
            font-size: 1.2em;
        }

        .delivery-options input[type="radio"]:checked + i + span {
            font-weight: bold;
        }

        .delivery-options label:has(input[type="radio"]:checked) {
            border-color: #0d6efd;
            background-color: #e7f1ff;
        }
    /* Trên điện thoại (màn hình có chiều rộng <= 768px) */
    @media (max-width: 768px) {
        /* Sửa kiểu hiển thị của phần .product-details */
        .product-details {
            flex-direction: column; /* Đặt các phần tử nằm dưới nhau thay vì ngang */
            align-items: center; /* Căn giữa các phần tử */
            gap: 15px; /* Khoảng cách giữa các phần tử */
        }

        .product-details img {
            width: 100%; /* Điều chỉnh ảnh để nó chiếm toàn bộ chiều rộng */
            height: auto;
        }

        .product-name {
            font-size: 1em; /* Giảm kích thước chữ tên sản phẩm */
        }

        .product-price {
            font-size: 0.9em; /* Giảm kích thước chữ giá sản phẩm */
        }

        .quantity-control {
            flex-direction: row; /* Đặt các phần tử điều khiển số lượng nằm ngang */
            justify-content: center; /* Căn giữa các phần tử */
        }

        .quantity-control input {
            width: 40px; /* Điều chỉnh chiều rộng cho số lượng */
        }

        /* Giảm kích thước tổng cộng */
        .grand-total {
            font-size: 1em; /* Giảm kích thước chữ tổng cộng */
        }

        /* Điều chỉnh kích thước chữ trong các form */
        input, textarea {
            font-size: 0.9em; /* Giảm kích thước chữ trong input và textarea */
        }

        .store-info p {
            font-size: 0.9em; /* Giảm kích thước chữ thông tin cửa hàng */
        }
        
        
    }
        </style>