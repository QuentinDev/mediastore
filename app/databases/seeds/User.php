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

class User
{
    public function run()
    {

        Capsule::table('users')->insert([
            'nom' => 'admin',
            'prenom' => 'admin',
            'adresse' => 'admin',
            'cp' => '69003',
            'tel' => '03033033',
            'email' => 'admin@gmail.com',
            'login' => 'admin',
            'pwd' => hash('sha256', 'admin'),
            'grade' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Capsule::table('users')->insert([
            'nom' => 'user',
            'prenom' => 'user',
            'adresse' => 'user',
            'cp' => '69003',
            'tel' => '03033033',
            'email' => 'user@gmail.com',
            'login' => 'user',
            'pwd' => hash('sha256', 'user'),
            'grade' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
