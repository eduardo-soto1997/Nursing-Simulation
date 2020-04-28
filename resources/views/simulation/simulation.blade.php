@extends('layout')

@section('title', 'simulation')

@section('content')

<div class="container">
<div class="row">
<div class="col-md">
  <div class="btn-group-vertical">
    <h3> Questions: </h3>
    @foreach($questions as $question)
      <button type="button"  data-toggle="modal" data-target=".bs-example-modal-lg">{{$question->question}}</button>
    @endforeach
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Dialogue</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <p>Question:{{$question->question}}</p>
      <p>Answer:{{$question->response}}</p>
    </div>
  </div>
</div>

<div class="col-md">
  <div class="column-1">
    <img src="/img/tbPic.png"/>
    </div>
</div>

<div class="col-md-6">
  <div class="column">
              @foreach($patients as $patient)
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
</div>

</div>
@endforeach
@endsection
