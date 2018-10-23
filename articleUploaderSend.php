<?php
if (isset($_POST["userUploadNews"])) {
    include("Settings/connect.php");
    $title = mysqli_real_escape_string($connect, $_POST['userWriteTitle']);
    $article = mysqli_real_escape_string($connect, $_POST['userWriteNews']);

    $sql = "SELECT id,username FROM users WHERE id='1' ";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "Uploaded by: " . $row['username'] . "</br>";
        $author = mysqli_real_escape_string($connect, $row['username']);
        echo "Uploaader ID: " . $row['id'] . "</br>";
        $authorID = mysqli_real_escape_string($connect, $row['id']);
    }

    $sql = "INSERT INTO articles (authorID,article,title)
    VALUES ('$authorID','$article','$title')";

    if ($connect->query($sql)) {
        echo "Upload completed!";
    }

    echo "</br><a href = index.php><button>Back!</button>";
}
$connect->close();
