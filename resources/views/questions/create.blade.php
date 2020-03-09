@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Questions
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
      <form method="post" action="{{ route('questions.store') }}">
        <div class="form-group">
            @csrf
            <label for="patient">patient:</label>
            <input type="text" class="form-control" name="patient_id"/>
        </div>
          <div class="form-group">
              <label for="question">Question:</label>
              <input type="text" class="form-control" name="question"/>
          </div>
          <div class="form-group">
              <label for="response">Response:</label>
              <input type="text" class="form-control" name="response"/>
          </div>
          <div class="form-group">
              <label for="relevant">Relevant:</label>
              <input type="text" class="form-control" name="relevant"/>
          </div>
          <button type="submit" class="btn btn-primary">Create question</button>
      </form>
  </div>
</div>
@endsection
