<?php

namespace newsphp\classes;

use NewsPHP\classes\Database\Connect;

class LoginCheck
{
    private $USERNAME;
    private $PASSWORD;

    public
    function setLogInCheck($username, $password)
    {
        $start = new LoginCheck;
        $start->USERNAME = $username;
        $start->PASSWORD = $password;
        //$start->logIn();
        echo "</br>SIKER!";
    }

    private
    function logIn()
    {
        $result = $this->checkUser();
        if (isset($result)) {
            $this->updateLastLogin();
            $this->setProfile();
        }
    }

    private function checkUser()
    {
        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "SELECT * FROM users WHERE username = '$this->USERNAME' AND userpassword = '$this->PASSWORD'";
            $result = Connect::getConnection()->msqli($sql);
            return $result;
        }

    }

    private
    function updateLastLogin()
    {
        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "UPDATE users SET lastlogin=now() WHERE username='$this->USERNAME' AND userpassword='$this->PASSWORD'";
            Connect::getConnection()->msqli($sql);
        }
    }

    private
    function setProfile()
    {
        $result = $this->checkUser();
        if (isset($result)) {
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
                $_SESSION['loggedIn'] = true;
            }
            $this->createSessionDB();
        }
    }

    private
    function createSessionDB()
    {
        $sql = "INSERT INTO sessions(session,username,userID,userPW)
VALUES (" . $_SESSION['sessionID'] . "," . $_SESSION['username'] . "," . $_SESSION['id'] . "," . $_SESSION['password'] . ")";
        Connect::getConnection()->msqli($sql);
    }

    private
    function logOut()
    {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $sql = "DELETE FROM sessions WHERE username='$username'";
            Connect::getConnection()->msqli($sql);
            session_destroy();
        }
    }
}