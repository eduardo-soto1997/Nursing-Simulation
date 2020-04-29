@extends('layout')

@section('title', 'Intervention')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm">
      <table class="table table-striped">
        <thead>
            <tr>
              <td>Question</td>
              <td>Response</td>
            </tr>
        </thead>
        <tbody>
          @foreach($questions as $question)
            <tr>
              <td>{{$question['question']}}</td>
              <td>{{$question['response']}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-sm">
      <div class=" form-group row">
          <div class="col field">
            <div class="control">
              <label class="label" for="name">Name:{{$patient->name}} </label>
            </div>
          </div>
          <div class="col field">
            <div class="control">
            <label class="label" for="dob">DOB:{{$patient->dob}} </label>
            </div>
          </div>
      </div>
      <div class=" form-group row">
        <div class="col field">
          <div class="control">
          <label class="label" for="mrn">MRN:{{$patient->mrn}} </label>
          </div>
        </div>
          <div class="col field">
            <div class="control">
            <label class="label" for="age">Age:{{$patient->age}} </label>
            </div>
          </div>
      </div>
      <div class=" form-group row">
          <div class="col field">
            <div class="control">
              <label class="label" for="gender">Gender:{{$patient->gender}} </label>
            </div>
          </div>
          <div class="col field">
            <div class="control">
            <label class="label" for="allergies">Allergies:{{$patient->allergies}} </label>
            </div>
          </div>
      </div>
      <div class=" form-group row">
          <div class="col field">
            <div class="control">
              <label class="label" for="primary_language">Primary language:{{$patient->primary_language}} </label>
            </div>
          </div>
          <div class="col field">
            <div class="control">
            <label class="label" for="occupation">occupation:{{$patient->occupation}} </label>
            </div>
          </div>
      </div>

      <a href="{{route('simulation.patientInformation', $patient->id) }}" target="_blank"><button class="btn btn-primary">Patient's Full information </button></a>
    </div>
    <div class="col-sm">
      <h3>Select an intervention</h3>
      <form method="post" action="{{route('score.index')}}">
        @csrf
        <select name="intervention" id ="intervention" class="form-control">
          @foreach($interventions as $intervention)
            <option value="{{$intervention->id}}">{{$intervention->intervention}}</option>
          @endforeach
        </select>
        {{ Form::hidden('questionsIDS', implode(",", $qids)) }}
        <button type="submit" class="btn btn-success">Submit Intervention</button>
      </form>
    </div>
  </div>
</div>


@endsection
