<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Commande
{
    public function up()
    {
        Capsule::schema()->create('commandes', function($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nom');
            $table->string('statut');
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('commandes');
    }

}

