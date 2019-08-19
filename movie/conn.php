<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mydb";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
	die(mysqli_errno());
}

?>
