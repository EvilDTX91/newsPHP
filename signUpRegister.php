<?php
include ("settings/connect.php");
if($_GET["sendSignUp"])
{
    $username = "signUpUserName";
    $password = "signUpPassword";
    $email = "signUpEmail";
    $firstname = "signUpFirstName";
    $lastname = "signUpLastName";
    $born = "signUpBornYear . signUpBornMonth . signUpBornDay";

    $sql = "INSERT INTO useres (username,userpassword,email,firstname,lastname,born)
            VALUES ('$username','$password','$email','$firstname','$lastname','$born')";

    $connect->query($sql);

    echo "<a href = index.php><button>Back!</button>";
}
$connect->close();
?>