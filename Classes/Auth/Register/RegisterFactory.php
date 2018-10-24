<?php

namespace NewsPhp\Auth\Register;


class RegisterFactory
{
    public function getClass(): Register
    {
        $registHandler = new Register;
        $registHandler->setConnectionDriver(new \NewsPhp\Database\Connection);
        return $registHandler;
    }

}