@extends('layout')

@section('title', 'Students')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Manage student </div>

                <div class="panel-body">
                  <table class ="table">
                    <thead>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Class</th>
                      <th>Section</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach($Students as $student)
                      <tr>
                        <td>{{$student -> firstname}}</td>
                        <td>{{$student -> lastname}}</td>
                        <td>{{$student -> class}}</td>
                        <td>{{$student -> section}}<td>
                        <td><a href="{{route('students.edit', $student->id )}}">
                            <button class="btn btn-success"> Edit </button>
                            </a>
                        </td>
                        <td>
                          <form action="{{action('StudentController@destroy', $student->id)}}" method="post">
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
        <a href="{{route('students.create')}}">Create students</a>
      </div>
    </div>
  </div>
</div>

@endsection
