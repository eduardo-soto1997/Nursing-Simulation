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
              <input type="text" class="form-control" name="show_name" value="{{ $classes->class_name }}"/>
          </div>
          <div class="form-group">
            <label for="price">Course Number :</label>
              <input type="text" class="form-control" name="genre" value="{{ $classes->course_number }}"/>
          </div>
          <div class="form-group">
              <label for="price">Section :</label>
              <input type="text" class="form-control" name="imdb_rating" value="{{ number_format($classes->section, 2) }}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Instructor :</label>
              <input type="text" class="form-control" name="lead_actor" value="{{ $classes->instructor }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Classes</button>
      </form>
  </div>
</div>
@endsection
