<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="/css/_styles.css" type="text/css" rel="stylesheet"/>
  <script src="https://kit.fontawesome.com/5b190a499f.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.min.js" rel="stylesheet"></script>
    <title>@yield('title')</title>
</head>

<body>
  <nav id="main-nav">
    <div class="wrapper">
      <ul>
        <li>
          <a href="/"><i class="fas fa-home fa-fw"></i>Home</a>
        </li>
        @if(Auth::user()->is_Admin)
        <li><a href="/classes"><i class="fas fa-chalkboard-teacher fa-fw"></i>Classes</a></li>
        <li><a href ="/users"><i class="fas fa-users fa-fw"></i>Users </a></li>
        <!--<li class="dropdown">
          <a type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-injured fa-fw"></i>Patients
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="main-nav">
            <a class="dropdown-item" href="{{url('/diseases')}}">Manage Disseases</a>
            <a href="{{url('/patients')}}" class="dropdown-item">Manage Patients</a>
            <a href="#" class="dropdown-item">Create Questions</a>
            <a class="dropdown-item" href="#">Create Interventions</a>
          </div>
        </li>-->
        <li><a href="/patients"><i class="fas fa-user-injured fa-fw"></i>Patients</a></li>
        <!--<li><a href="/patients"><i class="fas fa-user-injured fa-fw"></i>Patients</a></li>-->
        @endif
        <li class="dropdown">
          <a  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-md"></i>{{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="main-nav">
            <a href="{{ url('/logout') }}" class="dropdown-item" role="button">Logout</a>
            <a class="dropdown-item" href="#">View Score</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
@yield('content')
</body>
</html>
