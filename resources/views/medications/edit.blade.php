@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Update Medication
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
    <form method="post" action="/medications/{{$medication->id}}">
          <div class="form-row">
              @csrf
              @method('PATCH')
              <div class="col">
              <label for="name">Medication:</label>
              <input type="text" class="form-control" name="medication" value="{{ $medication->medication }}"/>
              </div>
          <div class="col">
            <label for="price">Dosage :</label>
              <input type="text" class="form-control" name="dosage" value="{{ $medication->dosage }}"/>
          </div>
        </div>
        <br>
        <div class="form-row">
          <div class="col">
              <label for="price">Date Time Taken :</label>
              <input type="text" class="form-control" name="date_time_taken" value="{{$medication->date_time_taken }}"/>
          </div>
          <div class="col">
              <label for="price">Reason :</label>
              <input type="text" class="form-control" name="reason" value="{{$medication->reason }}"/>
          </div>
          <div class="col">
              <label for="price">patient :</label>
              <select class="form-control" name="patient_id">
                <option name='patient_id' value="{{ $patient->id }}">{{ $patient->name }}</option>
                </select>
          </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update Medication</button>
      </form>
  </div>
</div>
@endsection
