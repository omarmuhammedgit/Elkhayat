<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $customers=Customer::where('com_code',$com_code)->get();
        return view('Customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try {
            $com_code=auth()->user()->com_code;
            $data=Customer::where(['name'=>$request->name,'com_code'=>$com_code])->first();
            if ($data != null) {
                return redirect()->back()->with('Error','عفوا اسم العميل مسجل من قبل ')->withInput();
            }
            $data_insert['name']=$request->name;
            $data_insert['phone']=$request->phone;
            $data_insert['email']=$request->email;
            $data_insert['code']=$request->code;
            $data_insert['com_code']=$com_code;

            Customer::create($data_insert);
            session()->flash('Add','تمت اضافةالعميل بنجاح');

            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage() )->withInput();

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {

    }

    public function getCustomercode($id){

        $customercode=DB::table('customers')->where('id',$id)->pluck('code');
        return json_encode($customercode);

    }
    public function detailCustomer($id){
        try {

            $com_code=auth()->user()->com_code;

            $info_size_customer=Size::where('customer_id',$id)->where('com_code',$com_code)->first();
            if (empty($info_size_customer)) {
                return redirect()->back()->with('Error',' عفوا لم يتم اجراء عملية بيع  لهذا العميل من قبل !')->withInput();

            }
            $info_size_customer_id=Size::where('customer_id',$id)->where('com_code',$com_code)->first()->id;
            $info_size_customer_id=Size::where('id',$info_size_customer_id)->where('com_code',$com_code)->first()->customer_id;
            $info_size_customers=Size::where('customer_id',$info_size_customer_id)->where('com_code',$com_code)->get();
// dd($info_size_customer_id);
            $discount=Size::where('customer_id',$info_size_customer_id)->sum('discount');
            $price_include_tax=Size::where('customer_id',$info_size_customer_id)->sum('afterdiscount');
            $price_doesnot_include_tax=Size::where('customer_id',$info_size_customer_id)->sum('price_doesnot_include_tax');
            $value_tax=Size::where('customer_id',$info_size_customer_id)->sum('value_tax');
            $receivedamount=Size::where('customer_id',$info_size_customer_id)->sum('receivedamount');
            $remainingamount=Size::where('customer_id',$info_size_customer_id)->sum('remainingamount');
            $price=Size::where('customer_id',$info_size_customer_id)->sum('discount');
            $number_dresses=Size::where('customer_id',$info_size_customer_id)->sum('number_dresses');

            return view('Customers.detail',compact(
                'info_size_customer','info_size_customers','discount',
                'price_include_tax','price_doesnot_include_tax',
                'value_tax','receivedamount','remainingamount','number_dresses'
            ));
        } catch (\Exception $ex) {

            return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();
        }
    }
    public function updateCustomer( CustomerRequest $request){
        try {
            $id=$request->id;
            $com_code=auth()->user()->com_code;
            $data=Customer::where(['name'=>$request->name,'com_code'=>$com_code])->where('id','!=',$id)->first();
            if ($data) {
                return redirect()->back()->with('Error','عفوا اسم العميل مسجل من قبل')->withInput();
            }
            $data_update['name']=$request->name;
            $data_update['code']=$request->code;
            $data_update['phone']=$request->phone;
            $data_update['email']=$request->email;
            $data_update['com_code']=$com_code;
            Customer::where(['id'=>$id,'com_code'=>$com_code])->update($data_update);
            session()->flash('edit','تمت تعديل العميل بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();

        }

    }

    public function delete(Request $request){
        try {
            $id=$request->id;
            $com_code=auth()->user()->com_code;
            $data=Customer::where(['id'=>$id,'com_code'=>$com_code])->first();
            if ($data=='') {
                return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات')->withInput();
            }
            Customer::where(['id'=>$id,'com_code'=>$com_code])->delete();
            session()->flash('delete','تم حذف العميل بنجاح');
            return redirect()->back();

        } catch (\Exception $ex) {
            return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();

        }

    }
    public function addCustomerAjax(Request $request){
        if ($request->ajax()) {
            $com_code=auth()->user()->com_code;$data=Customer::where(['name'=>$request->name,'com_code'=>$com_code])->first();
            if ($data) {
                return redirect()->back()->with('Error','عفوا اسم العميل مسجل من قبل')->withInput();
            }

            $data_insert['name']=$request->name;
            $data_insert['com_code']=$com_code;
            $data_insert['code']=$request->code;
            $data_insert['phone']=$request->phone;
            $data_insert['email']=$request->email;
            Customer::create($data_insert);

        $customer=Customer::where('com_code',$com_code)->orderBy('id','DESC')->get();
        $customercode=Customer::where('com_code',$com_code)->orderBy('id','DESC')->get();
             return view('Sales.Selling-point.add_customer_ajax',compact('customer','customercode'));






        }
    }


    public function reloadaddCustomerAjax(Request $request){
        if ($request->ajax()) {
             return view('Sales.Selling-point.load_add_customer_modal');

        }
    }

}
