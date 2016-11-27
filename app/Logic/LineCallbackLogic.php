<?php
namespace App\Logic;

use App\Models\TUsers;

class LineCallbackLogic {
    
    /**
     * LINEBOTから受信したイベント情報を元に、T_ユーザを取得。
     * <p>
     * 該当レコードが存在しない場合は、nullを返却。
     * @param unknown $event LINEBOTから受信したイベント情報
     * @return T_ユーザ
     */
    public function getUserInfo($event) {
        
        $mid = $event->source->userId;
        $user = TUsers::where('line_mid', $mid)->first();
        
        return $user;
    }
    
}