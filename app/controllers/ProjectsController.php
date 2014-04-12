<?php

class ProjectsController extends BaseController
{
  public function getIndex($projectId)
  {
    $project = Project::find($projectId);
    return View::make('project')
      -> with('project', $project);
  }

  public function postIndex()
  {
    $values = Input::all();

    $project = new Project;
    $project->name = $values['projectName'];
    $project->save();

    return $project;
  }

  public function getDelete($projectId)
  {
    $project = Project::find($projectId);
    $project->delete();

    return Redirect::to('/');
  }

  public function postUpdate($projectId)
  {
    $values = Input::all();

    $project = Project::find($projectId);
    $project->name = $values['projectName'];
    $project->save();

    return $project;
  }

  public function postNewTask()
  {

  }


}