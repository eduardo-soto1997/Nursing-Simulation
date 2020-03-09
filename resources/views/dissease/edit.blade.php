@extends('layout')

@section('title', 'Edit Disease')

@section('content')

<div id="wrapper">
  <div id="page" class="container">
    <h1>Edit Disease</h1>

    <form method="post" action="/diseases/{{$disease->id}}">
      @csrf
      @method('PUT')
      <div class=" form-group row">
          <div class="col field">
            <label class="label" for="disease">Disease</label>
            <div class="control">
              <input type="text" name="disease" id="disease" value="{{$disease->disease}}">
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
          <button type="submit" class="btn btn-primary">Edit Disease</button>
      </div>

    </form>
  </div>

</div>

@endsection
