
<div class="row row-sm" id="addCustomer">

    <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        <div class="input-group">
            اسم العميل : <div class="input-group">
                <select class="form-control" name="customer" id="">
                    @foreach ($customer as $customer)
                        <option @if (old('customer') == $customer->id) selected="selected" @endif
                            value="{{ $customer->id }}">{{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-success btn-icon" type="button" id="showModalAddCustomer" title="اضافة عميل"><i
                        class="typcn typcn-document-add"></i></button>
            </div>


        </div>
    </div>
    <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        @php
            $code = !empty(\App\Models\Customer::latest()->first()->code) ? ($code = \App\Models\Customer::latest()->first()->code) : 00453;

            $code = str_pad($code + 1, 5, 0, STR_PAD_LEFT);
        @endphp
        <div >
            كود العميل <select class="form-control" name="code" id=""
                value={{ old('code') }}>
                @if (!@empty($customer) && @isset($customer))
                @foreach ($customercode as $customer)
                    <option @if (old('code') == $customer->code) selected="selected" @endif
                        value="{{ $customer->code }}">{{ $customer->code }} </option>
                @endforeach
            @endif


            </select>

        </div>
    </div>
    <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        <div>
            عدد الثياب <input class="form-control" type="number" name="number_dresses"
                id="number_dresses" placeholder="عدد الثياب" value="{{ old('number_dresses') }}">
        </div>
    </div>
    <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        <div>
            مدة التفصيل <input class="form-control" type="number" id="detail_duration"
                name="detail_duration" placeholder="مدة التفصيل"
                value="{{ old('detail_duration') }}">
        </div>
    </div>
    <div class="col-lg-2 mg-t-20 mg-lg-t-0">

        <div>
            @php
                $date = date('Y/m/d');
            @endphp

            التاريخ طلب <br><input class="form-control" type="text" name="date" readonly
                value="{{ $date }}">
        </div>
    </div>
    <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        @php
            $com_code = Auth()->user()->com_code;
            $number_invoice = !empty(
                \App\Models\Invoice::where('com_code', $com_code)
                    ->latest()
                    ->first()->invoice_number
            )
                ? ($number_invoice = \App\Models\Invoice::where('com_code', $com_code)
                    ->latest()
                    ->first()->invoice_number)
                : 0000;
            // $number_invoice=!empty($)?$number_invoice:0000;
            $number_invoice = str_pad($number_invoice + 1, 5, 0, STR_PAD_LEFT);
        @endphp
        <div>
            رقم الفاتورة<input class="form-control" type="number" name="invoice_number"
                value="{{ old('invoice_number', $number_invoice) }}" placeholder="رقم الفاتورة"
                readonly>
        </div>
    </div>

</div>

{{-- <script src="{{ URL::asset('assets/plugins/sales/sellingPoint/js/sellingPoint.js') }}"></script> --}}
