<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeamoerRequest;
use App\Models\Seamoer;
use App\Models\Size;
use Illuminate\Http\Request;

class SeamoerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $seamoers=Seamoer::where('com_code',$com_code)->get();
        return view('Employees.Seamoer.index-seamoer',compact('seamoers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.Seamoer.create-seamoer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeamoerRequest $request)
    {
        try {

        $com_code=auth()->user()->com_code;

        Seamoer::create([
            'com_code'=>$com_code,
            'name'=>$request->name,
            'shopname'=>$request->shopname,
            'recordnumber'=>$request->recordnumber,
            'phone'=>$request->phone,
            'facilitynumber'=>$request->facilitynumber,
            'email'=>$request->email,
            'city'=>$request->city,
            'district'=>$request->district,
            'street'=>$request->street,
            'accountnumber'=>$request->accountnumber,
            'bankname'=>$request->bankname,
            'statement'=>$request->statement
        ]);
        session()->flash('Add','تمت اضافة الخياط بنجاح');
        return redirect('Seamoer-create');
    } catch (\Exception $th) {
        return redirect()->back()->with('عفوا حدث خطاء ما')->withInput();
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function show(Seamoer $seamoer)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function edit(Seamoer $seamoer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seamoer $seamoer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seamoer  $seamoer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seamoer $seamoer)
    {
        //
    }
    public function editSeamoer($id){
        $com_code=auth()->user()->com_code;
        $seamoer=Seamoer::where('id',$id)->where('com_code',$com_code)->first();
        return view('Employees.Seamoer.edit-seamoer',compact('seamoer'));
    }


    public function updateSeamoer(SeamoerRequest $request){
        try {

        $id=$request->id;
        $com_code=auth()->user()->com_code;

        Seamoer::find($id)->update([
            'com_code'=>$com_code,
            'name'=>$request->name,
            'shopname'=>$request->shopname,
            'recordnumber'=>$request->recordnumber,
            'phone'=>$request->phone,
            'facilitynumber'=>$request->facilitynumber,
            'email'=>$request->email,
            'city'=>$request->city,
            'district'=>$request->district,
            'street'=>$request->street,
            'accountnumber'=>$request->accountnumber,
            'bankname'=>$request->bankname,
            'statement'=>$request->statement
        ]);
        session()->flash('edit','تم تعديل الخياط بنجاح');

        $seamoers=Seamoer::where('com_code',$com_code)->get();
        return view('Employees.Seamoer.index-seamoer',compact('seamoers'));
    } catch (\Exception $th) {
        return redirect()->back()->with('عفوا حدث خطاء ما')->withInput();
    }
     }
     public function deleteSeamoer(Request $request){
        $id = $request->id;
        Seamoer::find($id)->delete();
        session()->flash('delete','تم حذف الخياط بنجاح');
        return redirect('/Seamoer-create');
    }
    public function deletecheckup($id)
    {
        $seamoer=Seamoer::where('id',$id)->first();
        $info_seamoers=Size::where('retribution_id',$id)->get();
        return view('Employees.Seamoer.checkup',compact('seamoer','info_seamoers'));
    }
}
