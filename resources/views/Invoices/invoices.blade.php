@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/Invoices/invoices.css') }}" rel="stylesheet">
    <style>

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طباعة
                    فاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">


        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12" id="print">
            <div class="card">

                <div class="card-body">
                    @if (! @empty($setting))

                    <div class="main-content-label mg-b-5">

                        @php
                            $issueDate=date('h:i:s  Y/m/d');
                        @endphp

                        <div class="invoice-header">
                            <h6 class="invoice-title">تاريخ اصدار الفاتورة {{ $issueDate }}</h6>
                            <div class="billed-from">
                                <h6>{{ $setting->name }}</h6>
                                <p> رقم  السجل التجاري :{{ $setting->commercial_record }} <br><br>
                                    العنوان: {{ $setting->country }} , {{ $setting->city }} ,
                                    {{ $setting->postal_code }}<br><br>
                                    رقم الهاتف :{{ $setting->phone }}<br><br>
                                    البريد الالكتروني:{{ $setting->email }}</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                    </div>


                    @endif

                    <div class="row row-sm">
                        <table>
                            <tr>
                                <td>

                        <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">كود العميل</label><br>
                                <input class="form-control" type="text" name="code"
                                    value="{{ $info_size_customer->customer->code }}">
                        </div>
                                </td>
                                <td>
                        <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">اسم العميل</label><br>
                                <input class="form-control" type="text" name="shoulder"
                                    value="{{ $info_size_customer->customer->name }}">
                        </div>
                                </td>
                                <td>
                        <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">رقم الجوال </label><br>
                                <input class="form-control" type="text" name="phone"
                                    value="{{ $info_size_customer->customer->phone }}">
                        </div>
                                </td>
                                <td>
                        <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">عدد الثياب</label><br>
                                <input class="form-control" type="text" name="number_dresses"
                                    value="{{ $info_size_customer->number_dresses }}">
                        </div>
                                </td>
                                <td>

                        <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">تاريخ الطلب</label><br>
                                <input class="form-control" type="text" name="date"
                                    value="{{ $info_size_customer->date }}">
                        </div>
                                </td>
                                <td>
                            {{-- <td>
                                <label for="">الوقت</label><br>
                                <input class="form-control" type="text" name="neck" value="{{ $info_size_customer->customer->time }}">
                            </td> --}}
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">تاريخ الاستلام</label><br>
                                <input class="form-control" type="text" name="receved_data"
                                    value="{{ $info_size_customer->receved_data }}">
                            </div>
                                </td>
                                <td>
                            <div class="col-lg-2 mg-t-20 mg-lg-t-0" id="id">

                                <label for="">رقم الفاتورة</label><br>
                                <input class="form-control" type="text" name="invoice_number"
                                    value="{{ $info_size_customer->invoice->invoice_number }}">
                            </div>
                                </td>
                            </tr></table>
                    </div>
                </div>
                <div class="card-body">

                    <hr>


                    @php
                        $i = 0;
                    @endphp
                    @foreach ($info_size_customers as $info_size_customer)
                        @php
                            $i++;
                        @endphp

                        <div class="row col-4">
                        </div>
                        <div class="main-content-label mg-b-5">
                            معلومات المقاسات {{ $i }}
                        </div>
                        <table>
                            <tr id="sin">
                                <td>
                                    <label for="">طول امام</label><br>
                                    <input class="form-control" type="text" name="height"
                                        value="{{ $info_size_customer->height }}">
                                </td>
                                <td>
                                    <label for="">طول الخلف</label><br>
                                    <input class="form-control" type="text" name="shoulder"
                                        value="{{ $info_size_customer->shoulder }}">
                                </td>
                                <td>
                                    <label for=""> الكتف</label><br>
                                    <input class="form-control" type="text" name="shoulder_leight"
                                        value="{{ $info_size_customer->shoulder_leight }}">
                                </td>
                                <td>
                                    <label for="">طول يد السادة</label><br>
                                    <input class="form-control" type="text" name="brest"
                                        value="{{ $info_size_customer->brest }}">
                                </td>
                                <td>
                                    <label for=""> طول يد الكبك </label><br>
                                    <input class="form-control" type="text" name="expand_brest"
                                        value="{{ $info_size_customer->expand_brest }}">
                                </td>
                                <td>
                                    <label for="">وسع الصدر</label><br>
                                    <input class="form-control" type="text" name="neck"
                                        value="{{ $info_size_customer->neck }}">
                                </td>
                                <td>
                                    <label for="">وسع الورك</label><br>
                                    <input class="form-control" type="text" name="expand_hand"
                                        value="{{ $info_size_customer->expand_hand }}">
                                </td>
                                <td>
                                    <label for="">وسع اليد</label><br>
                                    <input class="form-control" type="text" name="down_hand"
                                        value="{{ $info_size_customer->down_hand }}">
                                </td>
                                <td>
                                    <label for="">وسط اليد</label><br>
                                    <input class="form-control" type="text" name="cbk_leight"
                                        value="{{ $info_size_customer->cbk_leight }}">
                                </td>
                                <td>
                                    <label for="">اسفل اليد</label><br>
                                    <input class="form-control" type="text" name="cbk_width"
                                        value="{{ $info_size_customer->cbk_width }}">
                                </td>
                            </tr>
                            <tr id="sin">
                                <td>
                                    <label for="">كف الكبك </label>
                                    <input class="form-control" type="text" name="pocket_leight"
                                        value="{{ $info_size_customer->pocket_leight }}">
                                </td>
                                <td>
                                    <label for="">وسع اسفل</label>
                                    <input class="form-control" type="text" name="pocket_expand"
                                        value="{{ $info_size_customer->pocket_expand }}">
                                </td>
                                <td>
                                    <label for="">كفة اسفل</label>
                                    <input class="form-control" type="text" name="down_desist"
                                        value="{{ $info_size_customer->down_desist }}">
                                </td>
                            </tr>
                        </table><br>
                        <hr>
                        <div id="idhight">
                            <div class="radio">
                                <h4>ملخص الطلب {{ $i }}</h4>
                                <table>
                                    <tr>
                                        <td>
                                            <label for="">نوع التصميم</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->design }}">
                                        </td>
                                        <td>
                                            <label for="">القماش</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->fabric }}">
                                        </td>
                                        <td>
                                            <label for="">اللون القماش</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->color_fabrice }}">
                                        </td>
                                        <td>
                                            <label for="">اسم الخياط</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->seamoer_id }}">
                                        </td>
                                        <td>
                                            <label for="">الخصم</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->discount }}">
                                        </td>
                                        <td>
                                            <label for="">السعر شامل الضريبة</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->price_include_tax }}" style="width:150px">
                                        </td>
                                        <td>
                                            <label for="">السعر غير شامل الضريبة</label>
                                            <input class="form-control" type="text"
                                                value="{{ $info_size_customer->price_doesnot_include_tax }}" style="width:150px">
                                        </td>
                                        <td>
                                    </tr>
                                </table>
                                <div class="counttable" style="float: right">
                                    <h4> ملخص الطلب صور {{ $i }}</h4>
                                    <figure>
                                        <img src="{{ $info_size_customer->image_neck }}" alt="" width="100px"
                                            height="100px">
                                        <img src="{{ $info_size_customer->image_cbk }}" alt=""width="100px"
                                            height="100px">
                                        <img src="{{ $info_size_customer->image_brest_pocket }}" alt=""
                                            width="100px" height="100px">
                                        <img src="{{ $info_size_customer->image_pocket }}" alt="" width="100px"
                                            height="100px">
                                        <img src="{{ $info_size_customer->image_algizour }}" alt=""
                                            width="100px" height="100px">
                                    </figure>
                                </div>
                                </figure>

                <div class="counttable" style="float: left">
                    <h4> ملاحظات</h4><br>
                    <textarea name="" id="" cols="30" rows="5">{{ $info_size_customer->notes }}</textarea>
                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="card-body">

                <div class="counttable">
                    <h4> ملخص الدفع </h4><br>
                    <div class="styletable">
                        <table>
                            <tr>
                                <td>
                                    <label for="">اجمالي عدد الثياب</label><br>
                                    <input class="form-control" type="text" name="brest"
                                        value="{{ $info_size_customer->number_dresses }}">
                                </td>
                                <td>
                                    <label for="">المبلغ اجمالي غير شامل الضريبة</label><br>
                                    <input class="form-control" type="text" name="price_doesnot_include_tax"
                                        id="tax" readonly value="{{ $price_doesnot_include_tax }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">الاجمالي الخصم</label><br>
                                    <input class="form-control" type="text" name="discount" id="discount"
                                        value="{{ $discount }}">
                                </td>
                                <td>
                                    <label for="">الاجمالي مبلغ الضريبة</label><br>
                                    <input class="form-control" type="text" name="value_tax" id="value_tax"
                                        value="{{ $value_tax }}" readonly>
                                </td>
                                <td>
                                    <label for="">الاجمالي شامل الضريبة</label><br>
                                    <input class="form-control" type="text"name="price_include_tax"
                                        value="{{ $price_include_tax }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">نوع الدفع</label><br>
                                    <input class="form-control" type="text" value="{{ $info_size_customer->payment }}">
                                </td>
                                <td>
                                    <label for="">المبلغ المستلم</label><br>
                                    <input class="form-control" type="text" name="receivedamount" id="receivedamount"
                                        value="{{ $receivedamount }}">
                                </td>
                                <td>
                                    <label for="">المبلغ المتبقي</label><br>
                                    <input class="form-control" type="text" name="remainingamount"
                                        id="remainingamount" readonly value="{{ $remainingamount }}">
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div class="counttable" style="float: left">
                    {{-- {{ QrCode::generate('hi omar') }} --}}

                    <img src="{{ $displayQRCodeAsBase64 }}" alt="QR Code" />
                </div>
                </div>




            </div>
        </div>
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
<input type="hidden" value="{{ route('Sale-menu.index') }}" id="route">

            <button class="btn ripple btn-primary" type="button" style="margin-right: 45%; margin-bottom:10%"
                onclick="printDiv();" id="url"> <a href="{{ route('Sale-menu.index') }}" style="color: white"> طباعة</a></button>

            <button class="btn ripple btn-info" type="button" style="margin-bottom:10%"> <a href="{{ route('Sale-menu.index') }}" style="color: white"> رجوع</a></button>
        </div>
        <div id="invoiceseamoer" style="display: none">
            <div class="card-body">

                <div class="main-content-label mg-b-5">
                    @if (! @empty($setting))

                    <div class="main-content-label mg-b-5">

                        @php
                            $issueDate=date('h:i:s  Y/m/d');
                        @endphp

                        <div class="invoice-header">
                            <h6 class="invoice-title">تاريخ اصدار الفاتورة {{ $issueDate }}</h6>
                            <div class="billed-from">
                                <h6>{{ $setting->name }}</h6>
                                <p> رقم  السجل التجاري :{{ $setting->commercial_record }} <br><br>
                                    العنوان: {{ $setting->country }} , {{ $setting->city }} ,
                                    {{ $setting->postal_code }}<br><br>
                                    رقم الهاتف :{{ $setting->phone }}<br><br>
                                    البريد الالكتروني:{{ $setting->email }}</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                    </div>


                    @endif
                    فاتورة مبيعات الخياط
                </div>
                <table>
                    <tr id="sin">
                        <td>
                            <label for="">كود العميل</label><br>
                            <input class="form-control" type="text" name="code"
                                value="{{ $info_size_customer->customer->code }}">
                        </td>
                        <td>
                            <label for="">اسم العميل</label><br>
                            <input class="form-control" type="text" name="shoulder"
                                value="{{ $info_size_customer->customer->name }}">
                        </td>
                        <td>
                            <label for="">رقم الجوال </label><br>
                            <input class="form-control" type="text" name="shoulder_leight"
                                value="{{ $info_size_customer->customer->phone }}">
                        </td>
                        <td>
                            <label for="">عدد الثياب</label><br>
                            <input class="form-control" type="text" name="brest"
                                value="{{ $info_size_customer->number_dresses }}">
                        </td>
                        <td>
                            <label for="">تاريخ م</label><br>
                            <input class="form-control" type="text" name="expand_brest"
                                value="{{ $info_size_customer->date }}">
                        </td>
                        {{-- <td>
                            <label for="">الوقت</label><br>
                            <input class="form-control" type="text" name="neck" value="{{ $info_size_customer->customer->time }}">
                        </td> --}}
                        <td>
                            <label for="">تاريخ الاستلام</label><br>
                            <input class="form-control" type="text" name="receved_data"
                                value="{{ $info_size_customer->receved_data }}">
                        </td>
                        <td>
                            <label for="">رقم الفاتورة</label><br>
                            <input class="form-control" type="text" name="down_hand"
                                value="{{ $info_size_customer->invoice->invoice_number }}">
                        </td>

                    </tr>

                </table><br>
                <hr>


                @php
                    $i = 0;
                @endphp
                @foreach ($info_size_customers as $info_size_customer)
                    @php
                        $i++;
                    @endphp

                    <div class="row col-4">
                    </div>
                    <div class="main-content-label mg-b-5">
                        معلومات المقاسات {{ $i }}
                    </div>
                    <table>
                        <tr id="sin">
                            <td>
                                <label for="">طول امام</label><br>
                                <input class="form-control" type="text" name="height"
                                    value="{{ $info_size_customer->height }}">
                            </td>
                            <td>
                                <label for="">طول الخلف</label><br>
                                <input class="form-control" type="text" name="shoulder"
                                    value="{{ $info_size_customer->shoulder }}">
                            </td>
                            <td>
                                <label for=""> الكتف</label><br>
                                <input class="form-control" type="text" name="shoulder_leight"
                                    value="{{ $info_size_customer->shoulder_leight }}">
                            </td>
                            <td>
                                <label for="">طول يد السادة</label><br>
                                <input class="form-control" type="text" name="brest"
                                    value="{{ $info_size_customer->brest }}">
                            </td>
                            <td>
                                <label for=""> طول يد الكبك </label><br>
                                <input class="form-control" type="text" name="expand_brest"
                                    value="{{ $info_size_customer->expand_brest }}">
                            </td>
                            <td>
                                <label for="">وسع الصدر</label><br>
                                <input class="form-control" type="text" name="neck"
                                    value="{{ $info_size_customer->neck }}">
                            </td>
                            <td>
                                <label for="">وسع الورك</label><br>
                                <input class="form-control" type="text" name="expand_hand"
                                    value="{{ $info_size_customer->expand_hand }}">
                            </td>
                            <td>
                                <label for="">وسع اليد</label><br>
                                <input class="form-control" type="text" name="down_hand"
                                    value="{{ $info_size_customer->down_hand }}">
                            </td>
                            <td>
                                <label for="">وسط اليد</label><br>
                                <input class="form-control" type="text" name="cbk_leight"
                                    value="{{ $info_size_customer->cbk_leight }}">
                            </td>
                            <td>
                                <label for="">اسفل اليد</label><br>
                                <input class="form-control" type="text" name="cbk_width"
                                    value="{{ $info_size_customer->cbk_width }}">
                            </td>
                        </tr>
                        <tr id="sin">
                            <td>
                                <label for="">كف الكبك </label>
                                <input class="form-control" type="text" name="pocket_leight"
                                    value="{{ $info_size_customer->pocket_leight }}">
                            </td>
                            <td>
                                <label for="">وسع اسفل</label>
                                <input class="form-control" type="text" name="pocket_expand"
                                    value="{{ $info_size_customer->pocket_expand }}">
                            </td>
                            <td>
                                <label for="">كفة اسفل</label>
                                <input class="form-control" type="text" name="down_desist"
                                    value="{{ $info_size_customer->down_desist }}">
                            </td>
                        </tr>
                    </table><br>
                    <hr>
                    <div id="idhight">
                        <div class="radio">
                            <h4>ملخص الطلب {{ $i }}</h4>
                            <table>
                                <tr>
                                    <td>
                                        <label for="">نوع التصميم</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->design }}">
                                    </td>
                                    <td>
                                        <label for="">القماش</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->fabric }}">
                                    </td>
                                    <td>
                                        <label for="">اللون القماش</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->color_fabrice }}">
                                    </td>
                                    <td>
                                        <label for="">اسم الخياط</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->seamoer }}">
                                    </td>
                                    <td>
                                        <label for="">الخصم</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->discount }}">
                                    </td>
                                    <td>
                                        <label for="">السعر شامل الضريبة</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->price_include_tax }}">
                                    </td>
                                    <td>
                                        <label for="">السعر غير شامل الضريبة</label>
                                        <input class="form-control" type="text"
                                            value="{{ $info_size_customer->price_doesnot_include_tax }}">
                                    </td>
                                    <td>
                                </tr>
                            </table>
                            <div class="counttable" style="float: right">
                                <h4> ملخص الطلب صور {{ $i }}</h4>
                                <figure>
                                    <img src="{{ $info_size_customer->image_neck }}" alt="" width="100px"
                                        height="100px">
                                    <img src="{{ $info_size_customer->image_cbk }}" alt=""width="100px"
                                        height="100px">
                                    <img src="{{ $info_size_customer->image_brest_pocket }}" alt=""
                                        width="100px" height="100px">
                                    <img src="{{ $info_size_customer->image_pocket }}" alt="" width="100px"
                                        height="100px">
                                    <img src="{{ $info_size_customer->image_algizour }}" alt=""
                                        width="100px" height="100px">
                                </figure>
                            </div>
                            </figure>

            <div class="counttable" style="float: left">
                <h4> ملاحظات</h4><br>
                <textarea name="" id="" cols="30" rows="10">{{ $info_size_customer->notes }}</textarea>
            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/Invoices/invoices.js') }}"></script>
@endsection
