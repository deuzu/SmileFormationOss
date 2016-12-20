<?php

//require_once './repository/usersRepository.php';
namespace SmileOSS\Lab\OOP\FORM;


class LoginForm
{
    public static function check_form($login, $password)
    {
        $error = FALSE;

        if ($login == "" || $password == "") {

            $error = "il faut remplir les champs";

        }

        if (!userIsOK($login, $password)) {
            $error = "les identifiants ne sont pas corrects";
        }
        return $error;
    }
}