<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
  $projects = Project::all();
	return View::make('index')
    -> with('projects', $projects);
});

Route::controller('projects', 'ProjectsController');
Route::controller('tasks', 'TasksController');