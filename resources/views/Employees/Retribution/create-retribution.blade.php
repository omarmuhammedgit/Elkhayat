@extends('layouts.master')
@section('css')
<style>
    .submit{
        direction: ltr;
        text-align:center;
        margin-bottom: 50px;
    }
</style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h3 class="content-title mb-0 my-auto">القصاص</h3><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة قصاص</span>
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

        <form action="{{route('Retribution.store')}}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" style="width: 1150px">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات شحصية
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>اسم القصاص</span></label>
                                <input class="form-control" type="text" name="name" placeholder="اسم القصاص"  value="{{ old('name') }}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>اسم المحل / المشغل</span></label>
                                <input class="form-control" type="text" name="shopname" placeholder=" اسم المحل"  value="{{ old('shopname') }}"  >
                            </div>
                            <div class="col-lg-3">
                                @php
                                $com_code=Auth()->user()->com_code;
                                    $recordnumber = !empty(\App\Models\Retribution::where('com_code',$com_code)->latest()->first()->recordnumber) ? ($recordnumber = \App\Models\Retribution::where('com_code',$com_code)->latest()->first()->recordnumber) : 0;

                                    $recordnumber = $recordnumber+1// str_pad($code + 1, 5, 0, STR_PAD_LEFT);
                                @endphp
                                <label><span>رقم السجل التجاري</span></label>
                                <input class="form-control" type="number" name="recordnumber" placeholder="رقم السجل التجاري"  value="{{ old('recordnumber',$recordnumber) }}" readonly >
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
                                <input class="form-control" type="number" name="phone" placeholder="رقم الجوال"   value="{{ old('phone') }}" >
                            </div>
                            <div class="col-lg-3">
                                <label><span>رقم الجوال المنشاة</span></label>
                                <input class="form-control" type="number" name="facilitynumber" placeholder="رقم الجوال المنشاة"  value="{{ old('facilitynumber') }}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>البريد الالكتروني</span></label>
                                <input class="form-control" type="email" name="email" placeholder="البريد الالكتروني"   value="{{ old('email') }}" >
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
                                <input class="form-control" type="text" name="city" placeholder="المدينة"   value="{{ old('city') }}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الحي</span></label>
                                <input class="form-control" type="text" name="district" placeholder="الحي"   value="{{ old('district') }}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الشارع</span></label>
                                <input class="form-control" type="text" name="street" placeholder="الشارع"  value="{{ old('street') }}">
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
                            معلومات البنكية
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>رقم البنك</span></label>
                                <input class="form-control" type="number" name="accountnumber" placeholder="رقم البنك"  value="{{ old('accountnumber') }}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>اسم البنك</span></label>
                                <input class="form-control" type="text" name="bankname" placeholder="اسم البنك"  value="{{ old('bankname') }}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الابيان</span></label>
                                <input class="form-control" type="text" name="statement" placeholder="الابيان"  value="{{ old('statement') }}">
                            </div>

                            </div>

                            {{-- </form> --}}
                        </div>

                    </div>

                    <div class="submit">
                        <button type="submit" class="btn btn-primary mt-3 mb-0" >حفظ</button>

                    </div>
                </div>
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
