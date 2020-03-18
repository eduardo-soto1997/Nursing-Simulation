@extends('layout')

@section('title', 'Classes')

@section('content')
<h2>Classes</h2>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Class Name</td>
          <td>Course Number</td>
          <td>Section</td>
          <td>Instructor</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($classes as $class)
        <tr>
            <td>{{$class->id}}</td>
            <td>{{$class->class_name}}</td>
            <td>{{$class->course_number}}</td>
            <td>{{$class->section}}</td>
            @foreach($users as $user)
            @if($class->instructor == $user['id'])
            <td>{{$user['name']}}</td>
            @endif
            @endforeach
            <td><a href="{{ route('classes.edit', $class->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ route('classes.destroy', $class->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>
    <a href="{{ route('classes.create', $class->id)}}" class="btn btn-primary">Create</a>
  </div>
</div>
@endsection
