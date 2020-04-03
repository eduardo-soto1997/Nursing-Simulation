@extends('layout')

@section('title', 'simulation')

@section('content')
<section id="services">
  <div class="wrapper">

        <div class="btn-group-vertical">
          @foreach($questions as $question)
          <button>{{$question->question}}</button>
            @endforeach
        </div>
      </div>
      <div class="column-1">
        <img src="/img/tbPic.png" style="position: absolute;
        left: 0;
        top: 10%;
        width: 30%;
        height: 75%;
        text-align: center;
        font-size: 18px;"/>
        </div>
          <div class=" form-group row">
        <div class="column">
          <div class="btn-group-vertical">
            @foreach($patients as $patient)
            <div class=" form-group row">
                <div class="col field">
                  <label class="label" for="name">Name: {{$patient->name}} </label>
                </div>
                <div class="col field">
                  <label class="label" for="mrn">MRN: {{$patient->mrn}} </label>
                </div>
            </div>
            <button>{{$patient->mrn}}</button>
            <button>{{$patient->admitting_diagnosis}}</button>
            <button>{{$patient->code_status}}</button>
            <button>{{$patient->primary_language}}</button>
            <button>{{$patient->social}}</button>
            <button>{{$patient->advanced_directives_on_file}}</button>
            <button>{{$patient->occupation}}</button>
            <button>{{$patient->cultural_considerations}}</button>
            <button>{{$patient->religious_practices}}</button>
            <button>{{$patient->sensory_communication_needs}}</button>
            <button>{{$patient->medical_history}}</button>
            <button>{{$patient->surgical_history}}</button>
            <button>{{$patient->date}}</button>
            <button>{{$patient->dob}}</button>
            <button>{{$patient->age}}</button>
            <button>{{$patient->admission_date}}</button>
            <button>{{$patient->allergies}}</button>
            <button>{{$patient->interpreter_required}}</button>
            <button>{{$patient->so_nok_poa}}</button>
            <button>{{$patient->dissease_id}}</button>
            @endforeach
        </div>

    </div>
  </div>
  </div>
</section>

@endsection
