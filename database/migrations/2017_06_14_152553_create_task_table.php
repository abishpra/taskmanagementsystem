<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assigned_to')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->integer('priority_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->date('deadline');
            $table->string('attachment')->nullable();
            $table->string('description')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->foreign('assigned_to')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
