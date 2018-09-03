<?php
if (isset($_GET["userProfile"])) {
    if (isset($USER)) {
        $content = null;
        $content = "Username: " . $_SESSION["username"] . " (ID: " . $_SESSION["id"] . ")
            </br>Name: " . $_SESSION["lastname"] . $_SESSION["firstname"] . "
            </br>E-mail: " . $_SESSION["email"] . "
            </br>Born: " . $_SESSION["born"] . "
            </br>Registered: " . $_SESSION["registered"] . "
            </br>Last Here: " . $_SESSION["lastlogin"] . "</br>";
        echo $content;
    } else {
        echo "Kérem jelentkezzen be a tartalom eléréséhez.(Profil)</br>";
        echo "<a href='index.php'><button>Back!</button></a>";
        echo "Hi " . $_SESSION["username"] . "! (" . $_SESSION["userLoggedIn"] . ") PROFILE";
    }
}
//echo "<a href='index.php'><button>Back!</button>";
?>