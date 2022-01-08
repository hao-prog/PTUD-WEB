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
function get_subject($id){
        
        require '../common/connectDB.php';
        if($id !=NULL){
            $sql = "SELECT * FROM `subjects` WHERE id=$id ";
            $getData = $conn -> prepare($sql);
            $getData->execute();
            $getData->setFetchMode(PDO::FETCH_ASSOC); 
            $resultUser = $getData->fetchAll();
           return $resultUser;
        };
    }
    function edit_subject($id ,$name, $class, $description, $avatar, $update){
        require '../common/connectDB.php';
        if($id !=NULL){
            $sql = "UPDATE `subjects` SET `name`='$name',`avatar`='$avatar',`description`='$description',`school_year`='$class',`updated`='$update',`created`='' WHERE id=$id";            
            $update = $conn -> prepare($sql);
            $update->execute();
        };
    }

