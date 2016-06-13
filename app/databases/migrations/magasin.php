<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Magasin
{
    public function up()
    {
        Capsule::schema()->create('magasins', function($table)
        {
            $table->increments('id');
            $table->string('nom');
            $table->string('adresse');
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('magasins');
    }
}