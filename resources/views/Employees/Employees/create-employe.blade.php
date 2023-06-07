@extends('layouts.master')
@section('css')
    <style>
        .submit {
            text-align:center;
            margin-bottom: 50px;
            /* margin-top: -20px; */
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

@if(session()->has('Error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- row -->
    <div class="row">
        <!--div-->
        <form action="{{route('Employees.store')}}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            المعلومات الشخصية
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>اسم الاول</span></label>
                                <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="اسم الاول"  >
                            </div>
                            <div class="col-lg-3">
                                <label><span>العائلة</span></label>
                                <input class="form-control" type="text" name="last_name"  value="{{ old('last_name') }}" placeholder="العائلة"  >
                            </div>
                            <div class="col-lg-3">
                                @php
                                $com_code=Auth()->user()->com_code;
                                    $no_employee = !empty(\App\Models\Employe::where('com_code',$com_code)->latest()->first()->no_employee) ? ($no_employee = \App\Models\Employe::where('com_code',$com_code)->latest()->first()->no_employee) : 0;

                                    $no_employee = $no_employee+1// str_pad($code + 1, 5, 0, STR_PAD_LEFT);
                                @endphp
                                <label><span>رقم الموظف</span></label>
                                <input class="form-control" readonly type="number" name="no_employee" value="{{ old('no_employee',$no_employee) }}" placeholder="رقم الموظف"  >
                            </div>
                            <div class="col-lg-3">
                                @php
                                    $date=date('Y/m/d');
                                @endphp
                                <label><span>تاريخ التعين</span></label>
                                <input class="form-control" type="date" name="date_hiring" value="{{ old('date_hiring') }}" value="@php echo date("Y/m/d"); @endphp" placeholder="تاريخ التعين" value="">
                            </div>
                            <div class="col-lg-3">
                                <label><span>المسمى الوظيفي</span></label>
                                <input class="form-control" type="text" name="job_title" value="{{ old('job_title') }}" placeholder="المسمى الموظيفي"  >
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
                                <input class="form-control" type="number" value="{{ old('number_phone1') }}" name="number_phone1" placeholder="رقم الجوال"  >
                            </div>
                            <div class="col-lg-3">
                                <label><span>رقم الجوال 2</span></label>
                                <input class="form-control" type="number"  value="{{ old('number_phone2') }}" name="number_phone2" placeholder="رقم الجوال 2">
                            </div>
                            <div class="col-lg-3">
                                <label><span>البريد الكتروني</span></label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني"  >
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
                                <input class="form-control" type="text" name="city" value="{{ old('city') }}" placeholder="المدينة"  >
                            </div>
                            <div class="col-lg-3">
                                <label><span>الحي</span></label>
                                <input class="form-control" type="text" name="district" value="{{ old('district') }}" placeholder="الحي"  >
                            </div>
                            <div class="col-lg-3">
                                <label><span>الشارع</span></label>
                                <input class="form-control" type="text" name="street" value="{{ old('street') }}" placeholder="الشارع"  >
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
                                <input class="form-control" type="number" name="account_number" value="{{ old('account_number') }}" placeholder="رقم البنك">
                            </div>
                            <div class="col-lg-3">
                                <label><span>اسم البنك</span></label>
                                <input class="form-control" type="text" name="name_bank" value="{{ old('name_bank') }}" placeholder="اسم البنك">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الابيان</span></label>
                                <input class="form-control" type="text" name="statement" value="{{ old('statement') }}" placeholder="الابيان">
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
                                    <input class="form-control" type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="ادحل اسم المستخدم" name="name_user" value="{{ old('name_user') }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">كلمة السر</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="ادخل كلمة السر" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">تاكيد كلمة السر</label>
                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                        placeholder="ادخل كلمة السر" name="password_confirmation">
                                </div>



                            </div>

                            {{-- </form> --}}
                        </div>

                    </div>

                </div>
            </div>

            <div class="submit">
                <button id="" type="submit" class="btn btn-primary mt-3 mb-0">حفظ</button>

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
