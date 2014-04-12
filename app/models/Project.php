<?php

class Project extends Eloquent
{
  public function tasks()
  {
    return $this->hasMany('Task');
  }

  public function durationSum()
  {
    $totalDuration = $this->tasks->reduce(function($last, $task)
    {
      if($task->duration !== null) {
        $last = $last + $task->duration;
      }
      return $last;
    }, 0);

    return gmdate('H:i:s', $totalDuration);
  }

  public function isRunning()
  {
    return $this->tasks->filter(function($task){
      return $task->end === null;
    })->count() > 0;
  }

}