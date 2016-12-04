@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.MNG.LINE_INFO') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => '/mng/line/update/']) !!}
<div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-bordered table-striped" id="tb">
        <thead></thead>
        <tbody>
          <tr>
            <!-- CHANNEL_ID -->
            <th class="text-center">{!! Lang::get('langCommon.CHANNEL_ID') !!}</th>
            <td class="text-center">{!! Form::text('channel_id', $lineInfo->channel_id, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- CHANNEL_SECRET -->
            <th class="text-center">{!! Lang::get('langCommon.CHANNEL_SECRET') !!}</th>
            <td class="text-center">{!! Form::text('channel_secret', $lineInfo->channel_secret, ['class' => 'form-control']) !!}</td>
          </tr>
          <tr>
            <!-- CHANNEL_ACCESS_TOKEN -->
            <th class="text-center">{!! Lang::get('langCommon.CHANNEL_ACCESS_TOKEN') !!}</th>
            <td class="text-center">{!! Form::textarea('channel_access_token', $lineInfo->channel_access_token, ['class' => 'form-control']) !!}</td>
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
