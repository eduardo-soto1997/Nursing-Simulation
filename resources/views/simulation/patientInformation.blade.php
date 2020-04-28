@extends('layout')

@section('title', 'Patient Medical Information')

@section('content')
<h2> Medical Information for: {{$patient->name}} </h2>
<div class=" form-group row">
    <div class="col field">
      <label class="label" for="name">Name: {{$patient->name}}</label>
    </div>
    <div class="col field">
      <label class="label" for="date">Date: {{$patient->date}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="mrn">MRN: {{$patient->mrn}}</label>
    </div>
    <div class="col field">
      <label class="label" for="dob">Date of Birth:{{$patient->dob}} </label>
    </div>
</div>

<div class=" form-group row">
    <div class="col-sm-6 field">
      <label class="label" for="gneder">Gender: {{$patient->gender}}</label>
    </div>
    <div class="col field">
      <label class="label" for="age">Age: {{$patient->age}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="admitting_diagnosis">Admitting Diagnosis: {{$patient->admitting_diagnosis}}</label>
    </div>
    <div class="col field">
      <label class="label" for="admission_date">Admission Date: {{$patient->admission_date}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="code_status">Code Status: {{$patient->code_status}}</label>
    </div>
    <div class="col field">
      <label class="label" for="allergies">Allergies: {{$patient->allergies}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="primary_language">Primary Language: {{$patient->primary_language}}</label>
    </div>
    <div class="col field">
      <label class="label" for="interpreter_required">Interpreter Required: {{$patient->interpreter_required}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for"social">Social: {{$patient->social}}</label>
    </div>
    <div class="col field">
      <label class="label" for="so_nok_poa">Signifigant other, Next of Kin or POA: {{$patient->so_nok_poa}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="advanced_directives_on_file">Advanced Directives on File: {{$patient->advanced_directives_on_file}}</label>
    </div>
    <div class="col field">
      <label class="label" for="occupation">Occupation: {{$patient->occupation}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="cultural_considerations">Cultural Considerations: {{$patient->cultural_considerations}}</label>
    </div>
    <div class="col field">
      <label class="label" for="religious_practices">Religious Practices: {{$patient->religious_practices}}</label>
    </div>
</div>

<div class=" form-group row">
    <div class="col field">
      <label class="label" for="sensory_communication_needs">Sensory/Communication Needs: {{$patient->sensory_communication_needs}}</label>
    </div>

    <div class="col field">
      <label class="label" for="medical_history">Medical History: {{$patient->medical_history}}</label>
    </div>
</div>
<div class="form-group row">
    <div class="col field">
      <label class="label" for="surgical_history">Surgical History: {{$patient->surgical_history}}</label>
    </div>
</div>

<br><br>

<h3>Here is a list of medications the patient is taking</h3>

@foreach($medications as $medication)

<div class=" form-group row">
  <div class="col field">
    <label for="name">Medication: {{ $medication->medication }}</label>
  </div>
  <div class="col">
    <label for="price">Dosage: {{$medication->dosage}}</label>
  </div>
</div>

<div class=" form-group row">
  <div class="col field">
    <label for="price">Date Time Taken: {{$medication->date_time_taken }}</label>
  </div>
  <div class="col field">
    <label for="price">Reason: {{$medication->reason }}</label>
  </div>
</div>
@endforeach

@endsection
