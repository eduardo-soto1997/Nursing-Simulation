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
                    <label for="patient">patient :</label>
                    <select class="form-control" name="patient_id">
                      <option disabled selected value> -- select an option -- </option>
                      @foreach ($patients as $patient)
                      <option name="patient_id" value="{{ $patient['id'] }}">{{ $patient['name'] }}</option>
                      @endforeach
                      </select>
              </div>
          <div class="form-group">
              <label for="name">Question:</label>
              <input type="text" class="form-control" name="question" value="{{ $questions->question }}"/>
          </div>
          <div class="form-group">
            <label for="price">Response :</label>
              <input type="text" class="form-control" name="response" value="{{ $questions->response }}"/>
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
          <button type="submit" class="btn btn-primary">Update question </button>
      </form>
  </div>
</div>
@endsection
