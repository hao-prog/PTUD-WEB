<?php
session_start();

$error = array();
$studentData = $subjectData = $teacherData = $scoreData = $commentData = "";
if (isset($_POST['submitaddScore'])) {
    // Lấy dữ liệu
    $studentData = isset($_POST['student']) ? $_POST['student'] : '';
    $subjectData = isset($_POST['subject']) ? $_POST['subject'] : '';
    $teacherData = isset($_POST['teacher']) ? $_POST['teacher'] : '';
    $scoreData = isset($_POST['score']) ? $_POST['score'] : '';
    $commentData = isset($_POST['comment']) ? $_POST['comment'] : '';

    $_SESSION["add_student"] = $studentData;
    $_SESSION["add_subject"] = $subjectData;
    $_SESSION["add_teacher"] = $teacherData;
    $_SESSION["add_score"] = $scoreData;
    $_SESSION["add_comment"] = $commentData;
    // Kiểm tra định dạng dữ liệu
    if (empty($studentData)) {
        $error['student'] = 'Hãy chọn sinh viên.';
    }
    if (empty($subjectData)) {
        $error['subject'] = 'Hãy chọn môn học.';
    }
    if (empty($teacherData)) {
        $error['teacher'] = 'Hãy chọn giáo viên.';
    }
    if ($scoreData == null) {
        $error['score'] = 'Hãy chọn điểm.';
    }
    if ($commentData == null) {
        $error['comment'] = 'Hãy nhập comment chi tiết';
    }
    if (!$error) {
        header("Location: add_score.php?action=add_confirm");
        // exit();
    }
}

// Hành động thêm
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    case 'add_confirm': {
            $student = getAllstudents();
            $teacher = getAllteachers();
            $subject = getAllsubjects();
            if (isset($_POST['btnSubmitConfirm'])) {
                $student_id = $_SESSION["add_student"];
                $subject_id = $_SESSION["add_subject"];
                $teacher_id = $_SESSION["add_teacher"];
                $score = $_SESSION["add_score"];
                $description = $_SESSION["add_comment"];
                if (isset($student_id) && isset($subject_id) && isset($teacher_id) && isset($score) && isset($description)) {
                    addScores($student_id, $teacher_id, $subject_id, $score, $description);
                    header("Location: add_score.php?action=add_complete");
                }
            }
            if (empty($_SESSION["add_student"]) || empty($_SESSION["add_subject"]) || empty($_SESSION["add_teacher"]) || empty($_SESSION["add_score"]) || empty($_SESSION["add_comment"])) {
                header('location: add_score.php');
            }
            require_once('app/view/score/AddScore/score_add_confirm.php');

            break;
        }
    case 'add_complete': {
            $student = getAllstudents();
            if (empty($_SESSION["add_student"]) || empty($_SESSION["add_subject"]) || empty($_SESSION["add_teacher"]) || empty($_SESSION["add_score"]) || empty($_SESSION["add_comment"])) {
                header('location: add_score.php');
            }
            require_once('app/view/score/AddScore/score_add_complete.php');
            break;
        }
    default: {
            $student = getAllstudents();
            $teacher = getAllteachers();
            $subject = getAllsubjects();
            require_once('app/view/score/AddScore/score_add_input.php');
            break;
        }
}
