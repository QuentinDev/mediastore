<?php
namespace app\controllers;

use app\config\Router;

abstract class BaseController
{
    function render($file, $variables = []) {
        $variables['base_url'] = Router::$baseurl;
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
