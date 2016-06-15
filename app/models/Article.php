<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Article extends Eloquent {

	public $timestamps = false;

	public function type()
    {
        return $this->belongsTo('app\models\type');
    }

    public function magasins()
    {
        return $this->belongsToMany('app\models\magasin')
            ->withPivot('quantity');
    }

    public function commandes()
    {
        return $this->belongsToMany('app\models\commande');
    }
}
