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
