@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.RESERVE') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => 'reserve/search']) !!}

    <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="2" class="active"">ご予約内容</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <th class="text-center">予約日</th>
          <td>{!! $reserve->reserve_day !!}</td>
        </tr>
        <tr>
          <th class="text-center">来店時間</th>
          <td>{!! $reserve->start_time !!}</td>
        </tr>
        <tr>
          <th class="text-center">コース</th>
          <td>{!! $course->course_name !!}</td>
        </tr>
        <tr>
          <th class="text-center">指名</th>
          <td>{!! $staff->name !!}</td>
        </tr>
        <tr>
          <th class="text-center">合計料金</th>
          <td>{!! $tatalPrice !!}</td>
        </tr>
    </tbody>
    </table>


{!! Form::close() !!} @endsection
