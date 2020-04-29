@extends('layout')

@section('title', 'simulation')

@section('content')


<script>
  var questionsAsked = [];
$(document).ready(function(){
  $('button[name=questions]').on("click", function(){
      document.getElementById("response").textContent= "Response:" + $(this).val();
  });

});
  function myFunction(question, id){
    var x = question.innerHTML;
    if(!(questionsAsked.includes(id))){
    questionsAsked.push(id);
  }
    document.getElementById("question").textContent= "Question:" + x;
    document.getElementById("askedQuestions").value=questionsAsked;
  }

</script>

<div class="container">
<div class="row">
<div class="col-md">
  <div class="btn-group-vertical">
    <h3> Questions: </h3>
    @foreach($questions as $question)
      <button onclick="myFunction(this, {{$question->id}});" name="questions" type="button" data-toggle="modal" data-target=".bs-example-modal-lg" value="{{$question->response}}">{{$question->question}}</button>
    @endforeach
    </div>
</div>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Dialogue</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <span id="question"></span>
      <span id="response"></span>
    </div>
  </div>
</div>

<div class="col-md">
  <div class="column-1">
    <img src="/img/tbPic.png"/>
    </div>
</div>

<div class="col-md-6">
  <div class="column">
              <div class=" form-group row">
                  <div class="col field">
                    <div class="control">
                      <label class="label" for="name">Name:{{$patients->name}} </label>
                    </div>
                  </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="dob">DOB:{{$patients->dob}} </label>
                    </div>
                  </div>
              </div>
              <div class=" form-group row">
                <div class="col field">
                  <div class="control">
                  <label class="label" for="mrn">MRN:{{$patients->mrn}} </label>
                  </div>
                </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="age">Age:{{$patients->age}} </label>
                    </div>
                  </div>
              </div>
              <div class=" form-group row">
                  <div class="col field">
                    <div class="control">
                      <label class="label" for="gender">Gender:{{$patients->gender}} </label>
                    </div>
                  </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="allergies">Allergies:{{$patients->allergies}} </label>
                    </div>
                  </div>
              </div>
              <div class=" form-group row">
                  <div class="col field">
                    <div class="control">
                      <label class="label" for="primary_language">Primary language:{{$patients->primary_language}} </label>
                    </div>
                  </div>
                  <div class="col field">
                    <div class="control">
                    <label class="label" for="occupation">occupation:{{$patients->occupation}} </label>
                    </div>
                  </div>
              </div>

              <a href="{{route('simulation.patientInformation', $patients->id) }}" target="_blank"><button class="btn btn-primary">Patient's Full information </button></a>
              <form method="post" action="{{route('intervention.index')}}">
                @csrf
                <input type="hidden" id="askedQuestions" name="askedQuestions" value="">
                <button type="submit" class="btn btn-success">Intervention</button>
              </form>
</div>
</div>

</div>
@endsection
