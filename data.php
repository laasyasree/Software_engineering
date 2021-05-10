<?php

// Server name must be localhost
$servername = "localhost";

// In my case, user name will be root
$username = "root";

// Password is empty
$password = "";

// Creating a connection
$conn = new mysqli($servername,
			$username, $password);

// Check connection
if ($conn->connect_error) {
	die("Connection failure: "
		. $conn->connect_error);
}

// Creating a database named geekdata
$sql = "CREATE DATABASE product_uploads";
if ($conn->query($sql) === TRUE) {
	echo "Database with name product_uploads";
} else {
	echo "Error: " . $conn->error;
}

// Closing connection
$conn->close();
?>
