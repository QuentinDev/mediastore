<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\seeds;

use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

class Type
{
    public function run()
    {
        Capsule::table('types')->insert([
			'name' => 'DVD',
            'id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

		Capsule::table('types')->insert([
			'name' => 'CD',
            'id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
