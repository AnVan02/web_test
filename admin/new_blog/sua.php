
<div class ="row" style="margin-bottom:10px;">
    <div class =""style="justify-content:space-between; align-items:flex-end;">
        <h3>
            Sửa bài viết 
        </h3> 
        <!-- <a href="index.php" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại 
        </a> -->
    </div>
</div>
<form method="POST" action="" enctype="multipart/form-data">
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
                            <label for="articlr_tab" class="d-block">Tab</label>
                            <input type="" name="article_date" class="" value="">
                        </div>
                      
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tiêu đề bài viết</label>
                            <input type="text" name="article_title" class="d-block form-control" value="" placeholder="">
                        </div>

                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung tóm tắt</label>
                            <textarea name="article_summary"></textarea>
                        </div>
                        
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung chính bài viết</label>
                            <textarea name="article_content"img src="<?php echo $row['article_image'] ?>" class="article__image w-100 h-100" style="width: 50px; height: 50px;" alt="image"></textarea>
                            
                        </div>

                        <button type="submit" name="article_add" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Lưu lại
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="input-item form-group">
            <label for="image" class="">Image</label>
            <img src="assets/upload/new<?php echo $row['article_image'] ?>" class="article__image w-100 h-100" style="width: 50px; height: 50px;" alt="image">
            <input type="file" name="article_image" value="<?php echo $row['article_image'] ?>">
        </div>  

<style>
    /* CSS for styling the layout */
.row {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 10px;
}

/* Header styling */
.row > div:first-child {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

h3 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

/* Form styling */
.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 16px;
}

.card-body {
    padding: 20px;
}

.input-item {
    margin-bottom: 16px;
}

.input-item label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.input-item input,
.input-item textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    resize: none;
}

.input-item textarea {
    min-height: 100px;
}

/* Button styling */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* Image styling */
.article__image {
    border: 1px solid #ddd;
    border-radius: 4px;
    object-fit: cover;
}

input[type="file"] {
    margin-top: 8px;
}

/* Responsive design */
@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }

    .col-lg-8 {
        width: 100%;
    }

    .btn {
        width: 100%;
        text-align: center;
    }
}

</style>