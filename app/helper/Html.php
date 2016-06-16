<?php

namespace app\helper;

use app\config\Router;

class Html
{
	public static function displayError($error, $type="error"){
		if (!is_null($error))
			echo '<div class="ui '.$type.' message" style="display:block"><p>'.$error.'</p></div>';

	}

	public static function getImgForArticle($articleId) {
		return Router::$baseurl . '/assets/uploads/articles/'. $articleId .'.png';
	}
}
