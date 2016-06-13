<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\seeds;

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
            'pwd' => md5('admin'),
            'grade' => '1'
        ]);

        Capsule::table('users')->insert([
            'nom' => 'user',
            'prenom' => 'user',
            'adresse' => 'user',
            'cp' => '69003',
            'tel' => '03033033',
            'email' => 'user@gmail.com',
            'login' => 'user',
            'pwd' => md5('user'),
            'grade' => '0'
        ]);
    }
}