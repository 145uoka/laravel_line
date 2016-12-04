<?php

namespace App\Http\Controllers\Web\Maneger;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

Use Session;

use App\Models\TShops;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mngInfo = [
                        'isLogin' => true,
                        'isMngRole' => true
        ]
        ;
        
        Session::put('SES_LOGIN_INFO', $mngInfo);
        
        $shopId = 1;
        $shop = TShops::find ($shopId);
        $shopInfo = [
          't_shop' => $shop             
        ];
        
        // 入力値をSessionへput
        Session::put('SES_SHOP_INFO', $shopInfo);
        
        return view ( 'manager.menu' );
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
    public function update(Request $request, $id)
    {
        //
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
