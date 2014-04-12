@extends('layout')

@section('styles')
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
      Project A
      <div class="pull-right">
        <button class="btn btn-lg">Delete</button>
        <button class="btn btn-lg" id="renameProject">Edit</button>
        <a href="/" class="btn btn-lg">Back</a>
      </div>
    </h1>
    <hr>
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
    </div>
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
        <tr>
          <td>
            12 Jan 2014
            <div class="text-small text-muted">12:00:12 - 23:00:12</div>
          </td>
          <td>Some work done</td>
          <td>1:34:12</td>
          <td>
            <a class="btn btn-danger" href="delete.html">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
            <button class="btn btn-info editTask">
              <span class="glyphicon glyphicon-pencil"></span>
            </button>
          </td>
        </tr>
        <tr>
          <td>
            12 Jan 2014
            <div class="text-small text-muted">12:00:12 - 23:00:12</div>
          </td>
          <td>Some work done</td>
          <td>1:34:12</td>
          <td>
            <a class="btn btn-danger" href="delete.html">
              <span class="glyphicon glyphicon-trash"></span>
            </a>
            <button class="btn btn-info editTask">
              <span class="glyphicon glyphicon-pencil"></span>
            </button>
          </td>
        </tr>
        <tr>
          <td>
            12 Jan 2014
            <div class="text-small text-muted">12:00:12 - 23:00:12</div>
          </td>
          <td>Some work done</td>
          <td>1:34:12</td>
          <td>
            <button class="btn btn-warning doneTask pulse">
              <span class="glyphicon glyphicon-stop"></span>
            </button>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"> </td>
          <td><b>12:34:12</b></td>
          <td> </td>
        </tr>
      </tfoot>
    </table>
  </div>
@stop
@section('scripts')
  $('.editTask').click(function(){
    bootbox.prompt('Rename "Some work done"', function(){});
  });
  $('#renameProject').click(function(){
    bootbox.prompt('Rename "Project A"', function(){});
  });
@stop