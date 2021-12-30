<?php


// Hành động thêm
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
    default: {
            $student = getAllstudents();
            $teacher = getAllteachers();
            $subject = getAllsubjects();
            require_once('app/view/quanlydiem/AddScore/score_add_input.php');
            break;
        }
}
