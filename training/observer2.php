<?php

class SignUpController implements \SplSubject
{
    private $observers;

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
        // code goes here...

        $this->notify();

        return 'success sign up';
    }
}

class Stalker implements \SplObserver
{
    public function update(\SplSubject $observee)
    {
        echo sprintf('%s has been updated%s', get_class($observee), "\n");
    }
}

$stalker = new Stalker();
$signUpController = new SignUpController();
$signUpController->attach($stalker);
$signUpController->signUpAction();
