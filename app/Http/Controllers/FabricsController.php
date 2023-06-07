<?php

namespace App\Http\Controllers;

use App\Http\Requests\FabricsRequest;
use App\Models\Fabrics;
use App\Models\Invoices_purchases;
use App\Models\Supplier;
use Illuminate\Http\Request;

class FabricsController extends Controller
{
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $fabrices=Fabrics::select()->where('com_code',$com_code)->get();
        $suppliers=Supplier::select()->where('com_code',$com_code)->get();
        return view('Purchases.index',compact('fabrices','suppliers'));

    }
    public function create(){
        $com_code=auth()->user()->com_code;
        $suppliers=Supplier::select()->where('com_code',$com_code)->get();
        return view('Purchases.create',compact('suppliers'));

    }
    public function store(FabricsRequest $request){
        try {
            $com_code=auth()->user()->com_code;
            $data=Fabrics::where(['code'=>$request->code,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','كود القماش مسجل من قبل')->withInput();
            }
            $data=Invoices_purchases::where(['invoice_number'=>$request->invoices_purchases_id,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
            }
            Invoices_purchases::create([
                'invoice_number'=>$request->invoices_purchases_id,
                'date'=>date('Y/m/d'),
                'com_code'=>$com_code
            ]);

            $data['com_code']=$com_code;
            $data['invoices_purchases_id']=$request->invoices_purchases_id;
            $data['code']=$request->code;
            $data['supplier_id']=$request->supplier_id;
            $data['name']=$request->name;
            $data['mark']=$request->mark;
            $data['energies']=$request->energies;
            $data['yards']=$request->yards;
            $data['meters']=$request->meters;
            $data['total']=$request->total;
            $data['value_tax']=$request->value_tax;
            $data['balance_yard']=$request->balance_yard;
            $data['rate_tax']=$request->rate_tax;
            $data['receivedamount']=$request->receivedamount;
            $data['remainingamount']=$request->remainingamount;
            $data['color']=$request->color;

            Fabrics::create($data);
            session()->flash('Add', 'تمت اضافة المشتريات بنجاح');
            return redirect()->route('fabrice-index');



        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما' )->withInput();


        }


    }
    public function edit($id){

        $com_code=auth()->user()->com_code;
        $fabrices=Fabrics::where(['id'=>$id,'com_code'=>$com_code])->first();
        $suppliers=Supplier::select()->where('com_code',$com_code)->get();
        return view('Purchases.edit',compact('fabrices','suppliers'));
    }
    public function update(FabricsRequest $request){
        try{
         $id=$request->id;
        $com_code=auth()->user()->com_code;
        $data=Fabrics::where(['id'=>$id,'com_code'=>$com_code])->first();

        if ($data=='') {
            return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
        }
        $data=Fabrics::where(['code'=>$request->code,'com_code'=>$com_code])->where('id','!=',$id)->first();

        if ($data) {
            return redirect()->back()->with('Error','كود القماش مسجل من قبل')->withInput();
        }
        $data=Invoices_purchases::where(['invoice_number'=>$request->invoices_purchases_id,'com_code'=>$com_code])->where('id','!=',$id)->first();
        if ($data) {
            return redirect()->back()->with('Error','رقم الفاتورة مسجل من قبل')->withInput();
        }
        Invoices_purchases::where(['id'=>$id,'com_code'=>$com_code])->update([
            'invoice_number'=>$request->invoices_purchases_id,
            'date'=>date('Y/m/d'),
            'com_code'=>$com_code
        ]);

        $data_update['com_code']=$com_code;
        $data_update['invoices_purchases_id']=$request->invoices_purchases_id;
        $data_update['code']=$request->code;
        $data_update['supplier_id']=$request->supplier_id;
        $data_update['name']=$request->name;
        $data_update['mark']=$request->mark;
        $data_update['energies']=$request->energies;
        $data_update['yards']=$request->yards;
        $data_update['meters']=$request->meters;
        $data_update['total']=$request->total;
        $data_update['value_tax']=$request->value_tax;
        $data_update['balance_yard']=$request->balance_yard;
        $data_update['rate_tax']=$request->rate_tax;
        $data_update['receivedamount']=$request->receivedamount;
        $data_update['remainingamount']=$request->remainingamount;
        $data_update['color']=$request->color;

        Fabrics::where(['id'=>$id,'com_code'=>$com_code])->update($data_update);
        session()->flash('edit', 'تمت تعديل المشتريات بنجاح');
        return redirect()->route('fabrice-index');



    } catch (\Exception $ex) {
        return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();


    }

    }
    public function delete(FabricsRequest $request){
        try {
            $id=$request->id;
            $com_code=auth()->user()->com_code;
            $data=Supplier::where(['id'=>$id,'com_code'=>$com_code])->first();
            if ($data=='') {
                return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
            }
            Supplier::where(['id'=>$id,'com_code'=>$com_code])->delete();
            session()->flash('delete','تم حذف القماش بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();

        }

    }
}
