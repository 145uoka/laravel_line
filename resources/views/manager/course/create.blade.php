@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.MNG.COURSES_INFO') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => '/mng/course/store']) !!}
<div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-bordered table-striped" id="tb">
        <thead>
          <tr>
              <th class="text-center">{!! Lang::get('langCommon.EXTENSION') !!}</th>
              <th class="text-center">{!! Lang::get('langCommon.COURSE') !!}</th>
              <th class="text-center">{!! Lang::get('langCommon.TIME') !!}(分)</th>
              <th class="text-center">{!! Lang::get('langCommon.PRICE') !!}</th>
              <th class="text-center">{!! Lang::get('langCommon.DETAIL') !!}</th>
        </thead>
        <tbody>
            <tr>
              <td class="text-center">{{Form::checkbox('is_extension', 1, false)}}</td>
              <td class="text-center">{!! Form::text('course_name', '', ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::number('minute', '', ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::number('price', '', ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::text('detail', '', ['class' => 'form-control']) !!}</td>
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
