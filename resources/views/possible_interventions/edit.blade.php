@extends('layout')

@section('content')
<div class="card uper">
  <div class="card-header">
    Update Possible intervention
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
    <form method="post" action="/possible_interventions/{{$possible_interventions->id}}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="possible_interventions">possible_interventions:</label>
              <input type="text" class="form-control" name="possible_interventions" value="{{ $possible_interventions->intervention }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update intervention</button>
      </form>
  </div>
</div>
@endsection
