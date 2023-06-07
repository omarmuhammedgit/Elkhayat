@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المشتريات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة المشتريات</span>
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
                    <!--div-->
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						{{-- <div class="card">
							<div class="card-body">
								<div class="row row-sm mg-b-20">

									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">الفرع:</p><select class="form-control select2" >
											<option label="الكل">
											</option>
											<option value="Firefox">
												Firefox
											</option>

										</select>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">المورد</p><select class="form-control select2" >
											<option label="الكل">
											</option>
											<option value="Firefox">
												Firefox
											</option>
										</select>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">حالة الشراء</p><select class="form-control select2" >
											<option label="الكل">
											</option>
											<option value="تم الاستلام">
												تم الاستلام
											</option>
											<option value="تم الطلب">
												تم الطلب
											</option>
										</select>
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">حالة الدفع</p><select class="form-control select2" >
											<option label="الكل">
											</option>
											<option value="مدفوع">
												مدفوع
											</option>
											<option value="مستحق الدفع">
												مستحق الدفع
											</option>
											<option value="جزئي">
												جزئي
											</option>
											<option value="ةمتاخر">
												متاحرة
											</option>
										</select>
									</div><!-- col-4 -->

									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">نطاق التاريخ</p>
                                        <input type="date" name="saledate" id="saledate">
									</div><!-- col-4 -->
								</div>
							</div>
						</div> --}}
                        <div class="card-header pb-0" >
                            <div class="d-flex justify-content-between" style="text-align: center;">
                                <h4 class="card-title mg-b-0">جميع المشتريات</h4>
                                {{-- <i class="mdi mdi-dots-horizontal text-gray"></i> --}}
                            </div>
                            <div class="card-body" style="text-align: left;">

                                <a class="btn ripple btn-info"  href="{{route('purchases-menu.create')}}">اضافة</a>
                            </div>
                        </div>



					</div>
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1" data-page-length="50">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">خيار</th>
												<th class="wd-15p border-bottom-0">التاريخ</th>
												<th class="wd-20p border-bottom-0">الرقم المرجعي</th>
												<th class="wd-15p border-bottom-0"> الفرع </th>
												<th class="wd-10p border-bottom-0"> المورد</th>
												<th class="wd-25p border-bottom-0">حالة الشراء</th>
                                                <th class="wd-25p border-bottom-0">حالة الدفع</th>
                                                {{-- <th class="wd-25p border-bottom-0">المجموع</th>
                                                <th class="wd-25p border-bottom-0">دفع مستحق</th> --}}
                                                <th class="wd-25p border-bottom-0">اضيفت بواسطة</th>

											</tr>
										</thead>
										<tbody>
                                            @php

                                            @endphp
                                            @foreach ($purchases as $purchase )
                                            <tr><td>
                                                {{-- <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                    data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        <a class="dropdown-item" href="#">طباعة</a>
                                                        <a class="dropdown-item " href="#">فحص</a>
                                                        <a class="dropdown-item" href="#">مرتجع الفاتورة</a>
                                                    </div>
                                                </div> --}}

                                                <a class="modal-effect btn btn-sm btn-info" href="edit-purchases/{{$purchase->id}}"
                                                title="تعديل"><i class="las la-pen"></i></a>
                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{$purchase->id}}"  data-toggle="modal"
                                                href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>

                                            </td>
                                            <td>{{$purchase->data_purchase}}</td>
                                            <td>{{$purchase->Reference_number}}</td>
                                            <td>{{$purchase->sub}}</td>
												<td>{{$purchase->supplier->firstname}}</td>
												<td>{{$purchase->status_purchase}}</td>
												<td>{{$purchase->status_payment}}</td>
												{{-- <td>1222</td>
												<td>200</td> --}}
                                                {{-- @endforeach --}}
                                                {{-- @foreach ($sizes as $size ) --}}
												<td>{{$purchase->create_by}}</td>

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
            <div class="modal" id="modaldemo9">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">حذف المشتريات</h6>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('purchases-delete')}}" method="post">
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
