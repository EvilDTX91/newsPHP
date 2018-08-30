<?php
if(isset($USER))
{
    echo $USER . " Siker! PAGE";
    $content = null;
    include ("menu.php");
    echo "Hi " . $_SESSION["username"] . "! PAGE";
}
else
    {
    $content = null;
    include('login.php');
    }
//echo $content;
?>