@extends('layout')

@section('title', 'Questions')

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
          <td>Patient Name</td>
          <td>Question</td>
          <td>Response</td>
          <td>Is this relevant</td>
          <td colspan="1">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
        <tr>
            <td>{{$patient->name}}</td>
            <td>{{$question['question']}}</td>
            <td>{{$question['response']}}</td>
            @if($question['relevant'] == 1)
            <td>Yes</td>
            @elseif($question['relevant'] == 0)
            <td>No</td>
            @endif
            <td><a href="{{ route('questions.edit', $question['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ route('questions.destroy', $question['id'])}}" method="post">
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
    <a href="create/{{$patient->id}}" class="btn btn-primary">Create</a>
    <a href="{{url('/patients')}}">
          <button class="btn btn-success"> Back </button>
        </a>
  </div>
</div>
@endsection
