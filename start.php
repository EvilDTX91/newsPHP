<?php
if($_SESSION["userLoggedIn"] == false)
{
    echo "<form action='login.php' method='get'>";
    echo "Username:<input type='text' name='loginUserName'></br>";
    echo "Password: <input type='password' name='loginPassword'></br>";
    echo "<input type='submit' name='Login' value='Login'>";
    echo "</form>";
    echo "<form action='signUp.php' method='get'>";
    echo "<input type='submit' name='SignUp' value='SignUp'>";
    echo "</form>";
}
if($_SESSION["userLoggedIn"] == true)
{
    echo "Hello " . $_SESSION["firstname"];
    include("menu.php");
}
?>