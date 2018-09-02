<?php
if (isset($_POST["Login"])) {
    require('Settings/connect.php');
    $sessionID = session_id();
    echo "</br>Session ID: " . session_id() . "</br>";
    $username = $_POST["loginUserName"];
    $password = $_POST["loginPassword"];

    if ($username != null && $password != null) {

        foreach ($_POST as $index => $elem) {
            $$index = htmlspecialchars($_POST[$index], ENT_QUOTES, 'UTF-8');
        }

        $sql = "SELECT * FROM users WHERE username = '$username' AND userpassword = '$password'";
        $result = $connect->query($sql);

        $update = "UPDATE users SET lastlogin=now() WHERE username='$username' AND userpassword='$password' ";
        $connect->query($update);

        //$content = null;
        //include ("menu.php");
        //echo $content;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["password"] = $row["userpassword"];
                $_SESSION["id"] = $row["id"];
                $_SESSION["lastname"] = $row["lastname"];
                $_SESSION["firstname"] = $row["firstname"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["born"] = $row["born"];
                $_SESSION["registered"] = $row["regist"];
                $_SESSION["lastlogin"] = $row["lastlogin"];
                $_SESSION["sessionID"] = session_id();
                echo "Hi " . $_SESSION["username"] . "! LOGIN</br>";
            }

            $sessionDB = "INSERT INTO sessions(session,username,userID,userPW)
                      VALUES ('$sessionID','$username','" . $_SESSION["id"] . "','$password')";
            $connect->query($sessionDB);
        } else {
            echo "Result 0!</br>";
        }
    } else {
        echo "Missing username or password! </br>";
    }
}
$USER = null;
//echo "Login check Starts here...";
//echo $USER . " result?!";
if (isset($_SESSION["password"])) {
    $username = $_SESSION["username"];
    $userpassword = $_SESSION["password"];
    $session = $_SESSION["sessionID"];

    $sql = "Select * FROM sessions WHERE username='$username' AND userpassword='userpassword' AND session='$session'";
    $succes = $connect->query($sql);

    if (isset($succes)) {
        $USER = true;
        echo $USER . " Siker!";
    } else {
        $USER = null;
        echo $USER . " Nem Siker!";
    }
}