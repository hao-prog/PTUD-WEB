<?php
    session_start();
    $nameErr = $classErr = $descriptionErr = $avatarErr = "";
    $name = $building = $description = $avatarCorrect = "";
        require '../../model/subjects.php';
        $id=$_GET["id"];
        $result=get_room($id);
        foreach ($result as $item) {
        $namePast=$item["name"];
        $descriptionPast=$item["description"];
        $avatarPast=$item["avatar"];
        $classPast=$item["school_year"];
        }
    if (isset($_POST['btn-accept'])) {
        if (empty($_POST["name"])) {
            $nameErr = "Hãy nhập tên môn học *";
        } else if(strlen($_POST["name"])>100){
            $nameErr = "Tên môn học bé hơn 100 ký tự *";
        }else {
            $name = ($_POST["name"]);
        }
          
        if($_POST['building'] == "none") {
            $classErr = "Hãy chọn khoá học *";
        } else {
            $class = ($_POST["school_year"]);
        }

        if (empty($_POST["description"])) {
            $descriptionErr = "Hãy nhập mô tả *";
        }else if(strlen($_POST["description"])>1000){
            $descriptionErr = "Mô tả chi tiết bé hơn 1000 ký tự *";
        } else {
            $description = ($_POST["description"]);
        }
        
        $typeImage= array('jpg', 'png', 'jpeg', 'gif');
        $fileType = pathinfo($_POST['upload'], PATHINFO_EXTENSION);

        if (empty($_FILES['upload']['name'])) {
            $avatarErr = "Hãy chọn avatar*";
        } elseif (!in_array($fileType, $typeImage)){
            $avatarErr = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF *";
        }
        elseif (file_exists($_FILES['upload']['name'])){
            $avatarErr = "Tên file đã tồn tại, không được ghi đè *";
        }
         else {
            $avatarCorrect =  $_FILES['upload']['name'];
            move_uploaded_file($_FILES['upload']['tmp_name'], "../../../web/avata/add_subject/$avatarCorrect");
        }
        $upload = $_POST['upload'];
        if($name !="" && $class !="" && $description !="" && $upload !=""){
            header("Location: ../view/subject_edit_confirm_view.php");
            $_SESSION["id"]=$id;
            $_SESSION["description"] = $description;
            $_SESSION["name"] = $name;
            $_SESSION["school_year"] = $class;
            $_SESSION["description"]=$description;
            $_SESSION["avatar"]=$upload;
            $_SESSION["avatarPast"]=$avatarPast;

        }
    }
?>