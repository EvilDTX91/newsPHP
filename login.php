<?php
if($_SESSION["userLoggedIn"] === false) {

    echo $content . " working?!";
    $content = null;
    $content = "<form action='' method='post'>
                Username:<input type='text' name='loginUserName'></br> 
                Password: <input type='password' name='loginPassword'></br>
                <input type='submit' name='Login' value='Login'>
                </form> " . "
                <form method='post'>
                <input type='submit' name='SignUp' value='SignUp'>
                </form>";
    //echo $content;
}
/*echo "<form action='login.php' method='get'>";
echo "Username:<input type='text' name='loginUserName'></br>";
echo "Password: <input type='password' name='loginPassword'></br>";
echo "<input type='submit' name='Login' value='Login'>";
echo "</form>";
echo "<form action='signUp.php' method='get'>";
echo "<input type='submit' name='SignUp' value='SignUp'>";
echo "</form>";*/
/*
if($_SESSION["userLoggedIn"] == true)
{
    echo "Hello " . $_SESSION["firstname"];
    include("menu.php");
}
*/
?>
<?php
if(isset($_POST["Login"]))
{
    $sessionID = session_id();
    echo session_id();
    $username = $_POST["loginUserName"];
    $password = $_POST["loginPassword"];

    if ($username != null && $password != null) {

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
                $_SESSION["userLoggedIn"] = true;
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