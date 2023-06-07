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
            #printhiden{display: none;}
            #printhidenfooter{display: none;}
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المبيعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    الاقمشة</span>
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
                        <h4 class="card-title mg-b-0">قائمة بيع الاقمشة</h4>
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
                                <th class="wd-15p border-bottom-0">المبلغ </th>
                                <th class="wd-15p border-bottom-0">التاريخ البيع </th>
                                <th class="wd-15p border-bottom-0">الكمية المباعة</th>
                                <th class="wd-15p border-bottom-0">اسم القماش</th>
                                <th class="wd-15p border-bottom-0">اللون </th>
                                <th class="wd-15p border-bottom-0">رقم الفاتورة</th>
                                {{-- <th class="wd-20p border-bottom-0">السعر</th> --}}
                                <th class="wd-20p border-bottom-0">خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salefabrices as $salefabrice)
                                <tr>
                                    <td>{{ $salefabrice->value }}</td>
                                    <td>{{ $salefabrice->date }}</td>
                                    <td>{{ $salefabrice->quantity_sold }}</td>
                                    <td>{{ $salefabrice->name }}</td>
                                    <td>{{ $salefabrice->color }}</td>
                                    <td>{{ $salefabrice->no_invoics }}</td>
                                    {{-- <td>200</td> --}}
                                    <td>

                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                            data-id="{{ $salefabrice->id }}"
                                            data-name="{{ $salefabrice->name }}"
                                            data-no_invoics="{{ $salefabrice->no_invoics }}"
                                            data-color="{{ $salefabrice->color }}"
                                            data-quantity_sold="{{ $salefabrice->quantity_sold }}"
                                            data-value="{{ $salefabrice->value }}"
                                            data-date="{{ $salefabrice->date }}"
                                            data-quantity_available="{{ $salefabrice->quantity_available }}"
                                            data-payment="{{ $salefabrice->payment }}" data-toggle="modal"
                                            href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-id="{{ $salefabrice->id }}"
                                            data-type_fabrice="{{ $salefabrice->type_fabrice }}" data-toggle="modal"
                                            href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
                                           
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
                    <h6 class="modal-title">فاتورة بيع القماش </h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('saleFabrics-store') }}" method="POST">
                        @csrf
                        <div class="card" id="print">
                            <h3 style="text-align: center">فاتورة مبيعات الاقمشة</h3>
                            {{-- <div class="card-body"> --}}
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
                            {{-- </div> --}}
                            <div class="row">
                                @php
                                $com_code=Auth()->user()->com_code;
                                $no_invoics = !empty(\App\Models\SaleFabrics::where('com_code',$com_code)->latest()->first()->no_invoics) ? ($no_invoics = \App\Models\SaleFabrics::where('com_code',$com_code)->latest()->first()->no_invoics) : 0;

                                $no_invoics = $no_invoics+1;
                                $date=date('Y/m/d');

                            @endphp

                                <div class="col-md-6">
                                    <label for="">رقم الفاتورة</label>
                                    <input type="text" name="no_invoics" id="no_invoics" value="{{ old('no_invoics',$no_invoics) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="">تاريخ الفاتورة</label>
                                    <input type="text" name="date" id="date" value="{{ old('date',$date) }}">
                                </div>


                            <input type="hidden" id="ajax_search_url" name="ajax_search_url"
                            value="{{ route('saleFabrics-ajax_fabrics') }}">
                        <input type="hidden" id="token_search" name="token_search"
                            value="{{ csrf_token() }}">
                            </div>
                            <div class="row ajax_fabrics">
                                <div class="col-md-4" >
                                    <label for="">اسم القماش </label>
                                    <select name="name" id="search_by_text" class="form-control">
                                        <option value="">بدون</option>
                                        @foreach ($fabrics as $fabrics)
                                        <option {{ (old('name')==$fabrics->name)?'selected':'' }} value="{{ $fabrics->name}}">{{ $fabrics->name }}</option>

                                        @endforeach
                                    </select>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                </div>

                                <div class="col-md-4">
                                    <label for="">اللون القماش</label>
                                    <input type="text" class="form-control" name="color" id="color" value="{{ old('color') }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="">الكمية المتوفرة </label>
                                    <input type="text" class="form-control" name="quantity_available" id="quantity_available" value="{{ old('quantity_available') }}">
                                </div>
                            </div><br>
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="">كمية القماش المباعة </label>
                                    <input type="text" name="quantity_sold" id="quantity_sold" value="" class="form-control"><br>
                                    @error('quantity_sold')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">القيمة </label>
                                    <input type="text" name="value" id="value" value="" class="form-control"><br>
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
                                        <option {{ (old('payment')=='كاش')?'selected':'' }} value="كاش">كاش</option>
                                        <option {{ (old('payment')=='شبكة')?'selected':'' }} value="شبكة">شبكة</option>
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
                    <h5 class="modal-title" id="exampleModalLabel">تعديل الاقمشة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <form action="{{ route('saleFabrics-update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="card" id="print">

                                <h3 style="text-align: center">فاتورة مبيعات الاقمشة</h3>
                                {{-- <div class="card-body"> --}}
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
                                {{-- </div> --}}
                                <div class="row">
                                    @php
                                    $com_code=Auth()->user()->com_code;
                                    $no_invoics = !empty(\App\Models\SaleFabrics::where('com_code',$com_code)->latest()->first()->no_invoics) ? ($no_invoics = \App\Models\SaleFabrics::where('com_code',$com_code)->latest()->first()->no_invoics) : 0;

                                    $no_invoics = $no_invoics+1;
                                    $date=date('Y/m/d');

                                @endphp

                                    <div class="col-md-6">
                                        <label for="">رقم الفاتورة</label>
                                        <input type="text" name="no_invoics" id="no_invoics" value="{{ old('no_invoics',$no_invoics) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">تاريخ الفاتورة</label>
                                        <input type="text" name="date" id="date" value="{{ old('date',$date) }}">
                                    </div>


                                <input type="hidden" id="ajax_search_url" name="ajax_search_url"
                                value="{{ route('saleFabrics-ajax_fabrics') }}">
                            <input type="hidden" id="token_search" name="token_search"
                                value="{{ csrf_token() }}">
                                </div>
                                <div class="row ajax_fabrics">
                                    <div class="col-md-4" >
                                        <label for="">اسم القماش </label>
                                        <select name="name" id="name" class="form-control">
                                            <option value="">بدون</option>
                                            @if ($fabrics !='')
                                            @foreach ($fabricupdate as $fabrics)
                                            {{-- {{ dd($fabrics) }} --}}

                                            <option {{ (old('name')==$fabrics->name)?'selected':'' }}  value="{{ $fabrics->name}}">{{ $fabrics->name }}</option>

                                            @endforeach
                                            @endif
                                        </select>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>

                                    <div class="col-md-4">
                                        <label for="">اللون القماش</label>
                                        <input type="text" class="form-control" name="color" id="color" value="{{ old('color') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">الكمية المتوفرة </label>
                                        <input type="text" class="form-control" name="quantity_available" id="quantity_available" value="{{ old('quantity_available') }}">
                                    </div>
                                </div><br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="">كمية القماش المباعة </label>
                                        <input type="text" name="quantity_sold" id="quantity_sold" value="" class="form-control"><br>
                                        @error('quantity_sold')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">القيمة </label>
                                        <input type="text" name="value" id="value" value="" class="form-control"><br>
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
                                            <option {{ (old('payment')=='كاش')?'selected':'' }} value="كاش">كاش</option>
                                            <option {{ (old('payment')=='شبكة')?'selected':'' }} value="شبكة">شبكة</option>
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
                    <h6 class="modal-title">حذف القماش</h6><button aria-label="Close" class="close"
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

    <script src="{{ URL::asset('assets/plugins/salefabrics/js/salefabrics.js') }}"></script>
@endsection
