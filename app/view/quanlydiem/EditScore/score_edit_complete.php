<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="web/css/quanlydiem/editScore.css" rel="stylesheet">
    <title>Edit Score Complete</title>
</head>

<?php

foreach ($student as $key => $value) {
    if ($value['id'] == ($_SESSION["student"])) {
        $name_student = $value['name'];
    }
}

unset($_SESSION["student"]);
unset($_SESSION["subject"]);
unset($_SESSION["teacher"]);
unset($_SESSION["score"]);
unset($_SESSION["comment"]);
unset($_SESSION['ID_SCORE']);
?>

<body>
    <fieldset class="fieldset_score_edit_complete">
        <p>Bạn đã sửa điểm thành công cho sinh viên <b><?php echo $name_student ?></b> thành công.</p>
        <a href="home.php">Trở về trang chủ</a>

    </fieldset>
</body>

</html>