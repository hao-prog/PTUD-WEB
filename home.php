<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>Homepage</title>
		<link rel="stylesheet" type="text/css" href="web/css/home.css?v=<?php echo time(); ?>">
        <?php   
            header('Content-Type: text/html; charset=utf-8');
            // require_once 'app/controller/login_valid.php';
            // include 'expire.php';
            // expire("");
        ?>
    </head>

    <body>
        <?php 
        $departments = array("Phòng học", "Giáo viên", "Môn học", "Sinh viên", "Điểm"); 
        $links = array();
        ?>

        <div class="container">
            <p id="name-login">Tên login: <?php echo $_SESSION["username"]; ?></p>
            <a id="logout" href="logout.php">Logout</a>
            <p>Thời gian login: <?php echo $_SESSION["dateTime"]; ?></p>

            <?php for($i = 0; $i < count($departments); $i++) { ?>
                <div class="department">
                    <p><?php echo $departments[$i]; ?></p>

                    <a href="">Tìm kiếm</a>

                    <?php if($departments[$i] == "Điểm") {  
                        echo"<a href=\"\">Thêm điểm</a>";
                    } else { 
                        echo"<a href=\"\">Thêm mới</a>";
                    } ?>

                </div>
            <?php } ?>
        </div>
    </body>
    
</html>