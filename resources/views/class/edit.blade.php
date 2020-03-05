@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Update Classes
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="post" action="/classes/{{$classes->id}}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Class Name:</label>
              <input type="text" class="form-control" name="class_name" value="{{ $classes->class_name }}"/>
          </div>
          <div class="form-group">
            <label for="price">Course Number :</label>
              <input type="text" class="form-control" name="course_number" value="{{ $classes->course_number }}"/>
          </div>
          <div class="form-group">
              <label for="price">Section :</label>
              <input type="text" class="form-control" name="section" value="{{$classes->section }}"/>
          </div>
          <div class="form-group">
            <label for="quantity">Instructor :</label>
            <select class="form-control" name="instructor">
              @foreach ($users as $user)
              <option name='instructor' value="{{ $user['id'] }}">{{ $user['name'] }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Update Classes</button>
      </form>
  </div>
</div>
@endsection
