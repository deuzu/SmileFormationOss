<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\DependencyInjection\Container;

abstract class AbstractController
{
    /**
     * @var Container
     */
    protected $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    /**
     * @param string $file
     * @param array  $args
     */
    protected function render($file, array $args = [])
    {
        $filePath = sprintf('%s/../Resources/views/%s', __DIR__, $file);

        if (!file_exists($filePath)) {
            throw new \Exception(sprintf('The file %s cannot be found', $filePath));
        }

        extract($args);

        ob_start();
        include $filePath;
        ob_end_flush();
    }
}
