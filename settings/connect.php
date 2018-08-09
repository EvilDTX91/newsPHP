<?php
$host = "localhost";
$username = "root";
$userpassword = "";
$database = "newsphp";

$connect = new mysqli($host,$username,$userpassword,$database);

if($connect->connect_error){
	die("Connection failed: " . $connect->connect_error);
}
//echo "Connection succesfull!";
?>