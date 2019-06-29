<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('object_domain');
            $table->string('object_id');
            $table->string('description');
            $table->boolean('is_completed');
            $table->string('completed_at');
            $table->string('due');
            $table->integer('urgency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist');
    }
}