@extends('layouts.content')

@section('before_common_style')
@endsection

@section('after_common_js')
@endsection
@section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.RESERVE') !!}</H2>
@endsection
@section('content_body')

{!! Form::open(['url' => '/']) !!}
<div class="form-horizontal ">

<div class="form-group">
    <label for="name" class="control-label col-sm-3">{!! Lang::get('langCommon.CHARGE') !!}</label>
    <div class="col-sm-6">
      <select class="form-control" id="number" name="number">
        <option value="1" selected="selected">指名なし</option>
        <option value="2">スタイリスト</option>
        <option value="3">アーティスト</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="number" class="control-label col-sm-3">{!! Lang::get('langCommon.COURSE') !!}</label>
    <div class="col-sm-6">
      <select class="form-control" id="number" name="number">
        <option value="1" selected="selected">カット</option>
        <option value="2">パーマ</option>
        <option value="3">カラー</option>
      </select>
    </div>
  </div>
    <div class="col-xs-offset-5 col-xs-2 text-center">
      <button type="submit" class="btn btn-primary">{!! Lang::get('formItem.search') !!}</button>
    </div>
  </div>
{!! Form::close() !!}

@endsection
