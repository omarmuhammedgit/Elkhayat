@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المشتريات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                    مشتريات</span>
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
        <form action="{{ route('purchases-menu.store') }}" method="POST">
            @csrf
            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            اضف مشتريات
                        </div>
                        <div class="row">


                            @php
                                $suppliers = \App\Models\Supplier::all();
                            @endphp

                            <div class="col-lg-3">

                                <label for="" style="width: 100px">المورد:*</label><br>
                                <select class="form-control" name="supplier_id" id="" style="width: 60%">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->firstname }}</option>
                                    @endforeach
                                </select>
                            </div>
                                    {{-- <input class="form-control" type="text" name="" placeholder="اسم المورد"> --}}
                                    <div class="col-lg-3">

                                        <label for="">رقم المرجعي</label><br>
                                        <input class="form-control" type="text" name="Reference_number"
                                            placeholder="رقم المرجعي">
                                    </div>


                                    <div class="col-lg-3">
                                        <label for="">تاريخ الشراء</label><br>
                                        <input class="form-control" type="date" name="data_purchase">
                                    </div>
                                    <div class="col-lg-3">


                                        <label for="">حالة الشراء</label><br>
                                        <select class="form-control" name="status_purchase">
                                            <option label="يرجي الاختيار"></option>
                                            <option value="تم الاستلام">تم الاستلام</option>
                                            <option value="تم الطلب">تم الطلب</option>
                                        </select>


                                    </div>
                                    <div class="col-lg-3">


                                        <label for="">العنوان</label><br>
                                        <input class="form-control" type="text" name="address" placeholder=" العنوان">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">الفرعي:*</label><br>
                                        <input class="form-control" type="text" name="sub" placeholder="الفرع">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">فترة الدفع</label><br>
                                        <input class="form-control" type="number" name="payment_period1"
                                            placeholder="فترة الدفع">
                                    </div>
                                    <div class="col-lg-3">
                                        فترة الدفع <br>
                                        <select class="form-control" name="payment_period12" id="">
                                            <option label="يرجي الاختيار"></option>
                                            <option value="">الشهر</option>
                                            <option value="">يوم</option>
                                        </select>
                                    </div>


                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                {{-- <div class="row"> --}}
                                <div class="card-header pb-0">
                                    {{-- <div class="d-flex justify-content-between" style="text-align: center;">
                                <h4 class="card-title mg-b-0">جميع مرجع المشتريات</h4>
                            </div> --}}
                                    <div class="card-body" style="text-align: left;">
                                        <a class="btn ripple btn-info" href="{{ route('Products-create.create') }}">اضافة
                                            منتج</a>
                                    </div>
                                </div>

                                <input class="form-control" type="hidden"
                                name="product_id" value="5">
                                {{-- </div> --}}
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive" id="ajax_searchDiv">
                                                <table class="table text-md-nowrap" id="example1" data-page-length="50">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p border-bottom-0">اخيار</th>
                                                            <th class="wd-15p border-bottom-0">اسم المنتج</th>
                                                            <th class="wd-20p border-bottom-0">رقم المنتج</th>
                                                            <th class="wd-15p border-bottom-0">موقع الفرع</th>
                                                            <th class="wd-10p border-bottom-0">العلامة التجارية</th>
                                                            <th class="wd-25p border-bottom-0">القسم</th>
                                                            <th class="wd-25p border-bottom-0">الوحدة</th>
                                                            <th class="wd-25p border-bottom-0">تنبيه الكمية</th>
                                                            <th class="wd-25p border-bottom-0">سعر الشراء شامل الضريبة</th>
                                                            <th class="wd-25p border-bottom-0">سعر الشراء غير شامل الضريبة
                                                            </th>
                                                            <th class="wd-25p border-bottom-0">سعر البيع شامل الضريبة</th>
                                                            <th class="wd-25p border-bottom-0">سعر البيع غير شامل الضريبة
                                                            </th>
                                                            <th class="wd-25p border-bottom-0">اجمالي الرصيد افتتاحي</th>
                                                            <th class="wd-25p border-bottom-0">اخيارات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $products = \App\Models\Product::all();
                                                        @endphp
                                                        @foreach ($products as $product)
                                                            <tr>
                                                                <td>
                                                                    <input class="form-control" type="hidden"
                                                                        name="product_id" value="{{ $product->id }}">
                                                                </td>
                                                                <td>{{ $product->name_product }}</td>
                                                                <td> {{ $product->no_product }}</td>
                                                                <td>{{ $product->sub_site }}</td>
                                                                <td>{{ $product->tradeMark->name_trade_mark }}</td>
                                                                <td>{{ $product->section->name_section }}</td>
                                                                <td>{{ $product->unit->name_unit }}</td>
                                                                <td> {{ $product->quantity_alert }}</td>
                                                                <td>{{ $product->price_purchas_include_tax }}</td>
                                                                <td>{{ $product->price_purches_doesnot_include_tax }}</td>
                                                                <td>{{ $product->price_sale_include_tax }}</td>
                                                                <td>{{ $product->price_sale_doesnot_include_tax }}</td>
                                                                <td>{{ $product->total_opening_balance }}</td>

                                                                <td>

                                                                    <a class="modal-effect btn btn-sm btn-info"
                                                                        href="edit-Products/{{ $product->id }}"
                                                                        title="تعديل"><i class="las la-pen"></i></a>
                                                                    <a class="modal-effect btn btn-sm btn-danger"
                                                                        data-effect="effect-scale"
                                                                        data-id="{{ $product->id }}" data-toggle="modal"
                                                                        href="#modaldemo9" title="حذف"><i
                                                                            class="las la-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
                                    <label><span>نوع الخصم</span></label><br>
                                    <select class="form-control" name="discount_type" id="">
                                        <option label="بدون"></option>
                                        <option value="ثابت">ثابت</option>
                                        <option value="نسبة مئوية">نسبة مئوية</option>
                                    </select>
                                    {{-- <input class="form-control" type="text" name="name" placeholder="اسم الخياط" required> --}}
                                </div>
                                <div class="col-lg-3">
                                    <label><span>قيمة الخصم</span></label><br>
                                    <input class="form-control" type="text" name="value_discount"
                                        placeholder=" قيمة الخصم">
                                </div>
                                <div class="col-lg-3">
                                    <label><span>الخصم</span></label><br>
                                    <input class="form-control" type="text" name="discount" placeholder="الخصم">
                                </div><br>
                                <div class="col-lg-3">
                                    <label><span>ضريبة المشتريات</span></label><br>
                                    <select class="form-control" name="" id="">
                                        <option label="بدون"></option>
                                        <option value="الضريبة القيمة المضافة">الضريبة القيمة المضافة</option>
                                        <option value=""></option>
                                    </select>
                                    {{-- <input class="form-control" type="text" name="recordnumber" placeholder="رقم السجل التجاري" required> --}}
                                </div>
                                <div class="col-lg-3"><br>
                                    <label><span>ضريبة المشتريات</span></label><br>
                                    <input class="form-control" type="text" name="tax_purchase">
                                </div>
                                <div class="col-lg-3"><br>
                                    <label><span>ملاحظات اضافية</span></label><br>
                                    <textarea class="form-control" name="comments_add" id="" cols="100" rows="2"></textarea>
                                    {{-- <input class="form-control" type="text" name="recordnumber"  required style="width: 60%"> --}}
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                {{-- <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main-content-label mg-b-5">
                                اضافة قسط
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                    <label><span>المبلغ:*</span></label><br>

                                    <input class="form-control" type="text" name="amount" placeholder="المبلغ">
                                </div>
                                <div class="col-lg-3">
                                    <label><span>الدفع على:*</span></label><br>
                                    <input class="form-control" type="date" name="datePayment">
                                </div>
                                <div class="col-lg-3">
                                    <label><span>طريقة الدفع</span></label><br>
                                    <select class="form-control" name="payment_method" id="">
                                        <option label="نقدا">نقدا</option>
                                        <option value="بطاقة">بطاقة</option>
                                        <option value="شيك مصرفي">شيك مصرفي</option>
                                        <option value="تحويل مصرفي">تحويل مصرفي</option>
                                        <option value="mada">mada</option>
                                        <option value="visa">visa</option>
                                    </select>
                                    <input class="form-control" type="text" name="recordnumber" placeholder="رقم السجل التجاري" required>
                                </div>
                                <div class="col-lg-3">
                                    <label><span>الحساب:</span></label><br>
                                    <input class="form-control" type="text" name="account" placeholder="الحساب">
                                </div><br>
                                <div class="col-lg-3"><br>
                                    <label><span>ملاحظات الدفع</span></label><br>
                                    <textarea class="form-control" name="payment_comments" id="" cols="100" rows="3"></textarea>
                                </div>

                            </div>

                        </div>

                    </div>

                </div> --}}

                        <div class="submit" style="margin-bottom: 5%">
                            <button type="submit" class="btn btn-primary mt-3 mb-0"
                                style="margin-right: 45%">حفظ</button>

                        </div>
        </form>


    </div>
    <!-- row closed -->
    </div>

    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف المشتريات</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('Products-delete')}}" method="post">
                    {{-- {{method_field('delete')}} --}}
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        {{-- <input class="form-control" name="section_name" id="section_name" type="text" readonly> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
    })
</script>
@endsection
