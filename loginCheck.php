<?php
$sql = "Select * FROM sessions WHERE username='$username'";

if($connect->query($sql))
{
    inculde('menu.php');
}
else
{
    include('start.php');
}

?>