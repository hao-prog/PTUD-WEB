<?php
session_start();
    $nameErr = $classErr = $descriptionErr = $avatarErr = "";
    $nameR = $buildingR = $descriptionR = $avatarR = "";

    if (isset($_POST['btn-add'])) {
        if (empty($_POST["name"])) {
            $nameErr = "Hãy nhập tên môn học *";
        } else {
            if (strlen($_POST['name']) > 100){
                $nameErr = "Không nhập quá 100 ký tự *"; 
            }
            else {
                $nameR = ($_POST["name"]);
            }
        }
                    
        if($_POST['school_year'] == "none") {
            $classErr = "Hãy chọn môn học *";
        } else {
            $classR = ($_POST["school_year"]);
        }

        if (trim($_POST["description"]) == "") {
            $descriptionErr = "Hãy nhập mô tả *";
        } else {
            if (strlen($_POST["description"]) > 1000){
                $descriptionErr = "Không nhập quá 1000 ký tự *"; 
            }
            else {
                $descriptionR = ($_POST["description"]);
            }
        }
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        $imageFileType = pathinfo($_POST['upload'], PATHINFO_EXTENSION);
        
        if (empty($_FILES['upload']['name'])) {
            $avatarErr = "Hãy chọn avatar*";
        } elseif (!in_array($imageFileType, $allowtypes)){
            $avatarErr = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF *";
        }
        elseif (file_exists($_FILES['upload']['name'])){
            $avatarErr = "Tên file đã tồn tại, không được ghi đè *";
        }
         else {
            $avatarR =  $_FILES['upload']['name'];
            move_uploaded_file($_FILES['upload']['tmp_name'], '../../../web/avata/add_subject/'.$avatarR);
        }

        $uploadR = $_POST['upload'];        

        if($nameR !="" && $classR !="" && $descriptionR !="" && $uploadR !=""){
            header("Location: ../../view/subject_add_confirm_view.php?name=$nameR&class=$classR&description=$descriptionR&avatar=$uploadR");
        }

        
    }
?>