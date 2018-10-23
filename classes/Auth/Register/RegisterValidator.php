<?php

namespace Newsphp\Auth\Register;

class RegisterValidator implements ValidatorInterface
{
    /**
     * @param UserData $userData
     * @throws \Exception
     */
    public function validate(UserData $userData): void
    {
        if (!$userData->getUserName()) {
            throw new \Exception('Username is not set!');
        }

        if (!$userData->getPassword()) {
            throw new \Exception('Password is not set!');
        }

        if (!$userData->getEmail()) {
            throw new \Exception('Email is not set!');
        }

        if (!$userData->getFirstName()) {
            throw new \Exception('First name is not set!');
        }

        if (!$userData->getLastName()) {
            throw new \Exception('Last name is not set!');
        }

        if (!$userData->getDateOfBirth()) {
            throw new \Exception('Date of birth is not set!');
        }
    }
}
