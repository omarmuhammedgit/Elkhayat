

$('#modaldemo3').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var remainingamount = button.data('remainingamount')
    var receivedamount = button.data('receivedamount')
    var afterdiscount = button.data('afterdiscount')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #addremainingamount').val(remainingamount);
    modal.find('.modal-body #addreceivedamount').val(receivedamount);
    modal.find('.modal-body #afterdiscount').val(afterdiscount);
})

function myAddInstalment() {
    var afterdiscount = parseFloat(document.getElementById("afterdiscount").value);
    var addremainingamount = parseFloat(document.getElementById("addremainingamount").value);
    var addreceivedamount = parseFloat(document.getElementById("addreceivedamount").value);
    var amount = parseFloat(document.getElementById("amount").value);
    // var value_tax = price_tax / 1.15;
    // var result = value_tax * 15 / 100;
    if(amount > addremainingamount){
        alert("المبلغ المدخل اكبر من المبلغ المتبقي");
        document.getElementById("amount").value='';
        return false;
    }
   var addreceivedamount= addreceivedamount + amount;
    var addremainingamount = afterdiscount - addreceivedamount;
    var addremainingamount = parseFloat(addremainingamount).toFixed(2);
    var addreceivedamount = parseFloat(addreceivedamount).toFixed(2);
    document.getElementById('addremainingamount').value = addremainingamount;
    document.getElementById('addreceivedamount').value = addreceivedamount;

}

$('#exampleModal2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name_unit = button.data('name_unit')
    var sub_unit = button.data('sub_unit')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name_unit').val(name_unit);
    modal.find('.modal-body #sub_unit').val(sub_unit);
})

$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    // var name_unit = button.data('name_unit')
    // var sub_unit = button.data('sub_unit')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    // modal.find('.modal-body #name_unit').val(name_unit);
    // modal.find('.modal-body #sub_unit').val(sub_unit);
})

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
