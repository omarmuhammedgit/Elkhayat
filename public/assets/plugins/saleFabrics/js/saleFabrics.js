$(document).ready(function(){
$(document).on('change','#search_by_text',function(e){

    make_search();

});
function make_search(){
    var search_by_text=$('#search_by_text').val();
    var ajax_search_url=$('#ajax_search_url').val();
    var token_search=$('#token_search').val();
    jQuery.ajax({

        url:ajax_search_url,
        type:'post',
        dataType:'html',
        cache:false,
        data:{search_by_text:search_by_text,'_token':token_search},
        success:function(data){
            $(".ajax_fabrics").html(data);

        },
        error:function(){

        }
    });
}
$(document).on('input','#quantity_sold',function(){
    var search_by_text =$('#search_by_text').val();
    if (search_by_text=='') {
        alert('يرجى اختير اسم القماش اولا');
        $(this).val('');
        return false;

    }
    var quantity_available=parseFloat(document.getElementById("quantity_available").value);

    if ($(this).val()>quantity_available) {
        alert('الكمية التى ادخلتها اكبر من الكمية المتوفرة');
        $(this).val('');

    }
})
});
function printDiv() {
    var printContents = document.getElementById('print').innerHTML;
    var oiginalContents = document.body.innerHTML;
    // document.body.innerHTML=printContents;
    window.print();
    // document.body.innerHTML = oiginalContents;
    // location.reload();


}
$('#exampleModal2').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var name = button.data('name')
    var color = button.data('color')
    var date = button.data('date')
    var quantity_sold = button.data('quantity_sold')
    var quantity_available = button.data('quantity_available')
    var payment = button.data('payment')
    var no_invoics = button.data('no_invoics')
    var value = button.data('value')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #color').val(color);
    modal.find('.modal-body #date').val(date);
    modal.find('.modal-body #no_invoics').val(no_invoics);
    modal.find('.modal-body #value').val(value);
    modal.find('.modal-body #quantity_sold').val(quantity_sold);
    modal.find('.modal-body #quantity_available').val(quantity_available);
    modal.find('.modal-body #payment').val(payment);
})

$('#modaldemo9').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var code = button.data('code')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #code').val(code);
})

