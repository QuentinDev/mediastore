<?php
namespace app\controllers;

abstract class BaseController
{
    function render($file, $variables = []) {
        extract($variables);
        ob_start();

        $path = implode('/', ['app', 'views', $file]);

        if (!file_exists($path))
            throw new \ErrorException('View not found');

        require implode('/', ['app', 'views', 'layout', 'header.php']);
        require $path;
        require implode('/', ['app', 'views', 'layout', 'footer.php']);

        return ob_get_clean();
    }
}