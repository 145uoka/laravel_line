<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Logic\AccessTokenManager;
use App\Models\TAccessTokens;
use App\Models\TShops;

/**
 * ヘルパーコントローラ
 */
class HelpController extends Controller
{
    
    private $responsecode = 200;
    
    private $header = array (
                    'Content-Type' => 'application/json; charset=UTF-8',
                    'charset' => 'utf-8'
    );
    
    /**
     * 任意のユーザのアクセストークンを生成する。
     * @param unknown $userId ユーザID
     */
    public function createAccessToken($userId)
    {
        $accessTokenManager = new AccessTokenManager();
        $accessToken = $accessTokenManager->createToken(32, 600, 1, $userId);
        $accessTokenInfo = $accessTokenManager->getAccessTokenInfo($accessToken);
        $accessTokenInfo = TAccessTokens::find($accessToken);
        return response ()->json ( $accessTokenInfo->getAttributes(), $this->responsecode, $this->header, JSON_UNESCAPED_UNICODE );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resetShopHashId($shopId)
    {
        //
        $hashSize = 8;
        
        $hashValue = str_random($hashSize);
        $count = TShops::where('hash_shop_id', $hashValue)->count();
        while ($count > 0) {
            $hashValue = str_random($hashSize);
            $count = TShops::where('hash_shop_id', $hashValue)->count();
        }
        $shops = TShops::find($shopId);
        if ($shops != null) {
            $shops->hash_shop_id = $hashValue;
            $shops->save();
        }
        
        return response ()->json ( $shops->getAttributes(), $this->responsecode, $this->header, JSON_UNESCAPED_UNICODE );
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
