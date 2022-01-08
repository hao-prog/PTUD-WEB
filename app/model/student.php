<?php
    require_once 'app/common/connectionPDO.php';
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
    
?>