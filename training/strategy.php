<?php

class Whatever
{
    private $strategy;

    public function __construct(StrategyOfCoolness $strategy)
    {
        $this->strategy = $strategy;
    }

    public function doSomething()
    {
        return $this->strategy->getStyle();
    }
}

interface StrategyOfCoolness
{
    public function getStyle();
}

class StrategyCool implements StrategyOfCoolness
{
    public function getStyle()
    {
        return 'cool';
    }
}

class StrategyPasCool implements StrategyOfCoolness
{
    public function getStyle()
    {
        return 'pas cool';
    }
}

// controller
$strategyCool = new StrategyCool();
$strategyPasCool = new StrategyPasCool();

$strategy = $strategyPasCool;

if (true) {
    $strategy = $strategyCool;
}

$whatever = new Whatever($strategy);


var_dump($whatever->doSomething());
