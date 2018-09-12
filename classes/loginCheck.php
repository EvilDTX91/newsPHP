<?php

namespace newsphp\classes;

use mysqli;

class loginCheck extends connect
{
    private $USERNAME;
    private $PASSWORD;
}

public
function setLoginCheck($username, $password)
{
    $this->USERNAME = $username;
    $this->PASSWORD = $password;
}

private
function getLoginCheck()
{
    if (isset($this->USERNAME != null && $this->PASSWORD != null)) {
        $sql = "SELECT * FROM users WHERE username = '$this->USERNAME' AND userpassword = '$this->PASSWORD'";
        $result = connect . getConnection()->query($sql);
        return $result;
    }
}

private
function updateLastLogin()
{
    $sql = "UPDATE users SET lastlogin=now() WHERE username='$this->USERNAME' AND userpassword='$this->PASSWORD'";
    connect . getConnection()->query($sql);
}

private
function createSessionDB()
{
    $sql = "INSERT INTO sessions(session,username,userID,userPW)
VALUES (" . $_SESSION['sessionID'] . "," . $_SESSION['username'] . "," . $_SESSION['id'] . "," . $_SESSION['password'] . ")";
    connect . getConnection()->query($sql);
}

private
function setProfile()
{
    $result = getLoginCheck();
    while ($row = $result->fetch_assoc()) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['userpassword'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['born'] = $row['born'];
        $_SESSION['registered'] = $row['regist'];
        $_SESSION['lastlogin'] = $row['lastlogin'];
        $_SESSION['sessionID'] = session_id();
    }
}

//ellenörzi hogy a felhasználó be van e jelentkezve
$USER = null;
//echo "Login check Starts here...";
//echo $USER . " result?!";
if (isset($_SESSION["password"])) {
    $username = $_SESSION["username"];
    $userpassword = $_SESSION["password"];
    $session = $_SESSION["sessionID"];

    $sql = "Select * FROM sessions WHERE username='$username' AND userpassword='userpassword' AND session='$session'";
    $succes = $connect->query($sql);

    if (isset($succes)) {
        $USER = true;
    } else {
        $USER = null;
    }
}