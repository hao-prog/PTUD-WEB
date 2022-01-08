<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./web/css/score/editScore.css" rel="stylesheet">
    <title>Edit Score</title>
</head>
<?php

if (isset($_SESSION["student"])) {
    $dataScore[0][1] = $_SESSION["student"];
}
if (isset($_SESSION["teacher"])) {
    $dataScore[0][2] = $_SESSION["teacher"];
}
if (isset($_SESSION["subject"])) {
    $dataScore[0][3] = $_SESSION["subject"];
}
if (isset($_SESSION["score"])) {
    $dataScore[0][4] = $_SESSION["score"];
}
if (isset($_SESSION["comment"])) {
    $dataScore[0][5] = $_SESSION["comment"];
}
if (isset($_GET["id"])) {
    $_SESSION['ID_SCORE'] = $_GET["id"];
}

?>

<body>
    <form method="POST" action="" class="form_edit_score">
        <fieldset class="form_edit_score_fieldset">
            <div class='error_score'>
                <?php echo isset($error['student']) ? $error['student'] : ''; ?>
                <?php echo isset($error['subject']) ? $error['subject'] : ''; ?>
                <?php echo isset($error['teacher']) ? $error['teacher'] : ''; ?>
                <?php echo isset($error['score']) ? $error['score'] : ''; ?>
                <?php echo isset($error['comment']) ? $error['comment'] : ''; ?>
            </div>

            <div class="student">
                <label class="student_label">Sinh viên</label>
                <select class="student_select" id="student" name="student">
                    <?php
                    foreach ($student as $key => $value) {
                        if ($value['id'] == $dataScore[0][1]) {
                            echo ' <option value="' . $value['id'] . '" selected >' . $value['name'] . '</option>';
                        } else
                            echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="subject">
                <label class="subject_label">Môn học</label>
                <select class="subject_select" id="subject" name="subject">
                    <?php
                    foreach ($subject as $key => $value) {
                        if ($value['id'] == $dataScore[0][3]) {
                            echo ' <option value="' . $value['id'] . '" selected >' . $value['name'] . '</option>';
                        } else
                            echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>

            <div class="teacher">
                <label class="teacher_label">Giáo viên</label>
                <select class="teacher_select" id="teacher" name="teacher">
                    <?php
                    foreach ($teacher as $key => $value) {
                        if ($value['id'] == $dataScore[0][2]) {
                            echo ' <option value="' . $value['id'] . '" selected >' . $value['name'] . '</option>';
                        } else
                            echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="score">
                <label class="score_label">Điểm</label>
                <select class="score_select" id="score" name="score">
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        if ($i == $dataScore[0][4]) {
                            echo '<option value="' . $dataScore[0][4] . '" selected>' . $dataScore[0][4] . ' điểm</option>';
                        } else
                            echo '<option value="' . $i . '">' . $i . ' điểm</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="comment">
                <label class="comment_label">Comment chi tiết</label>
                <textarea id="comment_text" type="textarea" name="comment" rows="5" cols="40"><?php echo $dataScore[0][5] ?></textarea>

            </div>
            <div class="submit">
                <button class="btnSubmit_edit" type="submit" id="submit" name="submitEditScore">Xác nhận</button>
            </div>
        </fieldset>
    </form>
</body>

</html>