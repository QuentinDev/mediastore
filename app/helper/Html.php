<?php

namespace app\helper;

class Html
{
	public static function displayError($error){
		if (!is_null($error))
			echo '<div class="ui error message" style="display:block"><p>'.$error.'</p></div>';

	}
}
