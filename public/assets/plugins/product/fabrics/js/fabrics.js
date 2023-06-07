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
        var type_fabrice = button.data('type_fabrice')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #type_fabrice').val(type_fabrice);
    })
