<link rel="stylesheet" href="css/login.css">
<section class="login">
    <div class="form-box">
        <div class="form-value">
            <form action="" autocomplete="on" method="POST">
                <h2>Thay đổi mật khẩu</h2>
                <?php
                if (isset($_POST['password_change'])) {
                    $account_email = $_SESSION['login'];
                    $password_old = $_POST['password_old'];
                    $password_new = $_POST['password_new'];
                    $sql = "SELECT * FROM account WHERE account_email='" . $account_email . "' AND account_password='" . $password_old . "' ";
                    $query = mysqli_query($mysqli, $sql);
                    $row = mysqli_fetch_array($query);
                    $count = mysqli_num_rows($query);
                    if ($count > 0) {
                        $sql_update = mysqli_query($mysqli, "UPDATE account SET account_password = '" . $password_new . "'");
                        echo '<p style="color:green; text-align: center;">Mật khẩu đã được thay đổi</p>';
                    } else {
                        echo '<p style="color:red; text-align: center;">Mật khẩu cũ không đúng vui lòng nhập lại</p>';
                    }
                }
                ?>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password_old" required>
                    <label for="">Mật khẩu cũ</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password_new" required>
                    <label for="">Mật khẩu mới</label>
                </div>
                <button type="submit" name="password_change">Lưu lại</button>
            </form>
        </div>
    </div>
</section>