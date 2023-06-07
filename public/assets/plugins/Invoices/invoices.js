function printDiv() {
    var printContents = document.getElementById('print').innerHTML;
    var oiginalContents = document.body.innerHTML;
    document.body.innerHTML=printContents;
    window.print();
    document.body.innerHTML = oiginalContents;
    // location.reload();


    invoiceseamoer();
}
function invoiceseamoer() {
    // document.getElementById("price_product_purchas").style.display = 'block';
    // alert(65432);

    var printContents = document.getElementById('invoiceseamoer').style.display = 'block';
    var printContents = document.getElementById('invoiceseamoer').innerHTML;
    var oiginalContents = document.body.innerHTML;
    document.body.innerHTML=printContents;
    window.print();
    document.body.innerHTML = oiginalContents;
    // location.reload();


}
