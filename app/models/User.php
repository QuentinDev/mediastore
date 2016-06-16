<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

//Capsule::schema()->create('orders', function($table)
//{
//    $table->increments('id');
//    $table->string('title');
//});

//Order::create(['title' => 'Wii U']);
//
//dd(Order::first()->toArray());

//        $order = Order::first();
//        $order->title = 'Playstation 4';
//        $order->save();
//
//        dd(Order::first()->toArray());

class User extends Eloquent {

	protected $fillable = ['title'];

	public $timestamps = false;

	public function commandes()
	{
		return $this->hasMany('app\models\commande');
	}
}