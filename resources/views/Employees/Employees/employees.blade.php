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
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                    الموظفين</span>
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

@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
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
        {{-- <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">اسم الموظف</p><select class="form-control select2" id="search_name"
                                name="search_name">
                                <option label="الكل" value="الكل">
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->first_name }}">
                                        {{ $employee->first_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">الصلاحية</p><select class="form-control select2" id="search_permission"
                                name="search_permission">
                                <option label="الكل">
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">
                                        {{ $employee->permission }}
                                    </option>
                                @endforeach
                            </select>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">المسمى الوظيفي</p><select class="form-control select2" id="search_job_title"
                                name="search_job_title">
                                <option label="الكل">
                                </option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->job_title }}">
                                        {{ $employee->job_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div><!-- col-4 -->
                        <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                            <p class="mg-b-10">تاريخ التعين</p>
                            <input type="date" name="saledate" id="saledate">
                        </div><!-- col-4 -->
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="card-body" style="text-align: left;"> --}}

            <a class="btn ripple btn-info"  href="{{route('Employees.create')}}" style="margin-right: 2%">اضافة</a>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" id="ajax_searchDiv">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">اسم الموظف</th>
                                    {{-- <th class="wd-20p border-bottom-0">الصلاحية</th> --}}
                                    <th class="wd-15p border-bottom-0">تاريخ التعين</th>
                                    <th class="wd-10p border-bottom-0">المسمى الوظيفي</th>
                                    <th class="wd-25p border-bottom-0">الاخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        {{-- <td> {{ $employee->permission }}</td> --}}
                                        <td>{{ $employee->date_hiring }}</td>
                                        <td>{{ $employee->job_title }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                  <button class="btn btn-warning btn-block"> <a class="dropdown-item" href="edit-employee/{{$employee->id}}">تعديل</a></button>
                                                   {{-- <button class="btn btn-info btn-block"> <a class="dropdown-item " href="#"> فحص</a></button> --}}
                                                   <button class="btn btn-danger btn-block">
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{$employee->id}}"  data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"> حذف</a></a></button>
                                                </div>
                                            </div>
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

    </div>

    <!-- edit -->

   <!-- delete -->
   <div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف الموظف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                               type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Employees-delete')}}" method="post">
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
    <!-- /row -->
    </div>
    {{-- <input type="hidden" id="token_search" value="{{ csrf_token() }}"> --}}
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
    <script src="{{ URL::asset('assets/plugins/employe/employe.js') }}"></script>



@endsection
