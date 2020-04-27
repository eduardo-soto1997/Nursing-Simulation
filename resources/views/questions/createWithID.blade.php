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
            <label for="patient_id">patient :</label>
            <select class="form-control" name="patient_id">
              <option name='patient_id' value="{{ $patient['id'] }}">{{ $patient['name'] }}</option>
            </select>

        </div>
          <div class="form-group">
              <label for="question">Question:</label>
              <input type="text" class="form-control" name="question"/>
          </div>
          <div class="form-group">
              <label for="response">Response:</label>
              <input type="text" class="form-control" name="response"/>
          </div>
          <div class="col field">
            <label class="label" for="relevant">Relevant?</label>
            <div class="control">
              <input type="radio" id="yes" name="relevant" value="1">
              <label for="yes">Yes</label><br>
              <input type="radio"  id="no" name="relevant" value="0">
              <label for="no">No</label><br>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Create question</button>
          {{ Form::hidden('creatingPatient', 0) }}
      </form>
      <br>
      <br>
      <a href="{{route('questions.index')}}"><button class="btn btn-danger">I'm done for this patient!</button></a>
  </div>
</div>
@endsection
