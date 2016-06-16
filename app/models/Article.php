<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Article extends Eloquent {
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
        return $this->belongsToMany('app\models\commande')
            ->withPivot('quantity');
    }

    public function getQuantity() {
        $quantity = 0;

        foreach ($this->magasins as $magasin) {
            $quantity += $magasin->pivot->quantity;
        }

        return $quantity;
    }

    public static function getQuantityForId($id) {
        $quantity = 0;

        foreach (Article::findOrFail($id)->magasins as $magasin) {
            $quantity += $magasin->pivot->quantity;
        }

        return $quantity;
    }
}
