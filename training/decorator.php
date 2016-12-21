<?php

interface RenderableInterface
{
    public function render();
}

class WebService implements RenderableInterface
{
    public function render()
    {
        return [
            'key1' => 'value232',
            'key2' => 'value2fdsds3sdsdf2',
            'key3' => 'ddd',
            'key4' => 'valuefdsfs232',
        ];
    }
}

class RendererDecorator
{
    /**
     * @var RenderableInterface
     */
    protected $wrapped;

    /**
     * @param RenderableInterface $renderer
     */
    public function __construct(RenderableInterface $renderer)
    {
        $this->wrapped = $renderer;
    }
}

class JsonRenderer extends RendererDecorator
{
    public function render()
    {
        return json_encode($this->wrapped->render());
    }
}

$webService = new WebService();
var_dump($webService instanceof RenderableInterface); // true
$jsonRenderer = new JsonRenderer($webService);
var_dump($webService->render());
var_dump($jsonRenderer->render());
