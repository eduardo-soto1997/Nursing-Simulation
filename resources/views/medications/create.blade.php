@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Medication
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
      <form method="post" action="{{ route('medications.store') }}">
        @csrf
        <div class="form-group">
        <div class="form-row">

          <div class="col">

              <label for="name">Medication:</label>
              <input type="text" class="form-control" name="medication"/>
          </div>
          <div class="col">
            <label for="price">Dosage :</label>
              <input type="text" class="form-control" name="dosage"/>
          </div>
          </div>

          <div class="form-row">
          <div class="col">
              <label for="price">Date Time :</label>
              <input type="date" class="form-control" name="date_time_taken"/>
          </div>
          <div class="col">
              <label for="price">Reason :</label>
              <input type="text" class="form-control" name="reason"/>
          </div>
          <div class="col">
              <label for="price">Patient:</label>
              <select class="form-control" name="patient_id">
              <option name='patient_id' value="{{ $patient->id }}">{{ $patient->name }}</option>
              </select>
          </div>
          </div>
        </div>
          <br>
          <button type="submit" class="btn btn-primary">Create medication</button>
      </form>
      <br>
      <br>
      <a href="{{url('medications', $patient->id)}}"><button class="btn btn-danger">Cancel</button></a>
  </div>
</div>
@endsection
