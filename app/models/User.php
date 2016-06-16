<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

	public function commandes()
	{
		return $this->hasMany('app\models\commande');
	}
}