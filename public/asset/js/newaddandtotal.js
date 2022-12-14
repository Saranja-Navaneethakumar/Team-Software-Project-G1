$(document).ready(function(){

  $('#addrow').click(function(){
    $('.item-row:last').after('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td> <td class="description"><textarea>Item Description </textarea></td><td><textarea class="cost">0</textarea></td><td><textarea class="qty">0</textarea></td><td><span class="price">0</span></td> </tr>')
    bind();
  })
bind() ;
 function bind(){
    $('.cost').blur(update_price);
    $('.qty').blur(update_price);
  }


function  update_price(){
     var row =  $(this).parents('.item-row');
     var cost =  row.find('.cost').val();
     var qty =  row.find('.qty').val();
     row.find('.price').html(Number(qty) * Number(cost) );
     update_total()
  }
function update_total(){

  var total = 0 ; 
  $('.price').each(function(i){
    price =  $(this).html();
      if(price > 0){
        total += Number(price);
      }
  })
 
  $('#subtotal').html(total);
  $('#total').html(total);
}
  $('.delete').live('click',function(){
    $(this).parents('.item-row').remove();
    update_total() ;
    
  })
})