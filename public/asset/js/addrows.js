
var i = 0;

$("#add-btn").click(function(){
++i;

$("#dynamicAddRemove").append('<tr><td><div class="col-md-12"><select class="form-select" name="moreFields[0]medicine_id" style="border-color: rgba(140, 133, 199);"><option value="" selected disabled>Select Product</option>@foreach($medicines as $medicine){<option value="{{$medicine->id}}"><strong>{{$medicine->commercial_name}}</strong></option>}@endforeach</select></div></td><td><div class="col-md-12"><input type="text" class="form-control" name="moreFields['+i+']product" style="border-color: rgba(140, 133, 199);"></div></td><td><div class="col-md-12"><input type="number" class="form-control" id="quantity['+i+']" oninput="calculate();" name="moreFields['+i+']quantity" style="border-color: rgba(140, 133, 199);"></div></td><td><div class="col-md-12"><input type="text" class="form-control" id="unitprice['+i+']" oninput="calculate();" name="moreFields['+i+']unitprice" style="border-color: rgba(140, 133, 199);""></div></td><td><div class="col-md-12"><input type="text" class="form-control" id="total['+i+']" oninput="calculate();" name="moreFields['+i+']total" style="border-color: rgba(140, 133, 199);"></div></td><td><button type="button" class="btn btn-md button1 remove-tr" style="background-color: rgb(147,36,47); color:white"><i class= "fa fa-trash-alt"></i></button></td></tr>');
});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();

});  

var subtotal=0;

function calculate() {
	for(let j=0; j<=i; j++)
	{
        var myBox1 = document.getElementById('quantity['+j+']').value; 
		var a = myBox1;
        var myBox2 = document.getElementById('unitprice['+j+']').value;
		var b = myBox2;
        //var result = document.getElementById('total['+j+']'); 
		
        var myResult = a * b;
		
        document.getElementById('total['+j+']').value = myResult;
		
		subtotal =subtotal+myResult;
		document.getElementById('subtotal').value = subtotal;
	}
	
}
