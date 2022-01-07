<?php

//search
$subjects = getAllSubjects();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    isset($_GET["search"]) ? $keyword = trim($_GET['search']) : $keyword = '';
    isset($_GET["school_year"]) ? $schoolYear = trim($_GET['school_year']) : $schoolYear = '';

    if ($keyword || $schoolYear) {
        $subjects = searchSubjects($schoolYear, $keyword);
    }
    if ($schoolYear == '' && $keyword) {
        $subjects = searchAllSchoolYear($keyword);
    }
}

//delete
isset($_GET['action']) ? $action = $_GET['action'] :  $action = '';
switch ($action) {
    case 'delete': {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                deleteSubjects($id);
                header("Location: subject.php");
            }
            break;
        }
    default: {
            require_once('app/view/searchSubjects.php');
            break;
        }
}
