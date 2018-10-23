<?php
if (isset($_POST["sendSignUp"])) {
    $username = mysqli_real_escape_string($connect, $_POST["signUpUserName"]);
    $password = mysqli_real_escape_string($connect, $_POST["signUpPassword"]);
    $email = mysqli_real_escape_string($connect, $_POST["signUpEmail"]);
    $firstname = mysqli_real_escape_string($connect, $_POST["signUpFirstName"]);
    $lastname = mysqli_real_escape_string($connect, $_POST["signUpLastName"]);
    $born = mysqli_real_escape_string($connect, $_POST["signUpBornYear"] . $_POST["signUpBornMonth"] . $_POST["signUpBornDay"]);

    include("settings/connect.php");

    $sql = "INSERT INTO users (username,userpassword,email,firstname,lastname,born)
            VALUES ('$username','$password','$email','$firstname','$lastname','$born')";

    if ($connect->query($sql) === TRUE) {
        echo "New record created succcesfully!";
    } else {
        echo "Error: " . $sql . "</br>" . $connect->error;
    }
}
echo "<a href = index.php><button>Back!</button></a>";
$connect->close();