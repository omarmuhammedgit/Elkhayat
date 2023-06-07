<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use App\Models\TradeMark;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();

       return view('Products.product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tradeMarks=TradeMark::all();
        $sections=Section::all();
        $units=Unit::all();
        return view('Products.product.create-product',compact('tradeMarks','sections','units'));
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
            'name_product' => 'required|max:255',
            'sub_site' => 'required|max:255',
            'no_product'=>'required|unique:products|max:20',
            'total_opening_balance'=>'required',
            'trademark_id'=>'required',
            'section_id'=>'required',
            'unit_id'=>'required'

        ],[
           'name_product.required'=>'يرجى ادخال اسم المنتج',
           'sub_site.required'=>'يرجى ادخال اسم الموقع الفرعي',
           'no_product.unique'=>'رقم المنتج موجود مسبقأ',
           'total_opening_balance.required'=>'يرجى ادخال رقم المنشاة',
           'no_product.required'=>'يرجى ادخال رقم المنتج',
           'trademark_id.required'=>'يرجى اضافة العلامة التجارية',
           'unit_id.required'=>'يرجى اضافة اسم الوحدة',
           'section_id.required'=>'يرجى اضافة القسم'


        ]);
        Product::create([
            'name_product'=>$request->name_product,
            'no_product'=>$request->no_product,
            'sub_site'=>$request->sub_site,
            'trade_mark_id'=>$request->trademark_id,
            'section_id'=>$request->section_id,
            'sub_section'=>$request->sub_section,
            'unit_id'=>$request->unit_id,
            'sub_unti'=>$request->sub_unti,
            'quantity_alert'=>$request->quantity_alert,
            'image_product'=>$request->image_product,
            'price_purchas_include_tax'=>$request->price_purchas_include_tax,
            'price_purches_doesnot_include_tax'=>$request->price_purches_doesnot_include_tax,
            'value_tax'=>$request->value_tax,
            'price_sale_include_tax'=>$request->price_sale_include_tax,
            'price_sale_doesnot_include_tax'=>$request->price_sale_doesnot_include_tax,
            'rale'=>$request->rale,
            'total'=>$request->total,
            'total_opening_balance'=>$request->total_opening_balance
        ]);
        session()->flash('Add','تمت اضافة المنتج بنجاح');
        return redirect('Products-create');
        // return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function editProducts($id)
    {
        $product=Product::where('id',$id)->first();

        $tradeMarks=TradeMark::all();
        $sections=Section::all();
        $units=Unit::all();
        return view('Products.product.edit-product',compact('product','tradeMarks','sections','units'));


    }

    public function updateProducts(Request $request)
    {
        $id=$request->id;
        $validatedData = $request->validate([
            'name_product' => 'required|max:255',
            'sub_site' => 'required|max:255',
            // 'no_product'=>'required|max:20|unique:products,no_product'.$id,
            'total_opening_balance'=>'required',
            'quantity_alert'=>'required',
        ],[
           'name_product.required'=>'يرجى ادخال اسم المنتج',
           'sub_site.required'=>'يرجى ادخال اسم الموقع الفرعي',
           'no_product.unique'=>'رقم المنتج موجود مسبقأ',
           'total_opening_balance.required'=>'يرجى ادخال رقم المنشاة',
           'no_product.required'=>'يرجى ادخال رقم المنتج',
           'quantity_alert.required'=>'يرجى ادخال تنبيه الكمية'


        ]);
         Product::find($id)->updated([
            'name_product'=>$request->name_product,
            'no_product'=>$request->no_product,
            'sub_site'=>$request->sub_site,
            'trade_mark_id'=>$request->trademark_id,
            'section_id'=>$request->section_id,
            'sub_section'=>$request->sub_section,
            'unit_id'=>$request->unit_id,
            'sub_unti'=>$request->sub_unti,
            'quantity_alert'=>$request->quantity_alert,
            'image_product'=>$request->image_product,
            'price_purchas_include_tax'=>$request->price_purchas_include_tax,
            'price_purches_doesnot_include_tax'=>$request->price_purches_doesnot_include_tax,
            'value_tax'=>$request->value_tax,
            'price_sale_include_tax'=>$request->price_sale_include_tax,
            'price_sale_doesnot_include_tax'=>$request->price_sale_doesnot_include_tax,
            'rale'=>$request->rale,
            'total'=>$request->total,
            'total_opening_balance'=>$request->total_opening_balance
         ]);
         session()->flash('edit','تمت تعديل المنتجات بنجاح');
         $products=Product::all();

         return view('Products.product.index', compact('products'));
    }

    public function deleteProducts(Request $request)
    {
        $id=$request->id;
        Product::find($id)->delete();
        session()->flash('delete','تم حذف المنتجات بنجاح');
        return redirect('/Products-ctreate');
    }
     public function getSectionSub($id)
     {
        $sectionSub=DB::table('sections')->where('id',$id)->pluck('sub_section');
        return json_encode($sectionSub);
     }

     public function getUnitSub($id)
     {
        $unitSub=DB::table('units')->where('id',$id)->pluck('sub_unit');
        return json_encode($unitSub);
     }

}
