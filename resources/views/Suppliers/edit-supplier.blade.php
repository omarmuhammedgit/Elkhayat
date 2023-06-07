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
                <h4 class="content-title mb-0 my-auto">الموردين والعملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة المورد</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


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

        <form action="{{route('Supplier-update')}}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" style="width: 1150px">
                <div class="card">
                    <div class="card-body">
                        <input class="form-control" type="hidden" name="id" value="{{$supplier->id}}">

                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>نوع جهة اتصال</span></label><br>
                                <select class="form-control" name="contact_type" id="">
                                    <option value="{{$supplier->contact_type}}">{{$supplier->contact_type}}</option>
                                    <option value="الموردين">الموردين</option>
                                    <option value="العملاء">العملاء</option>
                                    <option value="مورد وعميل">مورد وعميل</option>
                                </select>
                                {{-- <input class="form-control" type="text" name="name" placeholder="اسم القصاص"  > --}}
                            </div>
                            <div class="col-lg-3">
                                <input  type="radio" name="multiy" value="sigle" id="sigle" onchange="mysigle()"> <label><span>فرد</span></label>
                            </div>
                            <div class="col-lg-3">
                                <input  type="radio" name="multiy" value="multiy" id="multiy" onchange="mymultiy()"><label><span>منشاة</span></label>

                                {{-- <input class="form-control" type="text" name="shopname" placeholder=" اسم المحل"  > --}}
                            </div>
                            <div class="col-lg-3">
                                <label><span>معرف الاتصال</span></label>
                                <input class="form-control" type="number" name="contactId" placeholder="معرف الاتصال" required  value="{{$supplier->contactId}}">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--div-->
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" id="siglemenu" style="display: none">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-4">
                                <label><span>اللقب:</span></label><br>
                                <input class="form-control" type="text" name="sobriquet" placeholder="السيد"  value="{{$supplier->sobriquet}}">
                            </div>
                            <div class="col-lg-4">
                                <label><span>الاسم:*</span></label><br>
                                <input class="form-control" type="text" name="firstname" placeholder="الاسم" value="{{$supplier->firstname}}">
                            </div>
                            <div class="col-lg-4">
                                <label><span>اسم العائلة</span></label><br>
                                <input class="form-control" type="text" name="lastname" placeholder="اسم العائلة" {{$supplier->lastname}}>
                            </div>
                            <div class="col-lg-4">
                                <label><span>تاريخ الميلاد</span></label><br>
                                <input class="form-control" type="date" name="datebirth" placeholder="البريد الالكتروني"  value="{{$supplier->datebirth}}">
                            </div>
                            <div class="col-lg-4">
                                <label><span>مخصص ل:</span></label><br>
                                <input class="form-control" type="text" name="allotted" value="{{$supplier->allotted}}">
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" id="multiymenu" style="display: none">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>اسم النشاط</span></label>
                                <input class="form-control" type="text" name="activisms" placeholder="اسم النشاط"  value="{{$supplier->activisms}}">
                            </div>
                            <div class="col-lg-4">
                                <label><span>مخصص ل:</span></label><br>
                                <input class="form-control" type="text" name="allotted" value="{{$supplier->allotted}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>رقم الهاتف*</span></label>
                                <input class="form-control" type="number" name="phone" placeholder="رقم الجوال"  required value="{{$supplier->phone}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>رقم الجوال </span></label>
                                <input class="form-control" type="number" name="facilitynumber" placeholder="رقم الجوال المنشاة" value="{{$supplier->facilitynumber}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>البريد الالكتروني</span></label>
                                <input class="form-control" type="email" name="email" placeholder="البريد الالكتروني" value="{{$supplier->email}}"  required>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>الرقم الضريبي</span></label>
                                <input class="form-control" type="number" name="tax_number" placeholder="الرقم الضريبي" value="{{$supplier->tax_number}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الرصيد افتتاخي</span></label>
                                <input class="form-control" type="number" name="initial_balance" placeholder="الرصيد الافتتاحي" value="{{$supplier->initial_balance}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>فترةالدفع</span></label>
                                <input class="form-control" type="number" name="payment_period" placeholder="فترة الدفع" value="{{$supplier->payment_period}}">
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <!--div-->
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-3">
                                <label><span>المدينة</span></label>
                                <input class="form-control" type="text" name="city" placeholder="المدينة" required value="{{$supplier->city}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>البلد</span></label>
                                <input class="form-control" type="text" name="country" placeholder="البلد" required value="{{$supplier->country}}">
                            </div>
                            <div class="col-lg-3">
                                <label><span>الرمز البريدي</span></label>
                                <input class="form-control" type="text" name="postal_code" placeholder="الرمزالبريدي" value="{{$supplier->postal_code}}" required>
                            </div>


                        </div>

                    </div>
                </div>

                <div class="submit">
                    <button type="submit" class="btn btn-primary mt-3 mb-0" >تعديل</button>

                </div>
            </div>
            <!--div-->

        </form>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script>
    function mysigle(){
            document.getElementById("multiymenu").style.display='none';
            document.getElementById("siglemenu").style.display='block';

    }
    function mymultiy(){

            document.getElementById("siglemenu").style.display='none';
            document.getElementById("multiymenu").style.display='block';

    }
</script>
@endsection
