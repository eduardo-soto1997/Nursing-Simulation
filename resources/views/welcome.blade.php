@extends('layout')

@section('title', 'Welcome!')

@section('content')
<div class="lead-banner">
        <img src= "{{ asset('/img/banner-1.png') }}"/>
        <div class="banner-content">
          <div class="wrapper">
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
            <a href="ComingSoon.html">Tuberculosis<br />Simulation</a>
          </li>
          <li>
            <img src="img/icon-2.png" />
            <a href="ComingSoon.html">Measles<br />Simulation</a>
          </li>
          <li>
            <img src="img/icon-3.png" />
            <a href="ComingSoon.html">The Black Death<br />Simulation</a>
          </li>
        </ul>
      </div>
    </section>


@endsection('content')
