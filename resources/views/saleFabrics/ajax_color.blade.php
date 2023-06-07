<style>
    .ajax_srearch{
        margin-right: 10%;
         width:230px
    }
</style>
        <div class="row ajax_fabrics">
            @if (!@empty($fabrices))
            <div class="col-md-4" >
                <label for="" class="ajax_srearch">اسم القماش </label>
                <select name="name" id="search_by_text" class="form-control ajax_srearch" >
                    <option value="{{ $fabrices->name}}">{{ $fabrices->name }}</option>
                    <option value="">بدون</option>
                    @foreach ($fabric as $fabric)
                    <option value="{{ $fabric->name}}">{{ $fabric->name }}</option>

                    @endforeach
                </select>

            </div>

            <div class="col-md-4">
                <label for="" class="ajax_srearch">اللون القماش</label>
                <input type="text" class="form-control ajax_srearch" name="color" id="color" value="{{ $fabrices->color }}">
            </div>
            <div class="col-md-4">
                <label for="" class="ajax_srearch">الكمية المتوفرة </label>
                <input type="text" class="form-control ajax_srearch" name="quantity_available" id="quantity_available" value="{{ $fabrices->meters }}">
            </div>
        </div><br>
        @endif
        @if (@empty($fabrices))
            <div class="col-md-4" >
                <label for="" class="ajax_srearch">اسم القماش </label>
                <select name="name" id="search_by_text" class="form-control ajax_srearch">
                                        <option value="">بدون</option>
                    @foreach ($fabric as $fabric)
                    <option value="{{ $fabric->name}}">{{ $fabric->name }}</option>

                    @endforeach
                </select>

            </div>

            <div class="col-md-4">
                <label for=""  class="ajax_srearch">اللون القماش</label>
                <input type="text" class="form-control ajax_srearch" name="color" id="color">
            </div>
            <div class="col-md-4">
                <label for="" class="ajax_srearch">الكمية المتوفرة </label>
                <input type="text" class="form-control ajax_srearch" name="quantity_available" id="quantity_available">
            </div>
        </div><br>
        @endif


