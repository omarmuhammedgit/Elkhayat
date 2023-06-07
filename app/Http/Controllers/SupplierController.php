<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
        $supplier=Supplier::where('com_code',$com_code)->get();
        return view('Suppliers.index',['supplier'=>$supplier]);

    }
    public function create(){

    }
    public function store(Request $request){
        try {
            $com_code=auth()->user()->com_code;
            $data=Supplier::where(['code'=>$request->code,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','كود المورد مسجل من قبل')->withInput();
            }
            $data['name']=$request->name;
            $data['code']=$request->code;
            $data['address']=$request->address;
            $data['phone']=$request->phone;
            $data['date']=$request->date;
            $data['com_code']=$com_code;
            Supplier::create($data);
            session()->flash('Add','تمت اضافة الموردين بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();

        }

    }
    public function edit($id){

    }
    public function update( Request $request){
        try {
            $id=$request->id;
            $com_code=auth()->user()->com_code;
            $data=Supplier::where(['code'=>$request->code,'com_code'=>$com_code])->where('id','!=',$id)->first();
            if ($data) {
                return redirect()->back()->with('Error','كود المورد مسجل من قبل')->withInput();
            }
            $data_update['name']=$request->name;
            $data_update['code']=$request->code;
            $data_update['address']=$request->address;
            $data_update['phone']=$request->phone;
            $data_update['date']=$request->date;
            $data_update['com_code']=$com_code;
            Supplier::where(['id'=>$id,'com_code'=>$com_code])->update($data_update);
            session()->flash('edit','تمت تعديل المورد بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();

        }

    }
    public function delete(Request $request){
        try {
            $id=$request->id;
            $com_code=auth()->user()->com_code;
            $data=Supplier::where(['id'=>$id,'com_code'=>$com_code])->first();
            if ($data=='') {
                return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
            }
            Supplier::where(['id'=>$id,'com_code'=>$com_code])->delete();
            session()->flash('delete','تم حذف المورد بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();

        }

    }
}
