<?php
namespace app\config;
use \Pecee\SimpleRouter\SimpleRouter;



class Router {
    public static $baseurl = '/mediastore';

	public static function init()
	{
        SimpleRouter::group(['prefix' => static::$baseurl, 'exceptionHandler' => 'app\handlers\CustomExceptionHandler'], function() {
            SimpleRouter::get('/', 'HomeController@index');
            SimpleRouter::get('/articles', 'ArticlesController@index');
        });


        // Démarrage du router + configuration du namespace par default
        SimpleRouter::start('app\controllers');
	}
}