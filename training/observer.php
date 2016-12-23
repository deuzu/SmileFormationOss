<?php

namespace Smile;

class SignUpController implements \SplSubject
{
    private $observers = [];

    public function attach(\SplObserver $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers = [];
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function signUpAction()
    {
        // blablabla signup user credentials

        $this->notify();

        return '<h1>signup</h1>';
    }
}

class Observer implements \SplObserver
{
    public function update(\SplSubject $splSubject)
    {
        echo 'User has signed up';
    }
}

class Observer2 implements \SplObserver
{
    public function update(\SplSubject $splSubject)
    {
        echo 'fkjsdhjhgfshjfhjsdg';
    }
}

$signupController = new SignUpController();
$observer = new Observer();
$observer2 = new Observer2();
$signupController->attach($observer);
$signupController->attach($observer2);

$signupController->signUpAction();
