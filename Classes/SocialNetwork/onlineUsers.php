<?php
namespace NewsPhp\SocialNetwork;

use NewsPhp\Database\Connection;

class onlineUsers
{
    private $connectionDriver;

    public function loadOnlineUseres()
    {
        $this->setConnectionDriver(new Connection);
        $sql = "SELECT username FROM sessions";
        $result = $this->getConnectionDriver()->getConnection()->query($sql);

        if(isset($result))
        {
            while($row = $result -> fetch_assoc())
            {
                $onlineUser[] = $row;
            }
        }
        if(isset($onlineUser)){
            return $onlineUser;
        }
        else{
            return "Nobody!";
        }
    }
    /**
     * @return mixed
     */
    public function getConnectionDriver(): Connection
    {
        return $this->connectionDriver;
    }

    /**
     * @param mixed $connectionDriver
     */
    public function setConnectionDriver(Connection $connectionDriver): void
    {
        $this->connectionDriver = $connectionDriver;
    }
}