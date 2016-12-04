@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.MNG.SHOP_INFO') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => '/mng/shop/update/']) !!}
<div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-bordered table-striped" id="tb">
        <thead></thead>
        <tbody>
          <tr>
            <!-- 店舗名 -->
            <th class="text-center">{!! Lang::get('langCommon.SHOP_NAME') !!}</th>
            <td class="text-center">{!! Form::text('shopName', $shop->shop_name, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- 電話番号 -->
            <th class="text-center">{!! Lang::get('langCommon.TELL') !!}</th>
            <td class="text-center">{!! Form::text('telephone', $shop->telephone, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- 住所 -->
            <th class="text-center">{!! Lang::get('langCommon.ADDRESS') !!}</th>
            <td class="text-center">{!! Form::text('address', $shop->address, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- 開店時間 -->
            <th class="text-center">{!! Lang::get('langCommon.OPEN_TIME') !!}</th>
            <td class="text-center">{!! Form::text('open_time', $shop->open_time, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- 閉店時間 -->
            <th class="text-center">{!! Lang::get('langCommon.CLOSE_TIME') !!}</th>
            <td class="text-center">{!! Form::text('close_time', $shop->close_time, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- 駐車場有無 -->
            <th class="text-center">{!! Lang::get('langCommon.HAVE_PARKING') !!}</th>
            <td class="text-center">
            {{ Form::select('is_parking',array(
              '1'=>Lang::get('langCommon.PRESENCE'),
              '0'=>Lang::get('langCommon.ABSENCE')
              ),
              $shop->is_parking,
              ['class' => 'form-control']) }}
            </td>
          </tr>
        </tbody>
      </table>
      <div class="col-sm-offset-5 col-sm-2 text-center">
        <button type="submit" class="btn btn-success">
          <i class="glyphicon glyphicon-floppy-saved"></i>&nbsp;{!! Lang::get('formItem.SAVE') !!}
        </button>
      </div>
    </div>
  </div>
</div>


{!! Form::close() !!} @endsection
