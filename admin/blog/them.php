<?php $mysqli = new mysqli("localhost","root","","database");?>

<script src="https://cdn.ckeditor.com/4.22.0/standard/ckeditor.js"></script>


<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm bài viết
        </h3>
       
    </div>
</div>
<form method="POST" action="/blog/xuly.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="input-item form-group">
                            <label for="author" class="d-block">Tên tác giả</label>
                            <input id=author type="text" name="article_author" class="d-block form-control" value="" placeholder="">
                        </div>
                        
                        <div class="input-item form-group">
                            <label for="article_date" class="d-block">Ngày đăng bài</label>
                            <input type="date" name="article_date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                       
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tiêu đề bài viết</label>
                            <input type="text" name="article_title" class="d-block form-control" value="" placeholder="">
                        </div>

                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung tóm tắt</label>
                            <textarea name="article_summary" ></textarea>
                        </div>

                        <div class="input-item form-group">
                            <label for="content" class="d-block">Nội dung chính bài viết</label>
                            <textarea id="content" name="article_content"></textarea>
                        </div>

                        <div class="input-item form-group">
                            <label for="tab" class="d-block">Tab bài viết</label>
                            <taxtarea id="content"name="article_tab"></textarea>
                        </div>

                        <button type="submit" name="article_add" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Thêm
                        </button>

                        <a href="" class="btn btn-outline-dark btn-fw">
                            <i class="mdi mdi-reply"></i>
                            Quay lại
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-content">
                        <div class="main-pane-top">
                            <h4 class="card-title">Sản phẩm theo danh mục</h4>
                            <h6></h6>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Trang thái</label>
                            <select name="product_status" id="product_status" class="form-control">
                                <option value="0">Bản nháp</option>
                                <option value="1">Xuất bản</option>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="image" class="d-block">Image</label>
                            <input type="file" class="" name="article_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>

    CKEDITOR.replace('article_summary');
    CKEDITOR.replace('article_content');
    
</script>

<style>
/* Tổng thể */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px; /* Tạo khoảng cách giữa nội dung và mép trình duyệt */
}

/* Bố cục */
.row {
    width: 90%;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 20px;
    justify-content: space-between;
}

/* Phân cột */
.col-lg-8 {
    flex: 2;
}

.card {
    width: 100%;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px; /* Tạo khoảng cách bên trong thẻ */
    margin-bottom: 16px;
}

/* Đầu trang */
.row > div:first-child {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 20px; /* Tạo khoảng cách giữa tiêu đề và form */
}

textarea {
    width: 100%; /* Chiều rộng full theo container */
    height: 200px; /* Chiều cao */
    font-family: 'Times New Roman', serif;
    font-size: 16px; /* Kích thước chữ */
    line-height: 1.5; /* Khoảng cách giữa các dòng */
    padding: 10px; /* Tạo khoảng cách bên trong */
    border: 1px solid #ccc; /* Viền */
    border-radius: 4px; /* Góc bo tròn */
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1); /* Hiệu ứng lõm */
    resize: vertical; /* Cho phép người dùng kéo để thay đổi kích thước */
}

h3 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

/* Form */
.input-item {
    margin-bottom: 20px;
}

.input-item label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.input-item input[type="text"],
.input-item input[type="date"],
.input-item textarea {
    width: 100%;
    height: 40px;
    padding: 8px 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 4px; /* Tạo khoảng cách giữa nhãn và input */
}

textarea {
    height: 100px;
    resize: vertical;
}

/* Phần nút */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    text-align: center;
    margin-top: 16px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Hình ảnh */
.article__image {
    width: 100%;
    max-width: 200px;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
    object-fit: cover;
    margin-top: 10px;
}

input[type="file"] {
    margin-top: 8px;
}

/* Responsive */
@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .col-lg-8 {
        width: 100%;
    }

    .btn {
        width: 100%;
    }
}
</style>
<script>

tinymce.init({
    selector: 'textarea', // Chọn tất cả các thẻ <textarea>
    menubar: false, // Tắt menu trên cùng (nếu cần)
    plugins: 'lists link image table code', // Các tính năng (plugin) hỗ trợ
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image', // Thanh công cụ
    height: 300, // Chiều cao khung chỉnh sửa
});


</script>