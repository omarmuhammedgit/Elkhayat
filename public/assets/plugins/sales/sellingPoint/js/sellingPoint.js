$(document).ready(function(){
    $(document).on('click','#urlherf',function(e){
        var number_dresses=document.getElementById('number_dresses').value;
        if(number_dresses <=1){
            alert('يجب ان يكون عدد الثياب اكثر من ثوب');
            return false;

        }else{
            var url=document.getElementById('url').value;
            // var url=document.getElementById('formAction').value;
            // alert(url);
            document.getElementById('formAction').action=url;
        }
    });

    $(document).on('change','#type_fabrice',function(e){

        make_search();

    });
    function make_search(){
        var search_by_text=$('#type_fabrice').val();
        // alert(search_by_text);
        var ajax_search_url=$('#ajax_search_url').val();
        var token_search=$('#token_search').val();
        // alert(token_search);
        jQuery.ajax({

            url:ajax_search_url,
            type:'post',
            dataType:'html',
            cache:false,
            data:{search_by_text:search_by_text,'_token':token_search},
            success:function(data){
                $("#ajax_add_color").html(data);

            },
            error:function(){

            }
        });
    }

    $(document).on('click','#showModalAddCustomer',function(e){
         var ajax_url=$('#reloadaddCustomerAjax_url').val();
        var token_search=$('#token_search').val();
        jQuery.ajax({

            url:ajax_url,
            type:'post',
            dataType:'html',
            cache:false,
            data:{'_token':token_search},
            success:function(data){

                $("#add_new_customer_modal_body").html(data);
                $("#add_new_customer_modal").modal('show');

            },
            error:function(){
            }
        });
    });

    $(document).on('click','#addcustomerbtn',function(e){
        addCustomer();

    });
    function addCustomer(){

        var name=$('#nameAjax').val();
        var phone=$('#phoneAjax').val();
        var code=$('#codeAjax').val();
        var email=$('#emailAjax').val();
        var ajax_search_url=$('#ajax_search_urlCustomer').val();
        var token_search=$('#token_search').val();

        jQuery.ajax({

            url:ajax_search_url,
            type:'post',
            dataType:'html',
            cache:false,
            data:{name:name,phone:phone,code:code,email:email,'_token':token_search},
            success:function(data){

                $("#addCustomer").html(data);
                alert('تمت اضافة العميل بنجاح يمكنك اغلاق نافذة لي متابعة عملية  البيع')
                $("#add_new_customer_modal_body").html("");
                $("#add_new_customer_modal").modal('hide');

            },
            error:function(){
            }
        });

    }



});
$(document).on('input','#tex_parcent',function(e){
    var price_tax =  $('#tax').val();
    if (price_tax=='') {
        alert('من فضلك ادخل السعر غير شامل لضريبة اولا');
        $('#tex_parcent').val(0);
        $('#tax').focus();
        return false;
    }
    myfunction();
});
var imgselect1 = document.getElementById('imgselect1').value;
document.getElementById('Imgcbk').src = imgselect1;

function imageSelect1() {
    var imgselect1 = document.getElementById('imgselect1').value;
    document.getElementById('Imgcbk').src = imgselect1;

}
var imgselect2 = document.getElementById('imgselect2').value;
document.getElementById('image_neck').src = imgselect2;

function imageSelect2() {
    var imgselect2 = document.getElementById('imgselect2').value;
    document.getElementById('image_neck').src = imgselect2;

}
var imgselect3 = document.getElementById('imgselect3').value;
document.getElementById('image_brest_pocket').src = imgselect3;

function imageSelect3() {
    var imgselect3 = document.getElementById('imgselect3').value;
    document.getElementById('image_brest_pocket').src = imgselect3;

}
var imgselect4 = document.getElementById('imgselect4').value;
document.getElementById('image_pocket').src = imgselect4;

function imageSelect4() {
    var imgselect4 = document.getElementById('imgselect4').value;
    document.getElementById('image_pocket').src = imgselect4;

}
var imgselect5 = document.getElementById('imgselect5').value;
document.getElementById('image_algizour').src = imgselect5;

function imageSelect5() {
    var imgselect5 = document.getElementById('imgselect5').value;
    document.getElementById('image_algizour').src = imgselect5;

}

function myfunction() {
    var price_tax = parseFloat(document.getElementById("price_tax").value);
    var tax = parseFloat(document.getElementById('tax').value);
    var tex_parcent = $('#tex_parcent').val();
    if (tex_parcent=="") {
        tex_parcent=0;
    }
    if (tex_parcent>100) {
        alert('عفوا لايمكن ان تكون نسبة الضريبة اكبر من 100 ');
        $('#tex_parcent').val(0);
        $('#tex_parcent').focus();

    }
    var result = tax * tex_parcent / 100;
    var price_tax=tax +result;
    var tax = parseFloat(tax).toFixed(2);
    var price_tax = parseFloat(price_tax).toFixed(2);
    var value_tax = parseFloat(value_tax).toFixed(2);
    var result = parseFloat(result).toFixed(2);
    document.getElementById('value_tax').value = result;
    document.getElementById('price_tax').value = price_tax;
    document.getElementById('afterdiscount').value = price_tax;

}

function myFunDiscount() {
    var discount= $('#discount').val();
    if (discount=="") {
        discount= 0;

    }var tex_parcent = $('#tex_parcent').val();
    if (tex_parcent=="") {
        tex_parcent=0;
    }
    var price_tax =  $('#tax').val();
    if (price_tax=='') {
        alert('من فضلك ادخل السعر غير شامل لضريبة اولا');
        $('#discount').val(0);
        $('#tax').focus();
        return false;
    }

    var result = price_tax - discount ;
    var value_tax = (parseFloat(result) * parseFloat(tex_parcent)) / 100;
    var afterdiscount = result + value_tax;
    var afterdiscount=parseFloat(afterdiscount).toFixed(2);
    var value_tax = parseFloat(value_tax).toFixed(2);
    var result = parseFloat(result).toFixed(2);
    document.getElementById('value_tax').value = value_tax;
    document.getElementById('price_tax').value = afterdiscount;
    document.getElementById('afterdiscount').value = afterdiscount;

}

function myFunReceivedamount() {
    var afterdiscount = parseFloat(document.getElementById("afterdiscount").value);
    var receivedamount = parseFloat(document.getElementById("receivedamount").value);
    if(receivedamount > afterdiscount){
        alert('السعر المدخل اكبر من السعر المطلوب');
        document.getElementById("receivedamount").value='';

        return false;
    }
    var result = afterdiscount - receivedamount;
    var result = parseFloat(result).toFixed(2);
    document.getElementById('remainingamount').value = result;

}
