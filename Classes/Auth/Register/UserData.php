<?php
/**
 * Created by PhpStorm.
 * User: denve
 * Date: 2018. 10. 24.
 * Time: 13:53
 */

namespace NewsPhp\Auth\Register;


class UserData
{
    /**
     * @var string
     */
    private $USERNAME;

    /**
     * @var string
     */
    private $PASSWORD;

    /**
     * @var string
     */
    private $EMAIL;

    /**
     * @var string
     */

    private $FIRSTNAME;

    /**
     * @var string
     */
    private $LASTNAME;

    /**
     * @var integer
     */
    private $DATEOFBIRTH;


    /**
     * @return string
     */
    public function getUSERNAME(): string
    {
        return $this->USERNAME;
    }

    /**
     * @param string $USERNAME
     */
    public function setUSERNAME(string $USERNAME): void
    {
        $this->USERNAME = $USERNAME;
    }

    /**
     * @return string
     */
    public function getPASSWORD(): string
    {
        return $this->PASSWORD;
    }

    /**
     * @param string $PASSWORD
     */
    public function setPASSWORD(string $PASSWORD): void
    {
        $this->PASSWORD = $PASSWORD;
    }

    /**
     * @return string
     */
    public function getEMAIL(): string
    {
        return $this->EMAIL;
    }

    /**
     * @param string $EMAIL
     */
    public function setEMAIL(string $EMAIL): void
    {
        $this->EMAIL = $EMAIL;
    }

    /**
     * @return string
     */
    public function getFIRSTNAME(): string
    {
        return $this->FIRSTNAME;
    }

    /**
     * @param string $FIRSTNAME
     */
    public function setFIRSTNAME(string $FIRSTNAME): void
    {
        $this->FIRSTNAME = $FIRSTNAME;
    }

    /**
     * @return string
     */
    public function getLASTNAME(): string
    {
        return $this->LASTNAME;
    }

    /**
     * @param string $LASTNAME
     */
    public function setLASTNAME(string $LASTNAME): void
    {
        $this->LASTNAME = $LASTNAME;
    }

    /**
     * @return int
     */
    public function getDATEOFBIRTH(): int
    {
        return $this->DATEOFBIRTH;
    }

    /**
     * @param int $DATEOFBIRTH
     */
    public function setDATEOFBIRTH(int $DATEOFBIRTH): void
    {
        $this->DATEOFBIRTH = $DATEOFBIRTH;
    }
}