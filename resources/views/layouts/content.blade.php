@extends('layouts.layout')

@include('layouts.httpHeader')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      @yield('content_title')
      <hr />
      @yield('content_body')
    </div>
  </div>
</div>
@endsection
