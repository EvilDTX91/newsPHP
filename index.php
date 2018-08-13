<?php session_start();?>
<?php require ("Settings/connect.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>news!</title>
    <link rel="stylesheet" type="text/css" a href="style/style.css">
</head>
<body>
<div name="left" align="left">
    <?php include("start.php"); ?>
</div>

<div name="right" align="right">
    <form action="articleUploader.php" method="get">
        <?php include ("menu.php")?>
        <!--<input type="submit" name="userAdatlap" value="Adatlap">
        <input type="submit" name="userSendNews" value="Hír beküldése">
        <input type="submit" name="userLogOut" value="Kijelentkezés">-->
    </form>
</div>

<div name="mid" align="center">
   <?php include ("news.php"); ?>
</div>
</body>
<html>