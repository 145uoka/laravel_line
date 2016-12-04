<?php

namespace App\Http\Controllers\Web\Maneger;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
Use Session;

use App\Models\TShops;

class MngShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopInfo = Session::get('SES_SHOP_INFO');
        
        // 店舗情報取得
        $shop = $shopInfo['t_shop'];
        
        return view ( 'manager.shop.index' )->with('shop', $shop);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $shopInfo = Session::get('SES_SHOP_INFO');
        
        // 店舗情報取得
        $shop = TShops::find ($shopInfo['t_shop']->shop_id);
        $shop->shop_name = Input::get ( 'shopName' );
        $shop->telephone = Input::get ( 'telephone' );
        $shop->address = Input::get ( 'address' );
        $shop->open_time = Input::get ( 'open_time' );
        $shop->close_time = Input::get ( 'close_time' );
        $shop->is_parking = Input::get ( 'is_parking' );
        $shop->save();
        return view ( 'manager.shop.index' )->with('shop', $shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
