<?php
namespace SmileOSS\Lab\OOP\Form;

use SmileOSS\Lab\OOP\Repository\usersRepository;
use SmileOSS\Lab\OOP\Form\SignUpForm;

class SignUpForm
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public static function validate(array $user)
    {
        $userName  = strip_tags($user['lastName']);
        $userPsw   = strip_tags($user['password']);
        $userLogin = preg_match('/^[a-zA-Z0-9_-]/', $user['login']);
        
        $error = [];
        
        //Vérifier Si les entrées ne sont pas vides et bien renseignées
        if ((isset($user['lastName']) && $user['lastName'] == "")
            || (isset($user['login']) && $user['login'] == "")
            || (isset($user['password']) && $user['password']== "")){
            
            $error[] = 'les champs du formulaire ne doivent pas etre vide';
        }
        
        //Vérifier si le login est correct   
        if (!$userLogin){
            $error[] = 'Le login n\'est pas correct';
        }
        
        
        if ($this->userRepository->userIsOK($userLogin, $userPsw)){
            $error[] = 'Ces identifiants existent déja';
        }
        
        return $error;
    }
}