<?php
if($_GET["SignUp"])
{
    echo "<form action='register.php' method='$_GET'>";
    echo "Username: <input type='text' name='signUpUserName'> </br>";
    echo "Password: <input type='password' name='signUpPassword'></br>";
    echo "E-mail: <input type='text' name='signUpEmail'></br>";
    echo "<input type='submit' name='sendSignUp' value='Register'>";
    echo "<input type='reset' name='resetSignUp' value='Reset'>";
    echo "<a href='index.php'><button>Back</button></a></br>";
    echo "</form>";
}


?>