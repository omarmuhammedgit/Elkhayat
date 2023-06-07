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
                <h4 class="content-title mb-0 my-auto">المبيعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    المبيعات</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
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

    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row opened -->

    <div class="row row-sm">
        <a class="btn ripple btn-info"  href="{{route('Sale-point.index')}}" style="margin-right: 2%">نقطة البيع</a>

        <div class="col-xl-12">
            <div class="card">
                <div style="margin-right: 90%">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">رقم الفاتورة</th>
                                    <th class="wd-15p border-bottom-0">اسم العميل</th>
                                    <th class="wd-10p border-bottom-0">عدد الثياب</th>
                                    <th class="wd-20p border-bottom-0">المبلغ المستلم</th>
                                    <th class="wd-15p border-bottom-0">المبلغ المتبقي</th>
                                    <th class="wd-25p border-bottom-0">نوع التصميم</th>
                                    <th class="wd-25p border-bottom-0">الاخيارات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $numberInvoice=0;
                                @endphp
                                @foreach ($sizes as $size)
                                @if ($numberInvoice == $size->invoice->invoice_number)

                                @else
                                @php
                                $numberInvoice=$size->invoice->invoice_number;
                                $numberInvoiceid=$size->invoice->id;
                                $receivedamount=\app\Models\Size::where('invoice_id',$numberInvoiceid)->sum('receivedamount');
                                $remainingamount=\app\Models\Size::where('invoice_id',$numberInvoiceid)->sum('remainingamount');
                                $afterdiscount=\app\Models\Size::where('invoice_id',$numberInvoiceid)->sum('afterdiscount');

                            @endphp
                                <tr>
                                    <td>{{ $size->invoice->id }}</td>
                                    <td>{{ $size->customer->name }}</td>
                                    <td>{{ $size->number_dresses }}</td>
                                    <td>{{ $size->invoice->receivedamount}}</td>
                                    <td>{{ $size->invoice->remainingamount}}</td>
                                    <td>{{ $size->design }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-primary" data-toggle="dropdown"
                                                type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-1">
                                                    <a class="dropdown-item btn tx-info" data-effect="effect-scale"  data-toggle="modal"
                                                    data-remainingamount="{{ $remainingamount }}"
                                                    data-receivedamount="{{ $receivedamount }}"
                                                    data-afterdiscount="{{ $afterdiscount }}"
                                                    data-id="{{ $size->id }}"
                                                        href="#modaldemo3">اضافة قسط</a>
                                                            <a class="dropdown-item btn tx-primary"
                                                                href="print-invoice/{{ $size->id }}">طباعة</a>
                                                    <a class="dropdown-item btn tx-info"
                                                        data-effect="effect-scale"
                                                        data-name="{{ $size->customer->name }}"
                                                        data-remainingamount="{{ $size->remainingamount }}"
                                                        data-receivedamount="{{ $size->receivedamount }}"
                                                        data-number_dresses="{{ $size->number_dresses }}"
                                                        data-name_design="{{ $size->design }}"
                                                        data-type_fabrice="{{ $size->fabric }}"
                                                        data-color_fabrice="{{ $size->color_fabrice }}"
                                                        data-name_trade_mark="{{ $size->trade_mark }}"
                                                        data-retribution="{{ $size->retribution_id}}"
                                                        data-seamoer="{{ $size->seamoer_id }}"
                                                        data-name_section="{{ $size->section }}"
                                                        data-value_tax="{{ $size->receved_data }}" data-toggle="modal"
                                                        href="#checkup" title="فحص">
                                                        فحص</a>
                                                    {{-- </button> --}}
                                                {{-- <button class="btn btn-dark btn-block" > <a class="dropdown-item" href="#">مرتجع الفاتورة</a></button> --}}
                                                {{-- <button class="btn btn-warning btn-block" style="width: 100px;height: 50px"> --}}
                                                    <a class="dropdown-item btn tx-warning"
                                                        href="edit-Sale-menu/{{ $size->id }}">تعديل</a>
                                                    {{-- </button> --}}
                                                {{-- <button class="btn btn-danger btn-block" style="width: 100px;height: 50px"> --}}
                                                    <a class="dropdown-item btn tx-danger"
                                                        data-effect="effect-scale" data-id="{{ $size->invoice->id }}"
                                                        data-customer_id="{{ $size->customer->id }}"
                                                        data-toggle="modal" href="#modaldemo9" title="حذف">
                                                        حذف</a>
                                                    {{-- </button> --}}
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الموظف</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('Sale-menu-delete') }}" method="post">
                        {{-- {{method_field('delete')}} --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            {{-- <input name="customer_id" id="customer_id" type="hidden"> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- checkup -->
        <div class="modal" id="checkup">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">فحص  العميل</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('Sale-menu-delete') }}" method="post">
                        {{-- {{method_field('delete')}} --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>فحص البيانات  العميل !</p><br>
                            <table style="margin: 5%">
                                <tr style="padding: 20%">
                                    <td>
                                        اسم العميل : <br><input type="text" id="name" value=""><br></td>
                                    <td>
                                        عدد الثياب: <br><input name="number_dresses" id="number_dresses"
                                            type="text"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        المبلغ المستلم <br><input type="text" id="receivedamount" value="">

                                    </td>
                                    <td>

                                        المبلغ المتبقي <br><input type="text" id="remainingamount" value="">


                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        اسم التصميم <br><input type="text" id="name_design" value="">

                                    </td>
                                    <td>
                                        نوع القماش <br><input type="text" id="type_fabrice" value="">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        اللون القماش <br><input type="text" id="color_fabrice" value="">

                                    </td>
                                    <td>
                                        العلامة التجارية <br><input type="text" id="name_trade_mark" value="">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        اسم القصاص <br><input type="text" id="retribution" value="">

                                    </td>
                                    <td>
                                        اسم الخياط <br><input type="text" id="seamoer" value="">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        اسم القسم <br><input type="text" id="name_section" value="">

                                    </td>
                                    <td>
                                        تاريخ الاستلام<br><input type="text" id="value_tax" value="">

                                    </td>

                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            {{-- <button type="submit" class="btn btn-danger">تاكيد</button> --}}
                        </div>
                </div>
                </form>
            </div>
        </div>

        <div class="modal" id="modaldemo3">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">اضافة  قسط</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('Sale-menu-updateCal')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">

                            <label for="">المبلغ شامل الضريبة</label><br>
                                        <input class="form-control" type="text" name="afterdiscount" id="afterdiscount" readonly>
                            </div>
                            <div class="form-group">

                                <label for="">المبلغ المستلم</label><br>
                                            <input class="form-control" type="text" name="receivedamount" id="addreceivedamount" readonly>
                                </div>
                                <div class="form-group">

                                    <label for="">المبلغ المتبقي</label><br>
                                                <input class="form-control" type="text" name="remainingamount" id="addremainingamount" readonly>
                                    </div>
                                    <div class="form-group">

                                        <label for="">المبلغ المضاف</label><br>
                                                    <input class="form-control" type="text" id="amount" placeholder="ادخال المبلغ  الذي تريد اضافته" onchange="myAddInstalment()">
                                        </div>
                         <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">تحديث</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الالغاء</button>
                    </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
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
    <script src="{{ URL::asset('assets/plugins/sales/saleMenu/js/saleMenu.js') }}"></script>

@endsection
