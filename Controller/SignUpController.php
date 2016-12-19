<?php

namespace SmileOSS\Lab\OOP\Controller;
use SmileOSS\Lab\OOP\Templating\TemplateEngine;
use SmileOSS\Lab\OOP\form\SignUpForm;


class SignUpController
{    
    public function signUpAction()
    {
        $errorForm = null;

        if (isset($_POST['valider'])) {
            if(isset($_POST['lastName'])){ $userLastName  =  $_POST['lastName'] ;}
            if(isset($_POST['firstName'])){ $userFirstName   = $_POST['firstName'];}
            if(isset($_POST['password'])){  $userPsw =  $_POST['password'];}
            if(isset($_POST['login'])){  $userLogin =  $_POST['login'];}
            if(isset($_POST['password'])){ $userPhone  = $_POST['phone'];}
            if(isset($_POST['email'])){ $userEmail  = $_POST['email'];}

            $errorForm = new SignUpForm();
            //Appel de la fonction validateUser qui est définis dans le signUpForm
            $errorForm->validateUser($userLastName, $userLogin, $userPsw);

            if ($errorForm == false){          
                $userManager = new UserManager();
                //S'il n'ya pas d'erreurs sur le formulaire saisi, je crée un utilisateur et je le redirige vers la page du login avec une action=""
                $userManager->createUser($userLogin, $userPsw, 'USER', $userFirstName, $userLastName, $userPhone, $userEmail);
                header('Location:?controller=planning&action=list');
            }
        }
        
        TemplateEngine::render(__DIR__.'/../views/signUp/signUp.php', ['errorForm' => $errorForm]);
    }
}
