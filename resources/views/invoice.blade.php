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
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                     </ol>
                  </div>
                  <!-- /.col -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->
         <!-- Main content -->
         <section class="content">
         
            <!--Add card detail and invoice detail-->
         <div class="container-fluid">
               <div class="card-info">
                  <div class="card-header">
                     <h3 class="card-title"> <span class="fa fa-receipt fa-xs"></span> Invoice Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <div class="card-body">
                  @php
                  $n=0;
                  @endphp
                  <!--<div class="row">
                  <div class="col-md-3 mr-3">
                     <div class="form-group">
                        <label>Product</label>
                        <input type="text" class="form-control" name="product" id="product" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black" placeholder="Product">
                        <font style="color:red"> {{ $errors->has('product') ?  $errors->first('product') : '' }} </font>
                     </div>
                  </div>
                  <div class="col-md-3 mr-3">
                     <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black" placeholder="Quantity">
                        <font style="color:red"> {{ $errors->has('quantity') ?  $errors->first('quantity') : '' }} </font>
                     </div>
                  </div>
                  <div class="col-md-3 mr-3">
                     <div class="form-group">
                        <label>Unit Price</label>
                        <input type="number" class="form-control" name="unitprice" id="unitprice" style="border-color: rgba(140, 133, 199); background-color:transparent; color:black" placeholder="Unit Price">
                        <font style="color:red"> {{ $errors->has('unitprice') ?  $errors->first('unitprice') : '' }} </font>
                     </div>
                  </div>
                  </div>
-->               <div class="row">
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
                     <script>
                        var today = new Date();
                        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                        var dateTime = date+' '+time;
 
                           //console.log(dateTime);
                        document.getElementById("datetimejs").innerHTML = dateTime;
                     </script>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <label>Paymet type</label>
                        <select class="form-select" style="border-color: rgba(140, 133, 199);background-color:transparent; color:black">
                                       <option value="" selected disabled>Select Payment type</option>
                                       <option value="Card"><strong>Card</strong></option>
                                       <option value="Cash"><strong>Cash</strong></option>
                                       </select>
                     </div>
                  </div>
                  </div>
                        <form action="{{route('invoices.store')}}" method="post">
                           @csrf
                        <table class="table table-bordered">
                     <caption>Invoice</caption>
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Product</th>
                           <th>Quantity</th>
                           <th>Unit Price</th>
                           <th>Total</th>
                        </tr>
                        <tr>
                           <td><div class="col-md-12">
                              <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);">
                              </div>
                           </td>
                           <td><div class="col-md-12">
                              <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);">
                              </div>
                           </td>
                           <td><div class="col-md-12">
                              <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);">
                              </div>
                           </td>
                           <td><div class="col-md-12">
                              <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);"">
                              </div>
                           </td>
                           <td><div class="col-md-12">
                              <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);">
                              </div>
                           </td>
                        </tr>
                     </thead>
                        <!--<tbody id="addRow" class="addRow"></tbody>
                        <tbody>
                           <tr>
                              <td colspan="1" class="text-right">
                              <div class="col-md-6">
                                 <ul class="list-group list-group-flush">
                                    <li class="list-group-item disabled">Sub Total</li></br>
                                 </ul>
                              </div>
                              </td>
                              <td>
                                 <input type="number" id="estimated_ammount" class="estimated_ammount" value="0" readonly>
                              </td>
                           </tr>
                     </tbody>-->
                     </table>
                     <div class="text-right">
                     <div class="form-group">
                        <button id="addMore" type="button" class="btn btn-md button1" style="background-color: rgba(16, 117, 134); color:white"><i class= "fa fa-plus"></i> Add more</button>
                     </div>
                  </div>
                        
                        <!--<input type="submit" name="addInvoice" value="Add Invoice">-->
                        
                     
                        </form>
                     
                  <!--<div class="text-right">
                     <button type="submit" class="btn btn-md" style="background-color: rgba(16, 117, 134); color:white"><i class= "fa fa-plus"></i> Add more</button>
                     <button type="submit" class="btn btn-md" style="background-color: rgba(169, 34, 48); color:white"><i class="fa-regular fa-trash-alt"></i> Delete</button>
                  </div>--></br>
                  <div class="col-md-6">
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item disabled">Sub Total</li></br>
                     <li class="list-group-item disabled">Discount %</li></br>
                     <li class="list-group-item disabled">Discount</li></br>
                     <li class="list-group-item disabled">Grand Total</li></br>
                  </ul>
                  </div>

                  </div>

                  <div class="card-footer">
                  
                  <div class="text-left">
               <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('back')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
            </div>
                  <div class="text-right">
                     <button type="submit" class="btn btn-md button1" style="background-color: rgba(16, 117, 134); color:white"><i class= "fa fa-receipt"> <i class= "fa fa-plus fa-xs"></i></i> Save Invoice</button>
                  </div>
                  
                  </div>
               </div>
</section>
@endsection