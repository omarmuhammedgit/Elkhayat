<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetributionRequest;
use App\Models\Retribution;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $com_code=auth()->user()->com_code;
        $retributions=Retribution::select()->where('com_code',$com_code)->get();
        return view('Employees.Retribution.index',compact('retributions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.Retribution.create-retribution');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RetributionRequest $request)
    {
        try {

                $com_code=auth()->user()->com_code;

        Retribution::create([
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
        session()->flash('Add','تمت اضافة القصاص بنجاح');
        return redirect('Retribution');
    } catch (\Exception $th) {
        return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();
    }

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function show(Retribution $retribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Retribution $retribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Retribution $retribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Retribution  $retribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Retribution $retribution)
    {
        //
    }
    public function editRetribution($id){
        $com_code=auth()->user()->com_code;
        $retribution=Retribution::where('id',$id)->where('com_code',$com_code)->first();
        return view('Employees.Retribution.edit-retribution',compact('retribution'));

    }
     public function updateRetribution(RetributionRequest $request){
        try {

        $com_code=auth()->user()->com_code;

        $id=$request->id;

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'shopname' => 'required|max:255',
            'facilitynumber'=>'required',
            'phone'=>'required|max:20',
            // 'email' => 'email:rfc,dns',
            'city'=>'required',
            'district'=>'required',
            'street'=>'required'
        ],[
           'name.required'=>'يرجى ادخال اسم القصاص',
           'shopname.required'=>'يرجى ادخال اسم المحل',
           'recordnumber.unique'=>'رقم السجل موجود مسبقأ',
           'facilitynumber.required'=>'يرجى ادخال رقم المنشاة',
           'recordnumber.required'=>'يرجى ادخال رقم السجل',
           'phone.required'=>'يرجى ادخال رقم الهاتف',
        //    'email.email'=>'يجب ان يكون الايميل صالحا',
           'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
           'city.required'=>'يرجى ادخال  اسم المدينة',
           'street.required'=>'يرجى ادخال  اسم الشارع',
           'district'=>'يرجى ادخال  اسم الحي'


        ]);

        Retribution::find($id)->update([
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
        session()->flash('edit','تمت تعديل الموظف بنجاح');

        $retributions=Retribution::where('com_code',$com_code)->get();
        return view('Employees.Retribution.index',compact('retributions'));
    } catch (\Exception $th) {
        return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();
    }
     }
     public function deleteRetribution(Request $request){
        $id = $request->id;
        Retribution::find($id)->delete();
        session()->flash('delete','تم حذف الموظف بنجاح');
        return redirect('/Retribution');
    }
    public function deletecheckup($id)
    {
        $com_code=auth()->user()->com_code;
        $retribution=Retribution::where('id',$id)->where('com_code',$com_code)->first();
        // $retribution_name=Retribution::where('id',$id)->first()->name;
        $info_retributions=Size::where('retribution_id',$id)->where('com_code',$com_code)->get();
        // $info_retributions=DB::select('SELECT * FROM sizes WHERE '.$retribution_name ='retribution');
        // dd($info_retributions);
        return view('Employees.Retribution.checkup',compact('retribution','info_retributions'));
        // return $info_retributions;

    }

}
