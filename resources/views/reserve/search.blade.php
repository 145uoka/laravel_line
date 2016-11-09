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
<div class="form-horizontal ">
  <div class="form-group">
    <div class="col-sm-1"></div>
    <label for="name" class="control-label col-sm-3">{!! Lang::get('langCommon.CUSTOMER_TELL') !!}</label>
    <div class="col-sm-7">
      {!! Form::text('store_name_jp', '090xxxxxxxx', ['class' => 'form-control']) !!}
    </div>
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
    <label for="number" class="control-label col-sm-3">{!! Lang::get('langCommon.COURSE') !!}</label>
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
        <i class="glyphicon glyphicon-search"></i>&nbsp;{!! Lang::get('formItem.search') !!}
      </button>
    </div>
    
<div class="panel panel-default">
  <div class="panel-heading">
		{!! Lang::get('langCommon.PRICE') !!}
  </div>
  <div class="panel-body">
  <table class="table table-bordered table-striped">
    <tr>
      <th class="text-center">{!! Lang::get('langCommon.CHARGE_PRICE') !!}</th>
      <td class="text-center">¥1,000</td>
    </tr>
  </table>  
    <table class="table table-bordered table-striped">
    <thead>
      <tr>
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
        <td class="text-center" >パーマ</td>
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
</div>

  
{!! Form::close() !!}
@endsection
