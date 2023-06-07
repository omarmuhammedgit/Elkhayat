@extends('layouts.master')
@section('css')
    <style>
        .submit {
            text-align:center;
            margin-bottom: 50px;
            margin-top: -20px;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                    موظف</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- row -->
    <div class="row">
        <!--div-->
        <form action="{{route('Employees-update')}}" method="POST">
            {{-- {{method_field('patch')}} --}}
            {{-- @method('PATCH') --}}
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            المعلومات الشخصية
                        </div>
                        <div class="row">
                            <input type="hidden" name="id" value="{{$employe->id}}">
                            <div class="col-lg-3">
                                <label><span>اسم الاول</span></label>
                                <input class="form-control" type="text" name="first_name" value="{{old('first_name',$employe->first_name)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>العائلة</span></label>
                                <input class="form-control" type="text" name="last_name" placeholder="العائلة" value="{{old('last_name',$employe->last_name)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>رقم الموظف</span></label>
                                <input class="form-control" type="number" name="no_employee" placeholder="رقم الموظف" value="{{old('no_employee',$employe->no_employee)}}">
                            </div>
                            <div class="col-lg-3">
                                @php
                                    $date=date('Y/m/d');
                                @endphp
                                <label><span>تاريخ التعين</span></label>
                                <input class="form-control" type="date" name="date_hiring" placeholder="تاريخ التعين"  value="{{old('date_hiring',$employe->date_hiring)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>المسمى الوظيفي</span></label>
                                <input class="form-control" type="text" name="job_title" placeholder="المسمى الموظيفي" value="{{old('date_hiring',$employe->job_title)}}">
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!--div-->
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات التواصل
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>رقم الجوال</span></label>
                                <input class="form-control" type="tel" name="number_phone1" placeholder="رقم الجوال" value="{{old('number_phone1',$employe->number_phone1)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>رقم الجوال 2</span></label>
                                <input class="form-control" type="tel" name="number_phone2" placeholder="رقم الجوال 2" value="{{old('number_phone2',$employe->number_phone2)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>البريد الكتروني</span></label>
                                <input class="form-control" type="email" name="email" placeholder="البريد الالكتروني" value="{{old('email',$employe->email)}}">
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <!--div-->
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات السكن
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>المدينة</span></label>
                                <input class="form-control" type="text" name="city" placeholder="المدينة" value="{{old('city',$employe->city)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الحي</span></label>
                                <input class="form-control" type="text" name="district" placeholder="الحي" value="{{old('district',$employe->district)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الشارع</span></label>
                                <input class="form-control" type="text" name="street" placeholder="الشارع" value="{{old('street',$employe->street)}}">
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!--div-->
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" style="width: 1150px">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات البنكية
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>رقم البنك</span></label>
                                <input class="form-control" type="number" name="account_number" placeholder="رقم البنك" value="{{old('account_number',$employe->account_number)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>اسم البنك</span></label>
                                <input class="form-control" type="text" name="name_bank" placeholder="اسم البنك" value="{{old('name_bank',$employe->name_bank)}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الابيان</span></label>
                                <input class="form-control" type="text" name="statement" placeholder="الابيان" value="{{old('statement',$employe->statement)}}">
                            </div>
                            <br>
                            <hr>


                        </div>
                        <br>
                        <div class="card-body pt-0">
                            {{-- <form > --}}
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">اسم المستخدم</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="ادحل اسم المستخدم" name="name_user" value="{{old('name_user',$employe->name_user)}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">كلمة السر</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="ادخل كلمة السر" name="password" >
                                </div>
                                <div class="form-group">
                                    {{-- {{ dd($employe->password2) }} --}}
                                    <label for="exampleInputPassword2">تاكيد كلمة السر</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                        placeholder="ادخل كلمة السر" name="password_confirmation" >
                                </div>
                                {{-- <div class="form-group">
                                    <label for="exampleInputPassword1">اسم الصلاحية</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="ادخل اسم الصلاحية" name="permission" value="{{$employe->permission}}">
                                </div> --}}
                                {{-- <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                    <input type="checkbox" id="checkbox-1">
                                    <label class="exampleInputEmail1">اسم الفرع</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                        placeholder="ادخل اسم الفرع" value="">

                                </div> --}}


                            </div>

                            {{-- </form> --}}
                        </div>

                    </div>

                </div>
            </div>

            <div class="submit">
                <button type="submit" id="checkpassword" class="btn btn-primary mt-3 mb-0">تعديل</button>

            </div>
        </form>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
