
<!-- He dieu hanh -->
<div class="config-section">
    <h3>Hệ Điều Hành</h3>
    <div class="config-options">
        <?php foreach ($os_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-os-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-os-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
            
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

 <!-- CPU Selection -->
 <div class="config-section">
    <h3>CPU</h3>
    <div class="config-options">
        <?php foreach ($cpu_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-cpu-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-cpu-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
            
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- VGA Selection -->
<div class="config-section">
    <h3>VGA</h3>
    <div class="config-options">
        <?php foreach ($vga_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-vga-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-vga-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
            
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>


 <!-- MAINBOARD Selection -->
 <div class="config-section">
    <h3>MAINBOARD</h3>
    <div class="config-options">
        <?php foreach ($main_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-main-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-main-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
            
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

 <!-- RAM Selection -->
 <div class="config-section">
    <h3>Ram</h3>
    <div class="config-options">
        <?php foreach ($ram_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-ram-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-ram-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>

            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- SSD Selection -->
<div class="config-section">
    <h3>SSD</h3>
    <div class="config-options">
        <?php foreach ($ssd_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-ssd-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-ssd-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
        
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

  <!-- CASE Selection -->
  <div class="config-section">
    <h3>Thùng Máy </h3>
    <div class="config-options">
        <?php foreach ($case_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-case-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-case-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
        
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- MONITOR Selecyion  -->
<div class="config-section">
<h3>Phụ Kiện</h3>
<div class="config-sections">
<h5>Màn Hình</h5>
    <div class="config-options">
        <?php foreach ($monitor_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-monitor-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-monitor-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
        
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!--KEY_MOUSE Selecyion -->
<div class="config-section">
    <h5>Phím & Chuột</h5>
    <div class="config-options">
        <?php foreach ($key_mouse_list as $index => $product): ?>
            <?php if (!empty($product->popup)): ?>
                <div class="modal fade" id="popup-key_mouse-<?= $index ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content"><?= $product->popup ?></div>
                    </div>
                </div>
                <?php $detailButton = "<div class='detail-button-wrapper'><a href='#' data-toggle='modal' data-target='#popup-key_mouse-{$index}'>Chi Tiết</a></div>"; ?>
            <?php else: ?>
                <?php $detailButton = ''; ?>
            <?php endif; ?>
        
            <div class="config-option <?= $index === 0 ? 'selected' : '' ?>" 
                data-product='<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>'>
                <input type="radio" name="<?= $product->type ?>" value="" <?= $index === 0 ? 'checked' : '' ?> hidden>
                <div class="option-info">
                    <span class="option-name"><?= $product->name ?></span>
                    <span class="option-desc"><?= $product->sub_note ?></span>
                    <?= $detailButton ?>
                </div>
                <span class="option-price"><?= $product->side_note ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!--Thêm ảnh -->
<?php 
$thumbnail_list = [ "../assets/images/case_cpc_right_.jpg",
                    "../assets/images/case_cpc_inside1.jpg",
                    "../assets/images/case_cpc_front_.jpg"
                  ];
?>
 <!-- Product Gallery -->
 <div class="product-gallery">
    <div class="main-image-container">
        <button class="nav-btn prev-btn" onclick="navigateSlider(-1)">❮</button>
        <img src="<?php echo $thumbnail_list[0]; ?>" class="main-image" id="mainImage" alt="Main Image">
        <button class="nav-btn next-btn" onclick="navigateSlider(1)">❯</button>
    </div>
    <div class="thumbnail-slider">
        <?php
        foreach ($thumbnail_list as $index => $thumbnail) {
            $activeClass = $index === 0 ? 'active' : '';
            echo "
            <div class=\"thumbnail $activeClass\">
                <img src=\"$thumbnail\" alt=\"Thumbnail $index\" onclick=\"changeImage(this)\">
            </div>";
        }
        ?>
    </div>
</div>
<!--Thêm url -->
<p><em>Nguồn: <a href=""></a></em></p>  

<!--Thay đổi tên file -->
<?php
function convertTitleToFileName($title) {
    // Thay thế các ký tự tiếng Việt có dấu thành không dấu
    $title = strtr($title, [
        'à'=>'a','á'=>'a','ạ'=>'a','ả'=>'a','ã'=>'a',
        'â'=>'a','ầ'=>'a','ấ'=>'a','ậ'=>'a','ẩ'=>'a','ẫ'=>'a',
        'ă'=>'a','ằ'=>'a','ắ'=>'a','ặ'=>'a','ẳ'=>'a','ẵ'=>'a',
        'è'=>'e','é'=>'e','ẹ'=>'e','ẻ'=>'e','ẽ'=>'e',
        'ê'=>'e','ề'=>'e','ế'=>'e','ệ'=>'e','ể'=>'e','ễ'=>'e',
        'ì'=>'i','í'=>'i','ị'=>'i','ỉ'=>'i','ĩ'=>'i',
        'ò'=>'o','ó'=>'o','ọ'=>'o','ỏ'=>'o','õ'=>'o',
        'ô'=>'o','ồ'=>'o','ố'=>'o','ộ'=>'o','ổ'=>'o','ỗ'=>'o',
        'ơ'=>'o','ờ'=>'o','ớ'=>'o','ợ'=>'o','ở'=>'o','ỡ'=>'o',
        'ù'=>'u','ú'=>'u','ụ'=>'u','ủ'=>'u','ũ'=>'u',
        'ư'=>'u','ừ'=>'u','ứ'=>'u','ự'=>'u','ử'=>'u','ữ'=>'u',
        'ỳ'=>'y','ý'=>'y','ỵ'=>'y','ỷ'=>'y','ỹ'=>'y',
        'đ'=>'d',
        'À'=>'A','Á'=>'A','Ạ'=>'A','Ả'=>'A','Ã'=>'A',
        'Â'=>'A','Ầ'=>'A','Ấ'=>'A','Ậ'=>'A','Ẩ'=>'A','Ẫ'=>'A',
        'Ă'=>'A','Ằ'=>'A','Ắ'=>'A','Ặ'=>'A','Ẳ'=>'A','Ẵ'=>'A',
        'È'=>'E','É'=>'E','Ẹ'=>'E','Ẻ'=>'E','Ẽ'=>'E',
        'Ê'=>'E','Ề'=>'E','Ế'=>'E','Ệ'=>'E','Ể'=>'E','Ễ'=>'E',
        'Ì'=>'I','Í'=>'I','Ị'=>'I','Ỉ'=>'I','Ĩ'=>'I',
        'Ò'=>'O','Ó'=>'O','Ọ'=>'O','Ỏ'=>'O','Õ'=>'O',
        'Ô'=>'O','Ồ'=>'O','Ố'=>'O','Ộ'=>'O','Ổ'=>'O','Ỗ'=>'O',
        'Ơ'=>'O','Ờ'=>'O','Ớ'=>'O','Ợ'=>'O','Ở'=>'O','Ỡ'=>'O',
        'Ù'=>'U','Ú'=>'U','Ụ'=>'U','Ủ'=>'U','Ũ'=>'U',
        'Ư'=>'U','Ừ'=>'U','Ứ'=>'U','Ự'=>'U','Ử'=>'U','Ữ'=>'U',
        'Ỳ'=>'Y','Ý'=>'Y','Ỵ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y',
        'Đ'=>'D'
    ]);

    // Chuyển sang chữ thường
    $title = strtolower($title);

    // Thay thế các ký tự không phải chữ hoặc số bằng dấu gạch ngang
    $title = preg_replace('/[^a-z0-9\s]+/u', '', $title);
    $title = preg_replace('/\s+/', '-', $title);

    return $title . '.php';
}

// Tiêu đề bài viết
$tieuDeBaiViet = "Palit giới thiệu Pandora, một máy tính AI nhỏ gọn được trang bị NVIDIA Jetson Orin NX Super";

// Tên file mới
$tenFileMoi = convertTitleToFileName($tieuDeBaiViet);
echo "Tên file mới là: $tenFileMoi<br>";

// Đổi tên file
$tenFileCu = 'tintuc38.php';

if (!file_exists($tenFileCu)) {
    echo "Lỗi: File cũ ($tenFileCu) không tồn tại.<br>";
} else {
    if (!is_writable($tenFileCu)) {
        echo "Lỗi: Không có quyền ghi trên file cũ ($tenFileCu).<br>";
    } else {
        if (rename($tenFileCu, $tenFileMoi)) {
            echo "Đổi tên file thành công: $tenFileMoi<br>";
        } else {
            echo "Lỗi: Không thể đổi tên file.<br>";
        }
    }
}
?>
<!-- popup đoạn -->

<div class="modal-header">
    <h5 class="modal-title">AMD Ryzen 3 Pro 4350G</h5>
    <button type="button" class="close" data-dismiss="modal">x</button>
</div>
<div class="modal-body">
    <img src="../assets/images/ryzen3-4350g.jpg" alt="Ryzen 3 Pro 4350G" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
    <p class="mb-4" style="color: #000">
        AMD Ryzen 3 Pro 4350G là lựa chọn tuyệt vời cho máy tính văn phòng nhờ hiệu năng mạnh mẽ với 4 nhân, 8 luồng và đồ họa tích hợp Radeon Vega.
        Bộ vi xử lý này đáp ứng tốt các tác vụ như soạn thảo, bảng tính, họp trực tuyến và xem video, đồng thời tiết kiệm chi phí khi không cần card đồ họa rời.
        Với TDP 65W, 4350G hoạt động mát mẻ, tiết kiệm điện, lý tưởng cho hệ thống văn phòng hiện đại.
    </p>
    <br><br>
    <a href="https://amdvietnam.vn/amd-ryzen-3-pro-4350g.html" target="_blank">Xem thêm ></a>
</div>

<!--chia đôi -->
<div class="modal-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start;">
    <div class="modal-item" style="width: 48%; box-sizing: border-box;">
        <div class="modal-header">
            <h5 class="modal-title">BÀN PHÍM ROSA V100</h5>
        </div>
        <div class="modal-body">
            <img src="../assets/images/BANPHIM-ROSA-V100.jpg" alt="BÀN PHÍM ROSA V100" style="width: 100%; display: block; margin: 10px auto;">
            <p class="mb-4" style="color: #000;">
                Bàn phím ROSA V100 sở hữu thiết kế đơn giản, bền bỉ với chất liệu cao cấp, mang lại trải nghiệm gõ phím êm ái và chính xác. 
                Sản phẩm phù hợp cho cả làm việc và giải trí, đáp ứng tốt nhu cầu sử dụng hàng ngày.       
            </p>
        </div>
    </div>

    <div class="modal-item" style="width: 48%; box-sizing: border-box;">
        <div class="modal-header">
            <h5 class="modal-title">CHUỘT ROSA V100</h5>
        </div>
        <div class="modal-body">
            <img src="../assets/images/CHUOT-ROSA-V100.jpg" alt="CHUỘT ROSA V100" style="width: 100%; display: block; margin: 10px auto;">
            <p class="mb-4" style="color: #000;">
                Chuột ROSA V100 được thiết kế đơn giản nhưng tinh tế, mang lại cảm giác cầm nắm thoải mái và dễ dàng sử dụng. 
                Với độ nhạy DPI tùy chỉnh, sản phẩm đáp ứng tốt các nhu cầu làm việc và giải trí hàng ngày.        
            </p>
        </div>
    </div>
</div>

<!-- popup hàng dọc  -->
<div class="modal-header">
        <h5 class="modal-title">BÀN PHIM ROSA V100</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
    <div class="modal-body">
        <img src="../assets/images/BANPHIM-ROSA-V100.jpg" alt="Ryzen 3 Pro 4350G" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <p class="mb-4" style="color: #000">
            Bàn phím ROSA V100 sở hữu thiết kế đơn giản, bền bỉ với chất liệu cao cấp, mang lại trải nghiệm gõ phím êm ái và chính xác. 
            Sản phẩm phù hợp cho cả làm việc và giải trí, đáp ứng tốt nhu cầu sử dụng hàng ngày.       
        </p>
        <br><br>
       
    </div>
    <div class="modal-header">
        <h5 class="modal-title">CHUỘT ROSA V100</h5>
    </div>
    <div class="modal-body">
        <img src="../assets/images/CHUOT-ROSA-V100.jpg" alt="Ryzen 3 Pro 4350G" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">
        <p class="mb-4" style="color: #000">
            Chuột ROSA V100 được thiết kế đơn giản nhưng tinh tế, mang lại cảm giác cầm nắm thoải mái và dễ dàng sử dụng. 
            Với độ nhạy DPI tùy chỉnh, sản phẩm đáp ứng tốt các nhu cầu làm việc và giải trí hàng ngày.        
        </p>
        <br><br>
    </div>

<!-- popup bảng -->
<div class="modal-header">
        <h5 class="modal-title">Tính năng nổi bật của Windows 11 Pro</h5>
        <button type="button" class="close" data-dismiss="modal">x</button>
    </div>
<div class="modal-body">
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <img src="../assets/images/MAINBOARD_ASUS PRIME N100I-D D4.png" alt="B550M-A" style="width: 100%; max-width: 400px; display: block; margin: 10px auto;">

        <thead>
            <tr style="background-color: #f1f1f1;">
                <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Tính năng</th>
                <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Mô tả</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><b>Bảo mật nâng cao</b></td>
                <td style="padding: 10px; border: 1px solid #ddd;">Tích hợp BitLocker, bảo vệ dữ liệu an toàn.</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><b>Quản lý thiết bị từ xa</b></td>
                <td style="padding: 10px; border: 1px solid #ddd;">Hỗ trợ Azure Active Directory và Group Policy.</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><b>Ảo hóa</b></td>
                <td style="padding: 10px; border: 1px solid #ddd;">Cung cấp Hyper-V và Windows Sandbox cho môi trường thử nghiệm.</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><b>Tối ưu đa nhiệm</b></td>
                <td style="padding: 10px; border: 1px solid #ddd;">Snap Layouts, Snap Groups giúp sắp xếp cửa sổ dễ dàng.</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><b>Tích hợp Microsoft Teams</b></td>
                <td style="padding: 10px; border: 1px solid #ddd;">
                    <br> Kết nối nhanh chóng và tiện lợi cho công việc.</br>
                    <br> Kết nối nhanh chóng và tiện lợi cho mọi công việc. </br>
                </td>
            </tr>

            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;"><b>Windows Copilot</b></td>
                <td style="padding: 10px; border: 1px solid #ddd;">Trợ lý AI tích hợp hỗ trợ tìm kiếm, quản lý và tăng hiệu suất làm việc.</td>
            </tr>
        </tbody>
    </table>
    <br><br>
</div>  
    
<!-- rút gọn doạn code sản phẩm -->

<div class="product-group vp">
    <?php 
    $ai_list = [$rosa_ai]; // all list product
    foreach ($ai_list as $product) {
        ?>
            <div class="card">
            <div class="image-container">
                <a href="<?= htmlspecialchars($product->page) ?>">
                    <img src="<?= htmlspecialchars($product->image) ?>" alt="ai">
                </a>
            </div>
            <div class="details">
                <h3 style="color: red;"><?= htmlspecialchars($product->title) ?></h3>
                <p><?= htmlspecialchars($product->subtitle) ?></p>
                <div class="key-specs">
                    <?= $product->content ?>
                </div>
                <div class="price"><?= htmlspecialchars($product->price) ?></div>
                <a href="<?= htmlspecialchars($product->page) ?>" class="shop-button">Mua ngay</a>
            </div>
    </div>
        <?php
     }
    ?>
    </div>
</div>

<!-- cố định bảng tại 1 vị trí khi lướt sản phẩm-->
<div class="specs-table">
    <h3>Cấu Hình</h3>
    <table>
        <tr>
            <td class="spec-name">CPU</td>
            <td class="spec-value" id="table_cpu"></td>
        </tr>
        <tr>
            <td class="spec-name">Mainboard</td>
            <td class="spec-value" id="table_main"></td>
        </tr>
        <tr>
            <td class="spec-name">VGA</td>
            <td class="spec-value" id="table_vga"></td>
        </tr>
        <tr>
            <td class="spec-name">RAM</td>
            <td class="spec-value" id="table_ram"></td>
        </tr>
        <tr>
            <td class="spec-name">SSD</td>
            <td class="spec-value" id="table_ssd"></td>
        </tr>
        <tr>
            <td class="spec-name">Thùng máy</td>
            <td class="spec-value" id="table_case"></td>
        </tr>
        <tr>
            <td class="spec-name">Cổng kết nối trước</td>
            <td class="spec-value" id="table_port_front"></td>
        </tr>
        <tr>
            <td class="spec-name">Cổng kết nối sau</td>
            <td class="spec-value" id="table_port_rear"></td>
        </tr>
        <tr>
            <td class="spec-name">Cổng xuất hình</td>
            <td class="spec-value" id="table_display"></td>
            <!-- <td class="spec-value" id="table_display"><?php echo $mainboard_display; ?></td> -->
        </tr>
        <tr>
            <td class="spec-name">Nguồn</td>
            <td class="spec-value" id="table_psu"></td>
        </tr>
        <tr>
            <td class="spec-name">Tản Nhiệt</td>
            <td class="spec-value" id="table_cooler"></td>
        </tr>
        <tr>
            <td class="spec-name">Hệ điều hành</td>
            <td class="spec-value" id="table_os"></td>
        </tr>
    </table>
</div>

<style>
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
</style>

<!-- sanpham khac -->
<?php

// session_start(); // Bắt đầu session

// Nhập tệp common.php
include '../data/common_test.php';

// Lấy tên tệp hiện tại (loại bỏ đường dẫn)
$current_page = basename($_SERVER['PHP_SELF']); // VD: "ROSA-OFFICE.php"

// Danh sách sản phẩm đã được chọn (lưu trong session nếu có)
$selected_products = isset($_SESSION['random_products']) ? $_SESSION['random_products'] : [];

// Mảng sản phẩm sau khi lọc
$filtered_list_sp= array_filter($list_sp, function ($product) use ($current_page, $selected_products) {
    // Lấy tên file từ đường dẫn của sản phẩm
    $product_page = basename($product->page);

    // Loại bỏ sản phẩm thuộc trang hiện tại
    if (strcasecmp($product_page, $current_page) === 0) {
        return false;
    }

    // Loại bỏ sản phẩm đã được chọn trước đó
    foreach ($selected_products as $selected) {
        if ($selected->title === $product->title) {
            return false;
        }
    }

    return true; // Giữ lại sản phẩm không bị loại
});

// Nếu danh sách không đủ sản phẩm, dừng hiển thị
if (count($filtered_list_sp) < $num_products_to_display) {
    echo "<p>Không có đủ sản phẩm để hiển thị.</p>";
    return;
}

// Chọn ngẫu nhiên số sản phẩm cần hiển thị từ danh sách đã lọc
$random_products = [];
$used_indexes = [];

while (count($random_products) < $num_products_to_display) {
    $random_index = rand(0, count($filtered_list_sp) - 1);
    if (!in_array($random_index, $used_indexes)) {
        $random_products[] = $filtered_list_sp[$random_index];
        $used_indexes[] = $random_index;
    }
}

// Lưu danh sách sản phẩm đã chọn vào session
$_SESSION['random_products'] = $random_products;

// Hiển thị các sản phẩm
echo "<div style='display: flex; justify-content: center; align-items: center; text-align: center; height:30px;'>
    <h3><b style='color:red'>Các sản phẩm khác.</b> Khám phá các máy bộ tương tự</h3></div>";

echo "<div class='product-container'>"; // Container Flexbox
foreach ($random_products as $product) {
        $product_link = "/{$product->page}";
    echo "<div class='product-item'>"; // Thêm class cho mỗi sản phẩm
    echo "<img src='../$product->image' alt='{$product->title}'>";
    echo "<h3 class='product-title'>{$product->title}</h3>";
    echo "<p>{$product->subtitle}</p>";
    echo "<ul>";
    foreach (explode("\n", $product->content) as $line) {
        echo "<li>$line</li>";
    }
    echo "</ul>";
    echo "<b class='product-price'> {$product->price}</b>";
    echo "<a href='{$product_link}'>Mua ngay</a>";
    echo "</div>";
}
echo "</div>";
?>

<style>

    .product-container {
        display: flex;
        flex-wrap: wrap; /* Cho phép xuống hàng nếu không đủ không gian */
        justify-content: space-between; /* Khoảng cách đều giữa các sản phẩm */
        gap: 20px; /* Khoảng cách giữa các sản phẩm */
        margin: 20px 0; /* Khoảng cách trên và dưới cho container */
        width: 100%; /* Chiều rộng toàn bộ container */
        text-align: left; /* Căn chỉnh các nội dung về phía trái */
    }

    .product-item {
        flex: 1 1 calc(25% - 20px); /* 4 sản phẩm trên 1 hàng */
        /* flex: 1 1 calc(16.66% - 20px); */ /* Nếu muốn 6 sản phẩm trên 1 hàng */
        border: 1px solid #ccc; /* Viền cho sản phẩm */
        border-radius: 10px; /* Bo góc cho sản phẩm */
        padding: 16px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: left;
        height: auto;
    }


    .product-price {
        align-self: flex-start; /* Đặt giá bên trái */
        margin-top: 10px; /* Tạo khoảng cách giữa giá và các phần tử khác */
        color:#000;
    }

    .product-title {
        color: #000;
        font-size: 25px;
        align-self: flex-start; /* Đẩy giá về phía bên trái */
        margin-top: 16px; /* Khoảng cách phía trên giá */
        text-align: left; /* Căn chỉnh nội dung bên trong sang trái */
        width: 100%; /* Đảm bảo giá chiếm toàn bộ chiều rộng */
    }

    .product-item img {
        width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng của khung */
        height: 195px; /* Chiều cao cố định của khung chứa ảnh */
        object-fit: contain; /* Giữ nguyên tỷ lệ ảnh, không cắt */
        object-position: center; /* Căn giữa ảnh trong khung */
        border-radius: 10px; /* Bo góc cho hình ảnh */
    }

    .product-item h3 {
        font-size: 16px;
        margin: 10px 0;
        color: red;
    }

    .product-item p {
        font-size: 16px;
        color: #000000;
        margin: 5px 0;
        align-self: flex-start; /* Đẩy giá về phía bên trái */
        text-align: left; /* Căn chỉnh các nội dung về phía trái */
    }

    .product-item ul {
        list-style-type: none; /* Bỏ dấu chấm ở đầu dòng */
        padding: 0; /* Bỏ khoảng cách bên trái */
        margin: 0; /* Bỏ khoảng cách bên ngoài */
    }

    .product-item li {
        margin-bottom: 4px; /* Khoảng cách giữa các dòng */
    }

    .product-item a {
        display: inline-block;
        width: 100%; /* Nút mua sẽ rộng toàn bộ thẻ */
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

    .product-item a:hover {
        background-color: #cc0000; /* Màu khi hover */
    }

    @media (max-width: 768px) {
        .product-item {
            flex: 1 1 calc(50% - 20px); /* 2 sản phẩm trên 1 hàng khi màn hình nhỏ */
        }
    }

    @media (max-width: 480px) {
        .product-item {
            flex: 1 1 100%; /* 1 sản phẩm trên 1 hàng khi màn hình rất nhỏ */
        }
    }

</style>

<!-- Bật hiển thị lỗi trên cpanel error_log -->

<?php
// Bật hiển thị lỗi
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
 <!-- link ở ảnh sản phâm -->
<a href="product.php#vanphong"><img src="Rosa_Office_3-removebg-preview.png" alt="PC" class="small" style= " bottom: 270px;"></a>

<!--  -->
