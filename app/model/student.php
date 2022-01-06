<?php
require_once ('app/common/connectionPDO.php');

$database = new Database();
$conn = $database->conn;

function getAll() {
    global $conn;
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $statement = $conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}

function search($search){
    global $conn;
    $sql = "SELECT * FROM students WHERE (name LIKE '%$search%') OR (description LIKE '%$search%') ORDER BY id DESC";
    $statement = $conn->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
}

function delete($id){
    global $conn;
    $sql = "DELETE FROM students WHERE id = $id";
    $statement = $conn->prepare($sql);
    $statement->execute([$id]);
    return $statement;
}