$('#exampleModal2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var code = button.data('code')
    var date = button.data('date')
    var phone = button.data('phone')
    var address = button.data('address')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #code').val(code);
    modal.find('.modal-body #date').val(date);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #address').val(address);
})

$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
})
