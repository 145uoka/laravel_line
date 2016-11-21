<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use Crypt;
use DB;
use Input;
use App\Models\TShops;
use App\Models\TCourses;
use App\Models\TAppointments;
use App\Models\TWorkDays;
use App\Models\TStaffs;
use App\Http\Controllers\Controller;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shopId = '1';
        $today = '20161120';
        $timeNow = '1030';
        
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
        $rules = [    // ②
                        'course_id' => 'required',
        ];
        $this->validate($request, $rules);  // ③
        $courseId = Input::get('course_id');
        var_dump($courseId);
        
        return view ( 'reserve.reserve' );
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
