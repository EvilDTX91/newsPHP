<?php
namespace NewsPhp\Auth;


class ProfileData
{
    public function setProfileData($profileData): void
    {

        if(isset($profileData))
        {
            while($row=$profileData->fetch_assoc())
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['userpassword'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['dateofbirth'] = $row['dateofbirth'];
                $_SESSION['registered'] = $row['regist'];
                $_SESSION['lastlogin'] = $row['lastlogin'];
                $_SESSION['sessionID'] = session_id();
                $_SESSION['loggedIn'] = true;
            }
        }
    }

}