
<div class="ajaxresponcesearchDiv" id="ajaxresponcesearchDiv">

    @if (@isset($data) and !@empty($data) and count($data) > 0)
        <div id="print">
            <table id="example2" class="table table-bordered table-hover">
                <thead style="background-color: blue; color:aliceblue">
                    <tr>
                        <th>اسم العميل </th>
                        <th>رقم الفاتورة</th>
                        <th>عدد الثياب </th>
                        <th>تاريخ التفصيل   </th>
                        <th>تاريخ الاستلام  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $info)
                        <tr>
                            <td>{{ $info->customer->name }}</td>
                            <td>{{ $info->invoice_number }}</td>
                            <td>{{ $info->number_dresses }}</td>
                            <td>{{ $info->date }}</td>
                            <td>{{ $info->receved_data }}</td>
                            {{-- <td>{{ $info->total_after_tex }}</td> --}}

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @else
    @endif
</div>
