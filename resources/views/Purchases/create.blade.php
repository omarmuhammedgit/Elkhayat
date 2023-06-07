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

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="card">
           <div class="card-body">
        <form action="{{route('fabrice-store')}}" method="POST">
            @csrf
        {{-- <div class="row col-4"> --}}
            <div class="row">

            <div class="col-md-6">
                @php
                $com_code=Auth()->user()->com_code;
                $invoice_number = !empty(\App\Models\Invoices_purchases::where('com_code',$com_code)->latest()->first()->invoice_number) ? ($invoice_number = \App\Models\Invoices_purchases::where('com_code',$com_code)->latest()->first()->invoice_number) : 0;

                $invoice_number = $invoice_number+1;
            @endphp
                <label for="recipient-name" class="col-form-label"> رقم الفاتورة</label>
                        <input class="form-control" type="text" name="invoices_purchases_id" readonly value="{{ old('invoices_purchases_id',$invoice_number) }}" placeholder="رقم القماش">
                        @error('invoices_purchases_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                @php
                $com_code=Auth()->user()->com_code;
                $code = !empty(\App\Models\Fabrics::where('com_code',$com_code)->latest()->first()->code) ? ($code = \App\Models\Fabrics::where('com_code',$com_code)->latest()->first()->code) : 0;

                $code = $code+1;
            @endphp
                <label for="recipient-name" class="col-form-label"> كود القماش</label>
                        <input class="form-control" type="text" name="code" id="code" readonly value="{{ old('code',$code) }}" placeholder="رقم القماش">
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">اسم المورد</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value=""></option>
                    @if ($suppliers != '')
                    @foreach ($suppliers as $supplier)
                    <option @if (old('supplier_id')==$supplier->id) selected='selected' @endif value="{{ $supplier->id }}">{{ $supplier->name }}</option>

                    @endforeach

                    @endif
                </select>

                @error('supplier_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            </div>

            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">اسم القماش</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="اسم القماش">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label">لون القماش</label>
                        <input class="form-control" type="text" name="color" id="color" value="{{ old('color') }}" placeholder="لون القماش">
                        @error('color')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> الصناعة</label>
                <select name="mark" id="mark" class="form-control">
                    <option value="">اختر نوع الصناعة</option>
                    <option  @if (old('mark')=='ياباني') selected='selected' @endif value="ياباني">ياباني</option>
                    <option  @if (old('mark')=='صيني') selected='selected' @endif value="صيني">صيني</option>
                    <option  @if (old('mark')=='هندي') selected='selected' @endif value="هندي">هندي</option>
                </select>
                @error('mark')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> عدد الطاقات</label>
                        <input class="form-control" type="number" name="energies" id="energies" value="{{ old('energies') }}" placeholder="عدد الطاعات">
                        @error('energies')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> عدد الياردات</label>
                        <input class="form-control" type="number" name="yards" id="yards" value="{{ old('yards') }}" placeholder="عدد الياردات" readonly>
                        @error('yards')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> عدد امتار</label>
                        <input class="form-control" type="number" name="meters" id="meters" value="{{ old('meters') }}" placeholder="عدد امتار" readonly>
                        @error('meters')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> سعر الياردة</label>
                        <input class="form-control" type="number" name="balance_yard" id="balance_yard" value="{{ old('balance_yard') }}" placeholder="سعر الياردة">
                        @error('balance_yard')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> اجمالي</label>
                        <input class="form-control" type="number" name="total" id="total" value="{{ old('total') }}" placeholder="اجمالي" readonly>
                        @error('total')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> نسبة الضربية</label>
                <select name="rate_tax" id="rate_tax" class="form-control">
                    <option value="">اختر نسبة الضريبة</option>
                    <option @if (old('rate_tax')=='0' and old('') !='') selected='selected' @endif value="">%0</option>
                    <option @if (old('rate_tax')=='5') selected='selected' @endif value="5">%5</option>
                    <option @if (old('rate_tax')=='10') selected='selected' @endif value="10">%10</option>
                    <option @if (old('rate_tax')=='15') selected='selected' @endif value="15">%15</option>
                    <option @if (old('rate_tax')=='20') selected='selected' @endif value="20">%20</option>
                </select>
                @error('rate_tax')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> قيمة الضريبة</label>
                        <input class="form-control" type="number" name="value_tax" id="value_tax" value="{{ old('value_tax') }}" placeholder="الضريبة" value="0.00" readonly>
                        @error('value_tax')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> المبلغ المستلم</label>
                        <input class="form-control"  type="number" name="receivedamount" id="receivedamount" value="{{ old('receivedamount') }}" placeholder="المبلغ المستلم">
                        @error('receivedamount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
            <div class="col-md-6">
                <label for="recipient-name" class="col-form-label"> المبلغ المتبقي</label>
                        <input class="form-control" type="number" name="remainingamount" id="remainingamount" value="{{ old('remainingamount') }}" placeholder="المبلغ المتبقي" readonly>
                        @error('remainingamount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
                    {{-- <td><label for="">السعر</label><br>
                        <input class="form-control" type="text">
                    </td> --}}


        {{-- </div> --}}
                </div>

            </div>

            <div class="submit" style="margin-bottom: 5%">
                <button type="submit" class="btn btn-primary mt-3 mb-0"
                    style="margin-right: 45%">حفظ</button>

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
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script src="{{URL::asset('assets/plugins/fabrics/js/fabrics.js')}}"></script>

@endsection
