<?php
namespace App\Logic;


use DateTime;
use DB;
use Input;
Use Session;
use App\Models\TShops;
use App\Models\TCourses;
use App\Models\TAppointments;
use App\Models\TWorkDays;
use App\Models\TStaffs;
use App\Models\TAccessTokens;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\This;

class AccessTokenManager {
    
    /**
     * アクセストークンから有効期限内である、T_アクセストークンを取得。
     * <p>
     * 次の事項に該当する場合は、nullを返却。<br>
     * 指定したアクセストークンに対応するレコードが存在しない場合。<br>
     * 有効期限切れのアクセストークン。
     * 
     * @param unknown $accessToken アクセストークン
     * @return T_アクセストークン
     */
    public function getAccessTokenInfo($accessToken) {
        $expirationDate = new DateTime();
        $accessTokenResult = TAccessTokens::where('access_token', $accessToken)->where('expiration_date', '>=', $expirationDate)->first();
        
        return $accessTokenResult;
    }
    
    /**
     * 店舗IDとユーザIDに紐づくアクセストークンを生成。
     * 
     * @param integer $size アクセストークンのsize
     * @param integer $effectivePeriod 有効期間(分)
     * @param interger $shopId 店舗ID
     * @param interger $userId ユーザID
     * @return アクセストークン
     */
    public function createToken($size, $effectivePeriod, $shopId, $userId) {
        
        $accessToken = str_random($size);
        
        $expirationDate = new DateTime();
        $expirationDate->modify('+' . $effectivePeriod .' minute');
        $today = $expirationDate->format('Y/m/d H:i:s');
        
        $deletedRows = TAccessTokens::where('shop_id', $shopId)->where('user_id', $userId)->delete();
        
        $accessTokenRec = new TAccessTokens;
        $accessTokenRec->access_token = $accessToken;
        $accessTokenRec->expiration_date = $expirationDate;
        $accessTokenRec->effective_period = $effectivePeriod;
        $accessTokenRec->shop_id = $shopId;
        $accessTokenRec->user_id = $userId;
        $accessTokenRec->save();
        
        $this->getAccessTokenInfo($accessToken);
        
        return $accessToken;
    }
}