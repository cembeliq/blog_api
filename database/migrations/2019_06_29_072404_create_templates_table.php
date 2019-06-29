<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTable extends Migration
{

    public function up()
    {
        Schema::create('templates', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // Constraints declaration

        });
    }

    public function down()
    {
        Schema::drop('templates');
    }
}
