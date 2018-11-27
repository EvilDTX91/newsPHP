<?php

namespace NewsPhp\Auth;

class CheckUser
{

    private function chechUserLoggedIn()
    {
        if ($_SESSION['loggedIn']) {
            return true;
        } else {
            return false;
        }
    }

}