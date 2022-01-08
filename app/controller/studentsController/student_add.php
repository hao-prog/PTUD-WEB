<?php
    $data = array(); //tạo mảng chứa dữ liệu
    $error = array(); //tạo mảng chứa lỗi validate

    // chọn nút xác nhận ở màn hình input
    if (isset($_POST['student_add'])) { 

        // lấy dữ liệu từ form == phương thức POST
        $data['student_name'] = isset($_POST['student_name']) ? $_POST['student_name'] : '';
        $data['student_image'] = isset($_FILES['student_image']['name']) ? $_FILES['student_image']['name'] : '';
        $data['student_description'] = isset($_POST['student_description']) ? $_POST['student_description'] : '';
        
        // Validate các trường 
        if(empty($data['student_name'])){
            $error['student_name']='Hãy nhập tên sinh viên';
        }
        if(strlen($data['student_name'])>100){
            $error['student_name']='Không nhập quá 100 ký tự';
        }
        if(strlen($data['student_description'])>1000){
            $error['student_name']='Không nhập quá 1000 ký tự';
        }
        if (!file_exists($_FILES['student_image']['tmp_name'])){
            $error['student_image']='Hãy chọn avatar';
        }
        if(empty($data['student_image'])){
            $error['student_image']='Hãy chọn avatar';
        }
        if(empty($data['student_description'])){
            $error['student_description']='Hãy nhập mô tả chi tiết';
        }

        // kiếm tra đăng ký có lỗi hay không
        if (empty($error)) {

            // tạo thư mục chứa ảnh 
            $dir="web/avatar/tmp/";
            if(!file_exists($dir)){
                mkdir($dir);
            }

            // lưu ảnh vào thư mục
            $file = $_FILES['student_image']['tmp_name'];
            $full_filename = $_FILES['student_image']['name'];
            $name_file = pathinfo($full_filename,PATHINFO_FILENAME);
            $ext_file = pathinfo($full_filename,PATHINFO_EXTENSION);
            $make_filename = $name_file . "_". time() . "." . $ext_file;
            move_uploaded_file($file,$dir . $make_filename);

            // tạo các biến sesssion
            $_SESSION['student_name'] = $data['student_name'];
            $_SESSION['student_image'] = $make_filename;
            $_SESSION['student_description'] = $data['student_description'];

            // chuyển qua màn hình confirm
            header("Location: add_student.php?method=add_comfirm");

        }
    }
    // chọn nút đăng ký ở màn hình confirm
    if (isset($_POST['student_add_confirm'])) {

        // Thêm dữ liệu vào database đồng thời lấy id của nó ra
        $id = addStudent($_SESSION['student_name'],$_SESSION['student_image'],$_SESSION['student_description']);

        // tạo và di chuyển ảnh đến thư mục đó
        mkdir("web/avatar/student/" . (string)$id);
        rename("web/avatar/tmp/" . $_SESSION['student_image'], "web/avatar/student/" . (string)$id . "/" . $_SESSION['student_image']);
        
        // Xóa các file ảnh còn trong thư mục tmp (chứa ảnh tạm thời)
        $files = glob('web/avatar/tmp/*'); 
        foreach($files as $file){ 
            if(is_file($file)) unlink($file); 
        }

        // xóa biến session khi đăng kí thành công
        unset($_SESSION['student_name']);
        unset($_SESSION['student_image']);
        unset($_SESSION['student_description']);

        // chuyển sang màn hình complete
        header("Location: add_student.php?method=add_complete");
    }
    // Lấy param method trong url
    if (isset($_GET['method'])) {
        $method = $_GET['method'];
    } else {
        $method = '';
    }

    // Kiếm tra action và viết điều kiện chuyển view
    switch ($method) {
        case 'add_comfirm': {
            require_once('app/view/student/AddStudent/add_student_confirm.php');
            break;
        }
        case 'add_complete': {
                require_once('app/view/student/AddStudent/add_student_complete.php');
                break;
            }
        default: {
            require_once('app/view/student/AddStudent/add_student_input.php');
            break;
        }
    }
    
    
?>