<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    error_reporting(0);
    include 'access.php';
    expire("");
    
    require_once 'app/common/connectionPDO.php';
    include 'app/model/student.php';
    include 'app/controller/studentsController/student_add.php';
?>