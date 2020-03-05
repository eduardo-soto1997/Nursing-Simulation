@extends('layout')

@section('title', 'Patients')

@section('content')
<h1> Patients</h1>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Manage Patients </div>

                <div class="panel-body">
                  <table class ="table">
                    <thead>
                      <th>PatientName</th>
                      <th>Disease</th>
                      <th>Correct Intervention</th>
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
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
