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
            <a class="nav-link" href="">
                <i class="menu-icon mdi mdi-home"></i>
                <span class="menu-title">Trang chủ </span>
                <!-- <?php echo $_SESSION['account_type'] ?> -->
            </a>
        </li>

        <li class="nav-item <?php if ($action === 'article') { echo "active"; } ?>">
            <a class="nav-link" href="order.php">
                <i class="mdi mdi mdi-code-not-equal menu-icon"></i>
                <span class="menu-title">Bài viết</span>
            </a>
        </li>
        
        <li class="nav-item <?php if($action ==='article') {echo"";} ?>">
            <a class="nav-link" href="tintuc/them.php">
                <i class="mdi mdi mdi-code-not-equal menu-icon"></i>
                <span class="menu-title">Đơn hàng </span>
            </a>
        </li>

        
        <?php if($_SESSION['account_type'] == 2): ?>
            <li class="nav-item <?php if ($action === 'settings') { echo "active"; } ?>">
                <a class="nav-link" href="index.php?action=settings&query=settings">
                    <i class="menu-icon mdi mdi-settings-box"></i>
                    <span class="menu-title">Cài đặt</span>
                </a>
            </li>
      
            <li></li>
        <?php endif; ?>
    </ul>
</nav>
