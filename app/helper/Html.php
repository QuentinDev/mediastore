<?php

namespace app\helper;

class Html
{
	public static function displayError($error, $type="error"){
		if (!is_null($error))
			echo '<div class="ui '.$type.' message" style="display:block"><p>'.$error.'</p></div>';

	}
}
