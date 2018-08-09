<?php include ('settings/connect.php') ?>
<?php
if($_GET["Login"]) {
    $username = $_GET["loginUserName"];
    $password = $_GET["loginPassword"];

    if ($username != null && $password != null) {

        $sql = "SELECT * FROM users WHERE username = '$username' AND userpassword = '$password'";
        $result = $connect->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo "</br>Username: " . $row["username"] . "(ID: " . $row["id"] . ")";
                echo "</br>Name: " . $row["lastname"] . " " . $row["firstname"];
                echo "</br>E-mail: " . $row["email"];
                echo "</br>Born: " . $row["born"];
                echo "</br>Registered: " . $row["regist"];
                echo "</br>Last Here: " . $row["lastlogin"] . "</br>";
            }
        }
        else
        {
            echo "Result 0!</br>";
        }
    } else {
        echo "Missing username or password! </br>";
    }

    echo "<a href = index.php> <button>Back!</button>";
}
$connect->close();
?>