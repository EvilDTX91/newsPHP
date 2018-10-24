<?php

namespace NewsPhp\Auth\Register;

class UserData
{
    private $USERNAME;
    private $PASSWORD;
    private $EMAIL;
    private $FIRSTNAME;
    private $LASTNAME;
    private $DATEOFBIRTH;

    public function getUSERNAME(): string
    {
        return $this->USERNAME;
    }

    public function setUSERNAME(string $USERNAME): void
    {
        $this->USERNAME = $USERNAME;
    }

    public function getPASSWORD(): string
    {
        return $this->PASSWORD;
    }

    public function setPASSWORD(string $PASSWORD): void
    {
        $this->PASSWORD = $PASSWORD;
    }

    public function getEMAIL(): string
    {
        return $this->EMAIL;
    }

    public function setEMAIL(string $EMAIL): void
    {
        $this->EMAIL = $EMAIL;
    }

    public function getFIRSTNAME(): string
    {
        return $this->FIRSTNAME;
    }

    public function setFIRSTNAME(string $FIRSTNAME): void
    {
        $this->FIRSTNAME = $FIRSTNAME;
    }

    public function getLASTNAME(): string
    {
        return $this->LASTNAME;
    }

    public function setLASTNAME(string $LASTNAME): void
    {
        $this->LASTNAME = $LASTNAME;
    }

    public function getDATEOFBIRTH(): int
    {
        return $this->DATEOFBIRTH;
    }

    public function setDATEOFBIRTH(int $DATEOFBIRTH): void
    {
        $this->DATEOFBIRTH = $DATEOFBIRTH;
    }
}