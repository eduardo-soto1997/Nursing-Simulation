@extends('layout')

@section('title', 'Patients')

@section('content')
<h2>Patients</h2>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
      <table class="table table-striped">
      <thead>
      <th>PatientName</th>
      <th>Disease</th>
      <th>Correct Intervention</th>
      <td colspan="2">Action</td>
      </thead>
      <tbody>
      @foreach($patients as $patient)
      <tr>
      <td>{{$patient -> name}}</td>
      <td>{{$patient -> dissease -> disease}}</td>
      <td>{{$patient -> dissease -> possible_intervention -> intervention}}</td>
      <td><a href="{{url('patients/edit', $patient->id )}}">
      <button class="btn btn-success"> Edit </button>
      </a>
      </td>
      <td>
      <form action="{{action('PatientController@destroy', $patient->id)}}" method="post">
      {{csrf_field()}}
      <input name="_method" type="hidden" value="DELETE">
      <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      </td>
      </tr>
      @endforeach
      </tbody>
    </table>
      <a href="{{url('patients/create')}}"><button class="btn btn-primary">Create</button></a>
      <a href="{{url('medications/')}}"><button class="btn btn-primary">Medications</button></a>

@endsection
