function showDiv(element) {
    var hidden_divs = document.getElementsByClassName('hidden_div');
    var hidden_inputs = document.getElementsByClassName('hidden_inputs');
    for (var i = 0; i < hidden_divs.length; i++) {
        hidden_divs[i].style.display = 'none';
    }
    for (var i = 0; i < hidden_inputs.length; i++) {
        hidden_inputs[i].value = '0';
    }
    document.getElementById(element.value).style.display = 'block';
    document.getElementById('instruction').value = element.value;
}
function hideToast(divId, element) {
    document.getElementById('my_toast').style.display = 'none';
}
function validateForm() {
    const x = ['price', 'size', 'weight', 'height', 'length', 'width'];
    const y = ['sku', 'name', 'price', 'size', 'weight', 'height', 'length', 'width'];
    let valid_1 = true;
    let valid_2 = true;
    for (const element of x) {
        let z = document.forms["product_form"][element].value;
        if (isNaN(z) || z < 0) {
            alert("Please, provide the data of indicated type");
            valid_1 = false;
            break;
        }
    }
    for (const element of y) {
        let z = document.forms["product_form"][element].value;
        if (z == '') {
            alert("Please, submit required data");
            valid_2 = false;
            break;
        }
    }
    if (valid_1 == false || valid_2 == false) {
        return false;
    }
}
function getSku() {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == 'sku') {
            alert("SKU has already been defined for this product: " + pair[1]);
        } else if (pair[0] == 'sku_b') {
            alert("SKU " + pair[1] + " already used for other product. Choose a different one.");
        }
    }
    return (false);
}
