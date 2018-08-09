<?php
include ("settings/connect.php");
if($_GET["sendSignUp"])
{
    $username = $_GET["signUpUserName"];
    $password = $_GET["signUpPassword"];
    $email = $_GET["signUpEmail"];
    $firstname = $_GET["signUpFirstName"];
    $lastname = $_GET["signUpLastName"];
    $born = $_GET["signUpBornYear"] . $_GET["signUpBornMonth"] . $_GET["signUpBornDay"];

    $sql = "INSERT INTO users (username,userpassword,email,firstname,lastname,born)
            VALUES ('$username','$password','$email','$firstname','$lastname','$born')";

    if($connect->query($sql) === TRUE)
    {
        echo "New record created succcesfully!";
    }
    else
    {
        echo "Error: " . $sql . "</br>" . $connect->error;
    }
}
echo "<a href = index.php><button>Back!</button>";
$connect->close();
?>