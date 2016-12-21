<?php

namespace Smile;

interface MovableInterface
{
    const MOVE = 'vite';

    public function move($speed);
}

interface MovableFeetInterface extends MovableInterface
{
    public function run();
}

class Car implements MovableInterface
{
    public function move($speed)
    {
        //
    }

    public function test()
    {
        return 'test';
    }
}

class Person implements MovableFeetInterface
{
    public function move($speed)
    {
        //
    }

    public function run()
    {
        //
    }
}

class UsersCollection implements \Iterator
{
    /**
     * @var array
     */
    private $users = ['1' => 1];

    public function current()
    {
        return current($this->users);
    }

    public function key()
    {
        return 'key';
    }

    public function next()
    {
        return next($this->users);
    }

    public function rewind()
    {
        return prev($this->users);
    }

    public function valid()
    {
        return true;
    }
}

trait ContainerAware
{
    private $container;

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

    // abstract public function whatever();
}

class BaseController
{
    public function getContainer()
    {
        return 'pas prio';
    }
}

class TestController extends BaseController
{
    use LoggerAware;

    public function testVisi()
    {
        return $this->container;
    }
}


// $trait = new ContainerAware();
// $testController = new TestController();
// $testController->setContainer('container123231');
var_dump($trait);
