@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Update Question
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
    <form method="post" action="/questions/{{$questions->id}}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <div class="form-group">
                  <label for="name">Patient:</label>
                  <input type="text" class="form-control" name="patient_id" value="{{ $questions->patient_id }}"/>
              </div>
          <div class="form-group">
              <label for="name">Question:</label>
              <input type="text" class="form-control" name="question" value="{{ $questions->question }}"/>
          </div>
          <div class="form-group">
            <label for="price">Response :</label>
              <input type="text" class="form-control" name="response" value="{{ $questions->response }}"/>
          </div>
          <div class="form-group">
              <label for="price">Relevant :</label>
              <input type="text" class="form-control" name="relevant" value="{{$questions->relevant }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update question </button>
      </form>
  </div>
</div>
@endsection
