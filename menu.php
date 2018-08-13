<?php
//echo "Hello! " . $_SESSION["firstname"];
echo "<form method='get'>";
echo "<input type='submit' name='userAdatlap' value='Adatlap'>";
echo "<input type='submit' name='userSendNews' value='Hír beküldése'>";
echo "<input type='submit' name='userLogOut' value='Kijelentkezés'>";
echo "</form>";
?>
<?php
if($_GET["userLogOut"])
{
    echo "Viszlát " . $_SESSION["firstname"];
    //session_destroy();
}
?>
