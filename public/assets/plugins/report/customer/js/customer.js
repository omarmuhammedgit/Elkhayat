
$(document).ready(function(){
$(document).on('input','#code',function(e){
    make_search();

});
$(document).on('change','#name',function(e){
    make_search();

});
$(document).on('change','#start_at',function(e){
    make_search();

});
$(document).on('change','#end_at',function(e){
    make_search();

});
function make_search(){

    // var code=$('#code').val();
    var name=$('#name').val();
    var start_at=$('#start_at').val();
    var end_at=$('#end_at').val();
    // alert(start_at);
    var ajax_search_url=$('#ajax_search_url').val();
    var token_search=$('#token_search').val();
    jQuery.ajax({

        url:ajax_search_url,
        type:'post',
        dataType:'html',
        cache:false,
        data:{name:name,start_at:start_at,end_at:end_at,'_token':token_search},
        success:function(data){
            // alert(222);
            $("#example2").html(data);

        },
        error:function(){


        }
    });

}



});
$(document).ready(function(){
$(document).on('click','#printReport',function(e){
    var printContent=document.getElementById('print').innerHTML;
    var oiginalContent=document.body.innerHTML;
    document.body.innerHTML=printContent;
    window.print();
    document.body.innerHTML=oiginalContent;

})
})
