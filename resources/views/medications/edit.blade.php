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
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Medication:</label>
              <input type="text" class="form-control" name="medication" value="{{ $medication->medication }}"/>
          </div>
          <div class="form-group">
            <label for="price">Dosage :</label>
              <input type="text" class="form-control" name="dosage" value="{{ $medication->dosage }}"/>
          </div>
          <div class="form-group">
              <label for="price">Date Time Taken :</label>
              <input type="text" class="form-control" name="date_time_taken" value="{{$medication->date_time_taken }}"/>
          </div>
          <div class="form-group">
              <label for="price">Reason :</label>
              <input type="text" class="form-control" name="reason" value="{{$medication->reason }}"/>
          </div>
          <div class="form-group">
              <label for="price">patient :</label>
              <input type="text" class="form-control" name="patient_id" value="{{$medication->patient_id }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Classes</button>
      </form>
  </div>
</div>
@endsection
