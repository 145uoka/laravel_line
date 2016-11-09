@extends('layouts.layout')

@include('layouts.httpHeader')

@section('content')
<div class="container">

      @yield('content_title')
      <hr />
      @yield('content_body')
</div>
@endsection
