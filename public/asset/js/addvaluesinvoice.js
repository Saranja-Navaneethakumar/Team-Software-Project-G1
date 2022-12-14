function fillFields(commercial_name, id) {
  fill(commercial_name, 'stock_id' + id, 'id');
  fill(commercial_name, 'expiry_date' + id, 'expiry_date');
  getTotal(id);
  var expiry_date = document.getElementById('expiry_date' + id).value;
  //alert(expiry_date);
  if(checkExpiry(expiry_date, 'medicine_name_error_' + id) != -1)
    document.getElementById("medicine_name_error_" + id).style.display = "none";
  else
    return;
  var available_quantity = document.getElementById("available_quantity_" + id).value;
  if(!checkAvailableQuantity(available_quantity, id))
    return;
  document.getElementById("medicine_name_" + id).blur();
}

function fill(name, field_name, column) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById(field_name).value = xhttp.responseText;
  };
  xhttp.open("GET", "php/add_new_invoice.php?action=fill&name=" + name + "&column=" + column, false);
  xhttp.send();
}
