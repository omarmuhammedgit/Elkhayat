
    function showSub(){
        document.getElementById("showSub").style.display='block';
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
        var name_unit = button.data('name_unit')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name_unit').val(name_unit);
    })
