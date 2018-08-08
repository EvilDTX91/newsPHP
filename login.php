<?php
if($_GET["Login"]) {
    $username = $_GET["loginUserName"];
    $password = $_GET["loginPassword"];

    if ($username != null && $password != null) {
        echo "Hello " . $username . "!";
        echo "Your password: " . $password . "! </br>";
        echo "<a href = index.php> <button>Back!</button>";
    } else {
        echo "Missing username or password! </br>";
        echo "<a href = index.php><button>Back!</button>";
    }
}
?>