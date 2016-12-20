<?php
                                        //require_once '/repository/userIsOK.php';
namespace SmileOSS\Lab\OOP\Manager;

class SessionManager
{
    public function createSession($user)
    {
        $_SESSION["connected"] = true;
        $_SESSION["login"] = $user["login"];
        $_SESSION["password"] = $user["password"];

        return true;
    }

    public function destroySession()
    {
        // empty data
        $_SESSION = array();
        session_destroy();

        return true;
    }

    public function isUserLoggedIn()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["connected"])) {

            return true;

        } else {

            return false;
        }
    }
}
