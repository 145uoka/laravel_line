@section('httpHeader')
<!-- meta -->
@yield('before_common_meta')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-language" content="ja">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="google" content="notranslate" />
@yield('after_common_meta')

<!-- fonts -->
@yield('before_common_font')
<link href="/css/vendor/awesome/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="/css/vendor/lato/font-lato.css" rel='stylesheet' type='text/css'>
@yield('after_common_font')

<!-- styles -->
@yield('before_common_style')
<link href="/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/css/site.css" rel="stylesheet" type="text/css">
@yield('after_common_style')

<!-- javascript -->
@yield('before_common_js')
<script src="/js/vendor/jquery/jquery.min.js"></script>
<script src="/js/vendor/bootstrap/bootstrap.min.js"></script>
@yield('after_common_js')

@stop
