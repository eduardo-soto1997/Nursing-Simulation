@extends('layout')

@section('title', 'Diseases')

@section('content')
<h1> Diseases</h1>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"> Manage Diseases </div>

                <div class="panel-body">
                  <table class ="table">
                    <thead>
                      <th>Disease</th>
                      <th>Intervention</th>
                      <th>Actions</th>
                    </thead>
                    <tbody>
                      @foreach($disseases as $disease)
                      <tr>
                        <td>{{$disease -> disease}}</td>
                        <td>{{$disease -> possible_intervention -> intervention}}</td>

                        <td><a href="{{url('diseases/edit', $disease->id )}}">
                            <button class="btn btn-success"> Edit </button>
                            </a>
                        </td>
                        <td>
                          <form action="{{action('DisseasesController@destroy', $disease->id)}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                      <a href="{{url('diseases/create')}}"><button class="btn btn-primary">Create</button></a>
                    </tbody>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
