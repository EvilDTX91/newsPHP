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

    private function register(UserData $userData)
    {
        $statement = $this->getConnectionDriver()->getConnection()->prepare(
            "INSERT INTO users 
            (username,userpassword,email,firstname,lastname,born)
              VALUES (?, ?, ?, ?, ?, ?)");

        $userName = $userData->getUserName();
        $password = $userData->getPassword();
        $email = $userData->getEmail();
        $firstName = $userData->getFirstName();
        $lastName = $userData->getLastName();
        $dateOfBirth = $userData->getDateOfBirth();

        $statement->bind_param(
            'sssssi',
            $userName,
            $password,
            $email,
            $firstName,
            $lastName,
            $dateOfBirth
        );

        $statement->execute();
    }

    public function getConnectionDriver(): Connection
    {
        return $this->connectionDriver;
    }

    public function setConnectionDriver(Connection $connectionDriver): void
    {
        $this->connectionDriver = $connectionDriver;
    }

    public function getValidator(): ValidatorInterface
    {
        return $this->validator;
    }

    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }
}
