<?php

namespace SmileOSS\Lab\OOP\Templating;

class TemplateEngine
{
    public static function render($file, array $args = [])
    {
        if (!file_exists($file)) {
            throw new \Exception(sprintf('The file %s cannot be found', $file));
        }

        extract($args);

        ob_start();
        include $file;
        ob_end_flush();
    }
}
