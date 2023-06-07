@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<script src="{{URL::asset('assets/plugins/setting/css/setting.css')}}"></script>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4>
                            <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اعدادات الشركة</span>
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
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0" >
								<div class="d-flex justify-content-between" style="text-align: center;">
									<h4 class="card-title mg-b-0">قائمة الاعدادات</h4>
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
												<th class="wd-15p border-bottom-0">اسم الشركة</th>
												<th class="wd-15p border-bottom-0">رقم السجل التجاري</th>
												<th class="wd-20p border-bottom-0">رقم الهاتف</th>
                                                <th class="wd-20p border-bottom-0">البريد الالكتروني</th>
												<th class="wd-15p border-bottom-0">اسم المدينة</th>
												<th class="wd-15p border-bottom-0">اسم الحي</th>
												<th class="wd-20p border-bottom-0">اسم الشارع</th>
												<th class="wd-20p border-bottom-0">اضيفت بواسطة</th>
                                                <th class="wd-20p border-bottom-0">شعار الشركة</th>
                                                <th class="wd-20p border-bottom-0">خيارات</th>
											</tr>
										</thead>
										<tbody>
                                            @php
                                                // $settings=[];
                                            @endphp
                                            @foreach ($settings as $setting)
                                            <tr>
												<td>{{$setting->name}}</td>
												<td>{{$setting->commercial_record}}</td>
												<td>{{$setting->phone}}</td>
                                                <td>{{ $setting->email }}</td>
												<td>{{$setting->city}}</td>
												<td>{{$setting->country}}</td>
												<td>{{$setting->postal_code}}</td>
                                                <td>{{$setting->created_by}}</td>
                                                <td>

                                                        <img class="custom_img" src="{{ URL::asset('assets/uploads').'/'.$setting->image }}" alt="شعار الشركة">

                                                </td>
												<td>

                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                       data-id="{{ $setting->id }}" data-name="{{ $setting->name }}"
                                                       data-commercial_record="{{ $setting->commercial_record }}"
                                                       data-phone="{{ $setting->phone }}"
                                                       data-email="{{ $setting->email }}"
                                                       data-city="{{ $setting->city }}"
                                                       data-country="{{ $setting->country }}"
                                                       data-created_by="{{ $setting->created_by }}"
                                                       data-postal_code="{{ $setting->postal_code }}"
                                                       data-image="{{ $setting->image }}"
                                                        data-toggle="modal" href="#exampleModal2"
                                                       title="تعديل"><i class="las la-pen"></i></a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{ $setting->id }}" data-name_design="{{ $setting->name_design }}" data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>
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
                                    <h6 class="modal-title">اضافة الاعدادات</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('setting.create')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                                    <label for="">اسم شركة*</label><br>
                                                    <input class="form-control" type="text" name="name" placeholder="ادخل اسم الشركة" required>
                                        </div>
                                        <div class="form-group">

                                                    <label for="">رقم السجل التجاري*</label><br>
                                                    <input class="form-control" type="text" name="commercial_record" placeholder=" رقم السجل التجاري" required>
                                        </div>
                                        <div class="form-group">
                                                    <label for="">رقم الهاتف*</label><br>
                                                    <input class="form-control" type="text" name="phone" placeholder="رقم الهاتف" required>
                                        </div>
                                        <div class="form-group">
                                                    <label for="">البريد الالكتروني</label><br>
                                                    <input class="form-control" type="email" name="email" placeholder=" البريد الالكتروني" required>
                                        </div>
                                        <div class="form-group">

                                                    <label for="">اسم المدينة</label><br>
                                                    <input class="form-control" type="text" name="city" placeholder="اسم المدينة" >
                                        </div>
                                        <div class="form-group">
                                                    <label for="">اسم الحي</label><br>
                                                    <input class="form-control" type="text" name="country" placeholder="اسم الحي" >
                                        </div>
                                        <div class="form-group">

                                                    <label for="">اسم الشارع</label><br>
                                                    <input class="form-control" type="text" name="postal_code" placeholder="اسم الشارع " >
                                        </div>

                                </div>



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
                               <h5 class="modal-title" id="exampleModalLabel">تعديل الاعدادات</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                           </div>
                           <div class="modal-body">

                               <form action="{{route('Setting.update')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                                   {{-- {{method_field('patch')}} --}}
                                   {{csrf_field()}}
                                   <div class="form-group">
                                    <input type="hidden" name="id" id="id">
                                    <label for="">اسم شركة*</label><br>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="ادخل اسم الشركة" required>
                        </div>
                        <div class="form-group">

                                    <label for="">رقم السجل التجاري*</label><br>
                                    <input class="form-control" type="text" name="commercial_record" id="commercial_record" placeholder=" رقم السجل التجاري" required>
                        </div>
                        <div class="form-group">
                                    <label for="">رقم الهاتف*</label><br>
                                    <input class="form-control" type="text" name="phone" id="phone" placeholder="رقم الهاتف" required>
                        </div>
                        <div class="form-group">
                                    <label for="">البريد الالكتروني</label><br>
                                    <input class="form-control" type="email" name="email" id="email" placeholder=" البريد الالكتروني" required>
                        </div>
                        <div class="form-group">

                                    <label for="">اسم المدينة</label><br>
                                    <input class="form-control" type="text" name="city" id="city" placeholder="اسم المدينة" >
                        </div>
                        <div class="form-group">
                                    <label for="">اسم الحي</label><br>
                                    <input class="form-control" type="text" name="country" id="country" placeholder="اسم البلد" >
                        </div>
                        <div class="form-group">

                                    <label for="">اسم الشارع</label><br>
                                    <input class="form-control" type="text" name="postal_code" id="postal_code" placeholder="الرمز البريدي" >
                        </div>
                             {{-- <div class="form-group">

                                <label for=""> شعار الشركة</label><br>
                                <img class="custom_img" src="{{ URL::asset('assets/uploads').'/'.$setting->image }}" alt="شعار الشركة">
                                <button type="button" class="btn btn-sm btn-danger" id="update_image">تغير الصورة</button>
                                <button type="button" class="btn btn-sm btn-danger" id="cancel_update_image" style="display: none"> الغاء</button>
                                <input class="form-control" type="text" name="created_by" id="created_by" placeholder="الرمز البريدي" >
                                 </div>
                                 <div id="oldImage"></div>
                           </div> --}}
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
                            <h6 class="modal-title">حذف الاعدادات</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                           type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="{{route('setting.delete')}}" method="post">
                            {{-- {{method_field('delete')}} --}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                <input class="form-control" type="hidden" name="id" id="id" value="">
                                {{-- <input class="form-control" class="form-control" name="name_design" id="name_design" type="text" readonly> --}}
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
<script src="{{URL::asset('assets/plugins/setting/js/setting.js')}}"></script>



@endsection
