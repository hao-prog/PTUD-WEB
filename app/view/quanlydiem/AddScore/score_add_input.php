<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./web/css/quanlydiem/addScore.css" rel="stylesheet">
    <title>Add Score</title>
</head>

<body>
    <form method="POST" action="" class="form_add_score">
        <fieldset class="form_add_score_fieldset">

            <div class="student">
                <label class="student_label">Sinh viên</label>
                <select class="student_select" id="student" name="student">
                    <option></option>
                    <?php
                    foreach ($student as $key => $value) {
                        echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="subject">
                <label class="subject_label">Môn học</label>
                <select class="subject_select" id="subject" name="subject">
                    <option></option>
                    <?php
                    foreach ($subject as $key => $value) {
                        echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>

            <div class="teacher">
                <label class="teacher_label">Giáo viên</label>
                <select class="teacher_select" id="teacher" name="teacher">
                    <option></option>
                    <?php
                    foreach ($teacher as $key => $value) {
                        echo ' <option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="score">
                <label class="score_label">Điểm</label>
                <select class="score_select" id="score" name="score">
                    <option></option>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . ' điểm</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="comment">
                <label class="comment_label">Comment chi tiết</label>
                <textarea id="comment_text" type="textarea" name="comment" rows="5" cols="40"></textarea>

            </div>
            <div class="submit">
                <button class="btnSubmit_add" type="submit" id="submit" name="submitaddScore">Xác nhận</button>
            </div>
        </fieldset>
    </form>
</body>

</html>