<?php

namespace NewsPhp\Auth\Register;

class RegisterValidator implements ValidatorInterface
{
    /**
     * @param UserData $userData
     * @throws \Exception
     */
    public function validate(UserData $userData): void
    {
        if (!$userData->getUSERNAME()) {
            throw new \Exception('Username is not set!');
        }
        if (!$userData->getPASSWORD()) {
            throw new \Exception('Password is not set!');
        }
        if (!$userData->getEMAIL()) {
            throw new \Exception('E-mail is not set!');
        }
        if (!$userData->getFIRSTNAME()) {
            throw new \Exception('First name is not set!');
        }
        if (!$userData->getLASTNAME()) {
            throw new \Exception('Last name is not set!');
        }
        if (!$userData->getDATEOFBIRTH()) {
            throw new \Exception('Date of birth is not set!');
        }

    }

}