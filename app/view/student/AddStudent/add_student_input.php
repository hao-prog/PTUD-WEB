<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="web/css/student/addStudent.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" class="col-sm-6 form-add-student" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="student_name" class="col-sm-4 col-form-label">Họ và tên</label>
            <div class="col-sm-5">
                <input type="text" name="student_name" class="form-control" value="<?php echo isset($data['student_name']) ? $data['student_name'] : '' ?>" id="student_name">
                <div class="message-error"><?php echo isset($error['student_name']) ? $error['student_name'] : ''; ?></div>
            </div>
        </div>

        <div class="form-group row">
            <label for="avatar" class="col-sm-4 col-form-label">Avatar</label>
            <div class="col-sm-5">
                <div class="custom-file">
                    <input type="file" name="student_image" accept="image/*" value="<?php echo $data['student_image'] ?>">
                    <div class="message-error"><?php echo isset($error['student_image']) ? $error['student_image'] : ''; ?></div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-4 col-form-label">Mô tả thêm</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="student_description"  id="description" cols="50" rows="5"><?php echo isset($data['student_description']) ? $data['student_description'] : "" ?></textarea>
                <div class="message-error"><?php echo isset($error['student_description']) ? $error['student_description'] : ''; ?></div>
            </div>
        </div>

        <div style="text-align:center">
            <input class="button-smt" type="submit" name="student_add" value="Xác nhận">
        </div>

    </form>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>