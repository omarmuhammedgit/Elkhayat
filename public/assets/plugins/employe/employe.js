
$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var section_name = button.data('section_name')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #section_name').val(section_name);
})

