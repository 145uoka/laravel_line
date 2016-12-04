<!DOCTYPE html>
<html lang="jp">
<head>
@yield('httpHeader')
<title>
@if (Session::has('SES_SHOP_INFO'))
  {!! Session::get('SES_SHOP_INFO')['t_shop']->shop_name !!}
@endif
</title>

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
  <nav class="navbar navbar-default navbar-fixed-top main_color"　role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <!-- Branding Image -->
        @if (Session::has('SES_LOGIN_INFO'))
          @if (Session::get('SES_LOGIN_INFO')['isMngRole'])
          <a class="navbar-brand" href="{{ url('/mng/menu/') }}">
          @else
          <span class="navbar-brand">
          @endif
        @endif
        @if (Session::has('SES_SHOP_INFO'))
          {!! Session::get('SES_SHOP_INFO')['t_shop']->shop_name !!}
        @endif
        @if (Session::has('SES_LOGIN_INFO'))
          @if (Session::get('SES_LOGIN_INFO')['isMngRole'])
          </a>
          @else
          </span>
          @endif
        @endif
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
</body>
</html>
