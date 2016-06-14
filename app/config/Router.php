<?php
namespace app\config;
use \Pecee\SimpleRouter\SimpleRouter;

class Router {
    public static $baseurl = '/mediastore';

	public static function init()
	{
        SimpleRouter::group(['prefix' => static::$baseurl, 'exceptionHandler' => 'app\handlers\CustomExceptionHandler'], function() {
            SimpleRouter::get('/', 'HomeController@index', ['as' => 'get_home']);

            SimpleRouter::get('/login', 'UserController@login', ['as' => 'get_login']);
            SimpleRouter::post('/login', 'UserController@login', ['as' => 'post_login']);
            SimpleRouter::get('/logout', 'UserController@logout');
            SimpleRouter::get('/register', 'UserController@register', ['as' => 'get_register']);
            SimpleRouter::post('/register', 'UserController@register', ['as' => 'post_register']);


            SimpleRouter::get('/articles', 'ArticlesController@index', ['as' => 'get_articles']);
            SimpleRouter::get('/articles/nouveautes/{max}', 'ArticlesController@nouveautes', ['as' => 'get_nouveautes']);
            SimpleRouter::get('/articles/{nom}', 'ArticlesController@recherches', ['as' => 'get_search']);
            SimpleRouter::get('/article/{id}', 'ArticlesController@detail', ['as' => 'get_article']);
        });

        // Démarrage du router + configuration du namespace par default
        SimpleRouter::start('app\controllers');
	}
}
