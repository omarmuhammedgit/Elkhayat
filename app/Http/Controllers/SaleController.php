<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleRequest;
use App\Models\Customer;
use App\Models\design;
use App\Models\Fabrics;
use App\Models\Invoice;
use App\Models\Retribution;
use App\Models\Sale;
use App\Models\Seamoer;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Size;
use App\Models\TradeMark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Salla\ZATCA\GenerateQrCode;
use Salla\ZATCA\Tags\InvoiceDate;
use Salla\ZATCA\Tags\InvoiceTaxAmount;
use Salla\ZATCA\Tags\InvoiceTotalAmount;
use Salla\ZATCA\Tags\Seller;
use Salla\ZATCA\Tags\TaxNumber;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_code=auth()->user()->com_code;
        // $customers=Customer::where('com_code',$com_code)->orderBy('id','DESC')->get();
        $sizes=Size::where('com_code',$com_code)->orderBy('invoice_id','ASC')->get();
        return view('Sales.SaleMenu.salmenu',compact('sizes'));
    }
// دالة اضافة اكثر من ثوب وهي  دالة تقوم بتخزين الثوب الاول و جلب الفورم االطلب الثاني
    public function storeandaddrequest(SaleRequest $request)
    {
        try {
            $id = $request->customer;
            $com_code = auth()->user()->com_code;
            if ($request->number_dresses<=1) {
                return redirect()->back()->with('Error', 'يجب ان يكون عدد الثياب اكثر من ثوب')->withInput();
            }
            $detail_duration = $request->detail_duration;
            $time = time() + ($detail_duration * 24 * 60 * 60);
            $receved_data = date("Y/m/d", $time);


             $data_insert_inv['customer_id'] = $request->customer;
             $data_insert_inv['date'] = date("Y-m-d");
            $data_insert_inv['com_code'] = $com_code;
            $data_insert_inv['invoice_number'] = $request->invoice_number;
            $data_insert_inv['price_include_tax'] = $request->price_include_tax;
            $data_insert_inv['price_doesnot_include_tax'] = $request->price_doesnot_include_tax;
            $data_insert_inv['value_tax'] = $request->value_tax;
            $data_insert_inv['discount'] = $request->discount;
            $data_insert_inv['tex_parcent'] = $request->tex_parcent;
            $data_insert_inv['afterdiscount'] = $request->afterdiscount;
            $data_insert_inv['receivedamount'] = $request->receivedamount;
            $data_insert_inv['remainingamount'] = $request->remainingamount;
            $data_insert_inv['number_dresses']=$request->number_dresses;
            $data_insert_inv['detail_duration']=$request->detail_duration;
            $data_insert_inv['receved_data']=$receved_data;
            if ($request->receivedamount == $request->afterdiscount) {
                $data_insert_inv['status'] = 'مدفوعة';
            } elseif ($request->receivedamount == 0) {
                $data_insert_inv['status'] = 'غير مدفوعة';
            } else {
                $data_insert_inv['status'] = 'مدفوعة جزئيا';
            }
            Invoice::create($data_insert_inv);
            $invoice_id = Invoice::where('com_code', $com_code)->latest('id')->first()->id;

            $data_insert['customer_id'] = $request->customer;
            $data_insert['com_code'] = $com_code;
            $data_insert['number_dresses'] = $request->number_dresses;
            $data_insert['detail_duration'] = $request->detail_duration;
            $data_insert['date'] = $request->date;
            $data_insert['invoice_id'] = $invoice_id;
            $data_insert['height'] = $request->height;
            $data_insert['shoulder'] = $request->shoulder;
            $data_insert['shoulder_leight'] = $request->shoulder_leight;
            $data_insert['brest'] = $request->brest;
            $data_insert['expand_brest'] = $request->expand_brest;
            $data_insert['neck'] = $request->neck;
            $data_insert['expand_hand'] = $request->expand_hand;
            $data_insert['down_hand'] = $request->down_hand;
            $data_insert['cbk_leight'] = $request->cbk_leight;
            $data_insert['cbk_width'] = $request->cbk_width;
            $data_insert['pocket_leight'] = $request->pocket_leight;
            $data_insert['pocket_expand'] = $request->pocket_expand;
            $data_insert['down_expand'] = $request->down_expand;
            $data_insert['down_desist'] = $request->down_desist;
            $data_insert['image_neck'] = $request->image_neck;
            $data_insert['image_cbk'] = $request->imagecbk;
            $data_insert['image_brest_pocket'] = $request->image_brest_pocket;
            $data_insert['image_pocket'] = $request->image_pocket;
            $data_insert['image_algizour'] = $request->image_algizour;
            $data_insert['seamtress'] = $request->seamtress;
            $data_insert['seamoer_id'] = $request->seamoer;
            $data_insert['retribution_id'] = $request->retribution;
            $data_insert['design'] = $request->name_design;
            $data_insert['fabric'] = $request->type_fabrice;
            $data_insert['section'] = $request->name_section;
            $data_insert['trade_mark'] = $request->name_trade_mark;
            $data_insert['color_fabrice'] = $request->color_fabrice;
            $data_insert['size_neck'] = $request->size_neck;
            $data_insert['size_cbk'] = $request->size_cbk;
            $data_insert['size_brest_pocket'] = $request->size_brest_pocket;
            $data_insert['size_pocket'] = $request->size_pocket;
            $data_insert['size_algizour'] = $request->size_algizour;
            $data_insert['price_include_tax'] = $request->price_include_tax;
            $data_insert['price_doesnot_include_tax'] = $request->price_doesnot_include_tax;
            $data_insert['value_tax'] = $request->value_tax;
            $data_insert['notes'] = $request->notes;
            $data_insert['discount'] = $request->discount;
            $data_insert['afterdiscount'] = $request->afterdiscount;
            $data_insert['receivedamount'] = $request->receivedamount;
            $data_insert['remainingamount'] = $request->remainingamount;
            $data_insert['payment'] = $request->payment;
            $data_insert['receved_data'] = $receved_data;
            if ($request->receivedamount == $request->afterdiscount) {
                $data_insert['status'] = 'مدفوعة';
            } elseif ($request->receivedamount == 0) {
                $data_insert['status'] = 'غير مدفوعة';
            } else {
                $data_insert['status'] = 'مدفوعة جزئيا';
            }

            $flag = Size::create($data_insert);
            if ($flag) {
                session()->flash('Add', 'تمت اضافة البيانات الطلب الاول بنجاح');
                return redirect()->route('Sale-menu-getViewAddrequest',$invoice_id);



            }
        } catch (\Exception $ex) {
            // throw $th;
            return redirect()->back()->with('Error', 'عفوا حدث خطاء ما' . $ex->getMessage())->withInput();
        }
    }
    public function getViewAddrequest($invoice_id)
    {
        $com_code=auth()->user()->com_code;
        $customer_size = Size::where(['com_code'=>$com_code,'invoice_id'=>$invoice_id])->latest()->first();
        $designs = design::where('com_code', $com_code)->get();
        $sections = Section::where('com_code', $com_code)->get();
        $fabrices = Fabrics::where('com_code', $com_code)->get();
        $trademarks = TradeMark::where('com_code', $com_code)->get();
        $retributions = Retribution::where('com_code', $com_code)->get();
        $seamoers = Seamoer::where('com_code', $com_code)->get();
        return view(
            'Sales.Selling-point.add-requiest',
            compact('customer_size', 'designs', 'sections', 'fabrices', 'trademarks', 'retributions', 'seamoers')
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sales.SaleReference.salereference');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
    }
    public function storeSecandrequesr(SaleRequest $request)
    {
        try {
        $id=$request->customer;
        $com_code=auth()->user()->com_code;


        $detail_duration=$request->detail_duration;
        $time=time()+($detail_duration *24 *60 *60);
        $receved_data=date("Y/m/d",$time);


        $data_insert['customer_id']=$request->customer;
        $data_insert['com_code']=$com_code;
        $data_insert['number_dresses']=$request->number_dresses;
        $data_insert['detail_duration']=$request->detail_duration;
        $data_insert['date']=$request->date;
        $data_insert['invoice_id']=$request->invoice_number;
        $data_insert['height']=$request->height;
        $data_insert['shoulder']=$request->shoulder;
        $data_insert['shoulder_leight']=$request->shoulder_leight;
        $data_insert['brest']=$request->brest;
        $data_insert['expand_brest']=$request->expand_brest;
        $data_insert['neck']=$request->neck;
        $data_insert['expand_hand']=$request->expand_hand;
        $data_insert['down_hand']=$request->down_hand;
        $data_insert['cbk_leight']=$request->cbk_leight;
        $data_insert['cbk_width']=$request->cbk_width;
        $data_insert['pocket_leight']=$request->pocket_leight;
        $data_insert['pocket_expand']=$request->pocket_expand;
        $data_insert['down_expand']=$request->down_expand;
        $data_insert['down_desist']=$request->down_desist;
        $data_insert['image_neck']=$request->image_neck;
        $data_insert['image_cbk']=$request->imagecbk;
        $data_insert['image_brest_pocket']=$request->image_brest_pocket;
        $data_insert['image_pocket']=$request->image_pocket;
        $data_insert['image_algizour']=$request->image_algizour;
        $data_insert['seamtress']=$request->seamtress;
        $data_insert['seamoer_id']=$request->seamoer;
        $data_insert['retribution_id']=$request->retribution;
        $data_insert['design']=$request->name_design;
        $data_insert['fabric']=$request->type_fabrice;
        $data_insert['section']=$request->name_section;
        $data_insert['trade_mark']=$request->name_trade_mark;
        $data_insert['color_fabrice']=$request->color_fabrice;
        $data_insert['size_neck']=$request->size_neck;
        $data_insert['size_cbk']=$request->size_cbk;
        $data_insert['size_brest_pocket']=$request->size_brest_pocket;
        $data_insert['size_pocket']=$request->size_pocket;
        $data_insert['size_algizour']=$request->size_algizour;
        $data_insert['price_include_tax']=$request->price_include_tax;
        $data_insert['price_doesnot_include_tax']=$request->price_doesnot_include_tax;
        $data_insert['value_tax']=$request->value_tax;
        $data_insert['notes']=$request->notes;
        $data_insert['discount']=$request->discount;
        $data_insert['afterdiscount']=$request->afterdiscount;
        $data_insert['receivedamount']=$request->receivedamount;
        $data_insert['remainingamount']=$request->remainingamount;
        $data_insert['payment']=$request->payment;
        $data_insert['receved_data']=$receved_data;
        if ($request->receivedamount ==$request->afterdiscount) {
            $data_insert['status']='مدفوعة';
            } elseif ($request->receivedamount == 0) {
                $data_insert['status']='غير مدفوعة';

            } else{
                $data_insert['status']='مدفوعة جزئيا';

            }

      $flag=Size::create($data_insert);
      if ($flag) {
        # update invoice

        $data_invoivce_old=Invoice::select('price_include_tax','price_doesnot_include_tax','value_tax','discount','tex_parcent','afterdiscount','receivedamount','remainingamount')->where(['com_code'=>$com_code,'id'=>$request->invoice_number])->first();
if (!empty($data_invoivce_old)) {
    $data_update_inv['com_code'] = $com_code;
    $data_update_inv['invoice_number'] = $request->invoice_number;

    $data_update_inv['tex_parcent'] =$data_invoivce_old['tex_parcent'] + $request->tex_parcent;
    $data_update_inv['price_include_tax'] =$data_invoivce_old['price_include_tax'] + $request->price_include_tax;
    $data_update_inv['price_doesnot_include_tax'] =$data_invoivce_old['price_doesnot_include_tax'] + $request->price_doesnot_include_tax;
    $data_update_inv['value_tax'] =$data_invoivce_old['value_tax'] + $request->value_tax;
    $data_update_inv['discount'] =$data_invoivce_old['discount'] + $request->discount;
    $data_update_inv['afterdiscount'] =$data_invoivce_old['afterdiscount'] + $request->afterdiscount;
    $data_update_inv['receivedamount'] =$data_invoivce_old['receivedamount'] + $request->receivedamount;
    $data_update_inv['remainingamount'] =$data_invoivce_old['remainingamount'] + $request->remainingamount;
    if ($request->receivedamount == $request->afterdiscount) {
        $data_update_inv['status'] = 'مدفوعة';
    } elseif ($request->receivedamount == 0) {
        $data_update_inv['status'] = 'غير مدفوعة';
    } else {
        $data_update_inv['status'] = ' مدفوعة جزئيا';
    }


    Invoice::where(['com_code'=>$com_code,'id'=>$request->invoice_number])->update($data_update_inv);

    $id=Size::latest('id')->where('com_code',$com_code)->first()->id;

    $info_size_customer=Size::where('id',$id)->where('com_code',$com_code)->first();
    $info_size_customer_id=Size::where('id',$id)->where('com_code',$com_code)->first()->invoice_id;
    $info_size_customers=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->get();
    $discount=Size::where('invoice_id',$info_size_customer_id)->sum('discount');
    $price_include_tax=Size::where('invoice_id',$info_size_customer_id)->sum('afterdiscount');
    $price_doesnot_include_tax=Size::where('invoice_id',$info_size_customer_id)->sum('price_doesnot_include_tax');
    $value_tax=Size::where('invoice_id',$info_size_customer_id)->sum('value_tax');
    $receivedamount=Size::where('invoice_id',$info_size_customer_id)->sum('receivedamount');
    $remainingamount=Size::where('invoice_id',$info_size_customer_id)->sum('remainingamount');
    $price=Size::where('invoice_id',$info_size_customer_id)->sum('discount');
    $number_dresses=Size::where('customer_id',$info_size_customer_id)->sum('number_dresses');

    $createBy=auth()->user()->name;
    $setting=Setting::where('created_by',$createBy)->where('com_code',$com_code)->first();

     // data:image/png;base64, .........
     if($setting){
     $displayQRCodeAsBase64 = GenerateQrCode::fromArray([
        new Seller($setting->name), // seller name
        new TaxNumber($setting->commercial_record), // seller tax number
        new InvoiceDate(date('Y/m/d h:i:s')), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
        new InvoiceTotalAmount($price_include_tax), // invoice total amount
        new InvoiceTaxAmount($value_tax) // invoice tax amount
        // TODO :: Support others tags
    ])->render();

     }else{
        $displayQRCodeAsBase64=1;

     }

    return view('Invoices.invoices',compact('setting',
        'info_size_customer','info_size_customers','discount',
        'price_include_tax','price_doesnot_include_tax',
        'value_tax','receivedamount','remainingamount','displayQRCodeAsBase64','number_dresses'
    ));
  }else{
    return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات  ')->withInput();


  }
    # code...
}

} catch (\Exception $ex) {
    // throw $th;
    return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();
      }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
    public function printInvoice($id){
        try {

        $com_code=auth()->user()->com_code;
        $info_size_customer=Size::where('id',$id)->where('com_code',$com_code)->first();
        $info_size_customer_id=Size::where('id',$id)->where('com_code',$com_code)->first()->invoice_id;
        $info_size_customers=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->get();
        $discount=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('discount');
        $price_include_tax=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('afterdiscount');
        $price_doesnot_include_tax=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('price_doesnot_include_tax');
        $value_tax=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('value_tax');
        $receivedamount=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('receivedamount');
        $remainingamount=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('remainingamount');
        $price=Size::where('invoice_id',$info_size_customer_id)->where('com_code',$com_code)->sum('discount');
        $number_dresses=Size::where('customer_id',$info_size_customer_id)->where('com_code',$com_code)->sum('number_dresses');

        $createBy=auth()->user()->name;
        $setting=Setting::where('created_by',$createBy)->where('com_code',$com_code)->first();

        if (!empty($setting)) {


        // data:image/png;base64, .........
$displayQRCodeAsBase64 = GenerateQrCode::fromArray([
    new Seller($setting->name), // seller name
    new TaxNumber($setting->commercial_record), // seller tax number
    new InvoiceDate(date('Y/m/d h:i:s')), // invoice date as Zulu ISO8601 @see https://en.wikipedia.org/wiki/ISO_8601
    new InvoiceTotalAmount($price_include_tax), // invoice total amount
    new InvoiceTaxAmount($value_tax) // invoice tax amount
    // TODO :: Support others tags
])->render();
}else{        $displayQRCodeAsBase64=111;
}

        // $info_size_customers= DB::table("sizes")->where('customer_id',$info_size_customer_id)->get();



        return view('Invoices.invoices',compact('setting',
            'info_size_customer','info_size_customers','discount',
            'price_include_tax','price_doesnot_include_tax',
            'value_tax','receivedamount','remainingamount','displayQRCodeAsBase64','number_dresses'
        ));
    } catch (\Exception $ex) {
        // throw $th;
        return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();
    }
        // // return $price;

    }
    public function editSale($id)
    {
        try{
        $com_code=auth()->user()->com_code;
        $info_size_customer=Size::where('id',$id)->where('com_code',$com_code)->first();
        $customers=Customer::where('com_code',$com_code)->get();
        $designs=design::where('com_code',$com_code)->get();
        $sections=Section::where('com_code',$com_code)->get();
        $fabrices=Fabrics::where('com_code',$com_code)->get();
        $trademarks=TradeMark::where('com_code',$com_code)->get();
        $retributions=Retribution::where('com_code',$com_code)->get();
        $seamoers=Seamoer::where('com_code',$com_code)->get();
        return view('Sales.Selling-point.edit-selling-point',
        compact('customers','info_size_customer','designs','sections','fabrices','trademarks','retributions','seamoers'));
    } catch (\Exception $ex) {
        // throw $th;
        return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();
    }
    }
    public function updateSale(SaleRequest $request)
    {
        try{
        $size=$request->size;
        $detail_duration=$request->detail_duration;
        $time=time()+($detail_duration *24 *60 *60);
        $receved_data=date("Y/m/d",$time);
        $com_code=auth()->user()->com_code;

        $data_update_inv['price_include_tax']=$request->price_include_tax;
        $data_update_inv['price_doesnot_include_tax']=$request->price_doesnot_include_tax;
        $data_update_inv['value_tax']=$request->value_tax;
        $data_update_inv['notes']=$request->notes;
        $data_update_inv['discount']=$request->discount;
        $data_update_inv['afterdiscount']=$request->afterdiscount;
        $data_update_inv['receivedamount']=$request->receivedamount;
        $data_update_inv['remainingamount']=$request->remainingamount;
        $data_update_inv['com_code']=$com_code;
        $data_update_inv['invoice_number']=$request->invoice_number;
        $data_update_inv['number_dresses']=$request->number_dresses;
        $data_update_inv['detail_duration']=$request->detail_duration;
        $data_update_inv['receved_data']=$receved_data;
        if ($request->receivedamount ==$request->afterdiscount) {
        $data_update_inv['status']='مدفوعة';
        } elseif ($request->receivedamount == 0) {
            $data_update_inv['status']='غير مدفوعة';

        } else{
            $data_update_inv['status']='مدفوعة جزئيا';

        }

        $invoice_number=$request->invoice_number;
        Invoice::where(['invoice_number'=>$invoice_number,'com_code'=>$com_code])->update($data_update_inv);
        $invoice_number=Invoice::where(['invoice_number'=>$invoice_number,'com_code'=>$com_code])->value('id');
        // dd($invoice_number);


        $size_id=$request->size_id;

        $data_update['customer_id']=$request->customer;
        $data_update['com_code']=$com_code;
        $data_update['number_dresses']=$request->number_dresses;
        $data_update['detail_duration']=$request->detail_duration;
        $data_update['date']=$request->date;
        $data_update['invoice_id']=$invoice_number;
        $data_update['height']=$request->height;
        $data_update['shoulder']=$request->shoulder;
        $data_update['shoulder_leight']=$request->shoulder_leight;
        $data_update['brest']=$request->brest;
        $data_update['expand_brest']=$request->expand_brest;
        $data_update['neck']=$request->neck;
        $data_update['expand_hand']=$request->expand_hand;
        $data_update['down_hand']=$request->down_hand;
        $data_update['cbk_leight']=$request->cbk_leight;
        $data_update['cbk_width']=$request->cbk_width;
        $data_update['pocket_leight']=$request->pocket_leight;
        $data_update['pocket_expand']=$request->pocket_expand;
        $data_update['down_expand']=$request->down_expand;
        $data_update['down_desist']=$request->down_desist;
        $data_update['image_neck']=$request->image_neck;
        $data_update['image_cbk']=$request->imagecbk;
        $data_update['image_brest_pocket']=$request->image_brest_pocket;
        $data_update['image_pocket']=$request->image_pocket;
        $data_update['image_algizour']=$request->image_algizour;
        $data_update['seamtress']=$request->seamtress;
        $data_update['seamoer_id']=$request->seamoer;
        $data_update['retribution_id']=$request->retribution;
        $data_update['design']=$request->name_design;
        $data_update['fabric']=$request->type_fabrice;
        $data_update['section']=$request->name_section;
        $data_update['trade_mark']=$request->name_trade_mark;
        $data_update['color_fabrice']=$request->color_fabrice;
        $data_update['size_neck']=$request->size_neck;
        $data_update['size_cbk']=$request->size_cbk;
        $data_update['size_brest_pocket']=$request->size_brest_pocket;
        $data_update['size_pocket']=$request->size_pocket;
        $data_update['size_algizour']=$request->size_algizour;
        $data_update['price_include_tax']=$request->price_include_tax;
        $data_update['price_doesnot_include_tax']=$request->price_doesnot_include_tax;
        $data_update['value_tax']=$request->value_tax;
        $data_update['notes']=$request->notes;
        $data_update['discount']=$request->discount;
        $data_update['afterdiscount']=$request->afterdiscount;
        $data_update['receivedamount']=$request->receivedamount;
        $data_update['remainingamount']=$request->remainingamount;
        $data_update['payment']=$request->payment;
        $data_update['receved_data']=$receved_data;
        if ($request->receivedamount ==$request->afterdiscount) {
            $data_update['status']='مدفوعة';
            } elseif ($request->receivedamount == 0) {
                $data_update['status']='غير مدفوعة';

            } else{
                $data_update['status']='مدفوعة جزئيا';

            }

        Size::where(['id'=>$size_id,'com_code'=>$com_code])->update($data_update);
        session()->flash('edit','تم تعديل البيانات بنجاح');
        $sizes=Size::where('com_code',$com_code)->get();
        return view('Sales.SaleMenu.salmenu',compact('sizes'));
    } catch (\Exception $ex) {
        // throw $th;
        return redirect()->back()->with('Error','عفوا حدث خطاء ما'.$ex->getMessage())->withInput();
    }
    }
    public function deleteSale(Request $request)
    {
        $id=$request->id;
        $com_code=auth()->user()->com_code;
       $invoice_id= Size::where(['id'=>$id,'com_code'=>$com_code])->first()->invoice_id;
       if (empty($invoice_id)) {
        return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات  ');
       }
      $flag=Invoice::where(['id'=>$invoice_id,'com_code'=>$com_code])->delete();

      if ($flag) {
        session()->flash('delete','تم حذف البيانات بنجاح');
        return redirect('/Sale-menu');
      } else {
        return redirect()->back()->with('Error','عفوا غير قادر على الوصول لي البيانات  ');
      }
        session()->flash('delete','تم حذف البيانات بنجاح');
        return redirect('/Sale-menu');
    }
     public function updateCal(Request $request){
        $id =$request->id;
        $com_code=auth()->user()->com_code;
        $invoice_id=Size::where(['id'=>$id,'com_code'=>$com_code])->first()->invoice_id;
        $data_update_inv['receivedamount']=$request->receivedamount;
        $data_update_inv['remainingamount']=$request->remainingamount;
        if ($request->receivedamount ==$request->afterdiscount) {
            $data_update_inv['status']='مدفوعة';
            } elseif ($request->receivedamount == 0) {
                $data_update_inv['status']='غير مدفوعة';

            } else{
                $data_update_inv['status']='مدفوعة جزئيا';

            }

            $invoice_number=$request->invoice_number;
            Invoice::where(['id'=>$invoice_id,'com_code'=>$com_code])->update($data_update_inv);
            $invoice_number=Invoice::where(['id'=>$invoice_id,'com_code'=>$com_code])->value('id');

            $data_update['receivedamount']=$request->receivedamount;
            $data_update['remainingamount']=$request->remainingamount;
            if ($request->receivedamount ==$request->afterdiscount) {
                $data_update['status']='مدفوعة';
                } elseif ($request->receivedamount == 0) {
                    $data_update['status']='غير مدفوعة';

                } else{
                    $data_update['status']='مدفوعة جزئيا';

                }
        Size::where(['id'=>$id,'com_code'=>$com_code])->update($data_update);
        session()->flash('edit','تم تحديث البيانات بنجاح');
        return redirect('/Sale-menu');
     }

}
