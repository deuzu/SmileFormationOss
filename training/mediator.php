<?php

class SignUpController
{
    public function signUpAction()
    {
        // logic here blablabla

        $data = ['username' => 'qwerty'];
        $this->container->get('dispatcher')->dispatch('signup.success', $data);

        return $this->render('signup/signup');
    }
}

class CentralIntelligence
{
    //
}

class SignUpEventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            'signup.success' => ['doSomethingWhenSignUpSuccess'],
            'signup.failed' => ['doSomethingWhenSignUpFailed'],
        ];
    }

    public function doSomethingWhenSignUpSuccess($data)
    {
        $this->emailManager->sendNewUserEmail($data);
        $this->databaseManager->saveUser($data);
    }
}
