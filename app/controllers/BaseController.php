<?php
namespace app\controllers;

use app\config\Router;
use app\models\Cart;
use app\models\Type;

abstract class BaseController
{
    function render($file, $variables = []) {
        $variables['base_url'] = Router::$baseurl;
        $variables['panier'] = new Cart();
        $variables['type_menu'] = Type::all()->toArray();
        usort($variables['type_menu'], function($a, $b)
        {
            return strcmp($a['name'], $b['name']);
        });
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
