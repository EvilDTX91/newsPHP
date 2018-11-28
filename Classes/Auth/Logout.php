<?php

namespace NewsPhp\Auth;

use NewsPhp\Database\Connection;

class Logout
{
    private $connectionDriver;

    public function logOut()
    {
        if (isset($_SESSION['username'])) {
            echo "LOGOUT " . $_SESSION['username'] . "</br>";
            $this->setConnectionDriver(new Connection);
            $deleteSession = new UserSession;
            $deleteSession->deleteUserSession();
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