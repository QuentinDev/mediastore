<?php
namespace app\config;
use \Pecee\SimpleRouter\SimpleRouter;



class Router {
    public static $baseurl = '/mediastore';

	public static function init()
	{
        SimpleRouter::group(['prefix' => static::$baseurl, 'exceptionHandler' => 'app\handlers\CustomExceptionHandler'], function() {
            SimpleRouter::get('/', 'HomeController@index');

            SimpleRouter::get('/login', 'UserController@login');
            SimpleRouter::get('/login', 'UserController@register');

            SimpleRouter::get('/articles', 'ArticlesController@index');
            SimpleRouter::get('/article/{id}', 'ArticlesController@detail');
        });


        // Démarrage du router + configuration du namespace par default
        SimpleRouter::start('app\controllers');
	}
}
