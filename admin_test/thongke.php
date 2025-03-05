<div class="main-panel">
    <div class="content-wrapper" >
        <?php
        if (isset($_GET['action']) && $_GET['query']) {
            $action = $_GET['action'];
            $query = $_GET['query'];

        } else {
            $action = '';
            $query = '';
        }
        if ($action == 'dashboard' && $query == 'dashboard') {
            include("./modules/dashboard.php");
        }

        if($action == 'menu' && $query == 'tintuc'){
            include ("./admin/tintuc/lietke.php");
        }

        if($action =='banner' && $query == 'tintuc'){
            include ("./admin/tintuc/sua.php");
        }

        if($action == 'tintuc' && query == 'tintuc'){
            include ("./admin/tintuc/them.php");
        }

        if($action == 'tintuc' && query == 'tintuc'){
            include ("./admin/tintuc/xuly.php");
        }
      
        elseif($action =='settings' && $query == 'settings') {
            include("./modules/settings/main.php");
        }

        else {
            include("./modules/home.php");
        }
    ?>
    </div>
</div>