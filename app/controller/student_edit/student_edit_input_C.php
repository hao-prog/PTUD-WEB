<?php
session_start();
require_once '../../../access.php';
expire('../../../');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['student_id'];

    $_SESSION["student_name_error"] = '';
    $_SESSION["student_description_error"] = '';
    $_SESSION["student_avatar_error"] = '';

    $_SESSION["student_name"] = $_POST["student_name"];
    $_SESSION["student_description"] = $_POST["student_description"];
    if ($_FILES["student_avatar"]["name"]) {  // user uploaded a file
        unset($_SESSION['had_avatar_tmp']);
        if (
            isset($_SESSION["student_avatar"]) &&
            $_FILES["student_avatar"]["name"] != $_SESSION["student_avatar"]
        ) {
            unlink('../../../web/avatar/student_tmp/' . $_SESSION["student_avatar"]);
        }
        $_SESSION["student_avatar"] = $_FILES["student_avatar"]["name"];
    }

    if (!$_SESSION["student_name"]) {
        $_SESSION["student_name_error"] = "Hãy nhập tên sinh viên.";
    } else {
        if (mb_strlen($_SESSION["student_name"]) > 100) {
            $_SESSION["student_name_error"] = "Không nhập quá 100 ký tự.";
        }
    }
   if (!$_SESSION["student_description"]) {
        $_SESSION["student_description_error"] = "Hãy nhập mô tả chi tiết.";
    } else {
        if (mb_strlen($_SESSION["student_description"]) > 1000) {
            $_SESSION["student_description_error"] = "Không nhập quá 1000 ký tự.";
        }
    }

    if (!isset($_SESSION["student_avatar"]) && !$_SESSION["cur_student_avatar"]) {
        $_SESSION["student_avatar_error"] = "Hãy chọn avatar.";
    }

    if (!file_exists('../../../web/avatar/student_tmp')) {
        mkdir('../../../web/avatar/student_tmp', 0777, true);
    }

    if (!isset($_SESSION['had_avatar_tmp'])) {
        if (isset($_SESSION["student_avatar"]) ) {
            if (!$_FILES["student_avatar"]["tmp_name"] || getimagesize($_FILES["student_avatar"]["tmp_name"]) == false) {
                $_SESSION["student_avatar_error"] = "Avatar phải là file ảnh.";
                unset($_SESSION["student_avatar"]);
            } else {
                $target_dir = "../../../web/avatar/student_tmp/";
                $target_file = $target_dir . basename($_FILES["student_avatar"]["name"]);
                move_uploaded_file($_FILES["student_avatar"]["tmp_name"], $target_file);
                $_SESSION['had_avatar_tmp'] = true;
            }
        }
    }

    if (
        !$_SESSION["student_name_error"]
        && !$_SESSION["student_description_error"]
        && !$_SESSION["student_avatar_error"]
    ) {
        header("Location: ../../../app/view/student_edit/student_edit_confirm.php");
    } else {
        header("Location: ../../../app/view/student_edit/student_edit_input.php?id=$id");
    }
}
