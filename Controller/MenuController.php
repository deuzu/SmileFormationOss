<?php

namespace SmileOSS\Lab\OOP\Controller;

use SmileOSS\Lab\OOP\Templating\TemplateEngine;


class MenuController
{
    public function menuAction()
    {

        TemplateEngine::render(__DIR__.'/../views/menuView.php');
    }
}
