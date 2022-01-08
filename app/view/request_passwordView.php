<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="web/css/request_pass.css">
    <title>Request Password</title>
   
</head>
<body>
    <div class="request">
        <span class="error" style="color: red;"><?php echo $login_idErr;?></span><br><br>
        <form class="form" name="form" method="POST">
            <label>Người dùng</label>
            <input class="input" type="text" name="login_id">
            <input class="button" type="submit" name="submit" value="Gửi yêu cầu reset password">
        </form>
    </div>
</body>
</html>


