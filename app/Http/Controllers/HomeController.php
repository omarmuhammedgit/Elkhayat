<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

$chartjs = app()->chartjs
->name('lineChartTest')
->type('bar')
->size(['width' => 400, 'height' => 200])
->labels(['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'])
->datasets([
    [
        "label" => "اجمالي المبيعات",
        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
        'borderColor' => "rgba(38, 185, 154, 0.7)",
        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
        "pointHoverBackgroundColor" => "#fff",
        "pointHoverBorderColor" => "rgba(220,220,220,1)",
        'data' => [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40],
    ],
    // [
    //     "label" => "My Second dataset",
    //     'backgroundColor' => "rgba(38, 185, 154, 0.31)",
    //     'borderColor' => "rgba(38, 185, 154, 0.7)",
    //     "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
    //     "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
    //     "pointHoverBackgroundColor" => "#fff",
    //     "pointHoverBorderColor" => "rgba(220,220,220,1)",
    //     'data' => [12, 33, 44, 44, 55, 23, 40],
    // ]
])
->options([]);
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
return view('home', compact('chartjs','sizes'));
        // return view('home');
    }
}
