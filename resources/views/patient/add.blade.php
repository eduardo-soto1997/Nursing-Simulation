@extends('layout')

@section('title', 'Add Patients')

@section('content')

<div class="card uper">
  <div class="card-header">
    <h2>New Patient</h2>
    <h2 style="color:red">Make sure to check every value before submitting!</h2>
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
    <form method="post" action="{{ route('patient.store') }}">
      @csrf
      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="name">Name</label>
            <div class="control">
              <input type="text" class="form-control" name="name" id="name">
            </div>
          </div>
          <div class="col field">
            <label class="label" for="date">Date</label>
            <div class="control">
              <input type="date" class="form-control" name="date" id="date">
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="mrn">MRN</label>
            <div class="control">
              <input type="text" class="form-control" name="mrn" id="mrn">
            </div>
          </div>
          <div class="col field">
            <label class="label" for="dob">Date of Birth</label>
            <div class="control">
              <input type="date" class="form-control" name="dob" id="dob">
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col-sm-6 field">
            <label class="label" for="gneder">Gender</label>
            <div class="control">
              <select name="gender" class="form-control" id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div class="col field">
            <label class="label" for="age">Age</label>
            <div class="control">
              <input type="number" class="form-control" name="age" id="age">
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="admitting_diagnosis">Admitting Diagnosis</label>
            <div class="control">
              <input type="text" class="form-control" name="admitting_diagnosis" id="admitting_diagnosis">
            </div>
          </div>
          <div class="col field">
            <label class="label" for="admission_date">Admission Date</label>
            <div class="control">
              <input type="date" class="form-control" name="admission_date" id="admission_date">
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="code_status">Code Status</label>
            <div class="control">
              <input type="text" class="form-control" name="code_status" id="code_status">
            </div>
          </div>
          <div class="col field">
            <label class="label" for="allergies">Allergies</label>
            <div class="control">
              <textarea name="allergies" id="allergies" class="form-control"></textarea>

            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="primary_language">Primary Language</label>
            <div class="control">
              <input type="text" class="form-control" name="primary_language" id="primary_language">
            </div>
          </div>
          <div class="col field">
            <label class="label" for="interpreter_required">Interpreter Required?</label>
            <div class="control">
              <input type="radio" id="yes" name="interpreter_required" value="1">
              <label for="yes">Yes</label><br>
              <input type="radio" id="no" name="interpreter_required" value="0">
              <label for="no">No</label><br>
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for"social">Social</label>
            <div class="control">
              <input type="text" class="form-control" name="social" id="social">
            </div>
          </div>
          <div class="col field">
            <label class="label" for="so_nok_poa">Signifigant other, Next of Kin or POA</label>
              <input type="text" class="form-control" name="so_nok_poa" id="so_nok_poa">
              <div class="control">
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="advanced_directives_on_file">Advanced Directives on File</label>
            <div class="control">
              <textarea class="form-control" name="advanced_directives_on_file" id="advanced_directives_on_file"></textarea>
            </div>
          </div>
          <div class="col field">
            <label class="label" for="occupation">Occupation</label>
            <div class="control">
              <textarea class="form-control" name="occupation" id="occupation"></textarea>

            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="cultural_considerations">Cultural Considerations</label>
            <div class="control">
              <textarea class="form-control" name="cultural_considerations" id="cultural_considerations"></textarea>
            </div>
          </div>
          <div class="col field">
            <label class="label" for="religious_practices">Religious Practices</label>
            <div class="control">
              <textarea class="form-control" name="religious_practices" id="religious_practices"></textarea>
            </div>
          </div>
      </div>

      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="sensory_communication_needs">Sensory/Communication Needs</label>
            <div class="control">
              <textarea class="form-control" name="sensory_communication_needs" id="sensory_communication_needs"></textarea>

            </div>
          </div>
          <div class="col field">
            <label class="label" for="medical_history">Medical History</label>
            <div class="control">
              <textarea class="form-control" name="medical_history" id="medical_history"></textarea>

            </div>
          </div>
      </div>
      <div class="form-group row">
          <div class="col field">
            <label class="label" for="surgical_history">Surgical History</label>
            <div class="control">
              <textarea class="form-control" name="surgical_history" id="surgical_history"></textarea>
            </div>
          </div>
          <div class="col field">
          <label class="label" for="dissease" id="dissease">Dissease</label>
          <select name="dissease" id="dissease" class="form-control">
              @foreach($disseases as $dissease )
                <option value="{{ $dissease->id }}">{{$dissease->disease}} </option>
              @endforeach
          </select>
        </div>
        <div class="col field">
          <label class="label" for="active">Is this the current patient?</label>
          <div class="control">
            <input type="radio" id="yes" name="active" value="1">
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="active" value="0">
            <label for="no">No</label><br>
          </div>
        </div>
      </div>
      <br>
      <div>
          <button type="submit" class="btn btn-primary">Create Patient</button>
      </div>

    </form>
  </div>

</div>

@endsection
