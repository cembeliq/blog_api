<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{

    public function up()
    {
        Schema::create('checklists', function(Blueprint $table) {
            $table->increments('id');
            $table->string('object_domain');
            $table->string('object_id');
            $table->string('description');
            $table->boolean('is_completed');
            $table->string('completed_at');
            $table->string('due');
            $table->integer('urgency');
            $table->integer('template_id')->unsigned();
            $table->foreign('template_id')
                ->references('id')
                ->on('templates');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('checklists');
    }
}
