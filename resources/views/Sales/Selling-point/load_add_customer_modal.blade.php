<form action="{{ route('Customer.store') }}" method="POST">
    @csrf
    <div class="form-group">

        <label for="">اسم العميل*</label><br>
        <input class="form-control" type="text" name="name" id="nameAjax" placeholder="اسم العميل">
    </div>
    <div class="form-group">
        @php
            $code = !empty(\App\Models\Customer::latest()->first()->code) ? ($code = \App\Models\Customer::latest()->first()->code) : 00453;

            $code = str_pad($code + 1, 5, 0, STR_PAD_LEFT);
        @endphp

        <label for="">كود العميل*</label><br>
        <input class="form-control" type="text" id="codeAjax" name="code" placeholder="كود العميل"
            value="{{ $code }}">
    </div>
    <div class="form-group">

        <label for="">رقم الهاتف*</label><br>
        <input class="form-control" type="text" name="phone" id="phoneAjax" placeholder="رقم الهاتف">
    </div>
    <div class="form-group">

        <label for="">البريد الالكتروني</label><br>
        <input class="form-control" type="text" name="email" id="emailAjax" placeholder="البريد الاكتروني">
    </div>


