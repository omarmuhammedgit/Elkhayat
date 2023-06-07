
$('#exampleModal2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var commercial_record = button.data('commercial_record')
    var phone = button.data('phone')
    var email = button.data('email')
    var city = button.data('city')
    var country = button.data('country')
    var postal_code = button.data('postal_code')
    var created_by = button.data('created_by')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #commercial_record').val(commercial_record);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #city').val(city);
    modal.find('.modal-body #country').val(country);
    modal.find('.modal-body #postal_code').val(postal_code);
    modal.find('.modal-body #created_by').val(created_by);
})

$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
})
$(document).ready(function(){
    $(document).on('click','#update_image',function(e){
        e.preventDefault();
        // if(!('#image').length){
            $('#update_image').hide();
            $('#cancel_update_image').show();
            $('#oldImage').html('<br><input type="file" id="image" name="image">')

        // }
        return false;
    });
    $(document).on('click','#cancel_update_image',function(e){
        e.preventDefault();
        // if(!('#image').length){
            $('#cancel_update_image').hide();
            $('#update_image').show();
            $('#oldImage').html('')

        // }
        return false;
    });
});
