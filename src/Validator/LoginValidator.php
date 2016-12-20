<?php

namespace SmileOSS\Lab\OOP\Validator;

use SmileOSS\Lab\OOP\Controller\AbstractController;
use SmileOSS\Lab\OOP\Repository\UserRepository;

class LoginValidator extends AbstractController
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

    public function validate($user)
    {
        $errors = [];

        if (empty($user['login']) || empty($user['password'])) {
            $errors[] = 'il faut remplir les champs';
        }

        if (!$this->userRepository->userIsOk($user['login'], $user['password'])) {
            $errors[] = 'les identifiants ne sont pas corrects';
        }

        return $errors;
    }
}
