<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="/css/_styles.css" type="text/css" rel="stylesheet"/>
    <title>@yield('title')</title>
</head>

<body>
  <nav id="main-nav">
    <div class="wrapper">
      <ul>
        <li><a href="/">Home</a></li>
        @if(Auth::user()->is_Admin)
        <li><a href="/classes"> Classes </a></li>
        <li><a href ="/students"> Students </a></li>
        <li><a href="/patients"> Patients </a></li>
        @endif
      </ul>
      <a class="btn btn-primary" href="{{ url('/logout') }}" role="button"> logout </a>
    </div>
  </nav>


@yield('content')
</body>
</html>
