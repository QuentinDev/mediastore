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

class Magasin
{
    public function run()
    {
        $now = Carbon::now();
        Capsule::table('magasins')->insert([
            'id' => 1,
            'nom' => 'LDLC',
            'adresse' => '22 Rue de la Gare, 69009 Lyon',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Capsule::table('magasins')->insert([
            'id' => 2,
            'nom' => 'Fnac',
            'adresse' => '17, rue du Dr Bouchout Centre Commercial, 69003 Lyon',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}