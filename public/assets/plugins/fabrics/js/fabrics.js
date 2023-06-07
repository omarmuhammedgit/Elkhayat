    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var type_fabrice = button.data('type_fabrice')
        var number_fabrice = button.data('number_fabrice')
        var color_fabrice = button.data('color_fabrice')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #type_fabrice').val(type_fabrice);
        modal.find('.modal-body #number_fabrice').val(number_fabrice);
        modal.find('.modal-body #color_fabrice').val(color_fabrice);
    })

    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    })

    $(document).ready(function(){
        $(document).on('input','#energies',function(e){
            var yards= $(this).val()*25;
            var meters= $(this).val()*23.5;
            $('#yards').val(yards);
            $('#meters').val(meters);

        })
        $(document).on('input','#balance_yard',function(e){
            var energies=$('#energies').val();
            if (energies=='') {
                alert('يرجى ادخال عدد الطاقات اولا');
                $(this).val('')
                return false;

            }
            var total= $(this).val()*$('#yards').val();
            $('#total').val(total);

        })

        $(document).on('change','#rate_tax',function(e){
            var total=$('#total').val();
            if (total=='') {
                alert('يرجى ادخال سعر الياردات اولا');
                $(this).val('')
                return false;

            }
            var value_tax= $('#total').val()*$(this).val()/100;
            var value_tax=parseFloat(value_tax);
            var total=parseFloat(document.getElementById("total").value);
            var total=total+ value_tax;
            $('#value_tax').val(value_tax);
            $('#total').val(total);


        })

        $(document).on('input','#receivedamount',function(e){
    var total = parseFloat(document.getElementById("total").value);
    var receivedamount = parseFloat(document.getElementById('receivedamount').value);
    if(receivedamount > total){
        alert('السعر المدخل اكبر من السعر المطلوب');
        document.getElementById("receivedamount").value='';

        return false;
    }
    var result = total - receivedamount;
    var result = parseFloat(result).toFixed(2);
    document.getElementById('remainingamount').value = result;
})
    });
