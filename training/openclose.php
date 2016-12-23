<?php

class ExternalService // update
{
    public function execute()
    {
        return $this->doImportantThings();
    }

    final private function doImportantThings()
    {
        $var = 1 + 2017;

        return $var;
    }
}

class InternalService
{
    public function execute()
    {
        return $this->doSomethingElse();
    }

    private function doSomethingElse()
    {
        $var = 2 + 2017;

        return $var;
    }
}

class Good
{
    private $configuration;

    public function __construct($configuration)
    {
        $this->configuration = $configuration;
    }

    public function execute()
    {
        return $this->doThing();
    }

    private function doThing()
    {
        //
        if ($this->configuration['paramimportant'] === 'commeca') {
            return $this->cetrucla();
        }

        // db fetch
        // trigger event($object)

        return $this->default();
    }
}

$service = new Good(['paramimportant' => 'commeca']);
var_dump($externalService->execute());
