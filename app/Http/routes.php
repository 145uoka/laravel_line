<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get ( '/', function () {
    return view ( 'welcome' );
} );
Route::get ( 'hoge', function () {
    return view ( 'hoge' );
} );
Route::get ( 'guest', 'Api\line\LineCallbackController@index' );
Route::post ( 'callback', 'Api\line\LineCallbackController@index' );
Route::post('edit', function()
{
    $body = Input::all();
    if (empty($body)) {
        return App::abort(400);
    }
    return Response::json($body);
});
Route::get ( 'collback', function () {
    return view ( 'hoge' );
} );
