<?php
    $data = array();
    $error = array();
    if (isset($_POST['student_add'])) { 
        $data['student_name'] = isset($_POST['student_name']) ? $_POST['student_name'] : '';
        $data['student_image'] = isset($_FILES['student_image']['name']) ? $_FILES['student_image']['name'] : '';
        $data['student_description'] = isset($_POST['student_description']) ? $_POST['student_description'] : '';
        
        if(empty($_POST['student_name'])){
            $error["nameErr"]="Hãy nhập tên sinh viên";
        }
        if(strlen($_POST['student_description'])>100){
            $error["maxName"]="Không nhập quá 100 ký tự";
        }
        if(strlen($_POST['student_name'])>1000){
            $error["maxName"]="Không nhập quá 1000 ký tự";
        }
        if (!file_exists($_FILES['student_image']['tmp_name'])){
            $error["imageErr"]="Hãy chọn avatar";
        }
        if(empty($_POST['student_description'])){
            $error["desErr"]="Hãy nhập mô tả chi tiết";
        }
        if (empty($error)) {
            $dir="web/avatar/tmp/";
            if(!file_exists($dir)){
                mkdir($dir);
            }
            $file = $_FILES['student_image']['tmp_name'];
            $full_filename = $_FILES['student_image']['name'];
            $name_file = pathinfo($full_filename,PATHINFO_FILENAME);
            $ext_file = pathinfo($full_filename,PATHINFO_EXTENSION);
            $make_filename = $name_file . "_". time() . "." . $ext_file;
            move_uploaded_file($file,$dir . $make_filename);

            $_SESSION['student_name'] = $data['student_name'];
            $_SESSION['student_image'] = $make_filename;
            $_SESSION['student_description'] = $data['student_description'];

            header("Location: ?url=addStudent&action=add_comfirm");

        }
    }
    if (isset($_POST['student_add_confirm'])) {
        include 'app/model/student.php';
        $id = addStudent($_SESSION['student_name'],$_SESSION['student_image'],$_SESSION['student_description']);
        mkdir("web/avatar/student/" . (string)$id);
        rename("web/avatar/tmp/" . $_SESSION['student_image'], "web/avatar/student/" . (string)$id . "/" . $_SESSION['student_image']);
        unset($_SESSION['student_name']);
        unset($_SESSION['student_image']);
        unset($_SESSION['student_description']);
        header("Location: ?url=addStudent&action=add_complete");
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = '';
    }
    switch ($action) {
        case 'add_comfirm': {
            require_once('app/view/student/AddStudent/add_student_confirm.php');
            break;
        }
        case 'add_complete': {
                require_once('app/view/student/AddStudent/add_student_complete.php');
                break;
            }
        case 'add_input': {
            require_once('app/view/student/AddStudent/add_student_input.php');
            break;
        }
        default: {
                require_once('app/view/student/AddStudent/add_student_input.php');
                break;
            }
    }
    
?>