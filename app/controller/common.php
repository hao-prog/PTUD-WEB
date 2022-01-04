<meta http-equiv="refresh" content="1800">
<?php
session_start();
function expire($pre) {
	if(!isset($_SESSION["loggedAdmin"])){
		header("location:" .$pre. "login.php");
	}
	setcookie("loggedAdm", 1, time() + (1800), '/');
	if(!isset($_COOKIE['loggedAdm'])){
		session_destroy();
		setcookie("loggedAdm", "", time() - (3600));
		header("location:" .$pre. "login.php");
	}
}
?>