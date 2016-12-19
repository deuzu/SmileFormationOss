<?php

abstract class Vehicle
{
    /**
     * @var int
     */
    protected $wheels;

    /**
     * @var int
     */
    private $speed;

    /**
     * @var bool
     */
    private $engineIsStart = false;

    /**
     * @var string
     */
    private $brand;

    public function __construct($wheels)
    {
        $this->wheels = $wheels;
    }

    public static function staticTruc()
    {
        return static::whoAmI();
    }

    protected function whoAmI()
    {
        return 'Vehicle';
    }

    abstract public function getName();

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getWheels()
    {
        return $this->wheels;
    }

    public function setWheels($wheels)
    {
        $this->wheels = $wheels;
    }

    final public function start()
    {
        return 'vroom';
    }

    protected function interestingFunction()
    {
        return 'hmm interesting...';
    }

    public function __get($attribute)
    {
        throw new Exception('Artung attribute non existant');
    }
}

class Car extends Vehicle
{
    private $trunkSize;

    public function __destruct()
    {
        echo 'boom';
    }

    protected function whoAmI()
    {
        return 'Car';
    }

    public function getName()
    {
        return 'qwerty';
    }

    public function setTrunkSize($size)
    {
        $this->trunkSize = $size;
    }

    public function getTrunkSize()
    {
        return $this->trunkSize;
    }

    public function test()
    {
        return $this->interestingFunction();
    }

    public function __sleep()
    {
        return [
            'trunkSize',
            'wheels'
        ];
    }

    public function __wakeup()
    {
        $this->speed = 10;
    }
}

class Truck extends Vehicle
{
    private $trailer;
    private $driver;

    public function __construct($wheels, $driver)
    {
        parent::__construct($wheels);
        $this->driver = $driver;
    }

    public function getName()
    {
        return 'ytrewq';
    }

    public function setTrailerSize($size)
    {
        $this->trailerSize = $size;
    }

    public function getTrailerSize()
    {
        return $this->trailerSize;
    }
}

class Car
{
    
}

$car = new Car(4);
$truck = new Truck(412, true);

$car->setSpeed(150);

var_dump($car);
$carString = serialize($car);
var_dump($carString);
var_dump(unserialize($carString));
