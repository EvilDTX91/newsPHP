<?php
    $content = null;
    $content = "<form action='articleUploader.php' method='get'>
            <input type='submit' name='userProfile' value='Profil' formaction='profile.php'></br>
            <input type='submit' name='userSendNews' value='Hír beküldése'></br>
            <input type='submit' name='userLogOut' value='Kijelentkezés' formaction='index.php'></br>
            </form>";
    echo $content;
/*echo "<form method='get'>";
echo "<input type='submit' name='userAdatlap' value='Adatlap'>";
echo "<input type='submit' name='userSendNews' value='Hír beküldése'>";
echo "<input type='submit' name='userLogOut' value='Kijelentkezés'>";
echo "</form>";*/
?>

<?php
if(isset($_GET["userLogOut"]))
{
    include('Settings/connect.php');
    $username=$_SESSION["username"];
    echo "Viszlát " . $_SESSION["firstname"] . "!</br>";

    $sql = "DELETE FROM sessions WHERE username='$username'";
    if ($connect->query($sql) === TRUE)
    {
        echo "Record deleted successfully";
    }
    else
        {
    echo "Error deleting record: " . $connect->error;
    }

        $connect->close();
        session_destroy();
        $_SESSION = array();
        include(index.php);
}
?>