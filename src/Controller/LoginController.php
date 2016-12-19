<?php

namespace SmileOSS\Lab\OOP\Controller;

require_once './manager/sessionManager.php';
require_once './form/loginForm.php';

class LoginController
{
    public function loginAction()
    {
        if (isset($_POST['submit'])) {
            $error = check_form($_POST["login"], $_POST["password"]);

            if (!$error) {
                $login = $_POST["login"];
                $password = $_POST["password"];

                createSession($login, $password);
                header("Location:?controller=planning&action=list");
            }
        }

        include './views/loginView.php';
    }

    public function logoutAction()
    {
        destroySession();
        header("Location:?controller=login&action=login");
    }
}
