<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('projects', function($table){
      $table->increments('id');
      $table->string('name');
      $table->integer('duration');
      $table->boolean('is_running');
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
    Schema::dropIfExists('projects');
		//
	}

}
