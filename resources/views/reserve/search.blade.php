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
    {!! Lang::get('langDescription.reserve.search.INPUT_COURSE_DETAIL') !!}<br /><br />
    {!! Lang::get('langDescription.reserve.search.CONFIRM_TELL') !!}
    <p />
    
      {{-- 電話番号 --}}
      <div class="form-group @if(!empty($errors->first('telephone'))) has-error @endif">
        <div class="col-sm-1"></div>
        <label for="name" class="control-label col-sm-3">
          {!! Lang::get('langCommon.TELL') !!}
          @include('layouts.common.requiredInput')
        </label>
        <div class="col-sm-7">
        {!! Form::number('telephone', '', ['class' => 'form-control']) !!}
        <span class="help-block">{{$errors->first('telephone')}}</span>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      {{-- 指名選択 --}}
      <div class="form-group">
        <div class="col-sm-1"></div>
        <label for="name" class="control-label col-sm-3">{!! Lang::get('langCommon.CHARGE') !!}</label>
        <div class="col-sm-7">
          <select class="form-control"  id="staff_id" name="staff_id">
            <option value="">{!! Lang::get('langCommon.SELECT_DEFFAULT.CHARGE_NOTHING') !!}</option>
            @foreach($workToDayStaffs as $workToDayStaff)
            <option value="{{{ $workToDayStaff->staff_id }}}" >{{{ $workToDayStaff->name }}}&nbsp;-&nbsp;&#091;{{{ $workToDayStaff->age }}}&#093;</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      {{-- コース選択 --}}
      <div class="form-group @if(!empty($errors->first('course_id'))) has-error @endif">
        <div class="col-sm-1"></div>
        <label for="course_id" class="control-label col-sm-3">
          {!! Lang::get('langCommon.COURSE') !!}
          @include('layouts.common.requiredInput')</label>
        <div class="col-sm-7">
          <select class="form-control" id="course_id" name="course_id">
              <option value="">{!! Lang::get('langCommon.SELECT_DEFFAULT.COURSE') !!}</option>
              @foreach($courses as $course)
                @if ($course->isExtension == '0')
                  <option value="{{{ $course->course_id }}}" >{{{ $course->course_name }}}&nbsp;-&nbsp;&#091;&yen;{{{ number_format($course->price) }}}&#093;</option>
                @endif
              @endforeach
          </select>
          <span class="help-block">{{$errors->first('course_id')}}</span>
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
      <thead>
        <tr class="active">
          <th class="text-center">{!! Lang::get('langCommon.COURSE') !!}</th>
          <th class="text-center">{!! Lang::get('langCommon.PRICE') !!}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($courses as $course)
          @if ($course->isExtension == 0)
            <tr>
              <td class="text-center">{{{ $course->course_name }}}</td>
              <td class="text-center">&yen;{{{ number_format($course->price) }}}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <table class="table table-bordered table-striped">
      <thead>
        <tr class="active">
          <th class="text-center">{!! Lang::get('langCommon.EXTENSION') !!}</th>
          <th class="text-center">{!! Lang::get('langCommon.PRICE') !!}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($courses as $course)
          @if ($course->isExtension == 1)
            <tr>
              <td class="text-center">{{{ $course->course_name }}}</td>
              <td class="text-center">&yen;{{{ number_format($course->price) }}}</td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <table class="table table-bordered table-striped">
        @foreach($appointments as $appointment)
        <tr>
          <th class="text-center">{{{ $appointment->display_name }}}</th>
          <td class="text-center">&yen;{{{ number_format($appointment->price) }}}</td> 
        </tr>
        @endforeach
    </table>
    
  </div>
</div>


{!! Form::close() !!} @endsection
