<?php
	require_once "../model/teacher.php";
	$spec = $_GET["spec"];
	$str = $_GET["str"]; 

	$id = $_GET["id"]; 

	deleteTeacher($id,$str,$spec);
?>