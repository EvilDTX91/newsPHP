<?php
session_start();

define('WWWROOT', 'http://localhost/phpHome/newsphp/');
define('FILEROOT', 'D:/Programozas/xampp/htdocs/phpHome/newsphp/');

require(FILEROOT . 'settings/connect.php');

require(FILEROOT . 'logincheck.php');
require(FILEROOT . 'articleUploader.php');
require(FILEROOT . 'articleUploaderSend.php');
require(FILEROOT . 'profile.php');
$content = null;
$left = null;
$right = null;
$head = null;
?>