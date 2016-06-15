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
            SimpleRouter::post('/login', 'UserController@login');
            SimpleRouter::get('/logout', 'UserController@logout');
            SimpleRouter::get('/register', 'UserController@register');
            SimpleRouter::post('/register', 'UserController@register');


            SimpleRouter::get('/articles', 'ArticlesController@index');
            SimpleRouter::get('/articles/nouveautes/{max}', 'ArticlesController@nouveautes');
            SimpleRouter::get('/articles/{nom}', 'ArticlesController@recherches');
            SimpleRouter::get('/article/{id}', 'ArticlesController@detail');

            SimpleRouter::group(['middleware' => 'app\handlers\AuthHandler'], function() {
                SimpleRouter::get('/panier', 'PanierController@index');
                SimpleRouter::get('/panier/add/{id}', 'PanierController@add');
                SimpleRouter::get('/panier/remove/{id}', 'PanierController@remove');
                SimpleRouter::post('/panier/update/{id}', 'PanierController@update');
            });

            SimpleRouter::group(['prefix' => 'admin', 'middleware' => 'app\handlers\AdminHandler'], function() {
                SimpleRouter::get('/', 'AdminController@listArticles', ['as' => 'get_articles_admin']);
                SimpleRouter::get('/admin', 'AdminController@listArticles');
                SimpleRouter::get('/admin/article/{id}/delete', 'AdminController@deleteArticle');
                SimpleRouter::get('/admin/article/{id}/edit', 'AdminController@editArticle');
                SimpleRouter::get('/admin/user/{id}/delete', 'AdminController@deleteUser');
                SimpleRouter::get('/admin/user/{id}/edit', 'AdminController@editUser');
                SimpleRouter::get('/admin/users', 'AdminController@listUsers');
                SimpleRouter::get('/admin/users', 'AdminController@listUsers');
            });
        });

        // Démarrage du router + configuration du namespace par default
        SimpleRouter::start('app\controllers');
    }
}
