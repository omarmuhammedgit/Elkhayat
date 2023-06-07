<?php

namespace App\Http\Controllers;

use App\Models\Fabrics;
use Illuminate\Http\Request;

class FabricsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $fabrices=Fabrics::select()->where('com_code',$com_code)->get();
        return view('Products.Fabrics.create-fabrice',compact('fabrices'));
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
        $com_code=auth()->user()->com_code;
        $validatedData = $request->validate([
            'type_fabrice' => 'required|max:20',
            'number_fabrice'=>'required|max:20|unique:fabrics',
            'color_fabrice'=>'required|max:20'

        ],[
           'type_fabrice.required'=>'يرجى ادخال اسم القماش',
           'number_fabrice.unique'=>'رقم القماش موجود مسبقأ',
           'number_fabrice.required'=>'يرجى ادخال رقم القماش',
           'color_fabrice.required'=>'يرجى ادخال اللون القماش',
           'type_fabrice.max'=>'اسم القماش اكبر من 20 حرف',
           'color_fabrice.max'=>'اسم اللون القماش اكبر من 20 حرف',



        ]);
        Fabrics::create([
            'com_code'=>$com_code,
            'type_fabrice'=>$request->type_fabrice,
            'number_fabrice'=>$request->number_fabrice,
            'color_fabrice'=>$request->color_fabrice
        ]);
        $fabrices=Fabrics::select()->where('com_code',$com_code);
         return view('Products.Fabrics.create-fabrice',compact('fabrices'));

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
    public function updatefabrice(Request $request)
    {
        $com_code=auth()->user()->com_code;

        $id=$request->id;

        $validatedData = $request->validate([
            'type_fabrice' => 'required|max:20',
            'number_fabrice'=>'required|max:20|unique:fabrics,number_fabrice,'.$id,
            'color_fabrice'=>'required|max:20'

        ],[
           'type_fabrice.required'=>'يرجى ادخال اسم القماش',
           'number_fabrice.unique'=>'رقم القماش موجود مسبقأ',
           'number_fabrice.required'=>'يرجى ادخال رقم القماش',
           'color_fabrice.required'=>'يرجى ادخال اللون القماش',
           'type_fabrice.max'=>'اسم القماش اكبر من 20 حرف',
           'color_fabrice.max'=>'اسم اللون القماش اكبر من 20 حرف',



        ]);

        Fabrics::find($id)->update([
            'com_code'=>$com_code,
            'type_fabrice'=>$request->type_fabrice,
            'number_fabrice'=>$request->number_fabrice,
            'color_fabrice'=>$request->color_fabrice
        ]);
        session()->flash('edit','تم تعديل القماش بنجاح');


        return redirect()->back() ;
    }
    public function deletefabrice(Request $request){
        $id = $request->id;
        Fabrics::find($id)->delete();
        session()->flash('delete','تم حذف القماش بنجاح');
        return redirect()->back() ;
    }
}
