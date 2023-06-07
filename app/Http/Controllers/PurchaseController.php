<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=Purchase::all();
        return view('Purchases.purchasesMenu',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Purchases.add-purchases');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|max:255',
            'status_purchase' => 'required|max:255',
            'Reference_number'=>'required|unique:purchases|max:20',
            'payment_period1'=>'required',
            'sub'=>'required',
        ],[
           'name_product.required'=>'يرجى ادخال اسم المنتج',
           'sub_site.required'=>'يرجى ادخال اسم الموقع الفرعي',
           'Reference_number.unique'=>'رقم المرجعي موجود مسبقأ',
           'total_opening_balance.required'=>'يرجى ادخال رقم المنشاة',
           'no_product.required'=>'يرجى ادخال رقم المنتج',
           'quantity_alert.required'=>'يرجى ادخال تنبيه الكمية'


        ]);

        Purchase::create([
            'Reference_number'=>$request->Reference_number,
            'data_purchase'=>$request->data_purchase,
            'status_purchase'=>$request->status_purchase,
            'address'=>$request->address,
            'sub'=>$request->sub,
            'payment_period1'=>$request->payment_period1,
            'discount_type'=>$request->discount_type,
            'status_payment'=>'تاخير',
            'create_by'=>Auth::user()->name,
            'supplier_id'=>$request->supplier_id,
            'product_id'=>$request->product_id,
            'value_discount'=>$request->value_discount,
            'tax_purchase'=>$request->tax_purchase,
            'comments_add'=>$request->comments_add,
            'amount'=>$request->amount,
            'datePayment'=>$request->datePayment,
            'payment_method'=>$request->payment_method,
            'account'=>$request->account,
            'payment_comments'=>$request->payment_comments
        ]);

        session()->flash('Add','تمت اضافة الشراء بنجاح');
        return redirect('purchases-menu');

        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('Purchases.purchasesReference');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return 123;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
    public function editpurchases($id)
    {
        $purchase=Purchase::where('id',$id)->first();

        return view('Purchases.edit-purchases',compact('purchase'));
    }
    public function updatepurchases(Request $request)
    {
        $id=$request->id;
        Purchase::find($id)->update([
            'Reference_number'=>$request->Reference_number,
            'data_purchase'=>$request->data_purchase,
            'status_purchase'=>$request->status_purchase,
            'address'=>$request->address,
            'sub'=>$request->sub,
            'payment_period1'=>$request->payment_period1,
            'discount_type'=>$request->discount_type,
            'status_payment'=>'تاخير',
            'create_by'=>Auth::user()->name,
            'supplier_id'=>$request->supplier_id,
            'product_id'=>$request->product_id,
            'value_discount'=>$request->value_discount,
            'tax_purchase'=>$request->tax_purchase,
            'comments_add'=>$request->comments_add,
            'amount'=>$request->amount,
            'datePayment'=>$request->datePayment,
            'payment_method'=>$request->payment_method,
            'account'=>$request->account,
            'payment_comments'=>$request->payment_comments
        ]);
        session()->flash('edit','تمت تعديل المشتريات بنجاح');
        $purchases=Purchase::all();
        return view('Purchases.purchasesMenu',compact('purchases'));
    }
    public function deletepurchases(Request $request)
    {
        $id=$request->id;
        Purchase::find($id)->delete();
        session()->flash('delete','تم حذف المشتريات بنجاح');
        return redirect('/purchases-menu');
    }
}
