<?php

namespace NewsPhp\Auth;

use NewsPhp\Database\Connection;

class Login
{
    private $connectionDriver;
    private $userLog;
    private $USERNAME;
    private $PASSWORD;

    public function setLogInCheck($username, $password)
    {

        $this->setUSERNAME($username);
        $this->setPASSWORD($password);
        $this->setConnectionDriver(new Connection);
        self::logIn();
        $profile = new ProfileData;
        $profile->setProfileData($this->userLog);
    }

    private function logIn()
    {

        if (!$this->userLog) {
            if (isset($this->USERNAME) && isset($this->PASSWORD)) {
                $sql = "SELECT * FROM users WHERE username = '$this->USERNAME' AND userpassword = '$this->PASSWORD'";
                $this->setUserLog($this->getConnectionDriver()->getConnection()->query($sql));
                updateLastLogin();
                createSession();
            }
        }
        return $this->userLog;
    }

    private function updateLastLogin(): void
    {

        if (isset($this->USERNAME) && isset($this->PASSWORD)) {
            $sql = "UPDATE users SET lastlogin=now() WHERE username='$this->USERNAME' AND userpassword='$this->PASSWORD'";
            $this->getConnectionDriver()->getConnection()->query($sql);
        }
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