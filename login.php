<!DOCTYPE html> 
<html lang="vi">
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" 
            href="web/css/login.css?v=<?php echo time(); ?>">
        <?php   
            header('Content-Type: text/html; charset=utf-8');
            date_default_timezone_set("Asia/Ho_Chi_Minh");
        ?>
    </head>
    <body>
        <?php 
        require_once 'app/common/connectionPDO.php';
        include 'app/model/admin.php';
        include 'app/controller/login_valid.php'; 
        ?>

        <div class="container">
            <form autocomplete="off" method="post">
                <p id="username-error"><?php echo $usernameErr; ?></p>

                <div class="form-group">
                    <label id="username-label" for="username">Người dùng</label>
                    <input type="text" id="username" name="username" autofocus
                        value="<?php echo isset($_POST["username"]) ? $_POST["username"] : "" ?>" >
                </div>

                <p id="password-error"><?php echo $passwordErr; ?></p>

                <div class="form-group">
					<label id="password-label" for="password">Password</label>
					<input type="password" id="password" name="password" 
						value="<?php echo isset($_POST["password"]) ? $_POST["password"] : "" ?>" > 
				</div>

                <div class="forget-password"><a href="app/controller/request_passwordController.php">Quên password</a></div>

				<button type="submit" name="submit" value="Submit">Đăng nhập</button>
            </form>
        </div>
    </body>
</html>
