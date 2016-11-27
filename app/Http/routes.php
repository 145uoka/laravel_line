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
if (App::environment('production')) {
    // 商用モードはHTTPS
    URL::forceSchema('https');
} else {
    Route::get ( 'help/createAccessToken/{user_id}', 'Web\HelpController@createAccessToken' );
    Route::get ( 'help/resetShopHashId/{shop_id}', 'Web\HelpController@resetShopHashId' );
}
Route::get ( '/', function () {
    return view ( 'home' );
} );
Route::get ( 'hoge', function () {
    return view ( 'hoge' );
} );
Route::post ( 'callback', 'Api\line\LineCallbackController@index' );
Route::get ( 'push', 'Sample\SendMsgController@index' );
// Route::get ( 'reserve', 'Web\ReserveController@index' );
Route::get ( 'reserve/{accessToken}', 'Web\ReserveController@index' );
Route::post ( 'reserve/search', 'Web\ReserveController@search' );
Route::post ( 'reserve/store', 'Web\ReserveController@store' );