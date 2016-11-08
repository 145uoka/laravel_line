<!DOCTYPE html>
<html lang="jp">
<head>
@yield('httpHeader')
<title>{!! Lang::get('app.title') !!}</title>

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
  <nav class="navbar navbar-default main_color">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">{!! Lang::get('app.home_name') !!} </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          @if (Auth::check())
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span style="color: red;"> <span
                class="glyphicon glyphicon-cog"></span>
            </span> マスタメンテナンス <span class="caret"></span>
          </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ url('/mstGenres') }}">{!! Lang::get('menu.mstGenres') !!}</a></li>
              <li><a href="{{ url('/mstArea') }}">{!! Lang::get('menu.mstArea') !!}</a></li>
            </ul></li> 
            
            <li><a href="{{ url('/store') }}">{!! Lang::get('menu.store') !!}</a></li>
            @endif
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

<div class="footer">
<hr />
<small>&copy; Mercury 2016</small><br/>
<small>produced by Mercury</small>
</div>

@yield('footer')
<!-- JavaScripts -->
  {{--
  <script src="{{ elixir('js/app.js') }}"></script>
  --}}
</body>
</html>
