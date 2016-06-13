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
            $table->string('nom');
            $table->text('description');
            $table->integer('type');
            $table->integer('prix');
            $table->string('editeur');
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('articles');
    }

}