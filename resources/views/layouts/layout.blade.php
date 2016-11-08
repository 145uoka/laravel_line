<!DOCTYPE html>
<html lang="jp">
<head>
@yield('httpHeader')
<title>{!! Lang::get('langApp.title') !!}</title>

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
        <!-- Branding Image -->
        <span class="navbar-brand">{!! Lang::get('langApp.home_name') !!} </span>
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
