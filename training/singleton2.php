<?php

class Car
{
}

class Singleton
{
    private static $instance;

    public static function getCar()
    {
        if (!self::$instance instanceof Car) {
            self::$instance = new Car();
        }

        return self::$instance;
    }
}

//

$car = Singleton::getCar();
$car2 = Singleton::getCar();

var_dump($car === $car2);
