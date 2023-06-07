@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <style>
        td input{
            /* background-color: blue; */
            /* text-align: center; */

        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المبيعات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    المبيعات</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
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
        {{-- <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="row row-sm mg-b-20">
									<div class="col-lg-4">
										<p class="mg-b-10">اسم العميل</p>
                                        <input type="text" name="namecline" id="namecline" placeholder="ادخل اسم العميل">
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">تاريخ المبيعات</p>
                                        <input type="date" name="saledate" id="saledate">
									</div><!-- col-4 -->
									<div class="col-lg-4 mg-t-20 mg-lg-t-0">
										<p class="mg-b-10">نوع التصميم</p><select class="form-control select2" >
											<option label="Choose one">
											</option>
											<option value="Firefox">
												Firefox
											</option>
											<option value="Chrome">
												Chrome
											</option>
											<option value="Safari">
												Safari
											</option>
											<option value="Opera">
												Opera
											</option>
											<option value="Internet Explorer">
												Internet Explorer
											</option>
										</select>
									</div><!-- col-4 -->
								</div>
							</div>
						</div>
					</div> --}}
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1" data-page-length="50">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">اسم العميل</th>
                                    <th class="wd-15p border-bottom-0">رقم الهاتف</th>
                                    <th class="wd-15p border-bottom-0">كود العميل</th>
                                    <th class="wd-10p border-bottom-0">عدد الثياب</th>
                                    <th class="wd-15p border-bottom-0">التاريخ</th>
                                    <th class="wd-15p border-bottom-0">رقم الفاتورة</th>
                                    <th class="wd-20p border-bottom-0">المبلغ المستلم</th>
                                    <th class="wd-15p border-bottom-0">المبلغ المتبقي</th>
                                    <th class="wd-25p border-bottom-0">نوع التصميم</th>
                                    <th class="wd-25p border-bottom-0">الاخيارات</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $size)
                                    <tr>
                                        <td>{{ $size->customer->invoice_number }}</td>
                                        <td>{{ $size->customer->name }}</td>
                                        <td>{{ $size->customer->number_dresses }}</td>
                                        <td>{{ $size->receivedamount }}</td>
                                        <td>{{ $size->remainingamount }}</td>
                                        <td>{{ $size->design->name_design }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary" data-toggle="dropdown"
                                                    type="button">خيارات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <button class="btn btn-primary btn-block"><a class="dropdown-item"
                                                            href="print-invoice/{{ $size->id }}">طباعة</a></button>
                                                    <button class="btn btn-info btn-block">
                                                        <a class="dropdown-item "
                                                            data-effect="effect-scale"
                                                            data-name="{{ $size->customer->name }}"
                                                            data-remainingamount="{{ $size->remainingamount }}"
                                                            data-receivedamount="{{ $size->receivedamount }}"
                                                            data-number_dresses="{{ $size->customer->number_dresses }}"
                                                            data-name_design="{{ $size->design->name_design }}"
                                                            data-type_fabrice="{{ $size->fabric->type_fabrice }}"
                                                            data-color_fabrice="{{ $size->fabric->color_fabrice }}"
                                                            data-name_trade_mark="{{ $size->tradeMark->name_trade_mark }}"
                                                            data-retribution="{{ $size->retribution->name }}"
                                                            data-seamoer="{{ $size->seamoer->name }}"
                                                            data-name_section="{{ $size->section->name_section }}"
                                                            data-value_tax="{{ $size->value_tax }}" data-toggle="modal"
                                                            href="#checkup" title="فحص">
                                                            فحص</a></button>
                                                    {{-- <button class="btn btn-dark btn-block" > <a class="dropdown-item" href="#">مرتجع الفاتورة</a></button> --}}
                                                    <button class="btn btn-warning btn-block"> <a class="dropdown-item"
                                                            href="edit-Sale-menu/{{ $size->id }}">تعديل</a></button>
                                                    <button class="btn btn-danger btn-block">
                                                        <a class="dropdown-item"
                                                            data-effect="effect-scale" data-id="{{ $size->id }}"
                                                            data-customer_id="{{ $size->customer->id }}"
                                                            data-toggle="modal" href="#modaldemo9" title="حذف">
                                                            حذف</a></button>
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
        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الموظف</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('Sale-menu-delete') }}" method="post">
                        {{-- {{method_field('delete')}} --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input name="customer_id" id="customer_id" type="hidden">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- checkup -->
        <div class="modal" id="checkup">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف الموظف</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('Sale-menu-delete') }}" method="post">
                        {{-- {{method_field('delete')}} --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <table style="margin: 5%">
                                <tr style="padding: 20%">
                                    <td>
                                        اسم العميل : <br><input type="text" id="name" value=""><br></td>
                                    <td>
                                        عدد الثياب: <br><input name="number_dresses" id="number_dresses"
                                            type="text"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        المبلغ المستلم <br><input type="text" id="remainingamount" value="">

                                    </td>
                                    <td>

                                        المبلغ المتبقي <br><input type="text" id="receivedamount" value="">


                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        اسم التصميم <br><input type="text" id="name_design" value="">

                                    </td>
                                    <td>
                                        نوع القماش <br><input type="text" id="type_fabrice" value="">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        اللون القماش <br><input type="text" id="color_fabrice" value="">

                                    </td>
                                    <td>
                                        العلامة التجارية <br><input type="text" id="name_trade_mark" value="">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        اسم القصاص <br><input type="text" id="retribution" value="">

                                    </td>
                                    <td>
                                        اسم الخياط <br><input type="text" id="seamoer" value="">

                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        اسم القسم <br><input type="text" id="name_section" value="">

                                    </td>
                                    <td>
                                        قيمة الضريبة <br><input type="text" id="value_tax" value="">

                                    </td>

                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            {{-- <button type="submit" class="btn btn-danger">تاكيد</button> --}}
                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /row -->
    </div>
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
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var customer_id = button.data('customer_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #customer_id').val(customer_id);
        })
    </script>
    <script>
        $('#checkup').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var name = button.data('name')
            var remainingamount = button.data('remainingamount')
            var receivedamount = button.data('receivedamount')
            var number_dresses = button.data('number_dresses')
            var name_design = button.data('name_design')
            var type_fabrice = button.data('type_fabrice')
            var color_fabrice = button.data('color_fabrice')
            var name_trade_mark = button.data('name_trade_mark')
            var retribution = button.data('retribution')
            var seamoer = button.data('seamoer')
            var name_section = button.data('name_section')
            var value_tax = button.data('value_tax')
            var modal = $(this)
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #remainingamount').val(remainingamount);
            modal.find('.modal-body #receivedamount').val(receivedamount);
            modal.find('.modal-body #number_dresses').val(number_dresses);
            modal.find('.modal-body #name_design').val(name_design);
            modal.find('.modal-body #type_fabrice').val(type_fabrice);
            modal.find('.modal-body #color_fabrice').val(color_fabrice);
            modal.find('.modal-body #name_trade_mark').val(name_trade_mark);
            modal.find('.modal-body #retribution').val(retribution);
            modal.find('.modal-body #seamoer').val(seamoer);
            modal.find('.modal-body #name_section').val(name_section);
            modal.find('.modal-body #value_tax').val(value_tax);
        })
    </script>
@endsection
