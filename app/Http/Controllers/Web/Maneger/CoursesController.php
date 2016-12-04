<?php

namespace App\Http\Controllers\Web\Maneger;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;
Use Session;
use DB;

use App\Models\TCourses;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopId = Session::get('SES_SHOP_INFO')['t_shop']->shop_id;
        
        $courses = TCourses::where('shop_id', $shopId)->orderBy ( 'order_no', 'ASC' )->get ();
        
        return view ( 'manager.course.view' )->with('courses', $courses);
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
        $course_name = Input::get ( 'course_name' );
        $minute = Input::get ( 'minute' );
        $price = Input::get ( 'price' );
        $detail = Input::get ( 'detail' );
        $isExtension = Input::get ( 'is_extension' );
        if (empty($isExtension)) {
            $isExtension = '0';
        }
        
        $shopId = Session::get('SES_SHOP_INFO')['t_shop']->shop_id;
        $maxOrderNo = TCourses::where('shop_id', 1)->max('order_no');
        $maxOrderNo++;
        $course = new TCourses;
        
        $course->shop_id = $shopId;
        $course->course_name = $course_name;
        $course->minute = $minute;
        $course->price = $price;
        $course->detail = $detail;
        $course->order_no = $maxOrderNo;
        $course->is_extension = $isExtension;
        $course->save();
        
        return redirect('mng/course/');
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
        // 入力値取得
        $courseId = Input::get ( 'course_id' );
        $courseNameArray = Input::get ( 'course_name' );
        $minuteArray = Input::get ( 'minute' );
        $priceArray = Input::get ( 'price' );
        $detailArray = Input::get ( 'detail' );
        $orderNoArray = Input::get ( 'order_no' );
        $isExtensionArray = Input::get ( 'is_extension' );
        
        $length = count($courseId);
        
        for ($i = 0; $i < $length; $i++) {
            // 編集対象のレコードを取得
            $course = TCourses::find ($courseId[$i]);
            
            // 延長フラグの設定
            $isExtension = '1';
            if (empty($isExtensionArray[$i])) {
                $isExtension = '0';
            }
            
            // 各カラムの設定
            $course->course_name = $courseNameArray[$i];
            $course->minute = $minuteArray[$i];
            $course->price = $priceArray[$i];
            $course->detail = $detailArray[$i];
            $course->order_no = $orderNoArray[$i];
            $course->is_extension = $isExtension;
            
            // commit
            $course->save();
        }
        
        return redirect('mng/course/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO 所持チェック
        
        // レコード削除
        TCourses::destroy($id);
        
        return redirect('mng/course/');
    }
}
