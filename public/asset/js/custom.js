$(document).ready(function(){
var i=0;
  $('#addrow').click(function(){
    $('.item-row:last').after('<tr class="item-row"><td class="code"><div class="col-md-12"><input type="text" class="form-control" name="moreFields['+i+']code" style="border-color: rgba(140, 133, 199);"></div></td><td class="product"><div class="col-md-12"><input type="text" class="form-control" name="moreFields['+i+']product" style="border-color: rgba(140, 133, 199);"></div></td> <td class="quantity"><div class="col-md-12"><input type="number" class="form-control" id="quantity" name="moreFields['+i+']quantity" style="border-color: rgba(140, 133, 199);"></div></td><td class="unitprice"><div class="col-md-12"><input type="text" class="form-control" id="unitprice" name="moreFields['+i+']unitprice" style="border-color: rgba(140, 133, 199);""></div></td><td class="total"><div class="col-md-12"><input type="text" class="form-control" id="total" name="moreFields['+i+']total" style="border-color: rgba(140, 133, 199);"></div></td><td><div class="form-group"><div class="delete"><a type="button" class="btn btn-md button1" href="javascript:;" style="background-color: rgb(147,36,47); color:white"><i class= "fa fa-trash-alt"></i></a></div></div></td></tr>')
    bind();
	++i;
  })
bind() ;
 function bind(){
    $('.quantity').blur(update_total);
    $('.unitprice').blur(update_total);
  }


function  update_total(){
     var row =  $(this).parents('.item-row');
     var quantity =  row.find('.quantity').val();
     var unitprice =  row.find('.unitprice').val();
     row.find('.total').html(Number(quantity) * Number(unitprice) );
     update_subtotal();
  }
function update_subtotal(){

  var subtotal = 0 ; 
  $('.total').each(function(i){
    total =  $(this).html();
      if(total > 0){
        subtotal += Number(total);
      }
  })
 
  $('#subtotal').html(subtotal);
  $('#total').html(total);
}
  $('.delete').live('click',function(){
    $(this).parents('.item-row').remove();
    update_subtotal();
    
  })
})