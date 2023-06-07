@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

<link href="{{ URL::asset('assets/plugins/sales/sellingPoint/css/sellingPoint.css') }}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المبيعات</h4><span class="number-muted mt-1 tx-13 mr-2 mb-0">/ نقطة البيع</span>
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
@if (session()->has('Error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('Add'))
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

        <form action="{{ route('Sale-menu-storeSecandrequesr') }}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            بيانت العميل
                        </div>
                        <div class="row row-sm">
                            <input type="hidden" name="id">

                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <input type="hidden" name="customer" value="{{$customer_size->customer->id}}">
                                <div class="input class="form-control"-group">
                                    اسم العميل : <input class="form-control" type="text" value="{{$customer_size->customer->name}}" name="customername" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    كود العميل<input class="form-control" type="number" name="code" value="{{$customer_size->customer->code}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    عدد الثياب <input class="form-control" type="number" name="number_dresses" value="{{$customer_size->number_dresses}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    مدة التفصيل <input class="form-control" type="number" name="detail_duration" value="{{$customer_size->detail_duration}}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">

                                <div class="input class="form-control"-group">

                                 التاريخ الطلب<input class="form-control" type="date" name="date" value="{{$customer_size->date}}" required>
                                </div>
                            </div>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0">
                                <div class="input class="form-control"-group">
                                    <input type="hidden" name="invoice_number" value="{{$customer_size->invoice->id}}">
                                    رقم الفاتورة<input class="form-control" type="number"   value="{{ $customer_size->invoice->invoice_number }}" readonly>
                                </div>
                                {{-- <div class="input class="form-control"-group">
                                    عدد الطلبات<input class="form-control" type="number" name="number_requiest" value="{{$customer->number_requiest}}">
                                </div> --}}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--/div-->

            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            معلومات المقاسات
                        </div>
                        <div class="row col-4">
                        </div>
                        <hr>
                        <table>
                            <tr id="sin">
                                <td>
                                    <label for="">الطول امام</label><br>
                                    <input class="form-control" type="number" name="height" value="{{ old('height') }}">

                                </td>
                                <td>
                                    <label for="">الطول الخلف</label><br>
                                    <input class="form-control" type="number" name="shoulder" value="{{ old('shoulder') }}">
                                </td>
                                <td>
                                    <label for="">الكتف</label><br>
                                    <input class="form-control" type="number" name="shoulder_leight" value="{{ old('shoulder_leight') }}">
                                </td>
                                <td>
                                    <label for="">الطول يد سادة</label><br>
                                    <input class="form-control" type="number" name="brest"  value="{{ old('brest') }}">
                                </td>
                                <td>
                                    <label for="">طول يد كبك</label><br>
                                    <input class="form-control" type="number" name="expand_brest" value="{{ old('expand_brest') }}">
                                </td>
                                <td>
                                    <label for="">وسع صدر</label><br>
                                    <input class="form-control" type="number" name="neck"  value="{{ old('neck') }}">
                                </td>
                                <td>
                                    <label for="">وسع الورك</label><br>
                                    <input class="form-control" type="number" name="expand_hand" value="{{ old('expand_hand') }}">
                                </td>
                                <td>
                                    <label for="">وسع اليد</label><br>
                                    <input class="form-control" type="number" name="down_hand"  value="{{ old('down_hand') }}">
                                </td>
                                <td>
                                    <label for="">وسط اليد </label><br>
                                    <input class="form-control" type="number" name="cbk_leight" value="{{ old('cbk_leight') }}">
                                </td>
                                <td>
                                    <label for="">اسفل اليد</label><br>
                                    <input class="form-control" type="number" name="cbk_width"  value="{{ old('cbk_width') }}">
                                </td>
                            </tr>
                            <tr id="sin">
                                <td>
                                    <label for="">كفة الكبك</label>
                                    <input class="form-control" type="number" name="pocket_leight" value="{{ old('pocket_leight') }}">
                                </td>
                                <td>
                                    <label for="">وسع اسفل</label>
                                    <input class="form-control" type="number" name="pocket_expand" value="{{ old('pocket_expand') }}">
                                </td>
                                <td>
                                    <label for="">كفة اسفل</label>
                                    <input class="form-control" type="number" name="down_desist" value="{{ old('down_desist') }}">
                                </td>
                            </tr>
                        </table><br>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">


                        <div id="idleft">
                            <div class="radio">
                                <button class="btn btn-info" ><a href="{{ route('Sale-point.create') }}" style="color:white"> اضافة
                                        طلب</a></button><br>
                                {{-- <button onclick="myalert()"><a href="#"> اضافة مرافق</a></button> --}}

                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="idhight">
                                <center>
                                                <label for="">نوع التصميم</label><br>
                                                <select class="form-control" name="name_design" id="">
                                                    <option value="">بدون</option>
                                                    <option {{ old('name_design' )=='سعودي' ? 'selected':'' }} value="سعودي" label="سعودي"></option>
                                                    <option {{ old('name_design' )=='امراتي' ? 'selected':'' }} value="امراتي" label="امراتي"></option>
                                                    <option {{ old('name_design' )=='كويتي' ? 'selected':'' }} value="كويتي" label="كويتي"></option>
                                                    <option {{ old('name_design' )=='قطري' ? 'selected':'' }} value="قطري" label="قطري"></option>
                                                    <option {{ old('name_design' )=='بحريني' ? 'selected':'' }} value="بحريني" label="بحريني"></option>
                                                                                                     {{-- @foreach ($designs as $design)
                                                        <option value="{{ $design->id }}">{{ $design->name_design }}
                                                        </option>
                                                    @endforeach --}}
                                                </select>

                                    {{-- <input class="form-control" type="number" id="invalue"> --}}

                                    <label for="">القسم</label><br>
                                    <select class="form-control" name="name_section" id="name_section">
                                        <option value="" label="بدون"></option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->name_section }}</option>
                                        @endforeach
                                    </select>
                                    <label for="">القماش</label><br>
                                    <select class="form-control" name="type_fabrice" id="type_fabrice">
                                        <option value="" label="بدون"></option>
                                        @foreach ($fabrices as $fabrice)
                                            <option value="{{ $fabrice->name }}">
                                                {{ $fabrice->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <input type="hidden" id="ajax_search_url" name="ajax_search_url"
                                    value="{{ route('Sale-point-ajax_color') }}">
                                <input type="hidden" id="token_search" name="token_search"
                                    value="{{ csrf_token() }}">
                                    <div id="ajax_add_color">
                                        <label for="">اللون القماش</label><br>
                                        @if (!@empty($fabrices->color))
                                            <input class="form-control" type="text" name="color_fabrice"
                                                id="color_fabrice" value="{{ $fabrices->color }}">
                                        @endif

                                        <select class="form-control" name="color_fabrice" id="">
                                            <option value="" label="بدون"></option>
                                            @foreach ($fabrices as $fabrice)
                                                <option value="{{ $fabrice->color_fabrice }}">
                                                    {{ $fabrice->color_fabrice }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <label for="">العلامة التجارية</label><br>

                                        @if (!@empty($fabrices->mark))
                                            <input class="form-control" type="text" name="name_trade_mark"
                                                id="name_trade_mark" value="{{ $fabrices->mark }}">
                                        @endif
                                        <select class="form-control" name="name_trade_mark" id="">
                                            <option value="" label="بدون"></option>
                                            @foreach ($trademarks as $trademark)
                                                <option value="{{ $trademark->name_trade_mark }}">
                                                    {{ $trademark->name_trade_mark }}</option>
                                            @endforeach
                                        </select>
                                        @if (!@empty($fabrices->meters))
                                            <label for="">الكمية المتبقية في المخزن </label><br>
                                            <input class="form-control" type="text" name="" id=""
                                                value="{{ $fabrices->meters }}">
                                        @endif
                                    </div>
                                                <label for="">اسم القصاص</label><br>
                                                <select class="form-control" name="retribution" id="">
                                                    <option value="" label="بدون"></option>
                                                    @foreach ($retributions as $retribution)
                                                        <option value="{{ $retribution->id }}">{{ $retribution->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <label for="">اسم الخياط</label><br>
                                                <select class="form-control" name="seamoer" id="">
                                                    <option value="" label="بدون"></option>
                                                    @foreach ($seamoers as $seamoer)
                                                        <option value="{{ $seamoer->id }}">{{ $seamoer->name }}</option>
                                                    @endforeach
                                                </select>

                                                <label for="">السعر غير شامل الضريبة</label>
                                                <input class="form-control" type="number" name="price_doesnot_include_tax"
                                                    id="tax" oninput="myfunction()"  value="{{ old('price_doesnot_include_tax') }}">

                                                <label for="">السعر شامل الضريبة</label>
                                                <input class="form-control" type="number" name="price_include_tax" id="price_tax"
                                                readonly  value="{{ old('price_include_tax') }}">
                                                    <label for="">نسبة الضريبة</label>
                                                    <input class="form-control" type="number" name="tex_parcent" id="tex_parcent" placeholder="ادخل نسبة الضريبة" value="{{ old('value_tax') }}">
                                                <label for="">قيمة الضريبة</label>
                                                <input class="form-control" type="number" name="value_tax" id="value_tax" readonly
                                                    value="{{ old('value_tax') }}">
                                                <label for="">الخصم</label>
                                                <input class="form-control" type="number" name="discount" id="discount"
                                                oninput="myFunDiscount()" value="{{ old('discount') }}">
                                                <label for="">السعر بعد الخصم شامل الضريبة</label>
                                                <input class="form-control" type="number" name="afterdiscount" id="afterdiscount"
                                                    readonly value="{{ old('afterdiscount') }}">
                                                <label for="">المبلغ المستلم</label>
                                                <input class="form-control" type="number" name="receivedamount" id="receivedamount"
                                                oninput="myFunReceivedamount()" value="{{ old('receivedamount') }}">
                                                <label for="">المبلغ المتبقي</label>
                                                <input class="form-control" type="number" name="remainingamount"
                                                    id="remainingamount" readonly value="{{ old('remainingamount') }}">
                                                <label for="">نوع الدفع</label>
                                                <select class="form-control" name="payment" id="">
                                                    <option {{ old('payment') == 'كاش' ? 'selected' : '' }}  value="كاش" label="كاش"></option>
                                                    <option {{ old('payment') == 'اجل' ? 'selected' : '' }}  value="اجل">اجل</option>
                                                </select><br>
                                                </table></div>
                            <div id="idcen">
                                <center>
                                    <section>
                                        <h1 style="number-align: center">الثوب الثاني</h1>

                                        <div class="showimg">
                                            <h4>الرقبة</h4>
                                            <select class="form-control" name="image_neck" id="imgselect2" onchange="imageSelect2()">
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/8.jpg') }}">8</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/9.jpg') }}">9</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/10.jpg') }}">10</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/11.jpg') }}">11</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/3/12.jpg') }}">12</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="220px" height="200px" id="image_neck">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_neck" value="{{ old('size_neck') }}">

                                        </div>
                                        <div class="showimg">
                                            <h4>الجيزور</h4>
                                            <select class="form-control" name="imagecbk" id="imgselect1" onchange="imageSelect1()">
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/5/8.jpg') }}">8</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="Imgcbk">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_cbk" value="{{ old('size_cbk') }}">

                                        </div>
                                        <div class="showimg">
                                            <h4>جيب الصدر</h4>
                                            <select class="form-control" name="image_brest_pocket" id="imgselect3" onchange="imageSelect3()">
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/8.jpg') }}">8</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/4.jpg') }}">9</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/5.jpg') }}">10</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/6.jpg') }}">11</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/7.jpg') }}">12</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/2/8.jpg') }}">13</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="image_brest_pocket">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_brest_pocket" value="{{ old('size_brest_pocket') }}">

                                        </div>
                                        <div class="showimg">
                                            <h4>الجيب</h4>
                                            <select class="form-control" name="image_pocket" id="imgselect4" onchange="imageSelect4()">
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/4/6.jpg') }}">6</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="image_pocket">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_pocket" value="{{ old('size_pocket') }}">

                                        </div>
                                        <div class="showimg">
                                            <h4>الكبك</h4>
                                            <select class="form-control" name="image_algizour" id="imgselect5" onchange="imageSelect5()">
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/1.jpg') }}">1</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/2.jpg') }}">2</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/3.jpg') }}">3</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/4.jpg') }}">4</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/5.jpg') }}">5</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/6.jpg') }}">6</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/7.jpg') }}">7</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/8.jpg') }}">8</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/9.jpg') }}">9</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/10.jpg') }}">10</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/11.jpg') }}">11</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/12.jpg') }}">12</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/13.jpg') }}">13</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/14.jpg') }}">14</option>
                                                <option value="{{ URL::asset('assets/img/seamoer-image/1/15.jpg') }}">15</option>
                                            </select>
                                            <div class="swiper">
                                                <img src="" alt="" width="120px" height="200px" id="image_algizour">
                                            </div>
                                            <input class="form-control" type="number" placeholder="مقاس" name="size_algizour" value="{{ old('size_algizour') }}">

                                        </div>
                                    </section>
                                </center>
                            </div>
                            <div id="idleft">
                                <div class="radio">
                                    {{-- <form action=""> --}}
                                    <label for="">نوع الخياطة</label><br>
                                        <select name="seamtress" id="seamtress"  class="form-control">

                                        <option {{ old('seamtress') == 'حباكة' ? 'selected' : '' }} value="حباكة">حباكة</option>
                                        <option {{ old('seamtress') == 'مبروم' ? 'selected' : '' }} value="مبروم">مبروم</option>
                                        <option {{ old('seamtress') == 'جينز' ? 'selected' : '' }} value="جينز">جينز</option>
                                        <option {{ old('seamtress') == 'مخفي' ? 'selected' : '' }} value="مخفي">مخفي</option>
                                        <option {{ old('seamtress') == 'ج باين' ? 'selected' : '' }} value="ج باين"> ج باين</option>
                                        <option {{ old('seamtress') == 'ج' ? 'selected' : '' }} value="ج">ج</option>
                                        </select>


                                    <br><br>
                                    <label for="">الملاحظات</label><br>
                                    {{-- <input type="text"> --}}
                                    <textarea name="notes" id="" cols="30" rows="10" placeholder="ملاحظات"></textarea>
                                    {{-- </form> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <button class="btn ripple btn-primary" type="submit"
                    style="margin-right: 45%; margin-bottom:10%">حفظ</button>
                {{-- </div> --}}
        </form>
                {{-- //////////////////////////////////////////// --}}


            </div>

    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة عميل</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Customer.store') }}" method="POST">
                        @csrf
                        <div class="form-group">

                            <label for="">اسم العميل*</label><br>
                            <input class="form-control" type="text" name="name" placeholder="اسم العميل">
                        </div>
                        <div class="form-group">
                            @php
                                $code = !empty(\App\Models\Customer::latest()->first()->code) ? ($code = \App\Models\Customer::latest()->first()->code) : 00453;

                                $code = str_pad($code + 1, 5, 0, STR_PAD_LEFT);
                            @endphp

                            <label for="">كود العميل*</label><br>
                            <input class="form-control" type="text" name="code" placeholder="كود العميل"
                                value="{{ $code }}">
                        </div>
                        <div class="form-group">

                            <label for="">رقم الهاتف*</label><br>
                            <input class="form-control" type="text" name="phone" placeholder="رقم الهاتف">
                        </div>
                        <div class="form-group">

                            <label for="">البريد الالكتروني</label><br>
                            <input class="form-control" type="text" name="email" placeholder="البريد الاكتروني">
                        </div>



                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حفظ</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الالغاء</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!---Internal  Selling Point js-->
    <script src="{{ URL::asset('assets/plugins/sales/sellingPoint/js/sellingPoint.js') }}"></script>

<script>
    $(document).ready(function() {
        $('select[name="customer"]').on('change', function() {
            var customerId = $(this).val();
            if (customerId) {
                $.ajax({
                    url: "{{ URL::to('Customercode') }}/" + customerId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="code"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="code"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endsection
