<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $com_code=auth()->user()->com_code;
        $settings=Setting::where('com_code',$com_code)->get();
        return view('Settings.index',compact('settings'));
    }

    public function create(Request $request)
    {
        $com_code=auth()->user()->com_code;
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:150',
                'commercial_record'=>'required|min:15|unique:settings',
                'phone'=>'required',
                'email'=>'required'

            ],[
               'name.required'=>'يرجى ادخال اسم شركة',
               'commercial_record.unique'=>'رقم السجل التجاري موجود مسبقأ',
               'commercial_record.required'=>'يرجى ادخال رقم السجل التجاري',
               'commercial_record.min'=>'يجب ان يتكون رقم السجل من 15 رقم',
               'phone.required'=>'يرجي ادخال رقم الهاتف',
               'email.required'=>'يرجى ادخال البريد الالكتروتي'
            ]);

            Setting::create([
                'com_code'=>$com_code,
                'name'=>$request->name,
                'commercial_record'=>$request->commercial_record,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'city'=>$request->city,
                'country'=>$request->country,
                'postal_code'=>$request->postal_code,
                'created_by'=>auth()->user()->name
            ]);

            session()->flash('Add','تمت اضافة الاعدادات  بنجاح');
            $settings=Setting::where('com_code',$com_code)->get();

            return view('Settings.index', compact('settings'));

            return redirect()->back() ;

        } catch (\Exception $ex) {
            return redirect()->back()->with('عفوا حدث خطاء ما');
        }


    }
    public function updateSetting(Request $request)
    {
        $com_code=auth()->user()->com_code;
        try {
            $id=$request->id;
            if($request->has('image')){

            $validatedData = $request->validate([
                'name' => 'required|max:150',
                'commercial_record'=>'required|min:15|unique:settings,commercial_record,'.$id,
                'phone'=>'required',
                'image'=>'required|max:2000|mimes:png,jpg,jpeg'

            ],[
               'name.required'=>'يرجى ادخال اسم شركة',
               'commercial_record.unique'=>'رقم السجل التجاري موجود مسبقأ',
               'commercial_record.required'=>'يرجى ادخال رقم السجل التجاري',
               'commercial_record.min'=>'يجب ان يتكون رقم السجل من 15 رقم',
               'phone.required'=>'يرجي ادخال رقم الهاتف'
            ]);
            $image=$request->image;
            $extention=strtolower($image->extension());
            $fileNmae=time().rand(100,999).'.'.$extention;
            $image->getClientOrignalName=$fileNmae;
            $the_file_path=$image;
            $image->move('assets/uploads',$fileNmae);
             //uploadImage('assets/uploads',$request->image);
            // dd($the_file_path);

            Setting::find($id)->update([
                'com_code'=>$com_code,
                'image'=>$fileNmae,
                'name'=>$request->name,
                'commercial_record'=>$request->commercial_record,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'city'=>$request->city,
                'country'=>$request->country,
                'postal_code'=>$request->postal_code,
                'created_by'=>auth()->user()->name

            ]);

            session()->flash('edit','تمت تعديل الاعدادات بنجاح');


            return redirect()->back() ;
        }else{
            $validatedData = $request->validate([
                'name' => 'required|max:150',
                'commercial_record'=>'required|min:15|unique:settings,commercial_record,'.$id,
                'phone'=>'required',

            ],[
               'name.required'=>'يرجى ادخال اسم التصميم',
               'commercial_record.unique'=>'رقم السجل التجاري موجود مسبقأ',
               'commercial_record.required'=>'يرجى ادخال رقم السجل التجاري',
               'commercial_record.min'=>'يجب ان يتكون رقم السجل من 15 رقم',
               'phone.required'=>'يرجي ادخال رقم الهاتف'
            ]);

            Setting::find($id)->update([
                'com_code'=>$com_code,
                'name'=>$request->name,
                'commercial_record'=>$request->commercial_record,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'city'=>$request->city,
                'country'=>$request->country,
                'postal_code'=>$request->postal_code,
                'created_by'=>auth()->user()->name

            ]);

            session()->flash('edit','تمت تعديل الاعدادات بنجاح');


            return redirect()->back() ;

            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('عفوا حدث خطاء ما'.$th);
        }

    }
    public function deleteSetting(Request $request)
    {
        $id=$request->id;
        Setting::find($id)->delete();
        session()->flash('delete','تم حذف الاعدادات بنجاح');
        return redirect()->back() ;

    }

}
