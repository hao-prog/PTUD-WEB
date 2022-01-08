<?php
    session_start();
    require '../../model/subjects.php';
    $id=$_SESSION["id"];
    $name = $_SESSION["name"];
    $class = $_SESSION["school_year"];
    $description = $_SESSION["description"];
    $avatar =  $_SESSION["avatar"];
    $update = date("Y-m-d h:i:s");
    $avatarPast=$_SESSION["avatarPast"];
    if(isset($_POST['edit'])){
            $file="../../../web/avata/add_subject/$avatar";
            $newfile="../../../web/avata/$id/$avatar";
            copy($file, $newfile);
            if($avatar!==$avatarPast){
                unlink("../../../web/avata/add_subject/$avatar");
                unlink("../../../web/avata/$id/$avatarPast");
            }else{
                unlink("../../../web/avata/add_subject/$avatar");
            }
            edit_room($id,$name, $class, $description, $avatar, $update);
            header("Location: ../../view/subject_edit_complete_view.php");
    }
?>