<?php

interface Renderable
{
    public function render();
}

class DisplayService implements Renderable
{
    public function render()
    {
        return [
            'key' => 'value',
            'dasdas' => 'vdsadaalue',
            'dsasdadhggjg' => 'valdsadaue',
        ];
    }
}

abstract class DisplayDecorator implements Renderable
{
    protected $displayService;

    public function __construct(Renderable $displayService)
    {
        $this->displayService = $displayService;
    }
}

class FirstArrayDisplay extends DisplayDecorator
{
    private $test;

    public function __construct(Renderable $displayService, $test)
    {
        $this->test = $test;

        parent::__construct($displayService);
    }

    public function render()
    {
        return reset($this->displayService->render());
    }
}


$display = new DisplayService();
$firstArrayDisplay = new FirstArrayDisplay($display, 10);

var_dump($firstArrayDisplay);
var_dump($display->render());
var_dump($firstArrayDisplay->render());
