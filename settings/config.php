<?php
session_start();
$_SESSION = array();
//$_SESSION["userLoggedIn"] = false;

define('WWWROOT', 'http://localhost/phpHome/newsphp/');
define('FILEROOT', 'D:/Programozas/xampp/htdocs/phpHome/newsphp/');

require('settings/connect.php');
require('logincheck.php');
$content = null;
?>