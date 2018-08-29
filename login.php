<?php
if(isset($USER))
{
    include "menu.php";
}
else
{
    //echo $content . " working?! LOGIN";
    $content = null;
    $content = "<form action='' method='post'>
                Username:<input type='text' name='loginUserName'></br> 
                Password: <input type='password' name='loginPassword'></br>
                <input type='submit' name='Login' value='Login' formaction='loginCheck.php'>
                </form> " . "
                <nobr><form action='signUp.php' method='post'>
                <input type='submit' name='SignUp' value='SignUp'>
                </form>
                <nobr><form action='' method='post'>
                <input type='submit' name='ForgetPassword' value='ForgetPassword'>
                </form>";
    //echo $content;
}
/*echo "<form action='login.php' method='get'>";
echo "Username:<input type='text' name='loginUserName'></br>";
echo "Password: <input type='password' name='loginPassword'></br>";
echo "<input type='submit' name='Login' value='Login'>";
echo "</form>";
echo "<form action='signUp.php' method='get'>";
echo "<input type='submit' name='SignUp' value='SignUp'>";
echo "</form>";*/
/*
if($_SESSION["userLoggedIn"] == true)
{
    echo "Hello " . $_SESSION["firstname"];
    include("menu.php");
}
*/
?>