<!-- form điền thông tin -->
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm tài khoản 
        </h3>
    </div>
</div>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <title>Liện hệ </title>
                    <div class="card-content">
                        <div class="input-item form-group">
                            <label for="author" class="d-block">Tên tài khoản</label>
                            <input id="author" type="text" name="author" class="d-block form-control" value="" placeholder="">
                        </div>

                        <div class="input-item form-group">
                            <label for="article_email" class="d-block">Số địa chỉ email của bạn</label>
                            <input type="email" name="article_email" class="form-control">
                        </div>
                        
                        <div class="input-item form-group">
                            <label for="form-number" class="d-block">Số điện thoại </label>
                            <input type="text" name="form-number" class="form-control" value="">
                        </div>

                        <div class="input-item form-group">
                            <label for="form-title" class="d-block">Nội dung bài viết </label>
                            <input type="text" name="form-title" class="d-block form-control" value="" placeholder="">
                        </div>

                        <button type="submit" name="article_add" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Gửi liên hệ 
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</form>
