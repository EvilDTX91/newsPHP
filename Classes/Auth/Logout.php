<?php

namespace NewsPhp\Auth;

use NewsPhp\Database\Connection;

class Logout
{
    private $connectionDriver;

    public function logOut()
    {
        if (isset($_SESSION['username'])) {
            $this->setConnectionDriver(new Connection);
            $username = $_SESSION['username'];
            $deleteSession = new UserSession;
            $deleteSession->deleteUserSession();
            $sql = "DELETE * FROM sessions where username='$username'";
            $this->getConnectionDriver()->getConnection()->query($sql);
            echo "LOGOUT " . $_SESSION['username'] . "</br>";
            session_destroy();
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
}