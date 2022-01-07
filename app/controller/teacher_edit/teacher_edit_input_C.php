<?php
session_start();
require_once '../../../access.php';
expire('../../../');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['teacher_id'];

    $_SESSION["teacher_name_error"] = '';
    $_SESSION["teacher_specialized_error"] = '';
    $_SESSION["teacher_degree_error"] = '';
    $_SESSION["teacher_description_error"] = '';
    $_SESSION["teacher_avatar_error"] = '';

    $_SESSION["teacher_name"] = $_POST["teacher_name"];
    $_SESSION["teacher_specialized"] = $_POST["teacher_specialized"];
    $_SESSION["teacher_degree"] = $_POST["teacher_degree"];
    $_SESSION["teacher_description"] = $_POST["teacher_description"];
    if ($_FILES["teacher_avatar"]["name"]) {  // user uploaded a file
        unset($_SESSION['had_avatar_tmp']);
        if (
            isset($_SESSION["teacher_avatar"]) &&
            $_FILES["teacher_avatar"]["name"] != $_SESSION["teacher_avatar"]
        ) {
            unlink('../../../web/avatar/teacher_tmp/' . $_SESSION["teacher_avatar"]);
        }
        $_SESSION["teacher_avatar"] = $_FILES["teacher_avatar"]["name"];
    }

    if (!$_SESSION["teacher_name"]) {
        $_SESSION["teacher_name_error"] = "Hãy nhập tên giáo viên.";
    } else {
        if (mb_strlen($_SESSION["teacher_name"]) > 100) {
            $_SESSION["teacher_name_error"] = "Không nhập quá 100 ký tự.";
        }
    }

    if (!$_SESSION["teacher_specialized"]) {
        $_SESSION["teacher_specialized_error"] = "Hãy chọn bộ môn.";
    }

    if (!$_SESSION["teacher_degree"]) {
        $_SESSION["teacher_degree_error"] = "Hãy chọn bằng cấp.";
    }

    if (!$_SESSION["teacher_description"]) {
        $_SESSION["teacher_description_error"] = "Hãy nhập mô tả chi tiết.";
    } else {
        if (mb_strlen($_SESSION["teacher_description"]) > 1000) {
            $_SESSION["teacher_description_error"] = "Không nhập quá 1000 ký tự.";
        }
    }

    if (!isset($_SESSION["teacher_avatar"]) && !$_SESSION["cur_teacher_avatar"]) {
        $_SESSION["teacher_avatar_error"] = "Hãy chọn avatar.";
    }

    if (!file_exists('../../../web/avatar/teacher_tmp')) {
        mkdir('../../../web/avatar/teacher_tmp', 0777, true);
    }

    if (!isset($_SESSION['had_avatar_tmp'])) {
        if (isset($_SESSION["teacher_avatar"]) ) {
            if (!$_FILES["teacher_avatar"]["tmp_name"] || getimagesize($_FILES["teacher_avatar"]["tmp_name"]) == false) {
                $_SESSION["teacher_avatar_error"] = "Avatar phải là file ảnh.";
                unset($_SESSION["teacher_avatar"]);
            } else {
                $target_dir = "../../../web/avatar/teacher_tmp/";
                $target_file = $target_dir . basename($_FILES["teacher_avatar"]["name"]);
                move_uploaded_file($_FILES["teacher_avatar"]["tmp_name"], $target_file);
                $_SESSION['had_avatar_tmp'] = true;
            }
        }
    }

    if (
        !$_SESSION["teacher_name_error"]
        && !$_SESSION["teacher_specialized_error"]
        && !$_SESSION["teacher_degree_error"]
        && !$_SESSION["teacher_description_error"]
        && !$_SESSION["teacher_avatar_error"]
    ) {
        header("Location: ../../../app/view/teacher_edit/teacher_edit_confirm.php");
    } else {
        header("Location: ../../../app/view/teacher_edit/teacher_edit_input.php?id=$id");
    }
}
