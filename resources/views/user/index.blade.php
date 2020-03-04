<?php use \App\Http\Controllers\UserController;
?>

@extends('layout')

@section('title', 'Users')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Manage Users </div>

                <div class="panel-body">
                  <table class ="table">
                    <thead>
                      <th>UserName</th>
                      <th>Email</th>
                      <th>Is Admin</th>
                      <th>Class</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user -> name}}</td>
                        <td>{{$user -> email}}</td>
                        <td>{{$user -> is_Admin}}</td>
                        <td>{{$user -> classes -> course_number." ".$user -> classes -> class_name." Section: ".$user -> classes -> section}}</td>

                        <td><a href="{{url('users/edit', $user->id )}}">
                            <button class="btn btn-success"> Edit </button>
                            </a>
                        </td>
                        <td>
                          <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
