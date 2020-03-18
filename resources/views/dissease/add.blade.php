@extends('layout')

@section('title', 'Add Disease')

@section('content')
<div class="card uper">
  <div class="card-header">
    Add Disease
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
    <form method="post" action="/diseases">
      @csrf
      <div class=" form-row">
          <div class="col">
            <label class="label" for="disease">Disease</label>
              <input type="text" name="disease" id="disease" class="form-control">
          </div>
          <div class="col">
          <label class="label" for="possible_intervention" id="possible_intervention">Intervention</label>
          <select name="possible_intervention" id="possible_intervention" class="form-control">
              @foreach($interventions as $intervention )
                <option value="{{ $intervention->id }}">{{$intervention->intervention}} </option>
              @endforeach
          </select>
        </div>
      </div>
      <br>
      <div>
          <button type="submit" class="btn btn-primary">Create Disease</button>
      </div>
    </form>
  </div>
</div>

@endsection
