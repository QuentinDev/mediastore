<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Article
{
    public function up()
    {
        Capsule::schema()->create('articles', function($table)
        {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->string('nom');
            $table->text('description');
            $table->integer('prix');
            $table->string('editeur');
            $table->enum('status', array('disponible', 'nouveauté', 'hors stock'))->default('nouveauté');
            $table->timestamps();
        });

        Capsule::schema()->table('articles', function($table) {
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    public function down()
    {
        Capsule::schema()->drop('articles');
    }

}
