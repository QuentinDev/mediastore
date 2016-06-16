<?php

namespace app\helper;

use app\config\Router;
use \Pecee\SimpleRouter\RouterBase;

class Redirect
{
	public static function url($controller, $parameters = null, $getParams = null) {
    	return header('location: '. rtrim(RouterBase::getInstance()->getRoute($controller, $parameters, $getParams), '/'));
	}

	public static function prev() {
		if (isset($_SERVER['HTTP_REFERER']))
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		else
			static::url('ArticlesController@nouveautes');
	}
}
