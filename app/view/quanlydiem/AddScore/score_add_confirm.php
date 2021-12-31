<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./web/css/quanlydiem/addScore.css" rel="stylesheet">
    <title>Add Score Confirm</title>
</head>

<body>
    <form method="POST" action="" class="form_add_score">
        <fieldset class="form_add_score_fieldset">
            <div class="student">
                <label class="student_label">Sinh viên</label>
                <label class='spans'> <?php foreach ($student as $key => $value) {
                                            if ($value['id'] == ($_SESSION["add_student"])) {
                                                echo $value['name'];
                                            }
                                        } ?></label>
            </div>
            <div class="subject">
                <label class="subject_label">Môn học</label>
                <label class='spans'> <?php foreach ($subject as $key => $value) {
                                            if ($value['id'] == ($_SESSION["add_subject"])) {
                                                echo $value['name'];
                                            }
                                        } ?></label>

            </div>

            <div class="teacher">
                <label class="teacher_label">Giáo viên</label>
                <label class='spans'> <?php foreach ($teacher as $key => $value) {
                                            if ($value['id'] == ($_SESSION["add_teacher"])) {
                                                echo $value['name'];
                                            }
                                        } ?></label>

            </div>
            <div class="score">
                <label class="score_label">Điểm</label>
                <label class='spans'> <?php echo $_SESSION["add_score"]; ?> điểm</label>
            </div>

            <div class="comment">
                <label class="comment_label">Comment chi tiết</label>
                <textarea class='spans' rows="5" cols="40" disabled> <?php echo $_SESSION["add_comment"]; ?></textarea>

            </div>

            <div class="submit">
                <input type="button" name="btnSubmit" class="btnaddScore" value="Sửa lại" onClick="window.location=`add_score.php`;" />
                <input type="submit" name="btnSubmitConfirm" class="btnConfirm" value="Xác Nhận" />
            </div>

        </fieldset>
    </form>
</body>

</html>