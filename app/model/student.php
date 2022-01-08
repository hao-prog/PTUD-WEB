<?php
require_once __DIR__ . '/../common/connectionPDO.php';
$db = new Database();
$db->__construct();

function addStudent($name, $avatar, $description)
{
    global $db;
    $sql = "INSERT INTO students (name, avatar, description)VALUES ('$name','$avatar','$description')";
    $add_student = $db->conn->prepare($sql);
    $add_student->execute();
    $id = $db->conn->lastInsertId();
    return $id;
}
function getAll() {
    global $db;
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $statement = $db->conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}

function search($search){
    global $db;
    $sql = "SELECT * FROM students WHERE (name LIKE '%$search%') OR (description LIKE '%$search%') ORDER BY id DESC";
    $statement = $db->conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}

function delete($id){
    global $db;
    $sql = "DELETE FROM students WHERE id = $id";
    $statement = $db->conn->prepare($sql);
    $statement->execute([$id]);
    return $statement;
}
function getStudentById($id) {
    global $db;
    $sql = "SELECT *
            FROM students
            WHERE id = '$id' ";
    $student = $db->conn->prepare($sql);
    $student->execute();
    return $student->fetch();
}

function updateStudentById($id, $name, $avatar, $description) {
    global $db;
    $sql = "UPDATE students SET 
            name = '$name',
            avatar = '$avatar',
            description = '$description'
            WHERE id = '$id' ";
    $student = $db->conn->prepare($sql);
    return $student->execute();
}
?>
