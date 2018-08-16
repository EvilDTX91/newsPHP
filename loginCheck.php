<?php
if($_SESSION["userLoggedIn"] === true)
{
    $username = $_SESSION["username"];
    $sql = "Select username FROM sessions WHERE username='$username'";
    $result = $connect->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            if($row == $username)
            {
                $content = null;
                echo $row . "</br>";
                include('menu.php');
            }
        }
    }

}
else
    {
        $content=null;
        include('login.php');
    }
?>