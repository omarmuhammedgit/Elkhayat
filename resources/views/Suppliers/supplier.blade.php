@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<style>
    #table{
        /* margin-right: 5%; */

    }
    td{
        /* padding-left: 70px; */
        /* font-size: 15px; */

    }


</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الموردين و العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الموردين</span>
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

@if(session()->has('Add'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('Add') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

				<!-- row opened -->
				<div class="row row-sm">
                      
                        <a class="btn ripple btn-info"  href="{{route('Supplier.create')}}" style="margin-right: 2%">اضافة</a>

					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1" data-page-length="50">
										<thead>
											<tr>

												<th class="wd-25p border-bottom-0">خيارات</th>
												<th class="wd-25p border-bottom-0">معرف الاتصال</th>
												<th class="wd-25p border-bottom-0">اسم النشاط</th>
												<th class="wd-25p border-bottom-0">الاسم</th>
												<th class="wd-25p border-bottom-0">الايميل</th>
												<th class="wd-25p border-bottom-0"> الرقم الضربي</th>
												{{-- <th class="wd-25p border-bottom-0">الحد الائتماني</th> --}}
												<th class="wd-25p border-bottom-0">فترة الدفع</th>
												<th class="wd-25p border-bottom-0">الرصيد الافتتاحي</th>
												{{-- <th class="wd-25p border-bottom-0">ارصدة السابقة</th>
												<th class="wd-25p border-bottom-0">تاريخ الاضافة</th> --}}
												{{-- <th class="wd-25p border-bottom-0">مجموعة العملاء</th> --}}
												<th class="wd-25p border-bottom-0">العنوان</th>
												<th class="wd-25p border-bottom-0">رقم الهاتف</th>
												{{-- <th class="wd-25p border-bottom-0">مجموعة المشتريات غير مدفوعة</th>
												<th class="wd-25p border-bottom-0">اجمالي مستحق مرجع المشتريات</th> --}}
											</tr>
										</thead>
										<tbody>
                                            @foreach ($suppliers as $supplier)
                                            <tr>
												<td>

                                                    <a class="modal-effect btn btn-sm btn-info" href="edit-Supplier/{{$supplier->id}}"
                                                        title="تعديل"><i class="las la-pen"></i></a>
                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                        data-id="{{$supplier->id}}"  data-toggle="modal"
                                                        href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
                                                </td>
												<td>{{$supplier->contactId}}</td>
												<td>{{$supplier->activisms}} </td>
												<td>{{$supplier->firstname}}</td>
												<td>{{$supplier->email}}</td>
												<td>{{$supplier->tax_number}}</td>
                                                {{-- <td>Bella</td> --}}
												<td>{{$supplier->payment_period}}</td>
												<td>{{$supplier->initial_balance}} </td>
                                                {{-- <td>Bella</td>
												<td>Chloe</td> --}}
												<td>{{$supplier->city}},{{$supplier->country}},{{$supplier->postal_code}}</td>
												<td>{{$supplier->phone}}</td>
												{{-- <td>System Developer</td>
												<td>2018/03/12</td> --}}
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
			<!-- Container closed -->
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
                    <form action="{{route('Supplier-delete')}}" method="post">
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
