<?php 

require_once "../view/search_teacher.php";
require_once "../model/teacher.php";
$spec =  "";

if (isset($_GET["str"]) && isset($_GET["spec"])) {  
    $s = $_GET["str"];  
    $str = (string)trim($s," ");
    $spec = $_GET["spec"];
}else {  
    $str = ""; 
    $spec = ""; 
}   
       
       $search_teacher = getTeacher($str, $spec);
      
     ?>