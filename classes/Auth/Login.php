<?php

namespace newsphp\Auth;

use NewsPhp\Database\Connection;

class Login extends Connection
{
    private $USERNAME = "";
    private $PASSWORD = "";

    public function setLogInCheck($username, $password)
    {
        $this->USERNAME = $username;
        $this->PASSWORD = $password;
        self::logIn();
    }

    private function logIn(){

        $result = self::checkUser();
        if (isset($result)) {
            self::updateLastLogin();
            self::setProfile();
            self::createSessionDB();
        }
    }

    private function checkUser(){

        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "SELECT * FROM users WHERE username = '$this->USERNAME' AND userpassword = '$this->PASSWORD'";
            $result = Connection::getConnection()->query($sql);
            return $result;
        }

    }

    private function updateLastLogin(){

        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "UPDATE users SET lastlogin=now() WHERE username='$this->USERNAME' AND userpassword='$this->PASSWORD'";
            Connection::getConnection()->query($sql);
        }
    }

    private function setProfile(){

        $result = self::checkUser();
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
        }
    }

    private
    function createSessionDB()
    {
        $sql = "INSERT INTO sessions(session,username,userID,userPW)
VALUES ('" . $_SESSION['sessionID'] . "','" . $_SESSION['username'] . "','" . $_SESSION['id'] . "','" . $_SESSION['password'] . "')";
        Connection::getConnection()->query($sql);
    }

    public function logOut()
    {
        if (isset($_SESSION['username'])) {
            echo "LOGOUT " . $_SESSION['username'] . "</br>";
            $username = $_SESSION['username'];
            $sql = "DELETE FROM sessions WHERE username='$username'";
            Connection::getConnection()->query($sql);
            session_destroy();
        }
    }
}