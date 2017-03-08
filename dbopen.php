<!-- used to open database -->

<?php

$servername = "localhost";
$username = "root";
$password = "Iaatutm1";
$db = "karkima";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}
//echo "Connected successfully";
?>