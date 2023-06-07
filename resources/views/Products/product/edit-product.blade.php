@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل المنتج</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
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

    <form action="{{route('Products-update')}}" method="POST" style="margin-bottom: 10%">
        @csrf
    <div class="row">
<input class="form-control" type="hidden" name="id" value="{{$product->id}}">
        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        البيانات
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="">اسم المنتج</label><br>
                                    <input class="form-control" type="text" name="name_product" placeholder="اسم المنتج" value="{{$product->name_product}}" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="">رقم المنتج</label><br>
                                    <input class="form-control" type="text" name="no_product" placeholder="رقم المنتج" required value="{{$product->no_product}}">
                        </div>
                        <div class="col-lg-3">
                            <label for="">موقع الفرع</label><br>
                                    <input class="form-control" type="text" name="sub_site" placeholder="موقع الفرع" required value="{{$product->sub_site}}">
                        </div>
                        <div class="col-lg-3">
                            <label style="width: 100px" >العلامة التجارية</label><br>
                                    <select class="form-control select2" id="trademark" name="trademark_id">
                                        <option value="{{$product->tradeMark->id}}">{{$product->tradeMark->name_trade_mark}}</option>

                                        @php
                                            $collection=[];
                                        @endphp

                                        @foreach ($tradeMarks as $tradeMark)
                                        <option value="{{$tradeMark->id}}">{{$tradeMark->name_trade_mark}}</option>

                                        @endforeach
                                    </select>

                        </div>
                        <div class="col-lg-3">
                            <label for="">القسم</label><br>
                                    <select class="form-control select2" id="section_id" name="section_id">
                                        <option value="{{$product->section->id}}">{{$product->section->name_section}}</option>

                                        @php
                                            $collection=[];
                                        @endphp
                                        @foreach ($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name_section}}</option>

                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">القسم الفرعي</label><br>
                                    <select class="form-control select2"  name="sub_section">

                                        <option value="{{$product->section->sub_section}}">{{$product->section->sub_section}}</option>

                                    </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">الوجدة الرئيسية</label><br>
                                    <select class="form-control select2" id="trademark" name="unit_id">
                                        <option value="{{$product->unit->id}}">{{$product->unit->name_unit}}</option>

                                        @php
                                            $collection=[];
                                        @endphp
                                        @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name_unit}}</option>

                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="">الوحدة الفرعية</label><br>
                                    <select  class="form-control"  name="sub_unit">

                                        <option value="{{$product->unit->sub_unit}}">{{$product->unit->sub_unit}}</option>

                                    </select>
                        </div>
                        <div class="col-lg-3">
                                <label for="">اجمالي الرصيد الافتتاحي</label><br>
                                        <input class="form-control" type="number" name="total_opening_balance" placeholder="الرصيد افتتاحي" required value="{{$product->total_opening_balance}}">
                        </div>
                                {{-- <td><label for="">اضافة صورة</label><br>
                                    <input class="form-control" type="file" name="image_product" value="{{$product->image_product}}">
                                </td> --}}


                            </tr>
                        </table>

                    </div>
                    <hr>
                    <div class="main-content-label mg-b-5">
                        <h4>سعر الشراء</h4>
                    </div>
                    <div class="form-group">
                        <input  type="radio" id="checkbox-1" name="price_product" onchange="price_product_purchas()">
                        <label class="exampleEmail1">
                            <h5>تفعيل ضريبة الشراء (ملاحظة : عند تفعيل الخيار يتم احتساب السعر شامل الضربية )</h5>
                        </label>
                    </div>
                    <div id="price_product_purchas" style="display: none">

                                <div class="form-group">
                                    <label for=""> سعر شامل الضربية</label>
                                    <input class="form-control" type="text" name="price_purchas_include_tax" placeholder="سعر شامل الضريبة" value="{{$product->price_purchas_include_tax}}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for=""> سعر غير شامل الضربية</label>
                                    <input class="form-control" type="text" name="price_purches_doesnot_include_tax" placeholder="سعر غير شامل الضريبة" value="{{$product->price_purches_doesnot_include_tax}}">
                                </div>
                            </td>
                    </div>
                        </tr>
                    </table>
                    <div class="main-content-label mg-b-5">
                        <h4>سعر البيع</h4>
                    </div>
                    <div class="form-group">
                        <input  type="radio" id="checkbox-1" name="price_product" onchange="price_product_sale()">
                        <label class="exampleEmail1">
                            <h5>تفعيل ضريبة الشراء (ملاحظة : عند تفعيل الخيار يتم احتساب السعر شامل الضربية )</h5>
                        </label>
                    </div>
                    <div id="price_product_sale" style="display: none" >
                    <table>
                        <tr>
                            <td><label for="">سعر شامل الضربية</label><br>
                                <input class="form-control" type="text" name="price_sale_include_tax" placeholder="سعر شامل الضريبة" value="{{$product->price_sale_include_tax}}">
                            </td>
                            <td><label for="">سعر غير شامل الضربية</label><br>
                                <input class="form-control" type="text" name="price_sale_doesnot_include_tax" placeholder="سعر غير شامل الضريبة" value="{{$product->price_sale_doesnot_include_tax}}">
                            </td>
                            <td><label for="">نسبة مئوية /نسبة ثابتة</label><br>
                                <input class="form-control" type="text" name="rale" placeholder="نسبة المئوية" value="{{$product->rale}}">
                            </td>
                            <td><label for="">الاجمالي</label><br>
                                <input class="form-control" type="text" name="total" placeholder="الاجمالي" value="{{$product->total}}">
                            </td>
                        </tr>
                    </table>
                    </div>


                </div>

            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary mt-3 mb-0" style="margin-right: 45%">تعديل</button>

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
<script src="{{URL::asset('assets/plugins/product/product/js/product.js')}}"></script>

<script>

$(document).ready(function () {
    $('select[name="section_id"]').on("change", function () {
        var SectionId = $(this).val();
        if (SectionId) {
            $.ajax({
                url: "{{ URL::to('sectionSub') }}/" + SectionId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="sub_section"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="sub_section"]').append(
                            '<option value="' +
                                value +
                                '">' +
                                value +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            console.log("AJAX load did not work");
        }
    });
});

$(document).ready(function () {
    $('select[name="unit_id"]').on("change", function () {
        var unitId = $(this).val();
        if (unitId) {
            $.ajax({
                url: "{{ URL::to('unitSub') }}/" + unitId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="sub_unit"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="sub_unit"]').append(
                            '<option value="' +
                                value +
                                '">' +
                                value +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            console.log("AJAX load did not work");
        }
    });
});

</script>
@endsection
