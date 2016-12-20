<?php

namespace SmileOSS\Lab\OOP\FORM;

class LoginForm
{
    public static function validate($user)
    {
        $error = false;

        if ($user["login"] == "" || $user["password"] == "") {
            $error = "il faut remplir les champs";
        }

       /* if (!userIsOK($user["login"], $user["password"])) {
            $error = "les identifiants ne sont pas corrects";
        }*/

        return $error;
    }
}
