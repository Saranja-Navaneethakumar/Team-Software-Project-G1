<script>
    var items = 0;
    function addItem() {
        items++;
 
        var html = '<tr>';
            html += '<td>' + items + '</td>';
            html += "<td><input type='text' class='form-control' name ='id[]' placeholder=""></td>";
            html += "<td><input type='text' class='form-control' name ='medical_name[]' placeholder=""></td>";
			html += "<td><input type='text' class='form-control' name ='quantity[]' placeholder=""></td>";
			html += "<td><input type='text' class='form-control' name ='unitprice[]' placeholder=""></td>";
			html += "<td><input type='text' class='form-control' name ='discount[]' placeholder=""></td>";
			html += "<td><input type='text' class='form-control' name ='total[]' placeholder=""></td>";
            html += "<td><button type='button' onclick='deleteRow(this);'>Delete</button></td>"
        html += "</tr>";
 
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }
 
function deleteRow(button) {
    items--
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}
</script>