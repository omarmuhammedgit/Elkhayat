@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->

    @if (session()->has('Add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('Add') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('edit') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header ">
            <a href="{{ route('user.create') }}" class="btn btn-success">اضافة</a><br>
            
          <h3 class="card-title card_title_center" >عرض  بيانات  المستخدمين</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (@isset($data) && !@empty($data) &&  count($data)>0)
          <table id="example2" class="table table-bordered table-hover">
            <thead   style="background-color: #233490; color:#fff">
            <tr>
                <th> #</th>
              <th>كود  </th>
              <th>الاسم </th>
              <th>اسم المستخدم</th>
              <th>البريد الالكتروني </th>
              <th>حالة المستخدم </th>
              <th>خيارات  </th>
            </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($data as $info)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $info->com_code }}</td>
                    <td>{{ $info->name }}</td>
                    <td>{{ $info->username }}</td>
                    <td>{{ $info->email }}</td><td>
                        @if ($info->active == 1)
                            مفعل
                        @else
                            معطل
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('user.edit',$info->id) }}" class="btn btn-info"> تعديل</a>
                        <a href="" class="btn btn-danger">حذف</a>
                    </td>
                </tr>
                @php
                $i++;
            @endphp
                @endforeach

            </tbody>
          </table>
          @else
              <div class="alert alert-danger">
                  عفوا لا يوجد بيانات لعرضها
              </div>
          @endif
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
@endsection
