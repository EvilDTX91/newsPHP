<?php
if($_SESSION["userLoggedIn"])
{
    include ("menu.php");
    echo "Hi " . $_SESSION["username"] . "! (" . $_SESSION["userLoggedIn"] . ")";
}
else
    {
    include('loginCheck.php');
    }

echo $content;
?>