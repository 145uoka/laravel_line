<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use Crypt;
use DateTime;
use DB;
use Input;
Use Session;
use App\Models\TShops;
use App\Models\TCourses;
use App\Models\TAppointments;
use App\Models\TWorkDays;
use App\Models\TStaffs;
use App\Models\TReserves;
use App\Models\MLineChannels;
use App\Http\Controllers\Controller;
use App\Logic\AccessTokenManager;
use App\Logic\TimeCalculationLogic;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($accessToken)
    {
        $timeCalculationLogic = new TimeCalculationLogic();
        $unitTime = $timeCalculationLogic->convertUnitTime(705, 15);
        $hoge = $timeCalculationLogic->convertElapsedMinuteToHourMinute($unitTime);
        var_dump($unitTime);
        var_dump($hoge);
        
        $accessTokenManager = new AccessTokenManager();
        $accessTokenInfo = $accessTokenManager->getAccessTokenInfo($accessToken);
            
        $userId = $accessTokenInfo->user_id;
        $shopId = $accessTokenInfo->shop_id;
        
        Session::put('SES_user_id', $userId);
        Session::put('SES_shop_id', $shopId);
        
        $date = new DateTime();
        $today = $date->format('Ymd');
        $today = '20161120'; // TODO dummy
        $timeNow =  $date->format('Hi');
        $timeNow = '1400'; // TODO dummy
        
        $shop = TShops::find ($shopId);
        
        // SELECT:T_指名
        $appointments = TAppointments::where ( 'shop_id', $shopId )->orderBy ( 'order_no', 'ASC' )->get ();
        // SELECT:T_コース
        $courses = TCourses::where ( 'shop_id', $shopId )->orderBy ( 'isExtension', 'ASC' )->orderBy ( 'order_no', 'ASC' )->get ();
        // SELECT:T_STAFF（出勤中スタッフ）
        $workToDayStaffs = DB::table ( 't_staffs' )
                        ->join ( 't_work_days', function ($join) {
                            $join->on( 't_work_days.staff_id', '=', 't_staffs.staff_id' );
                        } )
                        ->where ( 't_work_days.work_day', $today )
                        ->where ('t_work_days.last_plan_time', '>', $timeNow)
                        ->get ();
        
        return view ( 'reserve.search' )
            ->with('shop', $shop)
            ->with ( 'courses', $courses )
            ->with ( 'appointments', $appointments )
            ->with ( 'workToDayStaffs', $workToDayStaffs );
    }

    
    public function search(Request $request)
    {
        $rules = [ 
                        'telephone' => 'required',
                        'course_id' => 'required' 
        ];
        $this->validate ( $request, $rules );
        
        $shopId = Session::get('SES_shop_id');
        
        // コース処理
        $telephone = Input::get ( 'telephone' );
        $courseId = Input::get ( 'course_id' );
        $course = TCourses::find ($courseId );
        
        // TODO レコード存在チェック
        
        // 合計金額
        $tatalPrice = $course->price;
        
        // 指名処理
        $staffId = Input::get ( 'staff_id' );
        $staff = null;
        $appointments = null;
        if (!empty($staffId)) {
            $staff = TStaffs::find ($staffId );
            $appointments = TAppointments::where ( 'shop_id', $shopId )->where ( 'appointment_type', '0' )->first();
            // TODO レコード存在チェック
            
            // 指名料加算
            $tatalPrice += $appointments->price;
        }
        
        
        $date = new DateTime();
        $this->searchReserveTime($shopId, $staffId, $date);
        
        $userId = Session::get('SES_user_id');
        
        $reserveSession = ['shop_id' => $shopId,
                        'course_id' => $courseId,
                        'telephone' => $telephone,
                        'staff_id' => $staffId,
                        'user_id' => $userId,
                        'tatalPrice' => $tatalPrice,
                        'date' => $date->format('Ymd')
        ];
        
        // 入力値をSessionへput
        Session::put('SES_reserve', $reserveSession);
        
        return view ( 'reserve.reserve' )
                ->with ( 'course', $course )
                ->with ( 'staff', $staff )
                ->with ( 'tatalPrice', $tatalPrice)
                ->with ('telephone', $telephone);
    }
    
    // TODO 予約可能時間
    private function searchReserveTime($shopId, $staffId, $date) {
        
        $workDate = $date->format('Ymd');
        
        $workDay = TWorkDays::where ( 'shop_id', $shopId )->where ( 'staff_id', $staffId )->where ( 'work_day', $workDate )->get();
        $reserves = TReserves::where ( 'shop_id', $shopId )->where ( 'staff_id', $staffId )->where ( 'reserve_day', $workDate )->get();
        
        return $workDay;
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
        
        $time = Input::get ( 'time' );
        
        $session = Session::get('SES_reserve');
        
        $reserve = new TReserves;
        $reserve->user_id = $session ['user_id'];
        $reserve->shop_id = $session ['shop_id'];
        $reserve->staff_id = $session ['staff_id'];
        $reserve->reserve_day = $session ['date'];
        $reserve->start_time = $time;
        $reserve->end_time = '1110';
        $reserve->start_time_minute = 600;
        $reserve->end_time_minute = 670;
        $reserve->course_id = $session ['course_id'];
        $reserve->save();
        
        $course = TCourses::find ($session ['course_id']);
        $staff = TStaffs::find ($session['staff_id']);
        $tatalPrice = $session['tatalPrice'];
                
        return view ( 'reserve.store')
            ->with ( 'reserve', $reserve )
            ->with ( 'course', $course )
            ->with ( 'staff', $staff )
            ->with ( 'tatalPrice', $tatalPrice );
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
