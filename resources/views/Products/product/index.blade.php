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
                <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                    المنتجات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@if (session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('edit') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@if(session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('delete') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <!-- row opened -->
    <div class="row row-sm">
        <a class="btn ripple btn-info"  href="{{route('Products-create.create')}}" style="margin-right: 2%">اضافة</a>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" id="ajax_searchDiv">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">اسم المنتج</th>
                                    <th class="wd-20p border-bottom-0">رقم المنتج</th>
                                    <th class="wd-15p border-bottom-0">موقع الفرع</th>
                                    <th class="wd-10p border-bottom-0">العلامة التجارية</th>
                                    <th class="wd-25p border-bottom-0">القسم</th>
                                    <th class="wd-25p border-bottom-0">الوحدة</th>
                                    <th class="wd-25p border-bottom-0">تنبيه الكمية</th>
                                    <th class="wd-25p border-bottom-0">سعر الشراء شامل الضريبة</th>
                                    <th class="wd-25p border-bottom-0">سعر الشراء غير شامل الضريبة</th>
                                    <th class="wd-25p border-bottom-0">سعر البيع شامل الضريبة</th>
                                    <th class="wd-25p border-bottom-0">سعر البيع غير شامل الضريبة</th>
                                    <th class="wd-25p border-bottom-0">اجمالي الرصيد افتتاحي</th>
                                    <th class="wd-25p border-bottom-0">اخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
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

                                            <a class="modal-effect btn btn-sm btn-info" href="edit-Products/{{$product->id}}"
                                                title="تعديل"><i class="las la-pen"></i></a>
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{$product->id}}"  data-toggle="modal"
                                                href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف المنتج</h6>
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

    </div>
    <!-- /row -->
    </div>
    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
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
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })
</script>
    @endsection
