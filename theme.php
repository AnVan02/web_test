

<!DOCTYPE html>
<div class="container my-5">
    <h3><b style='color: red ;font-weight: bolder;'>THÔNG TIN HỖ TRỢ  </b></h3>
    <div style="width: 10%; height: 2px; background-color:red; margin-top: 1px;"></div>
        <p>Hãy tim kiếm thông mọi thông tin hỗ trợ từ ROSA </p>
    </div>
</div>

    <div class="sidebar">
        <ul>
            <li onclick="showSection('HDMH')" class="active">01 Hướng dẫn mua hàng</li>
            <li onclick="showSection('CDBH')">02 Chế độ bảo hành</li>
            <li onclick="showSection('CSDT')">03 Chính sách đổi trả</li>
            <li onclick="showSection('CDTL')">04 Cài đặt & thiết lập</li>
            <li onclick="showSection('CHTG')">05 Câu hỏi thường gặp</li>
        </ul>
    </div>
    
    <div class="content">
        <div id="HDMH" class="section active">
            <h1>Hướng dẫn mua hàng</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Lorem ipsum dolor amet, consectetur adipiscing elit.</strong></p>
            <p>Massa massa eu id lacus risus nibh Phasellus. Mauris imperdiet lobortis in...</p>
        </div>
        <div id="CDBH" class="section">
            <h1>Chế độ bảo hành</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Bảo hành sản phẩm trong vòng 12 tháng.</strong></p>
            <p>Thông tin chi tiết về chính sách bảo hành...</p>
        </div>
        <div id="CSDT" class="section">
            <h1>Chính sách đổi trả</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Chính sách đổi trả trong vòng 7 ngày.</strong></p>
            <p>Điều kiện và quy trình đổi trả...</p>
        </div>
        <div id="CDTL" class="section">
            <h1>Cài đặt & Thiết lập</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Hướng dẫn cài đặt sản phẩm.</strong></p>
            <p>Các bước thực hiện cài đặt...</p>
        </div>
        <div id="CHTG" class="section">
            <h1>Câu hỏi thường gặp</h1>
            <img src="https://via.placeholder.com/800x400" alt="Hình ảnh hướng dẫn">
            <p><strong>Những câu hỏi phổ biến từ khách hàng.</strong></p>
            <p>Giải đáp thắc mắc thông dụng...</p>
        </div>
    </div>

    
<script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionId).classList.add('active');
    }
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        /* display: flex; */
        flex-direction: column;
        margin: 0;
        padding: 0;
    }
    .sidebar {
        width: 250px;
        background:rgb(207, 198, 198);
        padding: 20px;
        height: 100vh;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar li {
        padding: 10px;
        margin-bottom: 10px;
        background: #fff;
        border-radius: 5px;
        cursor: pointer;
        flex-direction: row
    }
    /* .sidebar li.active {
        background: red;
        color: white;
    } */
    .content {
        flex: 1;
        padding: 20px;
    }
    .content img {
        width: 100%;
        border-radius: 10px;
    }
    h1 {
        font-size: 24px;
    }
    .section {
        display: none;
    }
    .section.active {
        display: block;
    }
</style>
