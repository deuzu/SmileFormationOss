<?php
                                        //require_once '/repository/userIsOK.php';
namespace SmileOSS\Lab\OOP\Manager;

class SessionManager
{
    public function createSession($user)
    {
        session_start();
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
}
