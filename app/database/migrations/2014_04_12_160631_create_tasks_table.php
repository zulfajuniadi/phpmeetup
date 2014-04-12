<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::dropIfExists('tasks');
    Schema::create('tasks', function($table){
      $table->increments('id');
      $table->integer('project_id');
      $table->string('title');
      $table->integer('start');
      $table->integer('end')
        ->nullable();
      $table->integer('duration')
        ->nullable();
      $table->timestamps();
    });

		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
    Schema::dropIfExists('tasks');
		//
	}

}
