<?php

namespace SmileOSS\Lab\OOP\Routing;

use SmileOSS\Lab\OOP\Controller\MenuController;

class FrontController
{
    public function render()
    {
        $controllerName = sprintf('SmileOSS\Lab\OOP\Controller\%sController', ucfirst($_GET['controller']));
        $controller = new $controllerName();
        $methodName = $_GET['action'].'Action';

        return $controller->$methodName();
    }
}
