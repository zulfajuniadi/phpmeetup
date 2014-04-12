@extends('layout')

@section('content')
  <div class="container">
    <h1 class="text-danger text-center">
      <span class="glyphicon glyphicon-warning-sign"></span>
      Are you sure?
    </h1>
    <hr>
    <h3 class="text-center">
      Are you sure you want to delete "Some work done" from "Project A"?
      <br>
      <br>
      <div>
        <a href="project.html" class="btn btn-lg btn-danger">Delete</a>
        <a href="project.html" class="btn btn-lg btn-success">Back</a>
      </div>
    </h3>
  </div>
@stop