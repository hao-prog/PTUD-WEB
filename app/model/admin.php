<?php
    require 'app/common/connectionPDO.php';
    $db = new Database();
    $db->__construct();

    //get login_id
    function selectloginId($login_id) {
        global $db;
        $sql = "SELECT `login_id` FROM `admins` WHERE `login_id` = '$login_id'";

        $query = $db->conn->prepare($sql);
        $query->execute();
        return $query;
    }

    //update token
    function updateLoginId($login_id, $reset_password_token) {
        global $db;
        $sql = "UPDATE `admins` SET `reset_password_token` = '$reset_password_token' WHERE `login_id` = '$login_id'";

        $query = $db->conn->prepare($sql);
        $query->execute();
        return $query;
    }
    //get token not null 
    function selectReset() {
        global $db;
        $sql = "SELECT * FROM `admins` WHERE `reset_password_token` IS NOT NULL";
        $query = $db->conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    //update password 
    function updateNewPassword($login_id, $password) {
        global $db;
        $password_new = md5($password);
        $sql = "UPDATE `admins` SET `reset_password_token`= NULL, `password`= '$password_new' WHERE `login_id` = '$login_id'";
        $query = $db->conn->prepare($sql);
        $query->execute();
        return $query;

    }