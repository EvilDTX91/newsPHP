<?php

namespace NewsPhp\Auth;

use NewsPhp\Database\Connection;

class Login
{
    private $connectionDriver;
    private $userLog;
    private $USERNAME;
    private $PASSWORD;

    public function setLogInCheck($username, $password){

        $this->setUSERNAME($username);
        $this->setPASSWORD($password);
        $this->setConnectionDriver(new Connection);
        self::logIn();
        $profile = new ProfileData;
        $profile->setProfileData($this->userLog);
    }

    private function logIn()
    {

        if(!$this->userLog)
        {
            if (isset($this->USERNAME) && isset($this->PASSWORD)) {
                $sql = "SELECT * FROM users WHERE username = '$this->USERNAME' AND userpassword = '$this->PASSWORD'";
                $this->setUserLog($this->getConnectionDriver()->getConnection()->query($sql));
            }
        }
        return $this->userLog;
        /*
        $result = self::checkUser();
        if (isset($result)) {
            self::updateLastLogin();
            self::setProfile();
            self::createSessionDB();
        }*/
    }

    private function checkUser(){

        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "SELECT * FROM users WHERE username = '$this->USERNAME' AND userpassword = '$this->PASSWORD'";
            $result = $this->getConnectionDriver()->getConnection()->query($sql);
            return $result;
        }

    }

    private function updateLastLogin(){

        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "UPDATE users SET lastlogin=now() WHERE username='$this->USERNAME' AND userpassword='$this->PASSWORD'";
            $this->getConnectionDriver()->getConnection()->query($sql);
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
                $_SESSION['dateofbirth'] = $row['dateofbirth'];
                $_SESSION['registered'] = $row['regist'];
                $_SESSION['lastlogin'] = $row['lastlogin'];
                $_SESSION['sessionID'] = session_id();
                $_SESSION['loggedIn'] = true;
            }
        }
    }

    private function createSessionDB(){

        $sql = "INSERT INTO sessions(session,username,userID,userPW)
VALUES ('" . $_SESSION['sessionID'] . "','" . $_SESSION['username'] . "','" . $_SESSION['id'] . "','" . $_SESSION['password'] . "')";
        $this->getConnectionDriver()->getConnection()->query($sql);
    }

    public function getConnectionDriver(): Connection
    {
        return $this->connectionDriver;
    }

    public function setConnectionDriver(Connection $connectionDriver): void
    {
        $this->connectionDriver = $connectionDriver;
    }

    /**
     * @return string
     */
    public function getUSERNAME(): string
    {
        return $this->USERNAME;
    }

    /**
     * @param string $USERNAME
     */
    public function setUSERNAME(string $USERNAME): void
    {
        $this->USERNAME = $USERNAME;
    }

    /**
     * @return string
     */
    public function getPASSWORD(): string
    {
        return $this->PASSWORD;
    }

    /**
     * @param string $PASSWORD
     */
    public function setPASSWORD(string $PASSWORD): void
    {
        $this->PASSWORD = $PASSWORD;
    }


    /**
     * @return array
     */
    public function getUserLog(): object
    {
        return $this->userLog;
    }

    /**
     * @param array $userLog
     */
    public function setUserLog(object $userLog): void
    {
        $this->userLog = $userLog;
    }
}