<?php
    require '../../model/subjects.php';
    $id=getLastIDR();
    $name = $_GET['name'];
    $class = $_GET['school_year'];
    $description = $_GET['description'];
    $avatar = $_GET['avatar'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $created = date("Y-m-d h:i:s");

    $check_tmp = 0;
    if(isset($_POST['btn-add'])){
        $check_tmp += 1; 
        if($check_tmp == 1){
            add_room($name, $class, $description, $avatar, $created);
            mkdir("../../../web/avata/$id", 0777);
            remove_tmp($avatar,$id);
            router_room();
        }
    }

    function remove_tmp($img_tmp,$id){
        $file="../../../web/avata/add_subject/$img_tmp";
        $newfile="../../../web/avata/$id/$img_tmp";
        copy($file, $newfile);
        unlink("../../../web/avata/add_subject/.$img_tmp");
    } 

    function router_room(){
        header("Location: ../../view/subject_add_complete_view.php");
    }
?>