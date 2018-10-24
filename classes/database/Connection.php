<?php

namespace newsphp\classes\Database;

use mysqli;

class Connect
{
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

        //$this->getConnection();
        //return ($this->HOST) . ($this->DBUSER) . ($this->DBPASSWORD) . ($this->DATABASE);
    }

    public function getConnection()
    {
        self::setConnectionData('localhost', 'root', '', 'newsphp');
        return self::setConnection();
    }

    private
    function setConnection()
    {
        $connection = new mysqli($this->HOST,$this->DBUSER,$this->DBPASSWORD,$this->DATABASE);
        //$this->connectionWasSuccesFull($connection);
        //$this->setDBCharSet($connection);
        self::setDBCharSet($connection);
        self::connectionWasSuccesFull($connection);
        return $connection;
    }

    private
    function setDBCharSet($connection)
    {
        mysqli_set_charset($connection, "utf8");
    }

    private
    function connectionWasSuccesFull($connection)
    {
        $result = 0;
        if (isset($connection)) {
            if ($connection->connect_error) {
                $result = 0;
                throw new \Exception("Database connection error!");
            } else {
                $result = 1;
            }
        }

        return $result;

    }
}