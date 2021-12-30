<?php
require_once 'define.php';

$serverName = DB_SERVER;
$username = DB_USER;
$password = DB_PASSWORD;
$myDB = DB_NAME;
try {
    $conn = new PDO("mysql:host=$serverName;dbname=$myDB", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed" . $e->getMessage();
}
?>