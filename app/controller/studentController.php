<?php
require_once ('app/model/student.php');

$statement = getAll();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search = isset($_GET["search"]) ? trim($_GET["search"]) : null;
    if ($search) {
        $statement = search($search);
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
            delete($id);
            header("location: index.php");
        }
        break;
    }
    default: {
        require_once('app/view/students/searchStudent.php');
        break;
    }
}
