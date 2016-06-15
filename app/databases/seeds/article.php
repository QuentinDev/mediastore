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

class Article
{
    public function run()
    {
        $now = Carbon::now();
        Capsule::table('articles')->insert([
            'nom' => 'Star Wars 7',
            'description' => 'Dernier né des films Lucas',
            'type_id' => 1,
            'prix' => '25',
            'editeur' => 'Lucas arts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'nom' => 'Gods of Egypt',
            'description' => 'Fantasy',
            'type_id' => 1,
            'prix' => '25',
            'editeur' => 'JB films',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'nom' => 'Star Wars 1',
            'description' => 'Le premier né des films Lucas',
            'type_id' => 2,
            'prix' => '20',
            'editeur' => 'Lucas arts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'nom' => 'Civil War',
            'description' => 'SF',
            'type_id' => 2,
            'prix' => '30',
            'editeur' => 'Marvel',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
