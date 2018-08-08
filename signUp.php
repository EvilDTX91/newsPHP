<?php
if($_GET["SignUp"])
{
    echo "<form method='get'>";
    echo "Username: <input type='text' name='signUpUserName'> </br>";
    echo "Password: <input type='password' name='signUpPassword'></br>";
    echo "E-mail: <input type='text' name='signUpEmail'></br>";
    echo "<input type='submit' name='sendSignUp' value='Register'>";
    echo "<input type='reset' name='resetSignUp' value='Reset'>";
    echo "</form>";
    echo "<a href = index.php><button>Back!</button>";
}
?>
<?php
if($_GET["sendSignUp"])
{
    echo "It's ok!";
    echo "<a href = index.php><button>Back!</button>";
}
?>
