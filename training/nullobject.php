<?php

trait LoggerAwareTrait
{
    /**
     * The logger instance.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Sets a logger.
     *
     * @param LoggerInterface $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }
}

class NullLogger
{
    public function log($string)
    {
        // do nothing
    }
}

class Logger
{
    public function log($string)
    {
        echo $string;
    }
}

class AwesomeService
{
    use LoggerAwareTrait;

    public function __construct()
    {
        $this->logger = new NullLogger();
    }

    public function doTruc()
    {
        // logic here blablabla
        $this->logger->log('something bad happened');

        return 'whatever';
    }
}

$awesome = new AwesomeService();

$env = 'test';

if ('prod' === $env) {
    $awesome->setLogger(new Logger());
}

$awesome->doTruc();
