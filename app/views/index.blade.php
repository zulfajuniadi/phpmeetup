@extends('layout')

@section('styles')
  form.btn {
    padding: 6px 6px;
    border-radius: 10px;
  }

  form.btn:hover {
    background-color:#AAB2BD;
    border-color:#AAB2BD;
  }

  h1 select.btn.btn-success {
    -webkit-appearance: listbox;
    font-size: 17px;
    font-weight: normal;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    vertical-align: top;
  }

  h1 input.input-lg {
    border: 1px solid #AAB2BD;
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: normal;
  }

  h1 button.btn.btn-lg {
    vertical-align: bottom;
  }

  .isRunning * {
    color: #ff0000;
  }

  .projects {
    text-align: center;
  }

  .isRunning:after {
    content: ' ';
    display: block;
    width: 25px;
    height: 24px;
    background-color: #F00;
    position: absolute;
    left: calc(50% - 12px);
    bottom: -24px;
    border-radius: 50%;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite;
    -moz-animation: pulsate 1s ease-out;
    -moz-animation-iteration-count: infinite;
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
      Time Tracker
      <form action="" class="pull-right btn">
        <select name="" id="" class=" btn btn-success">
          <option value="">Choose A Project</option>
          @foreach($projects as $project)
            <option value="">{{ $project->name }}</option>
          @endforeach
          <!-- <option value="">Project B</option>
          <option value="">Project C</option> -->
          <option value="newProject">New Project</option>
        </select>
        <input type="text" class="input-lg" placeholder="Task">
        <button class="btn btn-lg btn-success">Start</button>
      </form>
    </h1>
    <hr>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
    </div>
    <div class="row projects">
      <!-- <div class="col-md-3 isRunning">
        <a href="/projects">
          <h3>
            Project A
            <br>
            45:12:00
          </h3>
        </a>
      </div>
      <div class="col-md-3">
        <a href="{{action('ProjectsController@getIndex')}}">
          <h3>
            Project B
            <br>
            45:12:00
          </h3>
        </a>
      </div>
      <div class="col-md-3 isRunning">
        <a href="{{action('ProjectsController@getIndex')}}">
          <h3>
            Project C
            <br>
            45:12:00
          </h3>
        </a>
      </div> -->
      <!-- <div class="col-md-3 isRunning">
        <a href="{{action('ProjectsController@getIndex')}}">
          <h3>
            Project D
            <br>
            45:12:00
          </h3>
        </a>
      </div> -->
      @foreach($projects as $project)
        <div class="col-md-3 @if($project->is_running) isRunning @endif">
          <a href="{{action('ProjectsController@getIndex', $project->id)}}">
            <h3>
              {{ $project->name }}
              <br>
              {{ $project->duration }}
            </h3>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@stop
@section('scripts')
  $('select').change(function(){
    if($(this).val() === 'newProject') {
      bootbox.prompt('New Project Name', function(projectName){
        $.post('/projects/index', {
          'projectName' : projectName
        }, function(){
          window.location.reload(true);
        })
      });
    }
  });
@stop