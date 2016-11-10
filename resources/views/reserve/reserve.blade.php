
@extends('layouts.content') 
@section('before_common_style') 
@endsection 
@section('after_common_js') 
@endsection 
@section('content_title')
<H2>{!! Lang::get('langMenu.TITLE.RESERVE') !!}</H2>

@endsection 
@section('content_body') {!! Form::open(['url' => 'reserve/search']) !!}
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
        <td>090xxxxxxxx</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.CHARGE') !!}</th>
        <td>アーティスト</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.COURSE') !!}</th>
        <td>カット</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.PRICE') !!}</th>
        <td>¥5,000</td>
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
      <a class="list-group-item" data-toggle="modal" href="#myModal" data-whatever="10:00&nbsp;&#xFF5E;">10:00&nbsp;&#xFF5E;</a>
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
        <td>090xxxxxxxx</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.CHARGE') !!}</th>
        <td>アーティスト</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.COURSE') !!}</th>
        <td>カット</td>
      </tr>
      <tr>
        <th>{!! Lang::get('langCommon.PRICE') !!}</th>
        <td>¥5,000</td>
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
                <button type="button" class="btn btn-success" data-dismiss="modal">予約受付</button>
            </div>
        </div>
    </div>
</div>

<script>
  (function($) {
    'use strict';
    // JavaScript で表示
//     $('#staticModalButton').on('click', function() {
//       $('#staticModal').modal();
//     });
    // ダイアログ表示前にJavaScriptで操作する
    $('#myModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var recipient = button.data('whatever');
      var modal = $(this);
      modal.find('.modal-body .recipient').text(recipient);
      //modal.find('.modal-body input').val(recipient);
    });
    // ダイアログ表示直後にフォーカスを設定する
//     $('#myModal').on('shown.bs.modal', function(event) {
//       $(this).find('.modal-footer .btn-default').focus();
//     });
//     $('#staticModal').on('click', '.modal-footer .btn-primary', function() {
//       $('#staticModal').modal('hide');
//       alert('変更を保存をクリックしました。');
//     });
  })(jQuery);
  </script>
{!! Form::close() !!}
@endsection
