<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Commande extends Eloquent {

	public function articles()
	{
		return $this->belongsToMany('app\models\article')
            ->withPivot('quantity');
	}

	public function user() {
		return $this->belongsTo('app\models\user');
	}

	public static function getTotalPrice($articles) {
		$price = 0;
		foreach ($articles as $article)
			$price += $article->prix;
		return $price;
	}
}
