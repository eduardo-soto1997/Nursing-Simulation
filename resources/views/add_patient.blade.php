@extends('layout')

@section('title', 'Add Patients')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Add patient </div>

        <div class="panel-body">
          @if(!empty($Patients))
              {{Form::model($Students, array('route' => array('students.update', $Students->id), 'method' => 'PATCH'))}}
            @else
            {{ Form::open(['route' => ['students.store'], 'method' => 'POST'])}}
            @endif
            {{csrf_field()}}

              <div class="form-group">
                  <label>First Name</label>
                  {{Form::text('firstname', null, ['class' => 'form-controller']) }}

              </div>


              <div class="form-group">
                  <label>Last Name</label>
                  {{Form::text('lastname', null, ['class' => 'form-controller']) }}

              </div>

              <div class="form-group">
                  <label>Class</label>
                  {{Form::text('class', null, ['class' => 'form-controller']) }}

              </div>

              <div class="form-group">
                  <label>Section</label>
                  {{Form::text('section', null, ['class' => 'form-controller']) }}

              </div>


              <div class="form-group">
                  <button class="btn btn-primary">Save</button>

              </div>


            {{Form::close()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
