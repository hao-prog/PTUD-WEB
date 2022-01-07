<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./web/css/score/addScore.css" rel="stylesheet">
    <title>Add Score</title>
</head>

<?php


$name_student = $name_subject = $name_teacher  = $comment = '';
$score = null;
if (isset($_SESSION["add_student"])) {
    $name_student = $_SESSION["add_student"];
}
if (isset($_SESSION["add_subject"])) {
    $name_subject = $_SESSION["add_subject"];
}
if (isset($_SESSION["add_teacher"])) {
    $name_teacher = $_SESSION["add_teacher"];
}
if (isset($_SESSION["add_score"])) {
    $score = $_SESSION["add_score"];
}
if (isset($_SESSION["add_comment"])) {
    $comment = $_SESSION["add_comment"];
}

$student_error = $error['student'] ?? '';
$subject_error = $error['subject'] ?? '';
$teacher_error = $error['teacher'] ?? '';
$score_error = $error['score'] ?? '';
$comment_error = $error['comment'] ?? '';

?>

<body>
    <form method="POST" action="" class="form_add_score">
        <fieldset class="form_add_score_fieldset">
            <div class='error_add_score'>
                <?php echo $student_error; ?>
            </div>

            <div class="student">
                <label class="student_label">Sinh viên</label>
                <select class="student_select" id="student" name="student">
                    <option></option>
                    <?php
                    foreach ($student as $key => $value) {
                        if ($value['id'] == $name_student) {
                            echo ' <option value="' . $value['id'] . '" selected >' . $value['name'] . '</option>';
                        } else
                            echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class='error_add_score'>
                <?php echo $subject_error; ?>
            </div>

            <div class="subject">
                <label class="subject_label">Môn học</label>
                <select class="subject_select" id="subject" name="subject">
                    <option></option>
                    <?php
                    foreach ($subject as $key => $value) {
                        if ($value['id'] == $name_subject) {
                            echo ' <option value="' . $value['id'] . '" selected >' . $value['name'] . '</option>';
                        } else
                            echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class='error_add_score'>
                <?php echo $teacher_error; ?>
            </div>
            <div class="teacher">
                <label class="teacher_label">Giáo viên</label>
                <select class="teacher_select" id="teacher" name="teacher">
                    <option></option>
                    <?php
                    foreach ($teacher as $key => $value) {
                        if ($value['id'] == $name_teacher) {
                            echo ' <option value="' . $value['id'] . '" selected >' . $value['name'] . '</option>';
                        } else
                            echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class='error_add_score'>
                <?php echo $score_error; ?>
            </div>
            <div class="score">
                <label class="score_label">Điểm</label>
                <select class="score_select" id="score" name="score">
                    <option></option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        if ($i == 0 && $score != null && $i == $score) {
                            echo ' <option value="' . $score . '" selected>' . $score . ' điểm</option>';
                        }
                        if ($i == $score && $i != 0) {
                            echo ' <option value="' . $score . '" selected >' . $score . ' điểm</option>';
                        } else
                            echo '<option value="' . $i . '">' . $i . ' điểm</option>';
                    }

                    ?>
                </select>
            </div>
            <div class='error_add_score'>
                <?php echo $comment_error; ?>
            </div>
            <div class="comment">
                <label class="comment_label">Comment chi tiết</label>
                <textarea id="comment_text" type="textarea" name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>

            </div>
            <div class="submit">
                <button class="btnSubmit_add" type="submit" id="submit" name="submitaddScore">Xác nhận</button>
            </div>
        </fieldset>
    </form>
</body>

</html>