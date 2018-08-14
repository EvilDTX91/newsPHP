<?php session_start();?>
<?php include ('settings/connect.php') ?>
<?php
if(isset($_POST["Login"]))
{
    $username = $_POST["loginUserName"];
    $password = $_POST["loginPassword"];

    if ($username != null && $password != null) {

        $sql = "SELECT * FROM users WHERE username = '$username' AND userpassword = '$password'";
        $result = $connect->query($sql);

        $update = "UPDATE users SET lastlogin=now() WHERE username='$username' AND userpassword='$password' ";
        $connect->query($update);

        include ("menu.php");

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
                $_SESSION["userLoggedIn"] = true;
            }
        }
        else
        {
            echo "Result 0!</br>";
        }
    } else {
        echo "Missing username or password! </br>";
    }
}
echo "<a href = index.php> <button>Back!</button>";
$connect->close();
?>