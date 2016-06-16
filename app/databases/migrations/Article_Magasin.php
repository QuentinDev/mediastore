<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Article_Magasin
{
    public function up()
    {
        Capsule::schema()->create('article_magasin', function($table)
        {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('magasin_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('seuil')->unsigned();
        });

        Capsule::schema()->table('article_magasin', function($table) {
            $table->foreign('article_id')->references('id')->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Capsule::schema()->table('article_magasin', function($table) {
            $table->foreign('magasin_id')->references('id')->on('magasins')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    public function down()
    {
        Capsule::schema()->drop('article_magasin');
    }

}