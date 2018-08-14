<?php session_start();?>
<?php
$content = "Username: " . $_SESSION["username"] . " (ID: " . $_SESSION["id"] . ")
            </br>Name: " . $_SESSION["lastname"] . $_SESSION["firstname"] . "
            </br>E-mail: " . $_SESSION["email"] . "
            </br>Born: " . $_SESSION["born"] . "
            </br>Registered: " . $_SESSION["registered"] . "
            </br>Last Here: " . $_SESSION["lastlogin"] . "</br>";
echo $content;
echo "<a href = index.php> <button>Back!</button>";
?>