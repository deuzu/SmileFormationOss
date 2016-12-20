<?php

namespace SmileOSS\Lab\OOP\Security;

class Authentification
{    
    public function isUserLoggedIn()
    {          
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        if(isset($_SESSION["connected"])){
            return true;
        } else {
            return false;
        }   
    }

}