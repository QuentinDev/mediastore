<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Type extends Eloquent {

	public $timestamps = false;

	public function articles() {
		return $this->hasMany('app\models\article');
	}
}
