<?php

class TasksController extends BaseController
{

  public function postNew($projectId)
  {
    $project = Project::find($projectId);
    if($project) {
      $title = Input::get('title');
      $task = new Task;
      $task->title = $title;
      $task->project_id = $projectId;
      $task->start = time();
      $task->save();
    }
    return Redirect::action('ProjectsController@getIndex', $projectId);
  }

  public function getDone($taskId)
  {
    $task = Task::find($taskId);
    if($task) {
      $task->end = time();
      $task->save();
    }
    return Redirect::back();
  }

  public function getDelete($taskId)
  {
    $task = Task::find($taskId);
    if($task) {
      $task->delete();
    }
    return Redirect::back();
  }

  public function postUpdate($id)
  {
    $task = Task::find($id);
    if($task) {
      $task->title = Input::get('title');
      $task->save();
    }
    return $task;
  }

}