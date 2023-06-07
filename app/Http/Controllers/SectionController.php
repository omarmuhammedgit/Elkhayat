<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $com_code=auth()->user()->com_code;
        $sections=Section::where('com_code',$com_code)->get();
        // $sections=Section::all();
        return view('Products.section.section',compact('sections'));
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
            'name_section' => 'required|max:20',
            'sub_section'=>'max:20'

        ],[
           'name_section.required'=>'يرجى ادخال اسم القسم',
           'sub_section.max'=>'اسم القسم الفرعي اكبر من 20 حرف',
           'name_section.max'=>'اسم القسم اكبر من 20 حرف'

        ]);
        Section::create([
            'com_code'=>$com_code,
            'name_section'=>$request->name_section,
            'sub_section'=>$request->sub_section
        ]);
        $sections=Section::where('com_code',$com_code)->get();
        return view('Products.section.section',compact('sections'));
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
    public function updatesection(Request $request){
        $id=$request->id;
        $validatedData = $request->validate([
            'name_section' => 'required|max:50',
            'sub_section'=>'max:50'

        ],[
           'name_section.required'=>'يرجى ادخال اسم القسم',
           'sub_section.max'=>'اسم القسم الفرعي اكبر من 50 حرف',
           'name_section.max'=>'اسم القسم اكبر من 50 حرف'

        ]);
        Section::find($id)->update([
            'name_section'=>$request->name_section,
            'sub_section'=>$request->sub_section

        ]);
        session()->flash('edit','تم تعديل القسم بنجاح');


        return redirect()->back() ;
    }
    public function deletesection(Request $request){
        $id = $request->id;
        Section::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect()->back() ;
    }
}
