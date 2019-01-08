<?php

// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "todo_app_db";

$host = "db4free.net";
$username = "jpaconcepcion";
$password = 12345678;
$dbname = "jpctodolist";

$conn = mysqli_connect($host,$username,$password,$dbname);

if (!$conn) {
	die('Connection failed: ' . mysqli_error($conn) );
}

echo 'connected successfully';


?>