<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="/css/_styles.css" type="text/css" rel="stylesheet"/>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/5b190a499f.js" crossorigin="anonymous"></script>
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
        <li><a href="/patients"><i class="fas fa-user-injured fa-fw"></i>Patients </a></li>
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
        <!--<li><a href="/"><i class="fas fa-user-md"></i>{{ Auth::user()->name }}</a></li> -->
      </ul>
    </div>
  </nav>

@yield('content')
</body>
</html>
