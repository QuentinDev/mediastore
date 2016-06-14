<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Contient
{
    public function up()
    {
        Capsule::schema()->create('contient', function($table)
        {
            $table->increments('id');
            $table->integer('commande_id')->unsigned();
            $table->integer('article_id')->unsigned();
        });

        Capsule::schema()->table('contient', function($table) {
            $table->foreign('commande_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Capsule::schema()->table('contient', function($table) {
            $table->foreign('article_id')->references('id')->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Capsule::schema()->drop('contient');
    }

}