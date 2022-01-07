<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="web/css/score/addScore.css" rel="stylesheet">
    <title>Add Score Complete</title>
</head>

<?php


foreach ($student as $key => $value) {
    if ($value['id'] == ($_SESSION["add_student"])) {
        $name_student = $value['name'];
    }
}

unset($_SESSION['add_student']);
unset($_SESSION['add_subject']);
unset($_SESSION['add_teacher']);
unset($_SESSION['add_score']);
unset($_SESSION['add_comment']);
?>

<body>
    <fieldset class="fieldset_score_add_complete">
        <p>Bạn đã nhập điểm thành công cho sinh viên <b><?php echo $name_student; ?></b> thành công.</p>
        <a href="home.php">Trở về trang chủ</a>

    </fieldset>
</body>

</html>