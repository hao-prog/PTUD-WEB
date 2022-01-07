<?php

require "../../app/model/admin.php";

//get login_id 
if (isset($_POST['login_id'])) {
    $login_id = $_POST['login_id'];
}

if (isset($_POST['password_new'])) {
    $password_new = $_POST['password_new'];
    foreach ($password_new as $password){
        if ($password){
            $pass = $password;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!isset($pass)) {
        $password_Err = "Hãy nhập mật khẩu mới";
    }else if(strlen($pass) < 6 ) {
        $password_Err = "Hãy nhập mật khẩu tối thiểu 6 ký tự";
    }else{
        updateNewPassword($login_id, $pass);
    }
}
     
    require_once '../../app/view/reset_passwordView.php';

?>
    
