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
          <td>ID</td>
          <td>Patient ID</td>
          <td>Questions</td>
          <td>Response</td>
          <td>Relevant</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($questions as $question)
        <tr>
            <td>{{$question->id}}</td>
            @foreach($patients as $patient)
            @if($question->patient_id == $patient['id'])
            <td>{{$patient['name']}}</td>
            @endif
            @endforeach
            <td>{{$question->question}}</td>
            <td>{{$question->response}}</td>
            @if($question->relevant == 1)
            <td>Yes</td>
            @elseif($question->relevant == 0)
            <td>No</td>
            @endif
            <td><a href="{{ route('questions.edit', $question->id)}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ route('questions.destroy', $question->id)}}" method="post">
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
    <a href="{{ route('questions.create', $questions->first())}}" class="btn btn-primary">Create</a>
  </div>
</div>
@endsection
