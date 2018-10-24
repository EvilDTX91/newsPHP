<?php

namespace NewsPhp\Auth\Register;


interface ValidatorInterface
{
    /**
     * @param UserData $userData
     * @throws \Exception
     * @return void
     */
    public function validate(UserData $userData):void;
}