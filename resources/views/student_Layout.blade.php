<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="/css/styles.css" type="text/css" rel="stylesheet"/>
    <title>@yield('title')</title>
</head>

<body>
  <nav id="main-nav">
    <div class="wrapper">
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/"> Logout </a></li>
      </ul>
    </div>
  </nav>


@yield('content')
</body>
</html>