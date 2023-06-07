$('#exampleModal2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var phone = button.data('phone')
    var date = button.data('date')
    var code = button.data('code')
    var number_repairs = button.data('number_repairs')
    var delivery_date = button.data('delivery_date')
    var payment = button.data('payment')
    var no_invoics = button.data('no_invoics')
    var value = button.data('value')
    var repair = button.data('repair')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #date').val(date);
    modal.find('.modal-body #no_invoics').val(no_invoics);
    modal.find('.modal-body #value').val(value);
    modal.find('.modal-body #code').val(code);
    modal.find('.modal-body #number_repairs').val(number_repairs);
    modal.find('.modal-body #delivery_date').val(delivery_date);
    modal.find('.modal-body #payment').val(payment);
    modal.find('.modal-body #repair').val(repair);
})

$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var code = button.data('code')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #code').val(code);
})
