@extends('layout')

@section('styles')

  div.noprojects {
    position: absolute;
    text-align: left;
    min-width: 479px;
    top: 114px;
    right: 0;
  }

  div.container {
      position: relative;
  }

  .noprojects img {
      width: 90px;
  }

  .noprojects h3 {
    position: absolute;
    right: 27px;
    top: 9px;
    width: 337px;
    text-align: left;
  }

  form.btn {
    padding: 6px 6px;
    border-radius: 10px;
  }

  form.btn:hover {
    background-color:#AAB2BD;
    border-color:#AAB2BD;
  }

  form input {
    color: #333;
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
      <form id="newTaskForm" action="{{action('ProjectsController@postNewTask')}}" method="post" class="pull-right btn">
        <select name="project_id" id="project_id" class=" btn btn-success">
          <option value="">Choose A Project</option>
          @foreach($projects as $project)
            <option value="{{$project->id}}">{{ $project->name }}</option>
          @endforeach
          <!-- <option value="">Project B</option>
          <option value="">Project C</option> -->
          <option value="newProject">New Project</option>
        </select>
        <input name="title" id="title" type="text" class="input-lg" placeholder="Task">
        <button class="btn btn-lg btn-success">Start</button>
      </form>
    </h1>
    <hr>

    <div class="row projects">
      @if($projects->count())
        @foreach($projects as $project)
          <div class="col-md-3 @if($project->isRunning()) isRunning @endif">
            <a href="{{action('ProjectsController@getIndex', $project->id)}}">
              <h3>
                {{ $project->name }}
                <br>
                {{ $project->durationSum() }}
              </h3>
            </a>
          </div>
        @endforeach
      @else
        <div class="noprojects">
          <img src="/resources/arrow.png" alt="">
          <h3>Choose "New Project" to start</h3>
        </div>
      @endif
    </div>
  </div>
@stop
@section('scripts')

  var form = $('#newTaskForm');
  form.submit(function(e){
    var projectId = $('#project_id').val();
    if(!projectId.trim() || projectId === 'newProject' || !$('#title').trim()) {
      form.get(0).reset();
      e.preventDefault();
      return false;
    }
  });

  var select = $('select');
  select.change(function(){
    if($(this).val() === 'newProject') {
      select.val('');
      bootbox.prompt('New Project Name', function(projectName){
        if(projectName) {
          $.post('/projects/index', {
            'projectName' : projectName
          }, function(){
            window.location.reload(true);
          })
        }
      });
    }
  });
@stop