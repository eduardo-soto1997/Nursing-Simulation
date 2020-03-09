@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Possible intervention
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
      <form method="post" action="{{ route('possible_interventions.store') }}">
          <div class="form-group">
              @csrf
              <label for="intervention">possible_interventions:</label>
              <input type="text" class="form-control" name="intervention"/>
          </div>
          <button type="submit" class="btn btn-primary">Create intervention</button>
      </form>
  </div>
</div>
@endsection
