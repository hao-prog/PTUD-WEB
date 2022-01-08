<?php
error_reporting(0);
session_start();
require_once '../../../access.php';
expire('../../../');

require_once '../../../app/common/define.php';
require_once '../../../app/model/student.php';


$id = isset($_SESSION["student_id"]) ? $_SESSION["student_id"] : '';
$student = getStudentById($id);
$student_name = isset($_SESSION["student_name"]) ? $_SESSION["student_name"] : '';
$student_description = isset($_SESSION["student_description"]) ? $_SESSION['student_description'] : '';
$student_avatar = '';
if (isset($_SESSION['student_avatar'])) {
    $student_avatar = $_SESSION['student_avatar'];
    $target_avatar_file = '../../../web/avatar/student_tmp/'.$_SESSION['student_avatar'];
} else {
    $target_avatar_file = '../../../web/avatar/student/'.$id.'/'.$student['avatar'];
}

?>

<html>

<head>
    <link rel="stylesheet" href="../../../web/css/student_edit_styles.css">
    <script src="../../../web/js/student_edit_scripts.js"></script>
</head>

<form method='post' action='../../../app/controller/student_edit/student_edit_confirm_C.php' enctype="multipart/form-data">
    <div class="edit_form">
        <div class="error_message">
        </div>

        <div class='form_row'>
            <div class='label'>
                Họ và Tên
            </div>

            <div class='input_box'> <div class="confirm_label"> <?php echo $student_name; ?> </div> </div>
        </div>

        <div class="error_message">
        </div>
        <div class="error_message"></div>

        <div class='form_row avatar_row'>
            <div class='label'>
                Avatar
            </div>

            <img class='avatar' src="<?php echo $target_avatar_file; ?>" alt="Student's Avatar">
        </div>

        <div class="error_message">
        </div>

        <div class='form_row'>
        </div>


        <div class='form_row description_row'>
            <div class='label'>
                Mô tả thêm
            </div>

            <textarea readonly class='input_box description'><?php echo $student_description; ?></textarea>
        </div>

        <div class='button_row'>
            <div class="left_button">
                <button class='submit_button regist_button' id='redit_button' type="button" onclick="history.back()"> Sửa lại </button>
            </div>
            <div class="right_button">
                <button class='submit_button regist_button' id='submit_button' type='submit'> Đăng ký </button>
            </div>
        
        </div>

    </div>

</form>

</html>