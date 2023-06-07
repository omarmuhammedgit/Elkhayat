function price_product_sale() {
    document.getElementById("price_product_purchas").style.display = "none";
    document.getElementById("price_product_sale").style.display = "block";
}

function price_product_purchas() {
    document.getElementById("price_product_sale").style.display = "none";
    document.getElementById("price_product_purchas").style.display = "block";
}

function price_tex() {
    var price_purchas_include_tax = parseFloat(
        document.getElementById("price_purchas_include_tax").value
    );
    var value_tax = (price_purchas_include_tax * 15) / 100;
    var price_purches_doesnot_include_tax =
        price_purchas_include_tax - value_tax;
    var total = price_purches_doesnot_include_tax + value_tax;
    var value_tax = parseFloat(value_tax).toFixed(2);
    var total = parseFloat(total).toFixed(2);
    var price_purches_doesnot_include_tax = parseFloat(
        price_purches_doesnot_include_tax
    ).toFixed(2);
    document.getElementById("price_purches_doesnot_include_tax").value =
        price_purches_doesnot_include_tax;
    document.getElementById("value_tax").value = value_tax;
    document.getElementById("total").value = total;

    // alert(price_purches_doesnot_include_tax);
}
function price_tex_sale() {
    var price_sale_include_tax = parseFloat(
        document.getElementById("price_sale_include_tax").value
    );
    var rale = (price_sale_include_tax * 15) / 100;
    var price_sale_doesnot_include_tax = price_sale_include_tax - rale;
    var totalsale = price_sale_doesnot_include_tax + rale;
    var rale = parseFloat(rale).toFixed(2);
    var totalsale = parseFloat(totalsale).toFixed(2);
    var price_sale_doesnot_include_tax = parseFloat(
        price_sale_doesnot_include_tax
    ).toFixed(2);
    document.getElementById("price_sale_doesnot_include_tax").value =
        price_sale_doesnot_include_tax;
    document.getElementById("rale").value = rale;
    document.getElementById("totalsale").value = totalsale;

    // alert(price_purches_doesnot_include_tax);
}
