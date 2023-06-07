<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

$time=time()+(1*24*60*60);
$recevedDate=date("Y/m/d",$time);
$date=date('Y/m/d');
$com_code=auth()->user()->com_code;

$sizes=Size::where('com_code',$com_code)->get();
// dd($date);
$sizes=Size::whereBetween('receved_data',[$date,$recevedDate])->where('com_code',$com_code)->get();

return view('home', compact('sizes'));

    }

    public function logout(){
        auth()->logout();
        return redirect()->route('/');
    }
}
