
function printDiv() {
    // $('#print').show();
    // var count=document.getElementById('count').value;
    // var dresslength=document.getElementById('dresslength').value;
    // var dressExpand=document.getElementById('dressExpand').value;
    // var value=document.getElementById('value').value;

    // document.getElementById('countinv').value=count;
    // document.getElementById('dresslengthinv').value=dresslength;
    // document.getElementById('dressExpandinv').value=dressExpand;
    // document.getElementById('valueinv').value=value;
    // alert(count);


    var printContents = document.getElementById('print').innerHTML;
    var oiginalContents = document.body.innerHTML;
    // document.body.innerHTML=printContents;
    window.print();
    // document.body.innerHTML = oiginalContents;
    // $('#print').hide();
    // location.reload();


}
