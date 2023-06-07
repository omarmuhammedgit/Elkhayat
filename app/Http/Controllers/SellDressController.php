<?php

namespace App\Http\Controllers;

use App\Http\Requests\sellDressRequest;
use App\Models\sellDress;
use App\Models\Setting;
use Illuminate\Http\Request;

class SellDressController extends Controller
{

    public function index()
    {
        $com_code=auth()->user()->com_code;
        $sellDress=sellDress::select()->where('com_code',$com_code)->get();
        $createBy=auth()->user()->name;
        $setting=Setting::where('created_by',$createBy)->where('com_code',$com_code)->first();

        return view('sellDress.index',compact('sellDress','setting'));

    }
    public function store(sellDressRequest $request){
        try {
            $com_code=auth()->user()->com_code;

            $data=sellDress::where(['no_invoics'=>$request->no_invoics,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
            }

            $data['com_code']=$com_code;
            $data['no_invoics']=$request->no_invoics;
            $data['count']=$request->count;
            $data['date']=$request->date;
            $data['payment']=$request->payment;
            $data['dressExpand']=$request->dressExpand;
            $data['value']=$request->value;
            $data['dresslength']=$request->dresslength;

            sellDress::create($data);
            session()->flash('Add', 'تمت اضافة المشتريات بنجاح');
            return redirect()->back();



        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما' )->withInput();


        }
        }
}
