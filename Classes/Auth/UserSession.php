<?php

namespace NewsPhp\Auth;

use NewsPhp\Database\Connection;

class UserSession
{
    private $connectionDriver;

    public function createUserSession(): void
    {
        $sql = "INSERT INTO sessions(session,username,userID,userPW)
VALUES ('" . $_SESSION['sessionID'] . "','" . $_SESSION['username'] . "','" . $_SESSION['id'] . "','" . $_SESSION['password'] . "')";
        $this->getConnectionDriver()->getConnection()->query($sql);
    }

    public function deleteUserSession(): void
    {
        $sql = "DELETE * FROM sessions where username='" . $_SESSION['username'] . "'";
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

}