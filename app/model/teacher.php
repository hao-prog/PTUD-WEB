<?php
require_once '../../app/common/db.php';

function getTeacherById($id) {
    global $conn;
    $sql = "SELECT *
            FROM teachers
            WHERE id = '$id' ";
    $teacher = $conn->prepare($sql);
    $teacher->execute();
    return $teacher->fetch();
}

function updateTeacherById($id, $name, $avatar, $description, $specialized, $degree) {
    global $conn;
    $sql = "UPDATE teachers SET 
            name = '$name',
            avatar = '$avatar',
            description = '$description',
            specialized = '$specialized',
            degree = '$degree'
            WHERE id = '$id' ";
    $teacher = $conn->prepare($sql);
    return $teacher->execute();
}
