<?php
if (isset($_POST["SignUp"])) {
    $content = "<form action='signUpRegister.php' method='post'>
    Firstname: <input type='text' name='signUpFirstName'> </br>
    Lastname: <input type='text' name='signUpLastName'> </br>
    Username: <input type='text' name='signUpUserName'> </br>
    Password: <input type='password' name='signUpPassword'></br>
    Re-Password: <input type='password' name='signUpRePassword'></br>
    E-mail: <input type='text' name='signUpEmail'></br>
    Born: <input type='text' name='signUpBornYear' size='2' maxlength='4'>
    <input type='text' name='signUpBornMonth' size='1' maxlength='2'>
    <input type='text' name='signUpBornDay' size='1' maxlength='2'></br>
    <input type='submit' name='sendSignUp' value='Register'>
    <input type='reset' name='resetSignUp' value='Reset'>
    </form>";
    echo $content;
}
echo "<a href = index.php><button>Back!</button>";
?>
