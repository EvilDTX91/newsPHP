<?php

namespace NewsPhp\Auth\Register;

class UserData
{
    private $userName;
    private $password;
    private $email;
    private $firstName;
    private $lastName;
    private $dateOfBirth;

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getDateOfBirth(): int
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(int $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }
}
