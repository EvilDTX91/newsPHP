<?php
if(isset($USER))
{
    echo $USER . " Siker! PAGE";
    include ("menu.php");
    echo "Hi " . $_SESSION["username"] . "! (" . $_SESSION["userLoggedIn"] . ") PAGE";
}
else
    {
    include('login.php');
    }

echo $content;
?>