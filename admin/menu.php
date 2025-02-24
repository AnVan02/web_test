<?php 
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = "-1";
    }

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
    }
    else {
        $query = "-1";
    }
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?php if ($action === 'home') { echo "active"; } ?>">
            <a class="nav-link" href="index.php?action=home&query">
                <i class="menu-icon mdi mdi-home"></i>
                <span class="menu-title">Trang chủ </span>
                <!-- <?php echo $_SESSION['account_type'] ?> -->
            </a>
        </li>

        <li class="nav-item <?php if ($action === 'banner') { echo "active"; } ?>">
        <a class="nav-link" href="index.php?action=banner&query=banner">
                <i class="mdi mdi-image menu-icon"></i>
                <span class="menu-title">Banner</span>
            </a>
        </li>
   
        <li class="nav-item <?php if ($action === 'article') { echo "active"; } ?>">
            <a class="nav-link" href="blog/them.php">
                <i class="mdi mdi mdi-code-not-equal menu-icon"></i>
                <span class="menu-title">Bài viết</span>
            </a>
        </li>

        <li class="nav-item <?php if($action === 'article') {echo "active";}?>">
            <a class="nav-link" href="order.php">
                <i class="mdi mdi mdi-code-not-equal menu-icon"></i>
                    <span class="menu-title">Đơn hàng</span>
            </a>
        </li>

        

        <li class="nav-item <?php if ($action === 'account') { echo "active"; } ?>">
            <a class="nav-link" href="index.php?action=account&query=account_list">
                <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                <span class="menu-title">Tài khoản</span>
            </a>
        </li>

        <li class="nav-item <?php if ($action === 'settings') { echo "active"; } ?>">
            <a class="nav-link" href="index.php?action=settings&query=settings">
                <i class="menu-icon mdi mdi-settings-box"></i>
                <span class="menu-title">Cài đặt</span>
            </a>
        </li>
 
    </ul>
</nav>