<?php
$host = "localhost";
$username = "root";
$userpassword = "";
$database = "newsphp";

$_SESSION["userLoggedIn"] = false;

$connect = new mysqli($host, $username, $userpassword, $database);
//$connect = mysqli(mysqli_set_charset('utf8'));

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
//echo "Connection succesfull!";
?>