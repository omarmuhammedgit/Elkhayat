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
							<h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الاقمشة</span>
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
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0" >
								<div class="d-flex justify-content-between" style="text-align: center;">
									<h4 class="card-title mg-b-0">قائمة الاقمشة</h4>
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
												<th class="wd-15p border-bottom-0">نوع القماش</th>
												<th class="wd-15p border-bottom-0">رقم القماش</th>
                                                <th class="wd-15p border-bottom-0">اللون</th>
												{{-- <th class="wd-20p border-bottom-0">السعر</th> --}}
                                                <th class="wd-20p border-bottom-0">خيارات</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($fabrices as $fabrice)
                                            <tr>
												<td>{{$fabrice->type_fabrice}}</td>
												<td>{{$fabrice->number_fabrice}}</td>
												<td>{{$fabrice->color_fabrice}}</td>
                                                {{-- <td>200</td> --}}
												<td>

                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                       data-id="{{ $fabrice->id }}" data-type_fabrice="{{ $fabrice->type_fabrice }}"
                                                       data-number_fabrice="{{ $fabrice->number_fabrice }}" data-color_fabrice="{{ $fabrice->color_fabrice }}" data-toggle="modal" href="#exampleModal2"
                                                       title="تعديل"><i class="las la-pen"></i></a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{ $fabrice->id }}" data-type_fabrice="{{ $fabrice->type_fabrice }}" data-toggle="modal"
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
                                <div class="modal-header">
                                    <h6 class="modal-title">اضافة تصميم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('Products-fabrice.store')}}" method="POST">
                                        @csrf
                                    {{-- <div class="row col-4"> --}}
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">نوع القماش</label>
                                                    <input class="form-control" type="text" name="type_fabrice" placeholder="نوع القماش">

                                        </div>
                                        <div class="form-group">
                                            @php
                                            $com_code=Auth()->user()->com_code;
                                            $number_fabrice = !empty(\App\Models\Fabrics::where('com_code',$com_code)->latest()->first()->number_fabrice) ? ($number_fabrice = \App\Models\Fabrics::where('com_code',$com_code)->latest()->first()->number_fabrice) : 0;

                                            $number_fabrice = $number_fabrice+1;
                                        @endphp
                                            <label for="recipient-name" class="col-form-label"> رقم القماش</label>
                                                    <input class="form-control" type="text" name="number_fabrice" readonly value="{{ old('number_fabrice',$number_fabrice) }}" placeholder="رقم القماش">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label"> اللون</label>
                                                    <input class="form-control" type="text" name="color_fabrice" placeholder="اللون">
                                        </div>
                                                {{-- <td><label for="">السعر</label><br>
                                                    <input class="form-control" type="text">
                                                </td> --}}


                                    {{-- </div> --}}
                                     <div class="modal-footer">
                                    <button class="btn ripple btn-primary" type="submit">حفظ</button>
                                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الالغاء</button>
                                </form>
                                </div>
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

                        <form action="{{route('fabrice-update')}}" method="post" autocomplete="off">
                            {{-- {{method_field('patch')}} --}}
                            {{csrf_field()}}
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label">نوع القماش:</label>
                                <input class="form-control" class="form-control" name="type_fabrice" id="type_fabrice" type="text">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">رقم القماش:</label>
                                <input class="form-control" class="form-control" name="number_fabrice" id="number_fabrice" type="text">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">اللون القماش:</label>
                                <textarea class="form-control" id="color_fabrice" name="color_fabrice"></textarea>
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
                     <h6 class="modal-title">حذف القماش</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                    type="button"><span aria-hidden="true">&times;</span></button>
                 </div>
                 <form action="{{route('fabrice-delete')}}" method="post">
                     {{-- {{method_field('delete')}} --}}
                     {{csrf_field()}}
                     <div class="modal-body">
                         <p>هل انت متاكد من عملية الحذف ؟</p><br>
                         <input class="form-control" type="hidden" name="id" id="id" value="">
                         <input class="form-control" class="form-control" name="type_fabrice" id="type_fabrice" type="text" readonly>
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

<script src="{{URL::asset('assets/plugins/product/fabrics/js/fabrics.js')}}"></script>

@endsection
