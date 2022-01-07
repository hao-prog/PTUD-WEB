<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./web/css/quanlydiem/editScore.css" rel="stylesheet">
    <title>Edit Score Confirm</title>
</head>
<?php


$id_score = $_SESSION['ID_SCORE'];
?>

<body>
    <form method="POST" action="" class="form_edit_score">
        <fieldset class="form_edit_score_fieldset">
            <div class="student">
                <label class="student_label">Sinh viên</label>
                <label class='spans'> <?php foreach ($student as $key => $value) {
                                            if ($value['id'] == ($_SESSION["student"])) {
                                                echo $value['name'];
                                            }
                                        } ?></label>
            </div>
            <div class="subject">
                <label class="subject_label">Môn học</label>
                <label class='spans'> <?php foreach ($subject as $key => $value) {
                                            if ($value['id'] == ($_SESSION["subject"])) {
                                                echo $value['name'];
                                            }
                                        } ?></label>

            </div>

            <div class="teacher">
                <label class="teacher_label">Giáo viên</label>
                <label class='spans'> <?php foreach ($teacher as $key => $value) {
                                            if ($value['id'] == ($_SESSION["teacher"])) {
                                                echo $value['name'];
                                            }
                                        } ?></label>

            </div>
            <div class="score">
                <label class="score_label">Điểm</label>
                <label class='spans'> <?php echo $_SESSION["score"]; ?> điểm</label>
            </div>

            <div class="comment">
                <label class="comment_label">Comment chi tiết</label>
                <textarea class='spans' rows="5" cols="40" disabled> <?php echo $_SESSION["comment"]; ?></textarea>

            </div>

            <div class="submit">
                <input type="button" name="btnSubmit" class="btnEditScore" value="Sửa lại" onClick="window.location=`search_score.php?action=edit_input&id=${ <?php echo $id_score ?>}`;" />
                <input type="submit" name="btnSubmitConfirm" class="btnConfirm" value="Xác Nhận" />
            </div>

        </fieldset>
    </form>
</body>

</html>