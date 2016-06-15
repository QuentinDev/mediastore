<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Magasin extends Eloquent {

	public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany('app\models\articles');
    }
}
