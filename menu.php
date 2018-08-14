<?php
//echo "Hello! " . $_SESSION["firstname"];

$content = "<form method='post'>
            <input type='submit' name='userProfile' value='Profil'>
            <input type='submit' name='userSendNews' value='Hír beküldése'>
            <input type='submit' name='userLogOut' value='Kijelentkezés'>
            </form>";
echo $content;

/*echo "<form method='get'>";
echo "<input type='submit' name='userAdatlap' value='Adatlap'>";
echo "<input type='submit' name='userSendNews' value='Hír beküldése'>";
echo "<input type='submit' name='userLogOut' value='Kijelentkezés'>";
echo "</form>";*/
?>
<?php
if(isset($_POST["userLogOut"]))
{
    echo "Viszlát " . $_SESSION["firstname"];
    session_destroy();
}
?>
