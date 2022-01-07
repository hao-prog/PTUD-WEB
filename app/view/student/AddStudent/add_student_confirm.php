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
<form action="" method="post" class="col-sm-8 form-add-student" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="student_name" class="col-sm-4 col-form-label">Họ và tên</label>
            <div class="col-sm-4">
                <input type="hidden" name="student_name" value="<?php echo $_SESSION['student_name'] ?>">
                <label type="text" for="student_name" class="form-control"><?php echo $_SESSION['student_name'] ?></label>
            </div>
        </div>

        <div class="form-group row">
            <label for="avatar" class="col-sm-4 col-form-label">Avatar</label>
            <div class="col-sm-5">
                <input type="hidden" id="student_image" name="student_image" value="<?php echo $_SESSION['student_image'] ?>">
                <img src="web/avatar/tmp/<?php echo $_SESSION['student_image'] ?>" alt="" width="50%" height="auto">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label">Mô tả thêm</label>
            <div class="col-sm-7">
                <input type="hidden" name="student_description" value="<?php echo $_SESSION['student_description'] ?>">
                <label type="text" for="student_description" class="form-control"><?php echo $_SESSION['student_description'] ?></label>
            </div>
        </div>

        <div class="add-submit">
            <a onclick="history.back()">Quay lại</a>
            <input class="button-smt "type="submit" name="student_add_confirm" value="Đăng ký">
        </div>
    </form>
</body>
</html>
