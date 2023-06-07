<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('Products.Units.units');
        $com_code=auth()->user()->com_code;
        $units=Unit::where('com_code',$com_code)->get();
        return view('Products.Units.units',compact('units'));

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
            'name_unit' => 'required|max:20',
            'sub_unit' => 'max:20'

        ],[
           'name_unit.required'=>'يرجى ادخال اسم الوحدة',
           'name_unit.max'=>'اسم الوحدة اكبر من 20 حرف',
           'sub_unit.max'=>'اسم الوحدة الفرعية اكبر من 20 حرف'

        ]);
        Unit::create([
            'com_code'=>$com_code,
            'name_unit'=>$request->name_unit,
            'sub_unit'=>$request->sub_unit
        ]);
        $units=Unit::where('com_code',$com_code)->get();
        return view('Products.Units.units',compact('units'));
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
    public function updateunit(Request $request)
    {
        $id=$request->id;
        $com_code=auth()->user()->com_code;
        $validatedData = $request->validate([
            'name_unit' => 'required|max:20',
            'sub_unit' => 'max:20'

        ],[
           'name_unit.required'=>'يرجى ادخال اسم الوحدة',
           'name_unit.max'=>'اسم الوحدة اكبر من 20 حرف',
           'sub_unit.max'=>'اسم الوحدة الفرعية اكبر من 20 حرف'

        ]);
        Unit::find($id)->update([
            'com_code'=>$com_code,
            'name_unit'=>$request->name_unit,
            'sub_unit'=>$request->sub_unit]);
            session()->flash('edit','تم تعديل الوحدة بنجاح');


            return redirect()->back() ;
        }
        public function deleteunit(Request $request){
            $id = $request->id;
            Unit::find($id)->delete();
            session()->flash('delete','تم حذف الوحدة بنجاح');
            return redirect()->back() ;
        }
}
