<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepairFabricsRequest;
use App\Models\Repair_fabrics;
use App\Models\Setting;
use Illuminate\Http\Request;

class RepairFabricsController extends Controller
{

    public function index()
    {
        $com_code=auth()->user()->com_code;
        $repair=Repair_fabrics::select()->where('com_code',$com_code)->get();
         $createBy=auth()->user()->name;
        $setting=Setting::where('created_by',$createBy)->where('com_code',$com_code)->first();

        return view('repairs.index',compact('repair','setting'));

    }
    public function store(RepairFabricsRequest $request){
        try {
            $com_code=auth()->user()->com_code;

            $data=Repair_fabrics::where(['no_invoics'=>$request->no_invoics,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
            }

            $data['com_code']=$com_code;
            $data['no_invoics']=$request->no_invoics;
            $data['name']=$request->name;
            $data['date']=$request->date;
            $data['phone']=$request->phone;
            $data['code']=$request->code;
            $data['payment']=$request->payment;
            $data['delivery_date']=$request->delivery_date;
            $data['value']=$request->value;
            $data['number_repairs']=$request->number_repairs;
            $data['repair']=$request->repair;

            Repair_fabrics::create($data);
            session()->flash('Add', 'تمت اضافة المشتريات بنجاح');
            return redirect()->back();



        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما' )->withInput();


        }
        }

    public function update(RepairFabricsRequest $request){
        try{
         $id=$request->id;
        $com_code=auth()->user()->com_code;
        $data=Repair_fabrics::where(['id'=>$id,'com_code'=>$com_code])->first();

        if ($data=='') {
            return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
        }
        $data=Repair_fabrics::where(['code'=>$request->code,'com_code'=>$com_code])->where('id','!=',$id)->first();

        if ($data) {
            return redirect()->back()->with('Error','كود القماش مسجل من قبل')->withInput();
        }
        $data=Repair_fabrics::where(['no_invoics'=>$request->no_invoics,'com_code'=>$com_code])->where('id','!=',$id)->first();
        if ($data) {
            return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
        }



        $data_update['com_code']=$com_code;
        $data_update['no_invoics']=$request->no_invoics;
        $data_update['name']=$request->name;
        $data_update['date']=$request->date;
        $data_update['phone']=$request->phone;
        $data_update['code']=$request->code;
        $data_update['payment']=$request->payment;
        $data_update['delivery_date']=$request->delivery_date;
        $data_update['value']=$request->value;
        $data_update['number_repairs']=$request->number_repairs;
        $data_update['repair']=$request->repair;

        Repair_fabrics::where(['id'=>$id,'com_code'=>$com_code])->update($data_update);
        session()->flash('edit', 'تمت تعديل التصليحات بنجاح');
        return redirect()->back();



    } catch (\Exception $ex) {
        return redirect()->back()->with('Error','عفوا حدث خطاء ما' )->withInput();


    }

    }
    public function delete(Request $request){
        try {
            $id=$request->id;
            $com_code=auth()->user()->com_code;
            $data=Repair_fabrics::where(['id'=>$id,'com_code'=>$com_code])->first();
            if ($data=='') {
                return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
            }
            Repair_fabrics::where(['id'=>$id,'com_code'=>$com_code])->delete();
            session()->flash('delete','تم حذف التصليحات بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();

        }

    }
}
