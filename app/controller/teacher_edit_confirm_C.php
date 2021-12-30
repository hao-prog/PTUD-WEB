<?php
require_once '../../app/model/teacher.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['teacher_id'];
    $teacher_name = $_SESSION["teacher_name"];
    $teacher_description = $_SESSION['teacher_description'];
    $teacher_specialized = $_SESSION["teacher_specialized"];
    $teacher_degree = $_SESSION['teacher_degree'];
    $teacher_avatar = $_SESSION['cur_teacher_avatar'];

    if (isset($_SESSION['teacher_avatar'])) {
        if (
            !file_exists('../../web/avatar/teacher/' . $id . '/' . $_SESSION['teacher_avatar'])
            && $teacher_avatar
        ) {
            unlink('../../web/avatar/teacher/' . $id . '/' . $teacher_avatar); // delete old file
        }
        $teacher_avatar = $_SESSION['teacher_avatar']; // new avatar file name
        $cur_avatar_dir = '../../web/avatar/teacher_tmp/' . $_SESSION['teacher_avatar'];
        $target_avatar_dir = '../../web/avatar/teacher/' . $id . '/' . $_SESSION['teacher_avatar'];
        if (!file_exists('../../web/avatar/teacher/' . $id)) {
            mkdir('../../web/avatar/teacher/' . $id, 0777, true);
        }
        rename($cur_avatar_dir, $target_avatar_dir);
    }

    if ($teacher_name && $teacher_description && $teacher_specialized && $teacher_avatar &&$teacher_degree) {
        updateTeacherById(
            $id,
            $teacher_name,
            $teacher_avatar,
            $teacher_description,
            $teacher_specialized,
            $teacher_degree
        );
    }

    unset($_SESSION['teacher_id']);
    unset($_SESSION['teacher_name']);
    unset($_SESSION['teacher_description']);
    unset($_SESSION['teacher_specialized']);
    unset($_SESSION['teacher_degree']);
    unset($_SESSION['cur_teacher_avatar']);
    unset($_SESSION['teacher_avatar']);
    unset($_SESSION['had_avatar_tmp']);

    header("Location: ../../app/view/teacher_edit_complete.php");
}
