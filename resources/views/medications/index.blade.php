@extends('layout')

@section('title', 'Medication')

@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Medicaiton</td>
          <td>Dosage</td>
          <td>Date time taken</td>
          <td>Reason</td>
          <td>Patient id</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($medication as $meds)
        <tr>
            <td>{{$meds->id}}</td>
            <td>{{$meds->medication}}</td>
            <td>{{$meds->dosage}}</td>
            <td>{{$meds->date_time_taken}}</td>
            <td>{{$meds->reason}}</td>
            td>{{$meds->patient_id}}</td>
            <td><a href="{{ route('medications.edit', $meds->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ route('medications.destroy', $meds->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>
    <a href="{{ route('medications.create', $medication->first())}}" class="btn btn-primary">Create</a>
  </div>
</div>
@endsection
