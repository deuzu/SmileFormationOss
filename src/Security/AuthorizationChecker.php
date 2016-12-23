<?php

namespace SmileOSS\Lab\OOP\Security;

class AuthorizationChecker
{
    public function isUserLoggedIn()
    {
       return isset($_SESSION['connected']);
    }
}
