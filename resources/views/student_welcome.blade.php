@extends('student_Layout')

@section('title', 'Welcome!')

@section('content')
<body>
    <header>
      <nav id="main-nav">
        <div class="wrapper">
        </div>
      </nav>
      <div class="lead-banner">
        <img src="img/banner-2.png" />
        <div class="banner-content">
          <div class="wrapper">
            <span class="title" >(Student Name),</span>
            <span class="sub-title">Welcome to our Simulation</span>
          </div>
        </div>
      </div>
    </header>
    <section id="services">
      <div class="wrapper">
        <h1>Simulations</h1>
        <p></p>
        <ul>
          <li>
            <img src="img/icon-1.png" />
            <a href="tb.html">Tuberculosis<br />Simulation</a>
          </li>
          <li>
            <img src="img/icon-2.png" />
            <a href="Measles.html">Measles<br />Simulation</a>
          </li>
          <li>
            <img src="img/icon-3.png" />
            <a href="BlackDeath.html">The Black Death<br />Simulation</a>
          </li>
        </ul>
      </div>
    </section>
  </body>
@endsection('content')
