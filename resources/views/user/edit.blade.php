@extends('layout')

@section('content')
  <div id="wrapper">
    <div id="page" class="container">
      <h1>Edit User</h1>

      <form method="POST" action="/users/{{$user->id}}">
        @csrf
        @method('PUT')
          <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input class="input" type="text" name="name" id="name" value="{{$user->name}}">
            </div>
          </div>

          <div class="field">
            <label class="label" for="email">Email</label>

            <div class="control">
                <input class="input" type="email" name="email" id="email" value="{{$user->email}}">
            </div>
          </div>

          <div class="field">
            <label class="label" for="is_Admin">Admin Rights</label>

            <select name="is_Admin" id="is_Admin" class="form-control">
                  <option value=0>No</option>
                  <option value=1>Yes</option>
            </select>
          </div>

          <div class="field">
            <label class="label" for="classes_id">Class</label>

            <select name="classes_id" id="classes_id" class="form-control">
                @foreach($classes as $class )
                  <option value="{{ $class->id }}">{{$class->course_number." ".$class->class_name." Section: ".$class->section}} </option>
                @endforeach
            </select>
          </div>
          <button class="btn btn-success" type="submit">Modify User</button>
        </form>
  </div>

@endsection
