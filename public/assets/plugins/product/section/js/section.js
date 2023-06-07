
function showSub(){
    document.getElementById("showsub").style.display='block';
}

    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_section = button.data('name_section')
        var sub_section = button.data('sub_section')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_section').val(name_section);
        modal.find('.modal-body #sub_section').val(sub_section);
    })

    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name_section = button.data('name_section')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_section').val(name_section);
    })
