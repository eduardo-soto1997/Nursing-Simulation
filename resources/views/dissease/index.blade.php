@extends('layout')

@section('title', 'Diseases')

@section('content')
<h2> Diseases</h2>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
    <table class="table table-striped">
      <thead>
      <th>Disease</th>
      <th>Intervention</th>
      <td colspan="2">Action</td>
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
          </tbody>
        </table>
          <a href="{{url('diseases/create')}}"><button class="btn btn-primary">Create</button></a>
        </div>
@endsection
