<?php
require_once '../../../app/common/connectionPDO.php';
$db = new Database();
$db->__construct();

function getTeacherById($id) {
    global $db;
    $sql = "SELECT *
            FROM teachers
            WHERE id = '$id' ";
    $teacher = $db->conn->prepare($sql);
    $teacher->execute();
    return $teacher->fetch();
}

function updateTeacherById($id, $name, $avatar, $description, $specialized, $degree) {
    global $db;
    $sql = "UPDATE teachers SET 
            name = '$name',
            avatar = '$avatar',
            description = '$description',
            specialized = '$specialized',
            degree = '$degree'
            WHERE id = '$id' ";
    $teacher = $db->conn->prepare($sql);
    return $teacher->execute();
}
