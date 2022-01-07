<?php
require_once '../../../app/common/define.php';
require_once '../../../app/model/teacher.php';
session_start();

$teacher_name = isset($_SESSION["teacher_name"]) ? $_SESSION["teacher_name"] : '';
$teacher_specialized = isset($_SESSION["teacher_specialized"]) ? $_SESSION["teacher_specialized"] : '';
$teacher_degree = isset($_SESSION["teacher_degree"]) ? $_SESSION['teacher_degree'] : '';
$teacher_description = isset($_SESSION["teacher_description"]) ? $_SESSION['teacher_description'] : '';
$teacher_avatar = '';

if (isset($_SESSION['teacher_avatar'])) {
    $teacher_avatar = $_SESSION['teacher_avatar'];
    $target_avatar_file = '../../../web/avatar/teacher_tmp/'.$_SESSION['teacher_avatar'];
}

?>

<html>

<head>
    <link rel="stylesheet" href="../../../web/css/teacher_edit_styles.css">
    <script src="../../../web/js/teacher_edit_scripts.js"></script>
</head>

<form method='post' action='../../../app/controller/teacher_new/teacher_new_confirm.php' enctype="multipart/form-data">
    <div class="edit_form">
		<div class='form_row'>
            <div class='label'>
                Họ và Tên
            </div>
            <div class='input_box'> <div class="confirm_label"> <?php echo $teacher_name; ?> </div> </div>
        </div>
		
		<div class='form_row'>
            <div class='label'>
                Chuyên ngành
            </div>
            <div class='input_box'> <div class="confirm_label"> <?php echo $teacher_specialized ? SPECIALIZED_ARR[$teacher_specialized] : ''; ?> </div> </div>
        </div>
		
		<div class='form_row'>
            <div class='label'>
                Bằng cấp
            </div>
            <div class='input_box'> <div class="confirm_label"> <?php echo $teacher_degree ? DEGREE_ARR[$teacher_degree] : ''; ?> </div> </div>
        </div>
		
		<div class='form_row avatar_row'>
            <div class='label'>
                Avatar
            </div>
            <img class='avatar' src="<?php echo $target_avatar_file; ?>" alt="Teacher's Avatar">
        </div>
		
		<div class='form_row description_row'>
            <div class='label'>
                Mô tả thêm
            </div>
            <textarea readonly class='input_box description'><?php echo $teacher_description; ?></textarea>
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