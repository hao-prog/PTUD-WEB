<?php 


include('../common/connectdb.php');
$pdo=new Database();
$pdo->__construct();

$specialized = ['001'=>"Khoa học máy tính",'002'=>"Khoa học dữ liệu",'003'=>"Hải dương học"];
$degree = ['001'=>"Cử nhân",'002'=>"Thạc sỹ",'003'=>"Tiến sỹ",'004'=>"Phó giáo sư",'005'=>"Giáo sư"];

  
	function getTeacher($str, $spec){
		if ($str =='' && $spec=='' ){
			$query = "SELECT * FROM `teachers` ORDER BY id DESC;";
		}else{
        $query = "SELECT * FROM `teachers` WHERE (teachers.name LIKE '%".$str."%' OR teachers.description LIKE '%".$str."%' OR teachers.degree LIKE '%".$str."%') AND teachers.specialized ='".$spec."'";
  		}
        global $pdo;
        $statement = $pdo ->conn-> prepare($query) ;
        $statement -> execute();
        $search_teacher = [];
        foreach ($statement as $row ) {
			$id = $row['id'];
			$name = $row['name'];
			$des = $row['description'];
			$spec = $row['specialized']; 
			$search_teacher[] = array($id,$name,$des, $spec);
		}
    
    	return $search_teacher;
    }
    
    function deleteTeacher($id,$str,$spec){
    	$i = (string) $id;
    	$query = "DELETE FROM `teachers` WHERE teachers.id = ".$i;
    	global $pdo;
    	$pdo->conn->exec($query);
    	header("Location: ../view/search_teacher.php?spec=".$spec."&str=".$str);
    }
   

?>