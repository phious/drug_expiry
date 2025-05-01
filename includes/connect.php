<?php

$host = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASS");
$database = getenv("DB_NAME");
$conn = mysqli_connect($host,$username,$password,$db);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>