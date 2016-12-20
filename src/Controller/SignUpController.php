<?php
namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Form\SignUpForm;

class SignUpController extends AbstractController
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
            
            $user = [
                'lastName'  => $userLastName,
                'firstName' => $userFirstName,
                'password'  => $userPsw,
                'login'     => $userLogin,
                'phone'     => $userPhone,
                'email'     => $userEmail
            ];
            
            //Appel de la fonction validateUser qui est définis dans le signUpForm
            $error = SignUpForm::validate($user);
            
            if (empty($error)){          
                $userManager = new UserManager();
                //S'il n'ya pas d'erreurs sur le formulaire saisi, je crée un utilisateur et je le redirige vers la page du login avec une action=""
                $userManager->create($user);
                header('Location:?controller=planning&action=list');
            }
        }
        
        $this->render('signUp/signUp.php', ['error' => $error]);
    }
}