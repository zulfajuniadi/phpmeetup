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
    // ['projectName' => 'Project A']

    $project = new Project;
    $project->name = $values['projectName'];
    $project->is_running = false;
    $project->duration = 0;
    $project->save();

    return $project;
  }
}