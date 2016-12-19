<?php

namespace SmileOSS\Lab\OOP\Controller;

require_once './manager/sessionManager.php';
require_once './form/loginForm.php';

use SmileOSS\Lab\OOP\Templating\TemplateEngine;


class LoginController
{
    //si le formulaire est soumis, je verifie les erreurs > form ==> check_form()
    //affiche le formulaire avec les erreurs si il y en a > view ==> display_errors()
    //si pas d'erreur > appel manager session , puis redirection vers leplanning

    public function loginAction()
    {
        if (isset($_POST['submit'])) {
            $error = check_form($_POST["login"], $_POST["password"]);

            if (!$error) {
                $login = $_POST["login"];
                $password = $_POST["password"];

                createSession($login, $password);
                TemplateEngine::render(__DIR__.'/../views/planning/list.php', ['role' => 'ADMIN']);
                //header("Location:?controller=planning&action=list");
            }
        }

        TemplateEngine::render(__DIR__.'/../views/loginView.php');
        //include './views/loginView.php';
    }

    public function logoutAction()
    {
        destroySession();
        TemplateEngine::render(__DIR__.'/../views/loginView.php');
        //header("Location:?controller=login&action=login");
    }
}
