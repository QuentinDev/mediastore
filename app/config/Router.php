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
            SimpleRouter::get('/articles/{nom}', 'ArticlesController@recherches')->where(['nom' => '.*']);
            SimpleRouter::get('/article/{id}', 'ArticlesController@detail');

            SimpleRouter::group(['middleware' => 'app\handlers\AuthHandler'], function() {
                SimpleRouter::get('/panier', 'PanierController@index');
                SimpleRouter::get('/panier/add/{id}', 'PanierController@add');
                SimpleRouter::get('/panier/remove/{id}', 'PanierController@remove');
                SimpleRouter::post('/panier/update/{id}', 'PanierController@update');

                SimpleRouter::get('/user/{id}/edit', 'AdminController@editUser');
                SimpleRouter::post('/user/{id}/edit', 'AdminController@editUser');

                SimpleRouter::get('/commandes', 'CommandesController@index');
                SimpleRouter::get('/commandes/add', 'CommandesController@add');
                SimpleRouter::post('/commandes/add', 'CommandesController@saveAdd');
                SimpleRouter::get('/json/check_card', 'JsonController@checkCard');
            });

            SimpleRouter::group(['prefix' => 'admin', 'middleware' => 'app\handlers\AdminHandler'], function() {
                SimpleRouter::get('/', 'AdminController@index');

                SimpleRouter::get('/articles', 'AdminController@listArticles');
                SimpleRouter::get('/article/{id}/delete', 'AdminController@deleteArticle');
                SimpleRouter::get('/article/{id}/edit', 'AdminController@editArticle');
                SimpleRouter::post('/article/{id}/edit', 'AdminController@editArticle');
                SimpleRouter::get('/article/new', 'AdminController@addArticle');
                SimpleRouter::post('/article/new', 'AdminController@addArticle');
                SimpleRouter::get('/article/removeOutofstock', 'AdminController@removeOutofstock');

                SimpleRouter::get('/users', 'AdminController@listUsers');
                SimpleRouter::get('/user/{id}/delete', 'AdminController@deleteUser');
                SimpleRouter::get('/user/{id}/edit', 'AdminController@editUser');
                SimpleRouter::post('/user/{id}/edit', 'AdminController@editUser');
                SimpleRouter::get('/user/new', 'AdminController@addUser');
                SimpleRouter::post('/user/new', 'AdminController@addUser');

                SimpleRouter::get('/magasins', 'AdminMagasinController@index');
                SimpleRouter::get('/magasins/new', 'AdminMagasinController@add');
                SimpleRouter::post('/magasins/new', 'AdminMagasinController@add');
                SimpleRouter::get('/magasins/{id}/edit', 'AdminMagasinController@edit');
                SimpleRouter::post('/magasins/{id}/edit', 'AdminMagasinController@edit');
                SimpleRouter::get('/magasins/{id}/delete', 'AdminMagasinController@delete');

                SimpleRouter::post('/magasins/{id}/{articleid}', 'AdminMagasinController@addItem');
                SimpleRouter::delete('/magasins/{id}/{articleid}', 'AdminMagasinController@delItem');
            });
        });

        // Démarrage du router + configuration du namespace par default
        SimpleRouter::start('app\controllers');
    }
}
