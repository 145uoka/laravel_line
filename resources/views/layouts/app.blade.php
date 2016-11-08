<!DOCTYPE html>
<html lang="jp">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Mercury</title>

<!-- Fonts -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

<!-- Styles -->
<link href="/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/css/vendor/bootstrap-datepicker/bootstrap-datepicker3.min.min.css" 　rel="stylesheet" type="text/css">

<!-- Javascript -->
<script src="/js/vendor/jquery/jquery.min.js"></script>
<script src="/js/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/js/vendor/moment/moment-with-locales.js"></script>
<script src="moment-ja.js"></script>
<script src="/js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

{{--
<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
--}}

<style>
body {
    font-family: 'Lato';
}

.fa-btn {
    margin-right: 6px;
}
</style>
</head>
<body id="app-layout">
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}"> Mercury </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          @if (Auth::check())
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span style="color: red;"> <span
                class="glyphicon glyphicon-cog"></span>
            </span> マスタメンテナンス <span class="caret"></span>
          </a>

            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/mstGenres') }}">ジャンル</a></li>
              <li><a href="{{ url('/mstArea') }}">エリア</a></li>
            </ul></li> @endif
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a></li> @else
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span>
          </a>

            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul></li> @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- JavaScripts -->
  {{--
  <script src="{{ elixir('js/app.js') }}"></script>
  --}}
</body>
</html>
