<?php

$subjects = getAllSubjects();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    isset($_GET["search"]) ? $keyword = trim($_GET['search']) : $keyword = null;
    isset($_GET["school_year"]) ? $schoolYear = trim($_GET['school_year']) : $schoolYear = null;

    if ($keyword || $schoolYear) {
        $subjects = searchSubjects($schoolYear, $keyword);
    }
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = '';
}
if ($action == 'delete') {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        deleteSubjects($id);
        header("Location: subject.php");
    }
} else {
    require_once 'app/view/SearchDelete_subjects.php';
}
