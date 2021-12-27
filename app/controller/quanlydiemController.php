
<?php

$sql_scores = getAllScores();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    isset($_GET["student"]) ? $student = rtrim($_GET["student"]) : $student = null;
    isset($_GET["subject"]) ? $subject = rtrim($_GET["subject"]) : $subject = null;
    isset($_GET["teacher"]) ? $teacher = rtrim($_GET["teacher"]) : $teacher = null;
    if ($student ||  $subject || $teacher) {
        $sql_scores = getScores($student, $subject, $teacher);
    }
}

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
            require_once('app/view/quanlydiem/searchScoreView.php');
            break;
        }
}

?>
