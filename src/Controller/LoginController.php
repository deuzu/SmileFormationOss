<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Manager\SessionManager;

class LoginController extends AbstractController
{
    public function loginAction()
    {
        $errors = [];

        if (isset($_POST['submit'])) {
            $user = [
                'login' => $_POST['login'],
                'password' => $_POST['password']
            ];

            $errors = $this->container->get('login_validator')->validate($user);

            if (empty($errors)) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                SessionManager::createSession($user);
                header("Location:?controller=planning&action=list");
            }
        }

        $this->render('security/login.php', ['errors' => $errors]);
    }

    public function logoutAction()
    {
        SessionManager::destroySession();
        header("Location:?controller=login&action=login");
    }
}
