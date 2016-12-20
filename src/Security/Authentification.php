<?php

namespace SmileOSS\Lab\OOP\Security;

class Authentification
{    
    public function isUserLoggedIn()
    {         
       return isset($_SESSION['connected']);   
    }

}
