<?php require ('settings/connect.php')?>
<!DOCTYPE html>
<html>
<head><title>news!</title>
<link rel="stylesheet" type="text/css" a href="style/style.css">
</head>
<body>
Hello vilag!
<div name="left" align="left">
    <form action="login.php" method="$_GET">
        Username: <input type="text" name="loginUserName"> </br>
        Password: <input type="password" name="loginPassword"> </br>
        <input type="submit" name="Login" value="Login">
    </form>
    <form action="signUp.php" method="$_GET">
        <input type="submit" name="SignUp" value="SignUp">
    </form>
</div>

<div name="mid" align="center"></div>

<div name="right" align="right"></div>
</body>
<html>