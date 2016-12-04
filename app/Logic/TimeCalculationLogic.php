<?php
namespace App\Logic;


class TimeCalculationLogic {
    
    /**
     * 0時からの経過時間(分)を指定した単位時間に切り上げ変換する。
     * <p>
     * (例) AM10:10(670)を15分単位で切り上げ<br>
     * 返却値：675(AM10:15)
     * 
     * @param unknown $minute 0時からの経過時間(分)
     * @param unknown $unitMinute 単位分
     */
    public function convertUnitTime($minute, $unitMinute) {
        
        $decimal = 60 / $unitMinute;
        
        $divHour = round($minute / $decimal, 2);
        $tempHour = floor($divHour / $unitMinute);
        
        $tempMinute = $minute - $tempHour * 60;
        
        $result;
        if ($tempMinute > 0) {
            $tempMinute = ceil($tempMinute / $unitMinute);
            
            if ($tempMinute >= $decimal) {
                $tempHour += 1;
                $result = $tempHour * 60;
            } else {
                $tempMinute = $tempMinute * $unitMinute;
                $result = ($tempHour * 60) + $tempMinute;
            }
        }
        
        return $result;
    }
    
    public function convertElapsedMinuteToHourMinute($elapsedMinute) {
        $hour = floor( $elapsedMinute / 60);
        $minute = $elapsedMinute % 60;
        $result = [ 
                        'HH' => str_pad ( $hour, 2, '0', STR_PAD_LEFT ),
                        'mm' => str_pad ( $minute, 2, '0', STR_PAD_LEFT )
        ];
        return $result;
    }
    
}