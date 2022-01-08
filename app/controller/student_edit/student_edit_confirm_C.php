<?php
session_start();
require_once '../../../access.php';
expire('../../../');

require_once '../../../app/model/student.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['student_id'];
    $student_name = $_SESSION["student_name"];
    $student_description = $_SESSION['student_description'];
    $student_avatar = $_SESSION['cur_student_avatar'];

    if (isset($_SESSION['student_avatar'])) {
        if (
            !file_exists('../../../web/avatar/student/' . $id . '/' . $_SESSION['student_avatar'])
            && $student_avatar
        ) {
            unlink('../../../web/avatar/student/' . $id . '/' . $student_avatar); // delete old file
        }
        $student_avatar = $_SESSION['student_avatar']; // new avatar file name
        $cur_avatar_dir = '../../../web/avatar/student_tmp/' . $_SESSION['student_avatar'];
        $target_avatar_dir = '../../../web/avatar/student/' . $id . '/' . $_SESSION['student_avatar'];
        if (!file_exists('../../../web/avatar/student/' . $id)) {
            mkdir('../../../web/avatar/student/' . $id, 0777, true);
        }
        rename($cur_avatar_dir, $target_avatar_dir);
    }

    if ($student_name && $student_description && $student_avatar) {
        updateStudentById(
            $id,
            $student_name,
            $student_avatar,
            $student_description,
        );
    }

    unset($_SESSION['student_id']);
    unset($_SESSION['student_name']);
    unset($_SESSION['student_description']);
    unset($_SESSION['cur_student_avatar']);
    unset($_SESSION['student_avatar']);
    unset($_SESSION['had_avatar_tmp']);

    header("Location: ../../../app/view/student_edit/student_edit_complete.php");
}
