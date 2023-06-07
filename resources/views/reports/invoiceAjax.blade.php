
<div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">

    @if (@isset($data) and !@empty($data) and count($data) > 0)
        <div id="print">
            <table id="example2" class="table table-bordered table-hover">
                <thead style="background-color: blue; color:aliceblue">
                    <tr>
                        <th>كود العميل </th>
                        <th>اسم العميل </th>
                        <th>رقم الفاتورة</th>
                        <th>حالة الفاتورة</th>
                        <th>المبلغ شامل الضريبة  </th>
                        <th>المبلغ المستلم  </th>
                        <th>المبلغ المتبقي  </th>
                        <th>عدد الثياب </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $numberInvoice = 0;
                    @endphp
                    @foreach ($data as $info)

                            <tr>
                                <td>{{ $info->customer->code }}</td>
                                <td>{{ $info->customer->name }}</td>
                                <td>{{ $info->invoice_number }}</td>
                                <td>
                                    {{ $info->status }}
                                </td>
                                <td>{{ $info->afterdiscount }}</td>
                                <td>{{ $info->receivedamount }}</td>
                                <td>{{ $info->remainingamount }}</td>
                                <td>{{ $info->number_dresses }}</td>
                            </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
    @endif
</div>
