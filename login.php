<?php
if (isset($USER)) {
    echo $USER . " Siker! LOGIN";
    include "menu.php";
} else {
    //echo $content . " working?! LOGIN";
    $content = null;
    $content = "<form action='' method='post'>
                Username:<input type='text' name='loginUserName'></br> 
                Password: <input type='password' name='loginPassword'></br>
                <input type='submit' name='Login' value='Login'>
                </form> " . "
                <nobr><form action='signUp.php' method='post'>
                <input type='submit' name='SignUp' value='SignUp'>
                </form>
                <nobr><form action='' method='post'>
                <input type='submit' name='ForgetPassword' value='ForgetPassword'>
                </form>";
    echo $content;
}
?>