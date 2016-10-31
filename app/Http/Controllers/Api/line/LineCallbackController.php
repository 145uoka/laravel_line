<?php

namespace App\Http\Controllers\Api\line;

use App\Http\Controllers\Controller;
use App\Http\Requests;
// use Illuminate\Http\Request;
use Request;

class LineCallbackController extends Controller {
    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $request = Request::instance(); // Access the instance
        echo $request->getContent();
        echo "hoge!!!!";
        file_put_contents ( "php://stdout", "\nhogehoge" );
        return;
    }
}
