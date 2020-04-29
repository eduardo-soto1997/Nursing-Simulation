@extends('layout')

@section('title', 'Last Scrore')

@section('content')
<div class="container">
  @foreach($results as $result)
    <div class="row">
      <div class="col-md">
        <p>The patient you examined was {$result->patient->name}}</p>
        <p>The correct intervention was "{{$result->patient->dissease->possible_intervention->intervention}}".</p>
        <p>Score: {{$result->score}}/100</p>
      </div>
      <div class="col-md">
        <h3>Questions Asked</h3>
        <table class="table table-striped">
          <thead>
              <tr>
                <td>Question</td>
                <td>Response</td>
                <td>Was it relevant?</td>
              </tr>
          </thead>
          <tbody>
            @foreach($questions as $question)
              <tr>
                <td>{{$question['question']}}</td>
                <td>{{$question['response']}}</td>
                @if($question['relevant'])
                <td>Yes</td>
                @else
                <td>No (-10 Points)</td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endforeach
</div>

@endsection
