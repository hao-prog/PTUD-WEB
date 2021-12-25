<?php
// require '../common/connectionPDO.php';

$db = new Database(); 
$db->__construct(); 

function checkExist($username, $password) {
    global $db;
    $stmt = $db->conn->prepare("SELECT * FROM admins
            WHERE login_id = '$username' AND password = '$password' ");
    $stmt->execute();
    $admin_db = $stmt->fetchAll();
    return $admin_db;
}
// $admin_db = checkExist('Nguyễn Văn A', 'nhom3thuchanhweb');
// print_r($admin_db);
?>