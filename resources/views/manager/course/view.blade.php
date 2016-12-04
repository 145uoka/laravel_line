@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection @section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.MNG.COURSES_INFO') !!}</H2>
@endsection 
@section('content_body') 

{!! Form::open(['url' => '/mng/course/update']) !!}

<a href="/mng/course/create" type="button" class="btn btn-primary">
  <i class="glyphicon glyphicon-plus-sign"></i>&nbsp;{!! Lang::get('formItem.ADD') !!}
</a>
<p>      
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
            <th class="text-center">{!! Lang::get('langCommon.ORDER_NO') !!}</th>
            <th class="text-center">{!! Lang::get('formItem.DEL') !!}</th>
        </thead>
        <tbody>
        <?php $i=0; ?>
          @foreach($courses as $course)
            <tr>
              {!! Form::hidden('course_id['.$i.']',$course->course_id) !!}</td>
              <td class="text-center">{!! Form::checkbox('is_extension['.$i.']', '1', $course->is_extension) !!}</td>
              <td class="text-center">{!! Form::text('course_name['.$i.']', $course->course_name, ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::number('minute['.$i.']', $course->minute, ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::number('price['.$i.']', $course->price, ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::text('detail['.$i.']', $course->detail, ['class' => 'form-control']) !!}</td>
              <td class="text-center">{!! Form::number('order_no['.$i.']', $course->order_no, ['class' => 'form-control']) !!}</td>
              <td class="text-center">
                <a href="/mng/course/destroy/{!! $course->course_id !!}" type="button" class="btn btn-danger">
                  <i class="glyphicon glyphicon-trash"></i>&nbsp;{!! Lang::get('formItem.DEL') !!}
                </a></td>
            </tr>
            <?php $i++; ?>
          @endforeach
        </tbody>
      </table>
    <div class="col-sm-offset-5 col-sm-2 text-center">
      <button type="submit" class="btn btn-success">
        <i class="glyphicon glyphicon-floppy-saved"></i>&nbsp;{!! Lang::get('formItem.SAVE') !!}
      </button>
    </div>
  </div>
</div>


{!! Form::close() !!} @endsection
