<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleFabricsRequest;
use App\Models\Fabrics;
use App\Models\SaleFabrics;
use App\Models\Setting;
use Illuminate\Http\Request;

class SaleFabricsController extends Controller
{
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $salefabrices=SaleFabrics::select()->where('com_code',$com_code)->get();
        $fabrics=Fabrics::where('com_code',$com_code)->get();
        $fabricupdate=Fabrics::where('com_code',$com_code)->get();
         $createBy=auth()->user()->name;
        $setting=Setting::where('created_by',$createBy)->where('com_code',$com_code)->first();

        return view('saleFabrics.index',compact('salefabrices','fabrics','setting','fabricupdate'));

    }
    public function store(SaleFabricsRequest $request){
        try {
            $com_code=auth()->user()->com_code;

            $data=SaleFabrics::where(['no_invoics'=>$request->no_invoics,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
            }

            $data['com_code']=$com_code;
            $data['no_invoics']=$request->no_invoics;
            $data['name']=$request->name;
            $data['date']=$request->date;
            $data['payment']=$request->payment;
            $data['quantity_available']=$request->quantity_available;
            $data['value']=$request->value;
            $data['quantity_sold']=$request->quantity_sold;
            $data['color']=$request->color;

            SaleFabrics::create($data);
            session()->flash('Add', 'تمت اضافة المشتريات بنجاح');
            return redirect()->back();



        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما' )->withInput();


        }
        }
    public function ajax_fabrics(Request $request){
        if($request->ajax()){
            $com_code=auth()->user()->com_code;
            $search_by_text=$request->search_by_text;
            $fabrices=Fabrics::where('name',$search_by_text)->first();
            $fabric=Fabrics::where('com_code',$com_code)->get();


            return view('saleFabrics.ajax_color',['fabrices'=>$fabrices,'fabric'=>$fabric]);
        }
    }

    public function update(SaleFabricsRequest $request){
        try{
         $id=$request->id;
        $com_code=auth()->user()->com_code;
        $data=SaleFabrics::where(['id'=>$id,'com_code'=>$com_code])->first();

        if ($data=='') {
            return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
        }
        $data=SaleFabrics::where(['no_invoics'=>$request->no_invoics,'com_code'=>$com_code])->where('id','!=',$id)->first();
        if ($data) {
            return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
        }



        $data_update['com_code']=$com_code;
        $data_update['no_invoics']=$request->no_invoics;
        $data_update['name']=$request->name;
        $data_update['date']=$request->date;
        $data_update['payment']=$request->payment;
        $data_update['quantity_available']=$request->quantity_available;
        $data_update['value']=$request->value;
        $data_update['quantity_sold']=$request->quantity_sold;
        $data_update['color']=$request->color;


        SaleFabrics::where(['id'=>$id,'com_code'=>$com_code])->update($data_update);
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
            $data=SaleFabrics::where(['id'=>$id,'com_code'=>$com_code])->first();
            if ($data=='') {
                return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
            }
            SaleFabrics::where(['id'=>$id,'com_code'=>$com_code])->delete();
            session()->flash('delete','تم حذف التصليحات بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();

        }

    }
}
