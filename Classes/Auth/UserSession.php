<?php

namespace NewsPhp\Auth;

use NewsPhp\Database\Connection;

class UserSession
{
    private $connectionDriver;

    public function createUserSession()
    {
        $this->setConnectionDriver(new Connection);
        $sql = "INSERT INTO sessions(session,username,userID,userPW)
VALUES ('" . $_SESSION['sessionID'] . "','" . $_SESSION['username'] . "','" . $_SESSION['id'] . "','" . $_SESSION['password'] . "')";
        $this->getConnectionDriver()->getConnection()->query($sql);
    }

    public function deleteUserSession()
    {
        $this->setConnectionDriver(new Connection);
        $sql = "DELETE FROM sessions WHERE session='" . $_SESSION['sessionID'] . "'";
        $this->getConnectionDriver()->getConnection()->query($sql);
        session_destroy();
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