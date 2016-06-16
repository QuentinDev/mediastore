<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Article_Commande
{
    public function up()
    {
        Capsule::schema()->create('article_commande', function($table)
        {
            $table->increments('id');
            $table->integer('commande_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->integer('quantity');
        });

        Capsule::schema()->table('article_commande', function($table) {
            $table->foreign('commande_id')->references('id')->on('commandes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Capsule::schema()->table('article_commande', function($table) {
            $table->foreign('article_id')->references('id')->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Capsule::schema()->drop('article_commande');
    }

}
