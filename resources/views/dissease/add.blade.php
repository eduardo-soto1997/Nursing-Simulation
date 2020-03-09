@extends('layout')

@section('title', 'Add Disease')

@section('content')

<div id="wrapper">
  <div id="page" class="container">
    <h1>New Disease</h1>

    <form method="post" action="/diseases">
      @csrf
      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="disease">Disease</label>
            <div class="control">
              <input type="text" name="disease" id="disease">
            </div>
          </div>
          <div class="col field">
          <label class="label" for="possible_intervention" id="possible_intervention">Intervention</label>
          <select name="possible_intervention" id="possible_intervention" class="form-control">
              @foreach($interventions as $intervention )
                <option value="{{ $intervention->id }}">{{$intervention->intervention}} </option>
              @endforeach
          </select>
        </div>
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