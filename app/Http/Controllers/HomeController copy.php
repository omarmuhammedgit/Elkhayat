<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Size;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

$sizes=Size::all();
$time=time()+(7*24*60*60);
$recevedDate=date("Y/m/d",$time);
$date=date('Y/m/d');
$com_code=auth()->user()->com_code;
// dd($date);
$sizes=Size::where('receved_data','<=',$recevedDate)->where('com_code',$com_code)->get();
// dd($sizes->name);
// $sizes=Size::where('customer_id',$sizes)->get();
// dd($sizes);
// $sizes=DB::select('SELECT * FROM sizes WHERE date  >=  CURRENT_DATE - INTERVAL 7 DAY');
// $sizes=DB::select('SELECT * FROM sizes WHERE date  >=  CURRENT_DATE - INTERVAL 7 DAY');
// dd($sizes);
return view('home', compact('sizes'));
        // return view('home');
    }
}
