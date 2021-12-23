<?php
session_start();
include_once "app/common/define.php";
if (!isset($_GET['url'])) {
    echo 'abc';
} else {
    $url = $_GET['url'];
    switch ($url) {
        case 'teacher':
            include_once 'teacherController.php';
            break;
        case 'student':
            include_once 'studentController.php';
            break;
        case 'subjects':
            include_once 'subjectsController.php';
            break;
        case 'quanlydiem':
            include_once 'quanlydiemController.php';
            break;
    }
}
