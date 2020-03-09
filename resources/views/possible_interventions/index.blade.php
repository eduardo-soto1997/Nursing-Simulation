@extends('layout')

@section('title', 'intervention')

@section('content')
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>intervention</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($possible_interventions as $possible_intervention)
        <tr>
            <td>{{$possible_intervention->id}}</td>
            <td>{{$possible_intervention->intervention}}</td>
            <td><a href="{{ route('possible_interventions.edit', $possible_intervention->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ route('possible_interventions.destroy', $possible_intervention->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div>
    <a href="{{ route('possible_interventions.create', $possible_intervention->id)}}" class="btn btn-primary">Create</a>
  </div>
</div>
@endsection
