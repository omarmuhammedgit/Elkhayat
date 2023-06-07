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
							<h4 class="content-title mb-0 my-auto">المشتريات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ مرجع الشراء</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
                    <!--div-->
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
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
										<p class="mg-b-10">نطاق التاريخ</p>
                                        <input type="date" name="saledate" id="saledate">
									</div><!-- col-4 -->
								</div>
							</div>
						</div>
                        <div class="card-header pb-0" >
                            <div class="d-flex justify-content-between" style="text-align: center;">
                                <h4 class="card-title mg-b-0">جميع مرجع المشتريات</h4>
                            </div>
                            <div class="card-body" style="text-align: left;">
                                <a class="btn ripple btn-info" data-target="#modaldemo3" data-toggle="modal" href="">اضافة</a>
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
												<th class="wd-15p border-bottom-0">التاريخ</th>
												<th class="wd-20p border-bottom-0">الرقم المرجعي</th>
                                                <th class="wd-25p border-bottom-0">المشتريات الاصل</th>
												<th class="wd-15p border-bottom-0"> الفرع </th>
												<th class="wd-10p border-bottom-0"> المورد</th>
                                                <th class="wd-25p border-bottom-0">حالة الدفع</th>
                                                <th class="wd-25p border-bottom-0">المجموع</th>
                                                <th class="wd-25p border-bottom-0">دفع مستحق</th>
                                                <th class="wd-15p border-bottom-0">خيار</th>

											</tr>
										</thead>
										<tbody>
                                            @php
                                             $collection=[];
                                            @endphp
                                            @foreach ($collection as $customer )
                                            <tr><td>
                                                <div class="dropdown">
                                                    <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary"
                                                    data-toggle="dropdown" type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        <a class="dropdown-item" href="#">طباعة</a>
                                                        <a class="dropdown-item " href="#">فحص</a>
                                                        <a class="dropdown-item" href="#">مرتجع الفاتورة</a>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>{{3}}</td>
                                            <td>{{3}}</td>
                                            <td>{{3}}</td>
												<td>{{3}}</td>
												<td>{{$customer->name}}</td>
												<td>System Develo</td>
												<td>2018/03/12</td>
												<td>{{$customer->number_dresses}}</td>
                                                {{-- @endforeach --}}
                                                {{-- @foreach ($sizes as $size ) --}}
												<td>{{6}}</td>

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
@endsection
