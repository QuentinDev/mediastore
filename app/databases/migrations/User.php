<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;


class User
{
    public function up()
    {
        Capsule::schema()->create('users', function($table)
        {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('pwd');
            $table->string('email')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->integer('cp');
            $table->string('tel');
            $table->integer('grade')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('users');
    }
}
