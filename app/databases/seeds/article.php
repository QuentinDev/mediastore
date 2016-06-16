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
            'id' => 1,
            'nom' => 'Star Wars 7',
            'description' => 'Dernier né des films Lucas',
            'type_id' => 1,
            'prix' => '25',
            'seuil' => '5',
            'editeur' => 'Lucas arts',
            'status' => 'nouveauté',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'id' => 2,
            'nom' => 'Gods of Egypt',
            'description' => 'Fantasy',
            'type_id' => 1,
            'prix' => '25',
            'seuil' => '5',
            'editeur' => 'JB films',
            'status' => 'disponible',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'id' => 3,
            'nom' => 'Star Wars 1',
            'description' => 'Le premier né des films Lucas',
            'type_id' => 2,
            'prix' => '20',
            'seuil' => '5',
            'editeur' => 'Lucas arts',
            'status' => 'hors stock',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'id' => 4,
            'nom' => 'Civil War',
            'description' => 'SF',
            'type_id' => 2,
            'prix' => '30',
            'seuil' => '5',
            'editeur' => 'Marvel',
            'status' => 'nouveauté',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'id' => 5,
            'nom' => 'Batman Vs Superman',
            'description' => 'SF',
            'type_id' => 1,
            'prix' => '30',
            'seuil' => '5',
            'editeur' => 'Zack Snyder',
            'status' => 'nouveauté',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('articles')->insert([
            'id' => 6,
            'nom' => 'Batman Vs Superman',
            'description' => 'SF',
            'type_id' => 2,
            'prix' => '30',
            'seuil' => '5',
            'editeur' => 'Zack Snyder',
            'status' => 'nouveauté',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
