<?php

$host = getenv("drug-expiry-db-yonatanamare5000-3761.l.aivencloud.com");
$username = getenv("avnadmin");
$password = getenv("AVNS_lyiD-Owz2nkljyhMlV1");
$database = getenv("defaultdb");
$conn = mysqli_connect($host,$username,$password,$database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>