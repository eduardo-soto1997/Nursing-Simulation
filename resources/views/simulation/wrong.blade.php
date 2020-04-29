@extends('layout')

@section('title', 'Failure')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md">
        <p>That was the wrong intervention!</p>
        <p>The correct intervention was "{{$intervention->intervention}}",but you chose "{{$pIntervention->intervention}}"!</p>
        <p>Score: {{Auth::user()->score}}/100</p>
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
</div>

@endsection
