<?php
include ("settings/connect.php");
if($_GET["sendSignUp"])
{
    $username = mysqli_real_escape_string($connect, $_GET["signUpUserName"]);
    $password = mysqli_real_escape_string($connect, $_GET["signUpPassword"]);
    $email = mysqli_real_escape_string($connect, $_GET["signUpEmail"]);
    $firstname = mysqli_real_escape_string($connect, $_GET["signUpFirstName"]);
    $lastname = mysqli_real_escape_string($connect, $_GET["signUpLastName"]);
    $born = mysqli_real_escape_string($connect, $_GET["signUpBornYear"] . $_GET["signUpBornMonth"] . $_GET["signUpBornDay"]);

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