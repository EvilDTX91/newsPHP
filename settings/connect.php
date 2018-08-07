<?php
$host = "localhost";
$username = "newsAdmin";
$userpassword = "";
$database = "newsphp";

$connection = new mysqli($host,$username,$userpassword);

if($connection->connect_error){
	die("Connection failed: " . $connect->connect_error);
}
echo "Connection succesfull!";
?>