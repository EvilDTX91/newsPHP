<?php
if($_GET["login"]) {
    $username = $_GET["username"];
    $password = $_GET["password"];

    if ($username != null && $password != null) {
        echo "Hello " . $username . "!";
        echo "Your password: " . $password . "!";
        echo "<a href = index.php> <button>Back!</button>";
    } else {
        echo "Missing username or password!";
        echo "<a href = index.php><button>Back!</button>";
    }
}
?>