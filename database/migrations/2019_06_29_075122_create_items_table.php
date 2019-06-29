<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{

    public function up()
    {
        Schema::create('items', function(Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->boolean('is_completed');
            $table->string('completed_at');
            $table->string('due');
            $table->integer('urgency');
            $table->string('updated_by');
            $table->string('assignee_id');
            $table->integer('task_id')->unsigned();
            $table->integer('checklist_id')->unsigned();
            $table->foreign('checklist_id')
                ->references('id')
                ->on('checklists');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('items');
    }
}
