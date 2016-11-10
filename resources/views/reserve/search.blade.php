@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.RESERVE') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => 'reserve/search']) !!}
<div class="panel panel-default">
  <div class="panel-heading accent_color">{!! Lang::get('langCommon.COURSE_SELECT') !!}</div>
  <div class="panel-body">

    <div class="form-horizontal ">
    {!! Lang::get('langDescription.reserve.search.INPUT_COURSE_DETAIL') !!}<br />
    {!! Lang::get('langDescription.reserve.search.CONFIRM_TELL') !!}
    <p />
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label for="name" class="control-label col-sm-3">
          {!! Lang::get('langCommon.TELL') !!}
          @include('layouts.common.requiredInput')
        </label>
        <div class="col-sm-7">{!! Form::number('store_name_jp', '090xxxxxxxx', ['class' => 'form-control']) !!}</div>
        <div class="col-sm-1"></div>
      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label for="name" class="control-label col-sm-3">{!! Lang::get('langCommon.CHARGE') !!}</label>
        <div class="col-sm-7">
          <select class="form-control" id="name">
            <option value="1" selected="selected">指名なし</option>
            <option value="2">スタイリスト</option>
            <option value="3">アーティスト</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label for="number" class="control-label col-sm-3">
          {!! Lang::get('langCommon.COURSE') !!}
          @include('layouts.common.requiredInput')</label>
        <div class="col-sm-7">
          <select class="form-control" id="number" name="number">
            <option value="1" selected="selected">カット</option>
            <option value="2">パーマ</option>
            <option value="3">カラー</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <div class="col-sm-offset-5 col-sm-2 text-center">
        <button type="submit" class="btn btn-primary">
          <i class="glyphicon glyphicon-search"></i>&nbsp;{!! Lang::get('formItem.CHECK_RESERVE_AVAILABIRITY_TIME') !!}
        </button>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">{!! Lang::get('langCommon.PRICE') !!}</div>
  <div class="panel-body">
    <table class="table table-bordered table-striped">
      <tr>
        <th class="text-center">{!! Lang::get('langCommon.CHARGE_PRICE') !!}</th>
        <td class="text-center">¥1,000</td>
      </tr>
    </table>
    <table class="table table-bordered table-striped">
      <thead>
        <tr class="active">
          <th class="text-center">{!! Lang::get('langCommon.COURSE') !!}</th>
          <th class="text-center">{!! Lang::get('langCommon.PRICE') !!}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">カット</td>
          <td class="text-center">¥5,000</td>
        </tr>
        <tr>
          <td class="text-center">パーマ</td>
          <td class="text-center">¥8,000</td>
        </tr>
        <tr>
          <td class="text-center">カラー</td>
          <td class="text-center">¥5,500</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


{!! Form::close() !!} @endsection
