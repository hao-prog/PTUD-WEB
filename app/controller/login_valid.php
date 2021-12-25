<!-- <script>
	function getTime() {
		var today = new Date(); 
		var date = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate(); 
		var time = today.getHours() + ":" + today.getMinutes(); 
		var dateTime = date + ' ' + time;
		return dateTime; 
	}
</script> -->

<?php
// require_once '../common/connectionPDO.php';
// include '../model/admin.php';

$username = $password = "";
$usernameErr = $passwordErr = $loginErr = "";

// Standard data		
function get_data($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars_decode($data);
	return $data;
}
		
session_start();
// Condition to submit			
if(isset($_POST["submit"])) {
	if(empty(get_data($_POST["username"]))) {
		$usernameErr = "Hãy nhập login id";
    } else if(strlen(get_data($_POST["username"])) < 4) {
        $usernameErr = "Hãy nhập login id tối thiểu 4 ký tự";
    } else {
		$username = get_data($_POST["username"]);
	}
				
	if(empty(get_data($_POST["password"]))) {
		$passwordErr = "Hãy nhập password";
    } else if(strlen(get_data($_POST["password"])) < 6) {
		$passwordErr = "Hãy nhập password tối thiểu 6 ký tự";
	} else {
		$password = get_data($_POST["password"]);
	}
				
	if ($username != "" && $password != "") {
		$admin_db = checkExist($username, md5($password));
		// print_r($admin_db);

		if(count($admin_db) == 0) { 
			echo"<script>alert('login id và password không đúng');</script>";
		} else {
			$a = "<script>document.writeln(getTime());</script>";
			$_SESSION["loggedAdmin"] = 1;
			$_SESSION["username"] = $username;
			$_SESSION["dateTime"] = date('Y-m-d H:i', time());
			// "<script>document.writeln(getTime());</script>";
			header("location: home.php");
			exit();
		}
	}
}
?>