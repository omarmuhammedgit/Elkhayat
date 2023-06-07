<?php

namespace App\Http\Controllers;

use App\Models\design;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $num = design::latest()->first()->number_design;

        // if (empty($num)) {
        //     $number = "0001";
        // } else {
            // $convernum=str_replace('E-','',$num);
            // $con=(integer)$num;

        //     $number= str_pad($num+1, 5, 0, STR_PAD_LEFT);
        // }
        $com_code=auth()->user()->com_code;

        $designs = design::select()->where('com_code',$com_code)->get();
        return view('Products.design.design', compact('designs'));
        // return $number;
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_design' => 'required|max:20',
            'number_design'=>'required|unique:designs|max:20',

        ],[
           'name_design.required'=>'يرجى ادخال اسم التصميم',
           'number_design.unique'=>'رقم التصميم موجود مسبقأ',
           'number_design.required'=>'يرجى ادخال رقم التصميم',
           'name_design.max'=>'اسم التصميم اكبر من 20 حرف'


        ]);
        $com_code=auth()->user()->com_code;

        design::create([
            'name_design' => $request->name_design,
            'number_design' => $request->number_design,
            'com_code'=>$com_code
            // 'price'=>$request->price
        ]);
        $designs = design::select()->where('com_code',$com_code)->get();
        return view('Products.design.design', compact('designs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function updatedesign(Request $request){
        $id=$request->id;
        $com_code=auth()->user()->com_code;

        $validatedData = $request->validate([
            'name_design' => 'required|max:20',
            'number_design'=>'required|max:20|unique:designs,number_design,'.$id,

        ],[
           'name_design.required'=>'يرجى ادخال اسم التصميم',
           'number_design.unique'=>'رقم التصميم موجود مسبقأ',
           'number_design.required'=>'يرجى ادخال رقم التصميم',
           'name_design.max'=>'اسم التصميم اكبر من 20 حرف'
        ]);
        design::find($id)->update([
            'name_design' => $request->name_design,
            'number_design' => $request->number_design,
            'com_code'=>$com_code
        ]);
        session()->flash('edit','تمت تعديل التصميم بنجاح');


        return redirect()->back() ;
    }
    public function deletedesign(Request $request){
        $id = $request->id;
        design::find($id)->delete();
        session()->flash('delete','تم حذف التصميم بنجاح');
        return redirect()->back() ;
    }

}
