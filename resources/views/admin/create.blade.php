@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->

    @if (session()->has('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title card_title_center">اضافة مستخدم جديد </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                            @php
                            $com_code = !empty(\App\Models\Admin::latest()->first()->com_code) ? ($com_code = \App\Models\Admin::latest()->first()->com_code) : 0;
                            // $number_invoice=!empty($)?$number_invoice:0000;
                            $com_code =$com_code +1 ;
                        @endphp
                            <label for="">كود  </label>
                            <input type="text" class="form-control" name="com_code" id="com_code" value="{{ old('com_code',$com_code) }}">
                            @error('com_code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">الاسم   </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">البريد الالكتروني</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">اسم المستخدم  </label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">كلمة المرور   </label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">تاكيد كلمة المرور   </label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password') }}">

                        </div>
                        <div class="col-md-6">
                            <label for="">حالة التفعيل </label>
                        <select name="active" id="active" class="form-control">
                            <option value="">اختر الحالة</option>
                            <option @if (old('active')==1) selected="selected" @endif value="1">مفعل </option>
                            <option @if (old('active')==0 and old('active')!= null) selected="selected" @endif value="0">معطل</option>
                        </select>
                        @error('active')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                        </div>
                        </div>
                </div>

            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-sm"> اضافة</button>
                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm"> الالغاء</a>
                </div>
            </form>
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
