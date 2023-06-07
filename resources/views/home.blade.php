@extends('layouts.master')
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">

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
					<div class="left-content">
						<div>
						  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بك في برنامج الخياط !</h2>
						</div>
					</div>
					<div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">
                                <a class="btn ripple btn-info"  href="{{route('Sale-point.index')}}">نقطة البيع</a>


                                </label>

						</div>
						<div>

						</div>

					</div>
				</div>
				<!-- /breadcrumb -->
@endsection
@section('content')


				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-primary-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
                                    @php
                                            $time=time()-(7 * 24 * 60 * 60);
                                            $dateold=date('Y/m/d',$time);
                                            $date=date("Y/m/d");
                                            $com_code=Auth()->user()->com_code;
                                        @endphp
									<h2 class="mb-3 tx-12 text-white">اجمالي المبيعات</h2>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h5 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Size::whereBetween('date',[$dateold,$date])->where('com_code',$com_code)->sum('afterdiscount')}} ريال</h5>
											<p class="mb-0 tx-12 text-white op-7" style="font-size: 15px">المبيعات خلال الاسبوع الماضي
                                            </p>
										</div>
									</div>
								</div>
							</div>
							<span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-danger-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">اجمالي ضريبة المبيعات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">

										<div class="">
											<h5 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Size::whereBetween('date',[$dateold,$date])->where('com_code',$com_code)->sum('value_tax')}} ريال</h5>
											<p class="mb-0 tx-12 text-white op-7" style="font-size: 15px">ضريبة المبيعات خلال الاسبوع الماضي</p>
										</div>
										{{-- <span class="float-right my-auto mr-auto">
											<i class="fas fa-arrow-circle-down text-white"></i>
											<span class="text-white op-7"> -23.09%</span>
										</span> --}}
									</div>
								</div>
							</div>
							<span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-success-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">اجمالي المبيعات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">

                                    @php
                                    $time=time()-(30 * 24 * 60 * 60);
                                    $dateold=date('Y/m/d',$time);
                                    $date=date("Y/m/d");
                                    // dd($date);
                                @endphp
										<div class="">
											<h5 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Size::whereBetween('date',[$dateold,$date])->where('com_code',$com_code)->sum('afterdiscount')}} ريال</h5>
											<p class="mb-0 tx-12 text-white op-7" style="font-size: 15px">المبيعات خلال  الشهر الماضي</p>
										</div>
									</div>
								</div>
							</div>
							<span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
						</div>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
						<div class="card overflow-hidden sales-card bg-warning-gradient">
							<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
								<div class="">
									<h6 class="mb-3 tx-12 text-white">اجمالي ضريبة المبيعات</h6>
								</div>
								<div class="pb-0 mt-0">
									<div class="d-flex">
										<div class="">
											<h4 class="tx-20 font-weight-bold mb-1 text-white">{{\App\Models\Size::whereBetween('date',[$dateold,$date])->where('com_code',$com_code)->sum('value_tax')}} ريال</h4>
											<p class="mb-0 tx-12 text-white op-7" style="font-size: 15px">ضريبة المبيعات خلال الشهر الماضي</p>
										</div>
									</div>
								</div>
							</div>
							<span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
						</div>
					</div>
				</div>
				<!-- row closed -->

				<!-- row opened -->
				<div class="row row-sm">
					<div class="col-md-12 col-lg-12 col-xl-5">


						<div class="card ">
							<div class="card-body">
								<div class="row">
                                    <div class="col-lg-5" style="margin-right: 10%">
										<div class="d-flex align-items-center pb-2">
											<p class="mb-0">عدد الموظفين</p>
										</div>
										<h4 class="font-weight-bold mb-2">{{\App\Models\Employe::where('com_code',$com_code)->count()}}</h4>

									</div>
									<div class="col-lg-4" style="margin-right: 13%">
										<div class="d-flex align-items-center pb-2">
											<p class="mb-0">عدد العملاء</p>
										</div>
										<h4 class="font-weight-bold mb-2">{{\App\Models\Customer::where('com_code',$com_code)->count()}}</h4>

									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-lg-12 col-xl-7">
						<div class="card">

							<div class="card-header pb-0" >
								<div class="d-flex justify-content-between" style="text-align: center;">
									<h4 class="card-title mg-b-0">  الثياب  التي يتم تسليمها اليوم والغدا</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1" data-page-length="50">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">اسم العميل</th>
												<th class="wd-15p border-bottom-0">عدد الثياب</th>
												<th class="wd-20p border-bottom-0">التاريخ الاستلام</th>
												<th class="wd-15p border-bottom-0">المبلغ المستلم</th>
												<th class="wd-10p border-bottom-0">الاجمالي</th>
											</tr>
										</thead>
										<tbody>

                                            @php
                                            $numberInvoice=0;
                                        @endphp
                                            @foreach ($sizes as $size)
                                            @if ($numberInvoice==$size->invoice->invoice_number)

                                            @else
                                            @php
                                            $numberInvoice=$size->invoice->invoice_number;
                                            $numberInvoiceid=$size->invoice->id;
                                            $receivedamount=\app\Models\Size::where('invoice_id',$numberInvoiceid)->where('com_code',$com_code)->sum('receivedamount');
// dd($receivedamount);
                                            $afterdiscount=\app\Models\Size::where('invoice_id',$numberInvoiceid)->where('com_code',$com_code)->sum('afterdiscount');
                                        @endphp
											<tr>
												<td>
                                                    {{$size->customer->name}}
                                                </td>
												<td>{{$size->number_dresses}}</td>
												<td>{{$size->receved_data}}</td>
												<td>{{$receivedamount}}</td>
							 					<td>{{$afterdiscount}}</td>
											</tr>
                                            @endif
                                            @endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					</div>

				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

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
