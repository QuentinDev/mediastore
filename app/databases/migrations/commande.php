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
            $table->enum('status', array('en préparation', 'prête', 'envoyée'))->default('en préparation');
            $table->bigInteger('number');
            $table->string('type');
            $table->integer('cvc');
            $table->integer('year');
            $table->integer('month');
            $table->dateTime('delivery_time');
            $table->timestamps();
        });

        Capsule::schema()->table('commandes', function($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Capsule::schema()->drop('commandes');
    }

}

