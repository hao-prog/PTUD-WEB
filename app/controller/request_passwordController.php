<?php 
    
    require "app/model/admin.php";
    $login_idErr = "";
    $login_id = "";
    $reset_password_token = microtime(true);

    if (isset($_POST['submit'])) {
            // code...
        $login_id = $_POST['login_id'];
        if(empty($_POST['login_id'])) {
            $login_idErr = "Hãy nhập login id";
        }else {
            $length  =  strlen($login_id);
            if($length < 4) {
                $login_idErr = "Hãy nhập login id tối thiểu 4 ký tự";
            }else {
                if(selectloginId($login_id)->rowCount() == 1) {
                    updateLoginId($login_id, $reset_password_token);
                    // header("Location:../../login.php");  
                }else{
                    $login_idErr = "login id không tồn tại trong hệ thống";
                }
                        
            }
        }
    }

    require_once('app/view/request_passwordView.php');


                    
?>