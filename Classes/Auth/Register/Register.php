<?php

namespace NewsPhp\Auth\Register;

use NewsPhp\Database\Connection;

class Register
{
    /**
     * @var
     */
    private $connectionDriver;
    /**
     * @var
     */
    private $validator;

    public function initRegister(UserData $userData): void
    {
        self::register($userData);
    }

    private function register(UserData $userData): void
    {

        $statement = $this->getConnectionDriver()->getConnection()->prepare(
            "INSERT INTO users (username,userpassword,email,firstname,lastname,born)
                VALUES 
                (?,?,?,?,?,?)");

        $username = $userData->getUSERNAME();
        $password = $userData->getPASSWORD();
        $email = $userData->getEMAIL();
        $firstname = $userData->getFIRSTNAME();
        $lastname = $userData->getLASTNAME();
        $dateofbirth = $userData->getDATEOFBIRTH();

        $statement->bind_param(
        'sssssi',
        $username,
        $password,
        $email,
        $firstname,
        $lastname,
        $dateofbirth
    );

        $statement->execute();


        /*('" . $this->USERNAME . "','" . $this->PASSWORD . "','" . $this->EMAIL . "','" . $this->FIRSTNAME . "','" . $this->LASTNAME . "','" . $this->BORN . "')";
                Connect::getConnection()->query($sql);*/
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

    /**
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param mixed $validator
     */
    public function setValidator($validator): void
    {
        $this->validator = $validator;
    }


}