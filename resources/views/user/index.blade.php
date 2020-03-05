<?php use \App\Http\Controllers\UserController;
?>
@extends('layout')

@section('title', 'Users')

@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
        <table class="table table-striped">
          <thead>
            <tr>
              <td>UserName</td>
              <td>Email</td>
              <td>Is Admin</td>
              <td>Class</td>
              <td colspan="2">Action</td>
            </tr>
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
@endsection
