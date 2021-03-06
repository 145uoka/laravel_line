
@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection 
@section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.RESERVE') !!}</H2>

@endsection 
@section('content_body') {!! Form::open(['url' => 'reserve/store']) !!}
<div class="panel panel-default">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="2" class="active"">{!! Lang::get('langCommon.RESERVE_DETAIL') !!}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>{!! Lang::get('langCommon.TELL') !!}</th>
        <td>{{{ $telephone }}}</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.CHARGE') !!}</th>
        <td>
        @if (isset($staff))
          {{{ $staff->name }}}&nbsp;-&nbsp;&#091;{{{ $staff->age }}}&#093;
        @else
          指名なし
        @endif
        </td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.COURSE') !!}</th>
        <td>{{{ $course->course_name }}}&nbsp;-&nbsp;&#091;&yen;{{{ number_format($course->price) }}}&#093;</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.TOTAL') !!}{!! Lang::get('langCommon.PRICE') !!}</th>
        <td>&yen;{{{ number_format($tatalPrice) }}}</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="panel panel-default">
  <div class="panel-heading accent_color">{!! Lang::get('langCommon.RESERVE_AVAILABIRITY_TIME') !!}</div>
  <div class="panel-body">
  {!! Lang::get('langDescription.reserve.reserve.SELECT_RESERVE_TIME') !!}
  <p/>
    <div class="list-group text-center">
      {!! Form::hidden('time', '', ['id' => 'time']) !!}
      <a class="list-group-item" data-toggle="modal" href="#myModal" data-time="1000" data-whatever="10:00&nbsp;&#xFF5E;">10:00&nbsp;&#xFF5E;</a>
      <a class="list-group-item" data-toggle="modal" href="#myModal" data-whatever="11:00&nbsp;&#xFF5E;">11:00&nbsp;&#xFF5E;</a>
      <a class="list-group-item" data-toggle="modal" href="#myModal" data-whatever="13:00&nbsp;&#xFF5E;">13:00&nbsp;&#xFF5E;</a>
      <a class="list-group-item" data-toggle="modal" href="#myModal" data-whatever="17:00&nbsp;&#xFF5E;">17:00&nbsp;&#xFF5E;</a>
      <a class="list-group-item" data-toggle="modal" href="#myModal" data-whatever="19:00&nbsp;&#xFF5E;">19:00&nbsp;&#xFF5E;</a>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                  {!! Lang::get('langCommon.RESERVE_CONFIRM') !!}
                </h4>
            </div>
            <div class="modal-body">
            {!! Lang::get('langDescription.reserve.reserve.MODAL_CONFIRM') !!}<br />
            {!! Lang::get('langDescription.reserve.reserve.CONFIRM_TELL') !!}
            <p />
                <div class="panel panel-default">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th colspan="2" class="active"">{!! Lang::get('langCommon.RESERVE_DETAIL') !!}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>{!! Lang::get('langCommon.TELL') !!}</th>
        <td>{{{ $telephone }}}</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.CHARGE') !!}</th>
        <td>
        @if (isset($staff))
          {{{ $staff->name }}}&nbsp;-&nbsp;&#091;{{{ $staff->age }}}&#093;
        @else
          指名なし
        @endif
        </td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.COURSE') !!}</th>
        <td>{{{ $course->course_name }}}&nbsp;-&nbsp;&#091;&yen;{{{ number_format($course->price) }}}&#093;</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.TOTAL') !!}{!! Lang::get('langCommon.PRICE') !!}</th>
        <td>&yen;{{{ number_format($tatalPrice) }}}</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.RESERVE_TIME') !!}</th>
        <td class="recipient"></td>
      </tr>
    </tbody>
  </table>
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">キャンセル</button>
                
                <button type="submit" class="btn btn-success">
                  {!! Lang::get('formItem.RESERVE_REGISTER') !!}
                </button>
            </div>
        </div>
    </div>
</div>

<script>
  (function($) {
    'use strict';
    // ダイアログ表示前にJavaScriptで操作する
    $('#myModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var recipient = button.data('whatever');
      var time = button.data('time');
      $("#time").val(time);
      var modal = $(this);
      modal.find('.modal-body .recipient').text(recipient);
      //modal.find('.modal-body input').val(recipient);
    });
  })(jQuery);
  </script>
{!! Form::close() !!}
@endsection
