<?php
// Tìm kiếm
$sql_scores = [];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["student"]) || isset($_GET["subject"]) || isset($_GET["teacher"])) {
        $sql_scores = getAllScores();
    }
    isset($_GET["student"]) ? $student = rtrim($_GET["student"]) : $student = null;
    isset($_GET["subject"]) ? $subject = rtrim($_GET["subject"]) : $subject = null;
    isset($_GET["teacher"]) ? $teacher = rtrim($_GET["teacher"]) : $teacher = null;
    if ($student ||  $subject || $teacher) {
        $sql_scores = getScores($student, $subject, $teacher);
    }
}

// Các hành động sửa/xóa
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
switch ($action) {
    case 'delete': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $deleteS = deleteScores($id);
                header("location: searchScore.php");
            }
            // require_once('app/view/quanlydiem/deleteScoreView.php');
            break;
        }
    case 'edit_input': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $dataScore = getScoresID($id);
                $student = getAllstudents();
                $teacher = getAllteachers();
                $subject = getAllsubjects();

                // Check error message validate
                session_start();
                $error = array();
                $studentData = $subjectData = $teacherData = $scoreData = $commentData = "";
                if (isset($_POST['submitEditScore'])) {
                    // Lấy dữ liệu
                    $studentData = isset($_POST['student']) ? $_POST['student'] : '';
                    $subjectData = isset($_POST['subject']) ? $_POST['subject'] : '';
                    $teacherData = isset($_POST['teacher']) ? $_POST['teacher'] : '';
                    $scoreData = isset($_POST['score']) ? $_POST['score'] : '';
                    $commentData = isset($_POST['comment']) ? $_POST['comment'] : '';

                    // Kiểm tra định dạng dữ liệu
                    if (empty($studentData)) {
                        $error['student'] = 'Hãy chọn sinh viên.';
                    } elseif (empty($teacherData)) {
                        $error['subject'] = 'Hãy chọn môn học.';
                    } elseif (empty($teacherData)) {
                        $error['teacher'] = 'Hãy chọn giáo viên.';
                    } elseif ($scoreData == null) {
                        $error['score'] = 'Hãy chọn điểm.';
                    } elseif (empty($commentData)) {
                        $error['comment'] = 'Hãy nhập comment chi tiết';
                    } elseif (!$error) {
                        $_SESSION["student"] = $studentData;
                        $_SESSION["subject"] = $subjectData;
                        $_SESSION["teacher"] = $teacherData;
                        $_SESSION["score"] = $scoreData;
                        $_SESSION["comment"] = $commentData;
                        header("Location: searchScore.php?action=edit_comfirm&id={$id}");
                        // exit();
                    }
                }
            }
            require_once('app/view/quanlydiem/EditScore/score_edit_input.php');
            break;
        }
    case 'edit_comfirm': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $dataScore = getScoresID($id);
                $student = getAllstudents();
                $teacher = getAllteachers();
                $subject = getAllsubjects();
                if (isset($_POST['btnSubmitConfirm'])) {
                    header("Location: searchScore.php?action=edit_complete&id={$id}");
                }
                require_once('app/view/quanlydiem/EditScore/score_edit_confirm.php');
                break;
            }
        }
    case 'edit_complete': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $student = getAllstudents();
                if (isset($_POST['btnSubmitConfirm']))
                    header("Location: searchScore.php?action=edit_complete&id={$id}");
                require_once('app/view/quanlydiem/EditScore/score_edit_complete.php');
                break;
            }
        }
    default: {
            require_once('app/view/quanlydiem/score_search.php');
            break;
        }
}
