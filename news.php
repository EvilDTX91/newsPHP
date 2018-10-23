<?php
include("settings/connect.php");

$sql = "Select * FROM articles";
$result = $connect->query($sql);
$counter = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($counter <= 4) {
            echo "Title: " . $row["title"] . "</br>";
            echo $row["article"] . "</br>";
            echo "Author: " . $row["authorID"] . "</br></br></br></br></br></br></br>";
            $counter++;
        } else {
            echo "Next page...</br></br></br></br></br></br></br>";
            break;
        }
    }
}