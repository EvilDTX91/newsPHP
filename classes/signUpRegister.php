<?php
/**
 * Created by PhpStorm.
 * User: denve
 * Date: 2018. 09. 18.
 * Time: 11:03
 */

namespace newsphp\classes;

use NewsPHP\classes\Database\Connect;

class SignUpRegister extends Connect
{
    private $USERNAME = "";
    private $PASSWORD = "";
    private $EMAIL = "";
    private $FIRSTNAME = "";
    private $LASTNAME = "";
    private $BORN = "";

    public function setUserValues($username, $password, $email, $firstname, $lastname, $born)
    {
        if (isset($username)) {
            $this->USERNAME = $username;
        }
        if (isset($password)) {
            $this->PASSWORD = $password;
        }
        if (isset($email)) {
            $this->EMAIL = $email;
        }
        if (isset($firstname)) {
            $this->FIRSTNAME = $firstname;
        }
        if (isset($lastname)) {
            $this->LASTNAME = $lastname;
        }
        if (isset($born)) {
            $this->BORN = $born;
        }

        self::registNewUser();

    }

    private function registNewUser()
    {
        $sql = "INSERT INTO users (username,userpassword,email,firstname,lastname,born) VALUES
($this->USERNAME,$this->PASSWORD,$this->EMAIL,$this->FIRSTNAME,$this->LASTNAME,$this->BORN)";
        Connect::getConnection()->query($sql);
    }

}