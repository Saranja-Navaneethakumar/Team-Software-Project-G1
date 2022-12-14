@extends('dashboard.admindashboard')
@section('invoice')
@if ($message = Session::get('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" style="color: rgb(145, 36, 46);"><i class="fa fa-xmark"></i></button>
        <strong>{{$message}}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
    <button type="button" class="close" style="color: rgb(145, 36, 46);" data-dismiss="alert" ><i class="fa fa-xmark"></i></button>
        <strong><i class="fa fa-exclamation-triangle"></i> Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session('success'))
<div class="alert alert-success" role="alert">
<strong><i class="fa fa-check"></i></strong>
   <button type="button" class="close" style="color: rgb(28, 115, 48);" data-dismiss="alert" ><i class="fa fa-xmark"></i></button>
   <strong>{{session('success')}}</strong>
</div>
@endif

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-receipt"></span> Invoice</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Invoice</li>
            </ol>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="container-fluid">
      <div class="card-info">
         <div class="card-header">
            <h3 class="card-title"> <span class="fa fa-receipt fa-xs"></span> Invoice Information</h3>
         </div>
        <div class="card-body">
         <div class="row">
            <div class="col-md-2">
               <div class="form-group">
                  <label>Invoice Number</label>
                  <input type="text" class="form-control" name="product" id="product" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black">
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <label>Customer Name</label>
                  <input type="text" class="form-control" name="product" id="product" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black">
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <label>Invoice Person</label>
                  <input type="text" class="form-control" name="product" id="product" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black" value="{{Auth::user()->username}}" readonly>
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <label>Date</label>
                  <input type="datetime-local" class="form-control" name="datetime" id="datetime" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black">
               </div>
               <p id="datetimejs"></p>
            </div>
                 
            <div class="col-md-2">
               <label>Payment type</label>
               <div class="custom-control custom-radio">
                  <input class="custom-control-input custom-control-input-success" type="radio" name="paytype" value="Cash" id="paycash">
                  <label class="custom-control-label" for="paycash">
                     <i class="fa fa-money-bill fa-xl pr-2"></i> Cash
                  </label>
               </div>
               <div class="custom-control custom-radio">
                  <input class="custom-control-input custom-control-input-success" type="radio" name="paytype" value="Card" id="paycard">
                  <label class="custom-control-label" for="paycard">
                     <i class="fa fa-credit-card fa-xl pr-2"></i> Card
                  </label>
               </div>  
            </div></br>
         </div>

         <form action="{{route('invoices.store')}}" method="post">
            @csrf
            @php
            $n=0;
            @endphp
            <table class="table table-bordered" id="dynamicAddRemove">
               <caption>Invoice</caption>
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Product</th>
                     <th>Code</th>
                     <th>Quantity</th>
                     <th>Unit Price</th>
                     <th>Total</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="no" value="{{$n}}" onchange="getValue(this);">{{++$n}}</td>
                     <td>
                        <div class="col-md-12">
                           <select class="form-select selectmedicine" id="medicine_id[0]" name="moreFields[0]medicine_id" style="border-color: rgba(140, 133, 199);">
                              <option value="" selected disabled>Select Product</option>
                                 @foreach($medicines as $medicine)
                                 {
                                    <option value="{{$medicine->id}}"><strong>{{$medicine->commercial_name}}</strong></option>
                                 }
                                 @endforeach
                           </select>
                        </div>
                     </td>

                     <td>
                        <div class="col-md-12">
                           <select class="form-select selectstock" id="product[0]" name="moreFields[0]product" style="border-color: rgba(140, 133, 199);">
                              <option value="0" disabled="true" selected="true">Select Code</option>
                           </select>
                        </div>
                     </td>

                     <td>
                        <div class="col-md-12">
                           <input type="number" class="form-control" id="quantity[0]" name="moreFields[0]quantity" oninput="calculate();" style="border-color: rgba(140, 133, 199);">
                        </div>
                     </td>

                     <td>
                        <div class="col-md-12" >
                           <div class="unitprice" style="border-color: rgba(140, 133, 199);">
                              <input type="text" class="form-control" id="unitprice[0]" name="moreFields[0]unitprice" oninput="calculate();" style="border-color: rgba(140, 133, 199);">
                           </div>
                        </div>
                     </td>

                     <td>
                        <div class="col-md-12">
                           <input type="text" class="form-control" id="total[0]" name="moreFields[0]total" oninput="calculate();" style="border-color: rgba(140, 133, 199);">
                        </div>
                     </td>

                     <td>
                        <div class="form-group">
                           <button id="add-btn" type="button" class="btn btn-md button1" style="background-color: rgba(16, 117, 134); color:white"><i class= "fa fa-plus"></i></button>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
            </br>
         </form>
         <table>
                     <tr>
                        <th><div class="pr-5 pb-3" >Subtotal<div></th>
                        <td><div class="pb-3"><input type="text" class="form-control " id="subtotal" name="subtotal" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black;" /></td></div>
                     </tr>
                     <tr>
                        <th><div class="pr-5 pb-3" >Discount%<div></th>
                        <td><div class="pb-3"><input type="text" class="form-control" name="" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black;"/></td></div>
                     </tr>
                     <tr>
                        <th><div class="pr-5 pb-3" >Discount<div></th>
                        <td><div class="pb-3"><input type="text" class="form-control" name="" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black;"/></td></div>
                     </tr>
                     <tr>
                        <th><div class="pr-5 pb-3" >Net amount<div></th>
                        <td><div class="pb-3"><input type="text" class="form-control" name="" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black;"/></td></div>
                     </tr>
                     <tr>
                        <th><div class="pr-5 pb-3" >Cash<div></th>
                        <td><div class="pb-3"><input type="text" class="form-control" name="" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black;"/></td></div>
                     </tr>
                     <tr>
                        <th><div class="pr-5 pb-3" >Balance<div></th>
                        <td><div class="pb-3"><input type="text" class="form-control" name="" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black;"/></td></div>
                     </tr>
                  </table>

         <div class="card-footer">
            <div class="text-left">
               <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('back')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
            </div>
            <div class="text-right">
               <button type="submit" class="btn btn-md button1" style="background-color: rgba(16, 117, 134); color:white"><i class= "fa fa-receipt"> <i class= "fa fa-plus fa-xs"></i></i> Save Invoice</button>
            </div>
                  
         </div>

        </div>
      </div>
   </div>

<script>
   var i=0;
   $("#add-btn").click(function(){
   ++i;
   var n = ($('#dynamicAddRemove tr').length-0);
   $("#dynamicAddRemove").append('<tr><td class="no">'+ n +'</td><td><div class="col-md-12"><select class="form-select selectmedicine" id="medicine_id['+i+']" name="moreFields['+i+']medicine_id" style="border-color: rgba(140, 133, 199);"><option value="" selected disabled>Select Product</option>@foreach($medicines as $medicine){<option value="{{$medicine->id}}"><strong>{{$medicine->commercial_name}}</strong></option>}@endforeach</select></div></td><td><div class="col-md-12"><select class="form-select selectstock" id="product['+i+']" name="moreFields['+i+']product" style="border-color: rgba(140, 133, 199);"><option value="0" disabled="true" selected="true">Select Code</option></select></div></td><td><div class="col-md-12"><input type="number" class="form-control" id="quantity['+i+']" name="moreFields['+i+']quantity" oninput="calculate();" style="border-color: rgba(140, 133, 199);"></div></td><td><div class="col-md-12" ><div class="unitprice" style="border-color: rgba(140, 133, 199);"><input type="text" class="form-control" id="unitprice['+i+']" name="moreFields['+i+']unitprice" oninput="calculate();"style="border-color:rgba(140,133,199);"></div></div></td><td><div class="col-md-12"><input type="text" class="form-control" id="total['+i+']" name="moreFields['+i+']total" oninput="calculate();" style="border-color: rgba(140, 133, 199);"></div></td><td><button type="button" class="btn btn-md button1 remove-tr" style="background-color: rgb(147,36,47); color:white"><i class= "fa fa-trash-alt"></i></button></td></tr>');
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

$(document).ready(function()
{
   $(document).on('change','.selectmedicine',function(){
      //console.log("hhh");

      var mid = $(this).val();
      console.log("mid"+mid);

      
      var op=" ";
      
      $.ajax({
         type:'get',
         url:'{!!URL::to('getdetails')!!}',
         data:{'id':mid},
         success:function(data){
            console.log('suceess');

            $(".selectstock").html(""); 
            op+='<option value="0" selected disabled>Select</option>';
					for(var i=0;i<data.length;i++){
					op+='<option value="'+data[i].id+'">'+data[i].id+'</option>';
				   }
               $(".selectstock").append(op);
               
         },
         error:function(){

         }
      });
   });

   function getValue(str) {
    alert(str.value);
    console.log("eee");}

   $(document).on('change','.selectstock',function()
   {
      var sid = $(this).val();
      console.log("sid"+sid);
      var op=" ";
      $.ajax({
         type:'get',
         url:'{!!URL::to('getUnitprice')!!}',
         data:{'id':sid},
         success:function(data){
            console.log(data[0].unitprice);
            var up = data[0].unitprice;
            $(".unitprice").html("");
            op+= '<input type="text" class="form-control" oninput="calculate();" style="border-color: rgba(140, 133, 199);" value='+data[0].unitprice+' />';
            $(".unitprice").append(op);
         }
      });
   });
   
});
</script>
</section>
@endsection