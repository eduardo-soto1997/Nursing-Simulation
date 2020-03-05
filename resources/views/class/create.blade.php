@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Classes
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
      <form method="post" action="{{ route('classes.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Class Name:</label>
              <input type="text" class="form-control" name="class_name"/>
          </div>
          <div class="form-group">
              <label for="price">Course Number :</label>
              <input type="text" class="form-control" name="course_number"/>
          </div>
          <div class="form-group">
              <label for="price">Section :</label>
              <input type="text" class="form-control" name="section"/>
          </div>
          <div class="form-group">
            <label for="quantity">Instructor :</label>
            <select class="form-control" name="instructor">
              @foreach ($users as $user)
              <option name='instructor' value="{{ $user['id'] }}">{{ $user['name'] }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Create Class</button>
      </form>
  </div>
</div>
@endsection
