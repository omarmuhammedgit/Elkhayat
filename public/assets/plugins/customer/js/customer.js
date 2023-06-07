$('#exampleModal2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var code = button.data('code')
    var email = button.data('email')
    var phone = button.data('phone')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #code').val(code);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #phone').val(phone);
})

$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
})
