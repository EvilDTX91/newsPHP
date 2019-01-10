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
            $deleteSession = new UserSession;
            $deleteSession->deleteUserSession();
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