<?php
$host = "localhost";
$username = "root";
$userpassword = "";
$database = "newsphp";

$_SESSION["userLoggedIn"] = false;

$connect = new mysqli($host, $username, $userpassword, $database);
mysqli_set_charset($connect, 'utf8');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
//echo "Connection succesfull!";
?>