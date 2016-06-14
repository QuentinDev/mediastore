<?php
namespace app\config;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
	public static function init($configuration_database)
	{
		$capsule = new Capsule;

		$capsule->addConnection($configuration_database);

		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}
}