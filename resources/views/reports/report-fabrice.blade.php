@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تقارير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الثياب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    {{-- <a href="{{ route('Suppler.create') }}" class="btn btn-success">اضافة</a> --}}
                    <h3 class="card-title card_title_center">عرض تقارير الثياب </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="ajax_search_url" value="{{ route('report-fabriceAjax') }}">
                        <input type="hidden" id="token_search" value="{{ csrf_token() }}">


                        <div class="col-md-12">
                            <label for=""> بحث بالنوع الثياب التي تم تسليمها ولم يتم تسليمها </label>
                            <select name="name" id="name" class="form-control">
                                <option value="all">الكل</option>
                                <option value="1">الثياب التي تم تسليمها</option>
                                <option value="2">الثياب التي لم  يتم تسليمها</option>
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">من تاريخ </label>
                            <input type="date" class="form-control" name="start_at" id="start_at" value="">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">لي تاريخ </label>
                            <input type="date" class="form-control" name="end_at" id="end_at" value="">

                            @error('receive')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div><br><br>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-info btn-sm" id="printReport"> طباعة</button>

                        <button type="submit" class="btn btn-primary btn-sm"> تصدير Exsl </button>

                    </div>
                    <div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">

                        @if (@isset($data) and !@empty($data) and count($data) > 0)
                            <div id="print">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead style="background-color: blue; color:aliceblue">
                                        <tr>
                                            <th>اسم العميل </th>
                                            <th>رقم الفاتورة</th>
                                            <th>عدد الثياب </th>
                                            <th>تاريخ التفصيل   </th>
                                            <th>تاريخ الاستلام  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $info)
                                            <tr>
                                                <td>{{ $info->customer->name }}</td>
                                                <td>{{ $info->invoice_number }}</td>
                                                <td>{{ $info->number_dresses }}</td>
                                                <td>{{ $info->date }}</td>
                                                <td>{{ $info->receved_data }}</td>
                                                {{-- <td>{{ $info->total_after_tex }}</td> --}}

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
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
<script src="{{ URL::asset('assets/plugins/report/customer/js/customer.js') }}"></script>
@endsection
