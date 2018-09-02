<?php
if (isset($USER)) {
    $content = null;
    $content = "<form action='' method='get'>
            <input type='submit' name='userProfile' value='Profil'></br>
            <input type='submit' name='userSendNews' value='Hír beküldése'></br>
            <input type='submit' name='userLogOut' value='Kijelentkezés'></br>
            </form>";
    echo $content;
}
if (isset($_GET["userLogOut"])) {
    include('Settings/connect.php');
    $username = $_SESSION["username"];
    echo "Viszlát " . $_SESSION["firstname"] . "!</br>";
    $USER = null;

    $sql = "DELETE FROM sessions WHERE username='$username'";
    if ($connect->query($sql)) {
        echo "Record deleted successfully";
        $connect->close();
        session_destroy();
    } else {
        echo "Error deleting record: " . $connect->error;
    }
}