<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="web/css/student/addStudent.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" class="col-sm-6 form-add-student" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="student_name" class="col-sm-4 col-form-label">Họ và tên</label>
            <div class="col-sm-5">
                <input type="text" name="student_name" class="form-control" style="background-color: while;"disabled value="<?php echo $_SESSION['student_name']?>" id="student_name">
            </div>
        </div>

        <div class="form-group row">
            <label for="avatar" class="col-sm-4 col-form-label">Avatar</label>
            <div class="col-sm-5">
                <img src="web/avatar/tmp/<?php echo $_SESSION['student_image'] ?>" alt="" width="70%" height="auto">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label">Mô tả thêm</label>
            <div class="col-sm-7">
                <textarea class="form-control" name="student_description" 
                    disabled cols="50" rows="5"><?php echo $_SESSION['student_description'] ?></textarea>
            </div>
        </div>

        <div class="add-submit">
            <input class="button-smt" type="button" onclick="history.back()" value="Sửa lại">
            <input class="button-smt "type="submit" name="student_add_confirm" value="Đăng ký">
        </div>

    </form>
</body>
</html>
