<div id="ajax_add_color">
    {{-- <input type="hidden" id="ajax_search_url" name="ajax_search_url" value="{{ route('Sale-point-ajax_color') }}">
    <input type="hidden" id="token_search" name="token_search" value="{{ csrf_field() }}"> --}}
            <label for="">اللون القماش</label><br>
            @if (!@empty($fabrices->color))
            <input  class="form-control" type="text" name="color_fabrice" id="color_fabrice" value="{{ $fabrices->color }}">
            @endif
@if (@empty($fabrices->color))


            <select class="form-control" name="color_fabrice" id="">
                <option value="" label="بدون"></option>
                {{-- @foreach ($fabrices as $fabrice)
                    <option value="{{ $fabrice->color_fabrice }}">
                        {{ $fabrice->color_fabrice }}
                    </option>
                @endforeach --}}
            </select>
            @endif

            <label for="">العلامة التجارية</label><br>

            @if (!@empty($fabrices->mark))
            <input  class="form-control" type="text" name="name_trade_mark" id="name_trade_mark" value="{{ $fabrices->mark }}">

            @endif
            @if (@empty($fabrices->mark))
            <select class="form-control" name="name_trade_mark" id="">
                <option value="" label="بدون"></option>
                {{-- @foreach ($trademarks as $trademark)
                    <option value="{{ $trademark->name_trade_mark }}">
                        {{ $trademark->name_trade_mark }}</option>
                @endforeach --}}
            </select>

            @endif
            @if (!@empty($fabrices->meters))

            <label for="">الكمية المتبقية في المخزن </label><br>
            <input  class="form-control" type="text" name="" id="" value="{{ $fabrices->meters }}">
            @endif
</div>
