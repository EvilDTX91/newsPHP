<?php
if (isset($USER)) {
    $content = null;
    include("menu.php");
    //echo "Hi " . $_SESSION["username"] . "! PAGE";
} else {
    $content = null;
    include('login.php');
}