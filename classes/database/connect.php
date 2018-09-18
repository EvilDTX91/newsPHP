<?php

namespace NewsPHP\classes\Database;

use mysqli;

class Connect
{
    private $HOST;
    private $DBUSER;
    private $DBPASSWORD;
    private $DATABASE;

    protected
    function setConnection($host, $dbuser, $dbpassword, $database)
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

        $this->getConnection();
        //return ($this->HOST) . ($this->DBUSER) . ($this->DBPASSWORD) . ($this->DATABASE);
    }

    private
    function getConnection(): msqli
    {
        $connection = new mysqli(self::$HOST, self::$DBUSER, self::$DBPASSWORD, self::$DATABASE);
        //$this->connectionWasSuccesFull($connection);
        //$this->setDBCharSet($connection);
        $this->setDBCharSet($connection);
        $this->connectionWasSuccesFull();
        return $connection;
    }

    private
    function setDBCharSet($connection)
    {
        $connection->mysqli_set_charset($connection, "utf-8");
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