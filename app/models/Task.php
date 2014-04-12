<?php

class Task extends Eloquent
{
  public function isRunning()
  {
    return $this->end === null;
  }

  public function timeDurationString()
  {
    $string = date('H:i:s', $this->start);
    if(!$this->isRunning())
      return $string . ' - ' . date('H:i:s', $this->end);
    return $string;
  }

  public function taskDuration()
  {
    if(!$this->isRunning()) {
      if(!$this->duration) {
        $this->duration = $this->end - $this->start;
        $this->save();
      }
      return gmdate('H:i:s', $this->duration);
    }
    return '-';
  }

}