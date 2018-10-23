<?php

namespace Newsphp\Auth\Register;

class RegisterFactory
{
    public function getClass(): Register
    {
        $registerHandler = new Register;
        $registerHandler->setValidator(new RegisterValidator);
        $registerHandler->setConnectionDriver(new \NewsPhp\Database\Connection);
        return $registerHandler;
    }
}