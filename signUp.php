<?php
if($_GET["SignUp"])
{
    echo "<form action='signUpRegister.php' method='get'>";
    echo "Firstname: <input type='text' name='signUpFirstName'> </br>";
    echo "Lastname: <input type='text' name='signUpLastName'> </br>";
    echo "Username: <input type='text' name='signUpUserName'> </br>";
    echo "Password: <input type='password' name='signUpPassword'></br>";
    echo "Re-Password: <input type='password' name='signUpRePassword'></br>";
    echo "E-mail: <input type='text' name='signUpEmail'></br>";
    echo "Born: <input type='text' name='signUpBornYear' size='2' maxlength='4'>";
    echo "<input type='text' name='signUpBornMonth' size='1' maxlength='2'>";
    echo "<input type='text' name='signUpBornDay' size='1' maxlength='2'></br>";
    echo "<input type='submit' name='sendSignUp' value='Register'>";
    echo "<input type='reset' name='resetSignUp' value='Reset'>";
    echo "</form>";
}
echo "<a href = index.php><button>Back!</button>";
?>
