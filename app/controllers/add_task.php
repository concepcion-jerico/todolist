<?php

require_once './connection.php';

$addtask = $_GET['name'];

$sql = "INSERT INTO tasks(name) VALUES ('$addtask')";

// mysqli_query function expects 2 arguments, first is the connection to your db variable and second is your mysql query variable

$result = mysqli_query($conn, $sql);

if ($result === TRUE) {
	echo 'new task added successfully';
} else {
	echo 'Error: ' . $sql . "<br>" . mysqli_error($conn);
}

// close a previously opened database connection
mysqli_close($conn);





?>