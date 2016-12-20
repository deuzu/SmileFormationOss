<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Form\LoginForm;


class LoginController extends AbstractController
{
    public function loginAction()
    {
        if (isset($_POST['submit'])) {
            $user = array("login" => $_POST["login"], "password" => $_POST["password"]);

            $error = LoginForm::validate($user);

            if (!$error) {
                $login = $_POST["login"];
                $password = $_POST["password"];

                createSession($login, $password);
                header("Location:?controller=planning&action=list");
            }
        }
        $this->render('security/login.php');
    }

    public function logoutAction()
    {
        destroySession();
        header("Location:?controller=login&action=login");
    }
}
