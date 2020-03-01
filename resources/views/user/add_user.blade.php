@extends('layout')

@section('title', 'Add Users')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Add User </div>

        <div class="panel-body">
          @if(!empty($user))
              {{Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PATCH'))}}
            @else
            {{ Form::open(['route' => ['user.store'], 'method' => 'POST'])}}
            @endif
            {{csrf_field()}}

              <div class="form-group">
                  <label>Name</label>
                  {{Form::text('name', null, ['class' => 'form-controller']) }}

              </div>


              <div class="form-group">
                  <label>Email</label>
                  {{Form::Email('email', null, ['class' => 'form-controller']) }}

              </div>

              <div class="form-group">
                  <label>Class</label>
                  {{Form::text('class', null, ['classes_id' => 'form-controller']) }}

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
