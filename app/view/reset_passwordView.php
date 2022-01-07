<?php 
     require_once '../../app/controller/reset_passwordController.php';
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../../web/css/reset_pass.css">

</head>
<body>
    <div class="reset">
        <span class="error"><?php global $password_Err; echo $password_Err;?></span><br><br>
        <table>
            <form name="form" method="POST" action="" id="form">
            <tr>
                <th>NO</th>
                <th>Tên người dùng</th>
                <th>Mật khẩu mới</th>
                <th>Action</th>
            </tr><br>
            <tr>
            <?php
               foreach(selectReset() as $row) { ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['login_id'];?></td>
                    <td><input class="input2" type="text" name="password_new[]"></td>
                    <td><button class="button2" name="login_id" value="<?php echo $row['login_id']?>" onclick="reset1()">Reset</button></td>
                    </tr>

            <?php }?> 
            </tr>
            </form> 
        </table>
    </div>
</body>
</html>
<script type="text/javascript">
    function reset1 (){
        document.getElementById("form").submit();
    }
</script>
