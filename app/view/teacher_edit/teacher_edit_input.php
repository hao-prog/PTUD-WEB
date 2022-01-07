<?php
error_reporting(0);
session_start();
require_once '../../../access.php';
expire('../../../');

require_once '../../../app/common/define.php';
require_once '../../../app/model/teacher.php';



$id = $_GET['id'];
$_SESSION["teacher_id"] = $id;
$teacher = getTeacherById($id);
$teacher_name = $teacher['name'];
$teacher_specialized = $teacher['specialized'];
$teacher_degree = $teacher['degree'];
$teacher_description = $teacher['description'];
$cur_teacher_avatar = $teacher['avatar'];
$teacher_avatar = '';
$_SESSION["cur_teacher_avatar"] = $cur_teacher_avatar;

if (isset($_SESSION["teacher_name"])) {
    $teacher_name = $_SESSION["teacher_name"];
}
if (isset($_SESSION["teacher_specialized"])) {
    $teacher_specialized = $_SESSION["teacher_specialized"];
}
if (isset($_SESSION["teacher_degree"])) {
    $teacher_degree = $_SESSION["teacher_degree"];
}
if (isset($_SESSION["teacher_description"])) {
    $teacher_description = $_SESSION["teacher_description"];
}
if (isset($_SESSION["teacher_avatar"])) {
    $teacher_avatar = $_SESSION["teacher_avatar"];
}

$teacher_name_error = $_SESSION["teacher_name_error"] ?? '';
$teacher_specialized_error = $_SESSION["teacher_specialized_error"] ?? '';
$teacher_degree_error = $_SESSION["teacher_degree_error"] ?? '';
$teacher_description_error = $_SESSION["teacher_description_error"] ?? '';
$teacher_avatar_error = $_SESSION["teacher_avatar_error"] ?? '';

?>

<html>

<head>
    <link rel="stylesheet" href="../../../web/css/teacher_edit_styles.css">
    <script src="../../../web/js/teacher_edit_scripts.js"></script>
</head>

<form method='post' action='../../../app/controller/teacher_edit/teacher_edit_input_C.php' enctype="multipart/form-data">
    <div class="edit_form">
        <div class="error_message">
            <?php echo $teacher_name_error; ?>
        </div>

        <div class='form_row'>
            <div class='label'>
                Họ và Tên
            </div>

            <input type='text' class='input_box' id='teacher_name' name='teacher_name' value='<?php echo $teacher_name; ?>'>
        </div>

        <div class="error_message">
            <?php echo $teacher_specialized_error; ?>
        </div>

        <div class='form_row'>
            <div class='label'>
                Chuyên ngành
            </div>

            <select class='input_box' id='teacher_specialized' name='teacher_specialized'>
                <option></option>
                <?php
                foreach (SPECIALIZED_ARR as $key => $value) {
                    if ($teacher_specialized == $key) {
                        echo "<option selected value='$key'> $value </option>";
                    } else {
                        echo "<option value='$key'> $value </option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="error_message">
            <?php echo $teacher_degree_error; ?>
        </div>

        <div class='form_row'>
            <div class='label'>
                Bằng cấp
            </div>

            <select class='input_box' id='teacher_degree' name='teacher_degree'>
                <option></option>
                <?php
                foreach (DEGREE_ARR as $key => $value) {
                    if ($teacher_degree == $key) {
                        echo "<option selected value='$key'> $value </option>";
                    } else {
                        echo "<option value='$key'> $value </option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="error_message"></div>

        <div class='form_row avatar_row'>
            <div class='label'>
                Avatar
            </div>

            <img class='avatar' id='img' src="../../../web/avatar/teacher/<?php echo $id; ?>/<?php echo $cur_teacher_avatar; ?>">
        </div>

        <div class="error_message">
            <?php echo $teacher_avatar_error; ?>
        </div>

        <div class='form_row'>
            <div class='label'>
            </div>

            <div class='input_box' id='fileNameTextBox'>
                <?php echo $teacher_avatar; ?>
            </div>

            <label class="browse_button" for="teacher_avatar">
                Browse
            </label>

            <input style="display:none" type="file" id="teacher_avatar" name="teacher_avatar" onchange="getFileData(this);">

        </div>

        <div class="error_message">
            <?php echo $teacher_description_error; ?>
        </div>

        <div class='form_row description_row'>
            <div class='label'>
                Mô tả thêm
            </div>

            <textarea class='input_box description' id="teacher_description" type="textarea" name="teacher_description" ><?php echo $teacher_description; ?></textarea>
        </div>

        <div class='center'>
            <button class='submit_button' id='submit_button' type='submit'> Xác Nhận </button>
        </div>
    </div>

</form>

</html>