<?php
require_once __DIR__ . '/../common/connectionPDO.php';
$db = new Database();
$db->__construct();

function getAllSubjects()
{
    global $db;
    $sql = "SELECT * FROM `subjects` ORDER BY id DESC";
    $query = $db->conn->prepare($sql);
    $query->execute();
    $all = $query->fetchAll();
    return $all;
}

function searchSubjects($schoolYear, $keyword)
{
    global $db;
    $sql = " SELECT * FROM `subjects`
            WHERE (name LIKE '%$keyword%' or description LIKE '%$keyword%')
            and school_year = '$schoolYear' ORDER BY id DESC";
    $search = $db->conn->prepare($sql);
    $search->execute();
    $result = $search->fetchAll();
    return $result;
}

function searchAllSchoolYear($keyword)
{
    global $db;
    $sql = "SELECT * FROM `subjects` WHERE name LIKE '%$keyword%' or description LIKE '%$keyword%' ORDER BY id DESC";
    $query = $db->conn->prepare($sql);
    $query->execute();
    $all = $query->fetchAll();
    return $all;
}

function deleteSubjects($id)
{
    global $db;
    $sql = "DELETE FROM `subjects` WHERE id=$id";
    $delete = $db->conn->prepare($sql);
    $delete->execute();
}
