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
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ فحص
                    الخياط</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

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
        <a class="btn btn-info"  href="{{route('Seamoer-create.index')}}" style="margin-right: 2%">الرجوع</a>

        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">اسم القصاص</p><input class="form-control" type="text" class="form-control select2" id="search_name"
                                name="search_name" value="{{$seamoer->name}}">
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">اسم المحل</p><input class="form-control" type="text" class="form-control select2" id="search_permission"
                                name="search_permission" value="{{$seamoer->shopname}}">
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">رقم  الهاتف</p><input class="form-control" type="text" class="form-control select2" id="search_job_title"
                                name="search_job_title" value="{{$seamoer->phone}}">


                        </div><!-- col-4 -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" id="ajax_searchDiv">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">اسم العميل</th>
                                    <th class="wd-20p border-bottom-0">عدد الثياب</th>
                                    <th class="wd-15p border-bottom-0">المبلغ المستلم </th>
                                    <th class="wd-10p border-bottom-0">المبلغ المتبقي</th>
                                    <th class="wd-25p border-bottom-0">اسم لتصميم</th>
                                    <th class="wd-25p border-bottom-0">نوع القماش</th>
                                    <th class="wd-25p border-bottom-0">اللون القماش</th>
                                    <th class="wd-25p border-bottom-0">اسم العلامة التجارية </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // $retributions=[];
                                @endphp
                                @foreach ($info_seamoers as $info_seamoer)
                                    <tr>
                                        <td>{{ $info_seamoer->customer->name }}</td>
                                        <td> {{ $info_seamoer->customer->number_dresses }}</td>
                                        <td>{{ $info_seamoer->receivedamount }}</td>
                                        <td>{{ $info_seamoer->remainingamount }}</td>
                                        <td>{{ $info_seamoer->design }}</td>
                                        <td>{{ $info_seamoer->type_fabrice }}</td>
                                        <td>{{ $info_seamoer->color_fabrice }}</td>
                                        <td>{{ $info_seamoer->tradeMark}}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>

    <!-- /row -->
    </div>
    <input type="hidden" id="token_search" value="{{ csrf_token() }}">
    <!-- Container closed -->
    </div>
    <!-- delete -->
   <div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف الموظف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                               type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Retribution-delete')}}" method="post">
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
