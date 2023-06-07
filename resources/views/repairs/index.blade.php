@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        @media print {
            #printhiden {
                display: none;
            }

            #printhidenfooter {
                display: none;
            }
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الدخل اضافي</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    التصليحات</span>
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
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
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
    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between" style="text-align: center;">
                        <h4 class="card-title mg-b-0">قائمة التصليحات </h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>

                {{-- <div class="col-sm-4 col-md-4" style="text-align: left;"> --}}
                {{-- <div class="card custom-card"> --}}
                <div class="card-body" style="text-align: left;">

                    <a class="btn ripple btn-info" data-target="#modaldemo3" data-toggle="modal" href="">اضافة</a>
                </div>
                {{-- </div> --}}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1" data-page-length="50">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">رقم الفاتورة</th>
                                <th class="wd-15p border-bottom-0">كود العميل </th>
                                <th class="wd-15p border-bottom-0">اسم العميل </th>
                                <th class="wd-15p border-bottom-0">رقم الهاتف العميل </th>
                                <th class="wd-15p border-bottom-0">تاريخ التسليم </th>
                                <th class="wd-20p border-bottom-0">القيمة</th>
                                <th class="wd-15p border-bottom-0">التاريخ التصليح </th>
                                <th class="wd-20p border-bottom-0">عدد الثياب التي تم تصليحها</th>
                                <th class="wd-20p border-bottom-0">التصليحات المطلوب</th>
                                <th class="wd-20p border-bottom-0">خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($repair as $repairs)
                                <tr>
                                    <td>{{ $repairs->no_invoics }}</td>
                                    <td>{{ $repairs->code }}</td>
                                    <td>{{ $repairs->name }}</td>
                                    <td>{{ $repairs->phone }}</td>
                                    <td>{{ $repairs->delivery_date }}</td>
                                    <td>{{ $repairs->value }}</td>
                                    <td>{{ $repairs->date }}</td>
                                    <td>{{ $repairs->number_repairs }}</td>
                                    <td>{{ $repairs->repair }}</td>
                                    <td>

                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-id="{{ $repairs->id }}" data-name="{{ $repairs->name }}"
                                            data-no_invoics="{{ $repairs->no_invoics }}" data-date="{{ $repairs->date }}"
                                            data-number_repairs="{{ $repairs->number_repairs }}"
                                            data-delivery_date="{{ $repairs->delivery_date }}"
                                            data-phone="{{ $repairs->phone }}" data-value="{{ $repairs->value }}"
                                            data-code="{{ $repairs->code }}" data-payment="{{ $repairs->payment }}"
                                            data-repair="{{ $repairs->repair }}" data-toggle="modal" href="#exampleModal2"
                                            title="تعديل"><i class="las la-pen"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-id="{{ $repairs->id }}" data-code="{{ $repairs->code }}"
                                            data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                class="las la-trash"></i></a>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header" id="printhiden">
                    <h6 class="modal-title">فاتورة تصليحات الثياب </h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Repairfabrics-store') }}" method="POST">
                        @csrf
                        <div class="card" id="print">
                            <h3 style="text-align: center">فاتورة تصليحات الثياب </h3>
                            {{-- <div class="card-body"> --}}
                            @if (!@empty($setting))
                                <div class="main-content-label mg-b-5">

                                    @php
                                        $issueDate = date('h:i:s  Y/m/d');
                                    @endphp

                                    <div class="invoice-header">
                                        <h6 class="invoice-title">تاريخ اصدار الفاتورة {{ $issueDate }}</h6>
                                        <div class="billed-from">
                                            <h6>{{ $setting->name }}</h6>
                                            <p> رقم السجل التجاري :{{ $setting->commercial_record }} <br><br>
                                                العنوان: {{ $setting->country }} , {{ $setting->city }} ,
                                                {{ $setting->postal_code }}<br><br>
                                                رقم الهاتف :{{ $setting->phone }}<br><br>
                                                البريد الالكتروني:{{ $setting->email }}</p>
                                        </div><!-- billed-from -->
                                    </div><!-- invoice-header -->
                                </div>
                            @endif
                            {{-- </div> --}}
                            <div class="row">
                                @php
                                    $com_code = Auth()->user()->com_code;
                                    $no_invoics = !empty(
                                        \App\Models\Repair_fabrics::where('com_code', $com_code)
                                            ->latest()
                                            ->first()->no_invoics
                                    )
                                        ? ($no_invoics = \App\Models\Repair_fabrics::where('com_code', $com_code)
                                            ->latest()
                                            ->first()->no_invoics)
                                        : 0;

                                    $no_invoics = $no_invoics + 1;

                                    $code = !empty(
                                        \App\Models\Repair_fabrics::where('com_code', $com_code)
                                            ->latest()
                                            ->first()->code
                                    )
                                        ? ($code = \App\Models\Repair_fabrics::where('com_code', $com_code)
                                            ->latest()
                                            ->first()->code)
                                        : 453;

                                    $code = $code + 1;
                                    $date = date('Y/m/d');

                                @endphp

                                <div class="col-md-6">
                                    <label for="">رقم الفاتورة</label>
                                    <input type="text" name="no_invoics" id="no_invoics"
                                        value="{{ old('no_invoics', $no_invoics) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">تاريخ التصليح</label>
                                    <input type="text" name="date" id="date"
                                        value="{{ old('date', $date) }}">
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-4">
                                    <label for="">اسم العميل </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="">كود العميل </label>
                                    <input type="text" class="form-control" name="code" id="code"
                                        value="{{ old('code', $code) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="">رقم الهاتف </label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone') }}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">التصليحات المطلوبة</label>
                                    <textarea class="form-control" name="repair" id="repair" cols="20" rows="5">{{ old('repair') }}</textarea>
                                    @error('repair')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><br>

                                <div class="col-md-4">
                                    <label for="">عدد الثياب المطلوب التصليحيها </label>
                                    <input type="number" name="number_repairs" id="number_repairs"
                                        value="{{ old('number_repairs') }}" class="form-control"><br>
                                    @error('number_repairs')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">تاريخ التسليم </label>
                                    <input type="date" name="delivery_date" id="delivery_date"
                                        value="{{ old('delivery_date') }}" class="form-control"><br>
                                    @error('delivery_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="">القيمة </label>
                                    <input type="number" name="value" id="value" value="{{ old('value') }}"
                                        class="form-control"><br>
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" style="margin-right: 45%">طريقة الدفع</label>
                                    <select name="payment" id="payment" class="form-control">
                                        <option {{ old('payment') == 'كاش' ? 'selected' : '' }} value="كاش">كاش</option>
                                        <option {{ old('payment') == 'شبكة' ? 'selected' : '' }} value="شبكة">شبكة</option>
                                    </select><br>
                                    @error('payment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer" id="printhidenfooter">
                            <button class="btn ripple btn-success" type="submit">حفظ</button>
                            <button class="btn ripple btn-primary" type="button" onclick="printDiv()">طباعة</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الالغاء</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!--/div-->
    <!-- edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل التصليحات</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('Repairfabrics-update') }}" method="post" autocomplete="off">
                        {{-- {{method_field('patch')}} --}}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            @php
                                $com_code = Auth()->user()->com_code;
                                $no_invoics = !empty(
                                    \App\Models\Repair_fabrics::where('com_code', $com_code)
                                        ->latest()
                                        ->first()->no_invoics
                                )
                                    ? ($no_invoics = \App\Models\Repair_fabrics::where('com_code', $com_code)
                                        ->latest()
                                        ->first()->no_invoics)
                                    : 0;

                                $no_invoics = $no_invoics + 1;

                                $code = !empty(
                                    \App\Models\Repair_fabrics::where('com_code', $com_code)
                                        ->latest()
                                        ->first()->code
                                )
                                    ? ($code = \App\Models\Repair_fabrics::where('com_code', $com_code)
                                        ->latest()
                                        ->first()->code)
                                    : 453;

                                $code = $code + 1;
                                $date = date('Y/m/d');

                            @endphp

                            <div class="col-md-6">
                                <label for="">رقم الفاتورة</label>
                                <input type="text" name="no_invoics" id="no_invoics"
                                    value="{{ old('no_invoics', $no_invoics) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">تاريخ التصليح</label>
                                <input type="text" name="date" id="date" value="{{ old('date', $date) }}">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <label for="">اسم العميل </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="">كود العميل </label>
                                <input type="text" class="form-control" name="code" id="code"
                                    value="{{ old('code', $code) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="">رقم الهاتف </label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    value="{{ old('phone') }}">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">التصليحات المطلوبة</label>
                                <textarea class="form-control" name="repair" id="repair" cols="20" rows="5">{{ old('repair') }}</textarea>
                                @error('repair')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="col-md-4">
                                <label for="">عدد الثياب المطلوب التصليحيها </label>
                                <input type="number" name="number_repairs" id="number_repairs"
                                    value="{{ old('number_repairs') }}" class="form-control"><br>
                                @error('number_repairs')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">تاريخ التسليم </label>
                                <input type="date" name="delivery_date" id="delivery_date"
                                    value="{{ old('delivery_date') }}" class="form-control"><br>
                                @error('delivery_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="">القيمة </label>
                                <input type="number" name="value" id="value" value="{{ old('value') }}"
                                    class="form-control"><br>
                                @error('value')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" style="margin-right: 45%">طريقة الدفع</label>
                                <select name="payment" id="payment" class="form-control">
                                    <option {{ old('payment') == 'كاش' ? 'selected' : '' }} value="كاش">كاش</option>
                                    <option {{ old('payment') == 'شبكة' ? 'selected' : '' }} value="شبكة">شبكة</option>
                                </select><br>
                                @error('payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">تاكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- delete -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف التصليحات</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('Repairfabrics-delete') }}" method="post">
                    {{-- {{method_field('delete')}} --}}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input class="form-control" type="hidden" name="id" id="id" value="">
                        <input class="form-control" class="form-control" name="code" id="code"
                            type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- /row -->
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

    <script src="{{ URL::asset('assets/plugins/Repair_fabrics/js/Repair_fabrics.js') }}"></script>
@endsection
