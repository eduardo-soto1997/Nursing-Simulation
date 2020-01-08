@extends('student_Layout')

@section('title', 'Tb Simulation')

@section('content')

<body>
    <section id="services">
      <div class="wrapper">
        <div class="row">
        <div class="column">
          <div class="btn-group">
            <button>Were you born or raised outside the USA?</button>
            <button>Have you ever had a positive TB test?</button>
            <button>Ever had a chest x-ray for TB?</button>
            <button>Do you have a condition or take a medicine <br>
              that weakens the immune system?</button>
            <button>Are you currently pregnant?</button>
            <button>Have you ever been sick with or treated for<br>
               TB?</button>
            <button>Have you ever lived or worked in a refugee<br>
               camp, homeless shelter or jail?</button>
            <button>Have you ever been a healthcare worker?</button>
            <button>Have you ever traveled to the developing<br>
               world and had close contact with the local population?</button>
            <button>Have you had an unexplained cough lasting<br>
               longer than 3 weeks?</button>
            <button>Have you had an unexplained fever?</button>
            <button>Have you had hemoptysis?</button>
            <button>Have you had unexplained weight loss?</button>
            <button>Have you had a poor appetite?</button>
            <button>Have you had night sweats?</button>
            <button>Have you been experiencing fatigue?</button>
            <button>Are you a current close contact of a person<br>
              known or suspected to have TB?</button>
            <button>Do you use illicit drugs?</button>
          </div>
        </div>
      <div class="column-1">
        <img src="img/tbPic.png" style="float:left;width:50%;height:100%;object-fit:cover;"/>
        </div>
        <div class="column">
            <img src="img/patientInfo.png" style="float:left;width:85%;height:150%;object-fit:cover;"/>
            <br></br>

            <div class="btn-group1">
          
            <button align: right onclick="href = Intervention.html;"><span>Intervention</span></button>
          </div>
        </div>
      </div>
    </div>
    </section>

  </body>

  @endsection('content')
