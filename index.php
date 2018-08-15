<?php include("Settings/config.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>news!</title>
    <link rel="stylesheet" type="text/css" a href="style/style.css">
</head>
<body>
<div id="left1" name="left1" align="left">
    <?php
    if($content == null)
    {
        include("start.php");
        echo $content;
    }
    else
    {
        echo $content;
    }
    ?>
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