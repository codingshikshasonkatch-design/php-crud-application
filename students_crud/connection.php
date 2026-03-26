<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "students_crud";

$conn = mysqli_connect($host, $user, $pass, $db_name);

if (!$conn) {
	die("Connection failed");
}

 ?>