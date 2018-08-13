<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>news!</title>
    <link rel="stylesheet" type="text/css" a href="style/style.css">
</head>
<body>
<div name="left" align="left">
    <form action="login.php" method="get">
        Username: <input type="text" name="loginUserName"> </br>
        Password: <input type="password" name="loginPassword"> </br>
        <input type="submit" name="Login" value="Login">
    </form>
    <form action="signUp.php" method="get">
        <input type="submit" name="SignUp" value="SignUp">
    </form>
</div>

<div name="mid" align="center">
   <?php include ("news.php"); ?>
</div>

<div name="right" align="right">
    <form action="articleUploader.php" method="get">
    <input type="button" name="userAdatlap" value="Adatlap">
    <input type="button" name="userSendNews" value="Hír beküldése">
    <input type="button" name="userLogOut" value="Kijelentkezés">
    </form>
</div>
</body>
<html>