<?php

namespace NewsPhp\Database;

use mysqli;

class Connect
{
    /**
     * @var \mysqli
     */
    private $connection;
    private $HOST;
    private $DBUSER;
    private $DBPASSWORD;
    private $DATABASE;

    private
    function setConnectionData($host, $dbuser, $dbpassword, $database)
    {
        if (isset($host)) {
            $this->HOST = $host;
        } else {
            $this->HOST = 'localhost';
        }
        if (isset($dbuser)) {
            $this->DBUSER = $dbuser;
        } else {
            $this->DBUSER = 'root';
        }
        if (isset($dbpassword)) {
            $this->DBPASSWORD = $dbpassword;
        } else {
            $this->DBPASSWORD = '';
        }
        if (isset($database)) {
            $this->DATABASE = $database;
        } else {
            $this->DATABASE = 'newsphp';
        }
    }

    public function getConnection(): \mysqli
    {
        if ($this->connection === null) {

            self::setConnectionData('localhost', 'root', '', 'newsphp');
            self::setConnection();
        }
        return $this->connection;
    }

    private function setConnection():void
    {

        $connection = new \mysqli($this->HOST, $this->DBUSER, $this->DBPASSWORD, $this->DATABASE);
        mysqli_set_charset($connection,"utf8");
        $this->connection = $connection;
    }
}