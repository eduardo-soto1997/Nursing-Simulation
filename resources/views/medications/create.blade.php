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
          <div class="form-group">
              @csrf
              <label for="name">Medication:</label>
              <input type="text" class="form-control" name="medication"/>
          </div>
          <div class="form-group">
              <label for="price">Dosage :</label>
              <input type="text" class="form-control" name="dosage"/>
          </div>
          <div class="form-group">
              <label for="price">Date Time :</label>
              <input type="date" class="form-control" name="date_time_taken"/>
          </div>
          <div class="form-group">
              <label for="price">Reason :</label>
              <input type="text" class="form-control" name="reason"/>
          </div>
          <div class="form-group">
              <label for="price">Patient:</label>
              <input type="text" class="form-control" name="patient_id"/>
          </div>
          <button type="submit" class="btn btn-primary">Create medication</button>
      </form>
  </div>
</div>
@endsection
