<?php
include ("settings/connect.php");

$sql = "Select * FROM articles";
$result = $connect->query($sql);

if($result->num_rows>0)
{
    while($row = $result->fetch_assoc())
    {
        echo "Title: " . $row["title"] . "</br>";
        echo $row["article"] . "</br>";
        echo "Author: " . $row["authorID"] . "</br></br></br></br></br></br></br>";
    }
}
?>