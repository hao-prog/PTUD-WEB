<?php
session_start();
require_once '../../../access.php';
expire('../../../');

require_once '../../../app/common/define.php';
require_once '../../../app/model/student.php';



$id = $_GET['id'];
$_SESSION["student_id"] = $id;
$student = getStudentById($id);
$student_name = $student['name'];
$student_description = $student['description'];
$cur_student_avatar = $student['avatar'];
$student_avatar = '';
$_SESSION["cur_student_avatar"] = $cur_student_avatar;

if (isset($_SESSION["student_name"])) {
    $student_name = $_SESSION["student_name"];
}
if (isset($_SESSION["student_description"])) {
    $student_description = $_SESSION["student_description"];
}
if (isset($_SESSION["student_avatar"])) {
    $student_avatar = $_SESSION["student_avatar"];
}

$student_name_error = $_SESSION["student_name_error"] ?? '';
$student_description_error = $_SESSION["student_description_error"] ?? '';
$student_avatar_error = $_SESSION["student_avatar_error"] ?? '';

?>

<html>

<head>
    <link rel="stylesheet" href="../../../web/css/student_edit_styles.css">
    <script src="../../../web/js/student_edit_scripts.js"></script>
</head>

<form method='post' action='../../../app/controller/student_edit/student_edit_input_C.php' enctype="multipart/form-data">
    <div class="edit_form">
        <div class="error_message">
            <?php echo $student_name_error; ?>
        </div>

        <div class='form_row'>
            <div class='label'>
                Họ và Tên
            </div>

            <input type='text' class='input_box' id='student_name' name='student_name' value='<?php echo $student_name; ?>'>
        </div>
 <div class="error_message"></div>

        <div class='form_row avatar_row'>
            <div class='label'>
                Avatar
            </div>

            <img class='avatar' id='img' src="../../../web/avatar/student/<?php echo $id; ?>/<?php echo $cur_student_avatar; ?>">
        </div>

        <div class="error_message">
            <?php echo $student_avatar_error; ?>
        </div>

        <div class='form_row'>
            <div class='label'>
            </div>

            <div class='input_box' id='fileNameTextBox'>
                <?php echo $student_avatar; ?>
            </div>

            <label class="browse_button" for="student_avatar">
                Browse
            </label>

            <input style="display:none" type="file" id="student_avatar" name="student_avatar" onchange="getFile(this);">

        </div>

        <div class="error_message">
            <?php echo $student_description_error; ?>
        </div>

        <div class='form_row description_row'>
            <div class='label'>
                Mô tả thêm
            </div>

            <textarea class='input_box description' id="student_description" type="textarea" name="student_description" ><?php echo $student_description; ?></textarea>
        </div>

        <div class='center'>
            <button class='submit_button' id='submit_button' type='submit'> Xác Nhận </button>
        </div>
    </div>

</form>

</html>