<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\AdminUserRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminUserControler extends Controller
{
    public function index(){

        $data=Admin::all();
        $com_code=auth()->user()->com_code;
        if ($com_code!=1) {
                return redirect()->back()->with('error','عفوا غير مسموح لك باجراء هذا الامر  !!')->withInput();
        }else{
            return view('admin.index',['data'=>$data]);
        }
    }
    public function create(){
        $com_code=auth()->user()->com_code;
        if ($com_code!=1) {
                return redirect()->back()->with('error','عفوا غير مسموح لك باجراء هذا الامر  !!')->withInput();
        }
        return view('admin.create');
    }
    public function store(AdminRequest $request){
        try {
            $com_code=auth()->user()->com_code;
            if ($com_code!=1) {
                    return redirect()->back()->with('error','عفوا غير مسموح لك باجراء هذا الامر  !!')->withInput();
            }else{
                $data=Admin::where('com_code',$request->com_code)->first();
                if ($data) {
                    return redirect()->back()->with('error','عفوا اسم  المستخدم مسجل من قبل')->withInput();
                }
                $data_insert['com_code']=$request->com_code;
                $data_insert['name']=$request->name;
                $data_insert['email']=$request->email;
                $data_insert['username']=$request->username;
                $data_insert['password']=bcrypt($request->password);
                $data_insert['active']=$request->active;
                Admin::create($data_insert);
                return redirect()->route('user.index')->with('add','تمت اضافة المستخدم بنجاح');
    }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا حدث خطا ما'.$ex->getMessage())->withInput();
        }
    }
     public function edit($id){
        $com_code=auth()->user()->com_code;
        if ($com_code!=1) {
                return redirect()->back()->with('error','عفوا غير مسموح لك باجراء هذا الامر  !!')->withInput();
        }else{
            $data=Admin::where('id',$id)->first();
            return view('admin.edit',['data'=>$data]);

        }
     }
     public function update(AdminUpdateRequest $request){
        try {
            $com_code=auth()->user()->com_code;
            if ($com_code!=1) {
                    return redirect()->back()->with('error','عفوا غير مسموح لك باجراء هذا الامر  !!')->withInput();
            }else{
                $data=Admin::where('com_code',$request->com_code)->where('id','!=',$request->id)->first();
                if ($data) {
                    return redirect()->back()->with('error','عفوا اسم  المستخدم مسجل من قبل')->withInput();
                }
                $data_update['com_code']=$request->com_code;
                $data_update['name']=$request->name;
                $data_update['email']=$request->email;
                if ($request->password !='') {
                    $data_update['password']=bcrypt($request->password);
                }
                $data_update['username']=$request->username;
                $data_update['active']=$request->active;
                Admin::find($request->id)->update($data_update);
                return redirect()->route('user.index')->with('add','تمت اضافة المستخدم بنجاح');
    }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error','عفوا حدث خطا ما'.$ex->getMessage())->withInput();
        }
    }
    public function getlogin(){
        return view('admin.login');
    }
    public function login(AdminUserRequest $request){
        if (auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password'),'active'=>1])) {
            return redirect()->route('dashboard');

        } else {
           return redirect()->route('/')->with('error','عفوا اسم المستخدم غير مفعل');
        }

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');

    }

}
