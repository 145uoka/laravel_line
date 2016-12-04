@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.MNG.MENU') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => 'mng/shop/update/1']) !!}
<div class="panel panel-default">
  <div class="panel-heading accent_color">hoge</div>
  <div class="panel-body">
    <div class="list-group text-center">
    　<!-- 店舗情報 -->
      <a class="list-group-item" data-toggle="modal" href="/mng/shop/">
        {!! Lang::get('langMenu.TITLE.MNG.SHOP_INFO') !!}
      </a>
      <!-- コース -->
      <a class="list-group-item" data-toggle="modal" href="/mng/course/">
        {!! Lang::get('langMenu.TITLE.MNG.COURSES_INFO') !!}
      </a>
      <!-- スタッフ -->
      <a class="list-group-item" data-toggle="modal" href="/mng/staff/">
        {!! Lang::get('langMenu.TITLE.MNG.STAFF_INFO') !!}
      </a>
      <!-- LINE@ -->
      <a class="list-group-item" data-toggle="modal" href="/mng/line/">
        {!! Lang::get('langMenu.TITLE.MNG.LINE_INFO') !!}
      </a>
    </div>
  </div>
</div>{!! Form::close() !!} @endsection
