@extends('layout')

@section('title', 'simulation')

@section('content')

<div class="container">
<div class="row">
<div class="col-md">
  <div class="btn-group-vertical">
    <h3> Questions: </h3>
    @foreach($questions as $question)
      <button>{{$question->question}}</button>
    @endforeach
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
                    <label class="label" for="mrn">MRN:{{$patient->mrn}} </label>
                    </div>
                  </div>
              </div>
              <div class=" form-group row">
                  <div class="col field">
                    <div class="control">
                      <label class="label" for="admitting_diagnosis">admitting diagnosis:{{$patient->admitting_diagnosis}} </label>
                    </div>
                  </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="code_status">code status:{{$patient->code_status}} </label>
                    </div>
                  </div>
              </div>
              <div class=" form-group row">
                  <div class="col field">
                    <div class="control">
                      <label class="label" for="primary_language">primary language:{{$patient->primary_language}} </label>
                    </div>
                  </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="social">social:{{$patient->social}} </label>
                    </div>
                  </div>
              </div>
              <div class=" form-group row">
                  <div class="col field">
                    <div class="control">
                      <label class="label" for="advanced_directives_on_file">directives on file:{{$patient->advanced_directives_on_file}} </label>
                    </div>
                  </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="occupation">occupation:{{$patient->occupation}} </label>
                    </div>
                  </div>
              </div>
</div>
</div>
</div>
@endforeach
@endsection
