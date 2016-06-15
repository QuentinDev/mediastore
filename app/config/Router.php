<?php
namespace app\config;
use \Pecee\SimpleRouter\SimpleRouter;

class Router {
    public static $baseurl = '/mediastore';

	public static function init()
	{
        SimpleRouter::group(['prefix' => static::$baseurl, 'exceptionHandler' => 'app\handlers\CustomExceptionHandler'], function() {
            SimpleRouter::get('/', 'ArticlesController@nouveautes');

            SimpleRouter::get('/login', 'UserController@login');
            SimpleRouter::post('/login', 'UserController@login');
            SimpleRouter::get('/logout', 'UserController@logout');
            SimpleRouter::get('/register', 'UserController@register');
            SimpleRouter::post('/register', 'UserController@register');


            SimpleRouter::get('/articles', 'ArticlesController@index');
            SimpleRouter::get('/articles/{nom}', 'ArticlesController@recherches');
            SimpleRouter::get('/article/{id}', 'ArticlesController@detail');

            SimpleRouter::group(['middleware' => 'app\handlers\AuthHandler'], function() {
                SimpleRouter::get('/panier', 'PanierController@index');
                SimpleRouter::get('/panier/add/{id}', 'PanierController@add');
                SimpleRouter::get('/panier/remove/{id}', 'PanierController@remove');
                SimpleRouter::post('/panier/update/{id}', 'PanierController@update');

                SimpleRouter::get('/commandes', 'CommandesController@index');
                SimpleRouter::get('/commandes/add', 'CommandesController@add');
                SimpleRouter::post('/commandes/add', 'CommandesController@saveAdd');
                
                SimpleRouter::get('/json/check_card', 'JsonController@checkCard');
            });

            SimpleRouter::group(['prefix' => 'admin', 'middleware' => 'app\handlers\AdminHandler'], function() {
                SimpleRouter::get('/', 'ArticlesController@index');
            });
        });

        // Démarrage du router + configuration du namespace par default
        SimpleRouter::start('app\controllers');
    }
}
