<?php
session_start();

// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang admin
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('location:  admin/menu.php');
    exit;
}

// Xử lý khi người dùng gửi biểu mẫu đăng nhập
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Thay đổi thông tin đăng nhập ở đây
    $username = 'admin';
    $password = '123456';

    // Lấy thông tin từ biểu mẫu
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    if ($input_username === $username && $input_password === $password) {
        // Đăng nhập thành công
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $input_username;
        header('location: admin/menu.php');
        exit;
    } else {
        $error = 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
}
?>
<?php if (isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>

    <div class="form-container">
        <img src="/assets/user/user2.png" alt="Icon">
        <h2>Administrator</h2>
        <p>Xin chào, vui lòng nhập thông tin đăng nhập</p>
        <form action="" method="post">
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="username" name="username" placeholder="username" required>
            </div>
            <br>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Mật khẩu" required>
            </div>
           
            <button type="submit">Hoàn tất <i class="fa fa-arrow-right"></i></button>
        </form>
    </div>

    <!-- Thêm link icon từ FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #fff;
            width: 400px;
            border-radius: 8px;
            padding: 30px 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-container img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
        }

        .form-container h2 {
            font-size: 20px;
            color: #ff5722;
            margin-bottom: 70px;
        }

        .form-container p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .form-container .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .form-container .input-group input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .form-container .input-group input:focus {
            outline: none;
            border-color: #007bff;
            background-color: #fff;
        }

        .form-container .input-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #aaa;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container button i {
            margin-left: 8px;
        }
    </style>

