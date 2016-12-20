<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Form\LoginForm;
use SmileOSS\Lab\OOP\Manager\SessionManager;
use SmileOSS\Lab\OOP\Security\Authentification;

class LoginController extends AbstractController
{
    public function loginAction()
    {
        if (isset($_POST['submit'])) {
            $user = ['login' => $_POST['login'], 'password' => $_POST['password']];
            $error = LoginForm::validate($user);

            if (!$error) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $authentification=new Authentification();
                $connected=$authentification->isUserLoggedIn();
                if(!$connected){
                    SessionManager::createSession($user);
                    header("Location:?controller=planning&action=list");
                }
            }
        }
        $this->render('security/login.php');
    }

    public function logoutAction()
    {
        SessionManager::destroySession();
        header("Location:?controller=login&action=login");
    }
}
