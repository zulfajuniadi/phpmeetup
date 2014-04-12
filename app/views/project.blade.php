@extends('layout')

@section('styles')
  form.btn {
    padding: 6px 6px;
    border-radius: 10px;
    margin-bottom: 12px;
  }

  form.btn:hover {
    background-color:#AAB2BD;
    border-color:#AAB2BD;
  }

  form input {
    color: #333;
  }

  h1 a.btn.btn-lg {
    vertical-align: bottom;
  }
  table.table-lg thead tr th, table.table-lg tbody tr td, table.table-lg tfoot tr td {
    font-size: 18px;
    padding: 14px;
  }
  .text-small {
    font-size: smaller;
  }

  .pulse {
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite;
    -moz-animation: pulsate 1s ease-out;
    -moz-animation-iteration-count: infinite;
  }

  @-webkit-keyframes pulsate {
    100% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
    90% {opacity: 1.0;}
    100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
  }

  @-moz-keyframes pulsate {
    100% {-moz-transform: scale(0.1, 0.1); opacity: 0.0;}
    90% {opacity: 1.0;}
    100% {-moz-transform: scale(1.2, 1.2); opacity: 0.0;}
  }
@stop



@section('content')
  <div class="container">
    <h1>
      {{ $project->name }}
      <div class="pull-right">
        <a href="/" class="btn btn-lg btn-success">
          <span class="glyphicon glyphicon-home"></span>
        </a>
        <a href="{{action('ProjectsController@getDelete', $project->id)}}" class="btn btn-lg btn-danger" id="deleteProject">
          <span class="glyphicon glyphicon-trash"></span>
        </a>
        <button class="btn btn-lg" id="renameProject">
          <span class="glyphicon glyphicon-pencil"></span>
        </button>
      </div>
    </h1>
    <hr>

    <form method="post" action="{{action('TasksController@postNew', $project->id)}}" class="pull-right btn">
      <input name="title" type="text" class="input-lg" placeholder="Task">
      <button class="btn btn-lg btn-success">Start</button>
    </form>

    <div class="clearfix"></div>

    <table class="table table-lg table-bordered table-hover">
      <thead>
        <tr>
          <th>Date</th>
          <th>Task</th>
          <th>Duration</th>
          <th width="120px">-</th>
        </tr>
      </thead>
      <tbody>
        @foreach($project->tasks as $task)
          <tr>
            <td>
              {{ date('d M Y', $task->start) }}
              <div class="text-small text-muted">{{ $task->timeDurationString() }}</div>
            </td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->taskDuration() }}</td>
            <td>
              @if($task->isRunning())
                <a href="{{action('TasksController@getDone', $task->id)}}" class="btn btn-warning pulse">
                  <span class="glyphicon glyphicon-stop"></span>
                </a>
              @else
                <a class="btn btn-danger deleteTask" href="{{action('TasksController@getDelete', $task->id)}}" data-title="{{$task->title}}">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
                <button class="btn btn-info editTask" data-id="{{$task->id}}" data-title="{{$task->title}}">
                  <span class="glyphicon glyphicon-pencil"></span>
                </button>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"> </td>
          <td><b>{{ $project->durationSum() }}</b></td>
          <td> </td>
        </tr>
      </tfoot>
    </table>
  </div>
@stop



@section('scripts')
  $('#deleteProject').click(function(e){
    if (!confirm('Are you sure you want to delete "{{$project->name}}"?')) {
      e.preventDefault();
      return false;
    }
  });

  $('.deleteTask').click(function(e){
    var title = $(this).data('title');
    if (!confirm('Are you sure you want to delete "' + title + '"?')) {
      e.preventDefault();
      return false;
    }
  });

  $('.editTask').click(function(){
    var taskId = $(this).data('id');
    var oldTitle = $(this).data('title');
    bootbox.prompt('Rename "' + oldTitle + '"', function(title){
      if(title) {
        $.post('/tasks/update/' + taskId, {
          'title' : title
        }, function(){
          window.location.reload(true);
        });
      }
    });
  });

  $('#renameProject').click(function(){
    bootbox.prompt('Rename "{{$project->name}}"', function(projectName){
      if(projectName) {
        $.post('/projects/update/{{$project->id}}', {
          'projectName' : projectName
        }, function(){
          window.location.reload(true);
        });
      }
    });
  });
@stop