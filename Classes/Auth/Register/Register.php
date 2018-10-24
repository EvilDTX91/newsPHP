<?php

namespace NewsPhp\Auth\Register;

use NewsPhp\Database\Connection;

class Register
{
    private $connectionDriver;
    private $validator;

    /**
     * @param UserData $userData
     * @throws \Exception
     */
    public function initRegister(UserData $userData): void
    {
        $this->getValidator()->validate($userData);
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
    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    /**
     * @param mixed $validator
     */
    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }


}