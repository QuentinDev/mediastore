<?php

namespace app\databases\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class Type
{
    public function up()
    {
        Capsule::schema()->create('types', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('types');
    }

}
