<?php 

//////////--tham dinh--//////////////////
include('../common/connectdb.php');

$specialized = ['MAT'=>"Toán tin", 'AST'=>"Thiên văn học", 'GEO'=>"Vật lý địa cầu", 'CHE'=>"Hoá hữu cơ", 'BIO'=>"Sinh học"];

    // lay thong tin giao vien
	function getTeacher($str, $spec){
		if ($str =='' && $spec=='' ){
			$query = "SELECT * FROM `teachers` ORDER BY id DESC;";
		}else{
        $query = "SELECT * FROM `teachers` WHERE (teachers.name LIKE '%".$str."%' OR teachers.description LIKE '%".$str."%' OR teachers.degree LIKE '%".$str."%') AND teachers.specialized ='".$spec."'";
  		}
        global $pdo;
        $statement = $pdo -> prepare($query) ;
        $statement -> execute();
        $search_teacher = [];
        foreach ($statement as $row ) {
			$id = $row['id'];
			$name = $row['name'];
			$des = $row['description'];
			$spec = $row['specialized']; 
			$search_teacher[] = array($id,$name,$des, $spec);
		}
    	// var_dump($search_teacher);
    	// echo count($search_teacher);
    	return $search_teacher;
    }
    //xoa thong tin giao vien
    function deleteTeacher($id,$str,$spec){
    	$i = (string) $id;
    	$query = "DELETE FROM `teachers` WHERE teachers.id = ".$i;
    	global $pdo;
    	$pdo->exec($query);
    	header("Location: ../view/search_teacher.php?spec=".$spec."&str=".$str);
    }
    //////////--tham dinh--//////////////////

?>