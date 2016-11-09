@extends('layouts.content')

@section('before_common_style')
@endsection

@section('after_common_js')
@endsection
@section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.RESERVE') !!}</H2>
@endsection
@section('content_body')

{!! Form::open(['url' => 'reserve/search']) !!}
  <div class="panel panel-info">
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="2" class="info">{!! Lang::get('langCommon.RESERVE_DETAIL') !!}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>{!! Lang::get('langCommon.CUSTOMER_TELL') !!}</th>
        <td>090xxxxxxxx</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.CHARGE') !!}</th>
        <td>アーティスト</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.COURSE') !!}</th>
        <td>カット</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.PRICE') !!}</th>
        <td>¥5,000</td>
      </tr>
    </tbody>
    </table>
  </div>
<div class="list-group text-center">
  <a href="#" class="list-group-item">10:00&nbsp;&#xFF5E;</a>
  <a href="#" class="list-group-item">11:00&nbsp;&#xFF5E;</a>
  <a href="#" class="list-group-item">13:00&nbsp;&#xFF5E;</a>
  <a href="#" class="list-group-item">17:00&nbsp;&#xFF5E;</a>
  <a href="#" class="list-group-item">19:00&nbsp;&#xFF5E;</a>
</div>
{!! Form::close() !!}

@endsection
