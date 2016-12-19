<?php

class Car
{
    /**
     * @var int
     */
    private $wheels;

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

    /**
     * @param int $startSpeed
     */
    private function start($startSpeed)
    {
        if (!$this->wheels) {
            throw new Exception("You should not start without wheels");
        }

        $this->engineIsStart = true;
        $this->speed = $startSpeed;
    }

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


}

class Doctrine
{
    public function hydrate($object, array $data)
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);

            if (method_exists($object, $setter)) {
                $object->$setter($value);
            }
        }
    }
}

$car = new Car();
$doctrine = new Doctrine();

// DATABASE
$data = [
    'wheels' => 4,
    'brand' => 'renault',
    'speed' => 10,
];

var_dump($car);

$doctrine->hydrate($car, $data);

var_dump($car);
