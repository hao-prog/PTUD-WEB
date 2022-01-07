
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/PTUD-WEB-De-tai-3-Quan-ly-diem-sinh-vien/web/css/request_pass.css">
    <title>Request Password</title>
</head>
<body>
    <div class="request">
        <span class="error"><?php echo $login_idErr;?></span><br><br>
        <form class="form" name="form" method="POST" action="">
            <label>Người dùng</label>
            <input class="input" type="text" name="login_id">
            <input class="button" type="submit" name="submit" value="Gửi yêu cầu reset password">
        </form>
    </div>
</body>
</html>

