<?php
/*
if($_SESSION["$USER"])
{
    $username = $_SESSION["username"];
    $sql = "Select username FROM sessions WHERE username='$username'";
    $result = $connect->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            if($row == $username)
            {
                $content = null;
                echo $row . "</br>";
                include('menu.php');
            }
        }
    }

}
else
    {
        $content=null;
        //include("menu.php");
        include('login.php');
    }
*/
?>
<?php
if(isset($_POST["Login"]))
{
    $sessionID = session_id();
    echo "</br>Session ID: " . session_id() . "</br>";
    $username = $_POST["loginUserName"];
    $password = $_POST["loginPassword"];

    if ($username != null && $password != null) {

        foreach($_POST as $index => $elem)
        {
            $$index = htmlspecialchars($_POST[$index],ENT_QUOTES,'UTF-8');
        }

        $sql = "SELECT * FROM users WHERE username = '$username' AND userpassword = '$password'";
        $result = $connect->query($sql);

        $update = "UPDATE users SET lastlogin=now() WHERE username='$username' AND userpassword='$password' ";
        $connect->query($update);

        $sessionDB = "INSERT INTO sessions(session,username,userPW)
                      VALUES ('$sessionID','$username','$password')";
        $connect->query($sessionDB);

        $content = null;
        $content = include ("menu.php");
        //echo $content;

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                /*echo "</br>Username: " . $row["username"] . "(ID: " . $row["id"] . ")";
                echo "</br>Name: " . $row["lastname"] . " " . $row["firstname"];
                echo "</br>E-mail: " . $row["email"];
                echo "</br>Born: " . $row["born"];
                echo "</br>Registered: " . $row["regist"];
                echo "</br>Last Here: " . $row["lastlogin"] . "</br>";*/

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
                echo "Hi " . $_SESSION["username"] . "! (" . $_SESSION["userLoggedIn"] . ") LOGIN";
            }
        }
        else
        {
            echo "Result 0!</br>";
        }
    }
    else
    {
        echo "Missing username or password! </br>";
    }
}
?>
<?php
$USER = false;
if(isset($_SESSION["sessionID"])) {
    $username = $_SESSION["username"];
    $userpassword = $_SESSION["password"];

    $sql = "Select username FROM sessions WHERE username='$username' AND userpassword='userpassword'";
    $succes = $connect->query($sql);

    if(isset($succes))
    {
        $USER = true;
        echo $USER . " Siker!";
    } else {
        $USER = false;
        echo $USER . " Nem Siker!";
    }
}
?>