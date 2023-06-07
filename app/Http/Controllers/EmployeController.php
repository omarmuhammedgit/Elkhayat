<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   $com_code=auth()->user()->com_code;
        $employees = Employe::select()->where('com_code',$com_code)->get();
        return view('Employees.Employees.employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employees.Employees.create-employe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        try {
        $com_code=auth()->user()->com_code;


        Employe::create([
            'com_code'=>$com_code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'no_employee' => $request->no_employee,
            'date_hiring' => $request->date_hiring,
            'job_title' => $request->job_title,
            'number_phone1' => $request->number_phone1,
            'number_phone2' => $request->number_phone2,
            'email' => $request->email,
            'city' => $request->city,
            'district' => $request->district,
            'street' => $request->street,
            'account_number' => $request->account_number,
            'name_bank' => $request->name_bank,
            'statement' => $request->statement,
            'name_user' => $request->name_user,
            'password1' => Hash::make($request->password),
            // 'password2'=>Hash::make($request->password2),
            // 'permission' => $request->permission
        ]);
        User::create([
            'com_code'=>$com_code,
            'name' => $request->name_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        session()->flash('Add', 'تمت اضافة الموظف بنجاح');
        return redirect('Employees');
    } catch (\Exception $ex) {
        // throw $th;
        return redirect()->back()->with('Error','عفوا حدث خطاء ما')->withInput();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        return $employe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return 12345;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    }
    public function deleteEmployees(Request $request)
    {
        $id = $request->id;
        Employe::find($id)->delete();
        session()->flash('delete', 'تم حذف الموظف بنجاح');
        return redirect('/Employees');
    }
    public function ajax_search(Request $request)
    {
        if ($request->ajax()) {
            $search_name = $request->search_name;
            $employees = Employe::where('first_name', 'LIKE', "%{search_name}%")->orderBy('id', 'DESC')->get();
            return view('Employees.Employees.employees', compact('employees'));
        }
    }
    public function editEmployess($id)
    {
        $employe = Employe::where('id', $id)->first();
        return view('Employees.Employees.edit-employe', compact('employe'));
    }
    public function updateEmployees(EmployeRequest $request)
    {
        try {
            $id = $request->id;
            $com_code=auth()->user()->com_code;
            Employe::find($id)->update([
                'com_code'=>$com_code,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'no_employee' => $request->no_employee,
                'date_hiring' => $request->date_hiring,
                'job_title' => $request->job_title,
                'number_phone1' => $request->number_phone1,
                'number_phone2' => $request->number_phone2,
                'email' => $request->email,
                'city' => $request->city,
                'district' => $request->district,
                'street' => $request->street,
                'account_number' => $request->account_number,
                'name_bank' => $request->name_bank,
                'statement' => $request->statement,
                'name_user' => $request->name_user,
                'password1' => bcrypt($request->password1),
                // 'password2'=>bcrypt($request->password2),
                'permission' => $request->permission
            ]);
            session()->flash('edit', 'تمت تعديل الموظف بنجاح');
            $employees = Employe::all();
            return view('Employees.Employees.employees', compact('employees'));
        } catch (\Exception $th) {
            return redirect()->back()->with('عفوا حدث خطاء ما')->withInput();
        }
    }
    public function editprofile(Request $request)
    {
        $com_code=auth()->user()->com_code;
        $id = $request->id;
        if (!empty($request->password)) {
            $validatedData = $request->validate(
                [

                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ],
                [
                    'password.required' => 'يجب ادخال كلمة المرور',
                    'password.min' => 'يجب ان تتكون كلمة المرور من 8 احرف',
                    'password.confirmed' => 'تاكيد كلمة المرور غير متطابق'
                ]
            );
            User::find($id)->update([
                'com_code'=>$com_code,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return redirect('/');
        } else {

            $validatedData = $request->validate([
                'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $id],
            ]);
            User::find($id)->update([

            'com_code'=>$com_code,
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect('/');
        }

        return $request;
    }
}
