<?php

class Car
{
    public $speed;
}

class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance instanceof Car) {
            self::$instance = new Car();
        }

        return self::$instance;
    }
}

$car1 = Singleton::getInstance();
$car2 = Singleton::getInstance();

var_dump($car1 === $car2);
