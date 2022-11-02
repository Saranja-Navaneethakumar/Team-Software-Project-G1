@extends('dashboard.admindashboard')
@section('addstock')
<!-- error messages --> 
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-layer-group"></span> Add Stock</h1>
        </div>
                  <!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Add Stock</li>
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
    <div class="text-right">
         <a class="btn btn-md button1" href="{{route('stocks.index')}}" style="background-color: rgba(26,123,146); color:white;"><i class="fa fa-list"></i> Manage New Stock</a>
    </div></br>
    <div class="text-right">
         <a class="btn btn-md button1" href="{{route('medicines.create')}}" style="background-color: rgba(26,123,146); color:white;"><i class="fa fa-list"></i> Add New Medicine Stock</a>
    </div></br>
    <!--Add new medicine in addmedicine and old medicine in stock-->
<div class="container-fluid">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"> Stock Information</h3>
        </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  
        <form  action="{{route('stocks.store')}}" method="post">
            @csrf
            <div class="card-header" id="gradcard">
                <h5><span class="fa fa-layer-group"></span> Stock Information</h5>
            </div>
            <div class="card-body" id="gradcard">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Commercial Name</label>
                                <select class="form-select" name="medicine_id" style="border-color: rgba(140, 133, 199);">
                                       <option value="" selected disabled>Select Commercial Name</option>
                                       <!--<label class="form-label select-label">Select Type</label>-->
                                          @foreach($medicines as $medicine)
                                          {
                                             <option value="{{$medicine->id}}"><strong>{{$medicine->commercial_name}}</strong></option>
                                             
                                          }
                                          @endforeach
                                       </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-3">
                               <div class="form-group">
                                    <label>Dosage</label>
                                    <input type="number" class="form-control" name="dosage" style="border-color: rgba(140, 133, 199);" placeholder="dosage">
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Unit</label>
                                       <select class="form-control" style="border-color: rgba(140, 133, 199);" name="unit">
                                          <option selected disabled>Select unit</option>
                                          <option>mg</option>
                                          <option>ml</option>
                                          <option>pc</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Unit Price</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="unitprice" placeholder="Unit price">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Unit Cost</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="unitcost" placeholder=" Unit cost">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Box Size</label>
                                       <input type="number" name="box_size" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Box size">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Number of boxes</label>
                                       <input type="number" name="noboxes" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="No of Boxes">
                                    </div>
                                 </div><!--id="bg-1"-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input type="date" id="dateID" name="expiry_date" class="form-control" style="border-color: rgba(140, 133, 199);" >
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Supplier Name</label>
                                       <select class="form-select" name="supplier_name" style="border-color: rgba(140, 133, 199);">
                                       <option value="" selected disabled>Select Supplier</option>
                                       <!--<label class="form-label select-label">Select Type</label>-->
                                          @foreach($suppliers as $supplier)
                                          {
                                             <option value="{{$supplier->suppliername}}"><strong>{{$supplier->suppliername}}</strong></option>
                                          }
                                          @endforeach
                                       </select>
                                    </div>
                            </div>
                           
                            <div class="col-md-3">
                               <div class="form-group">
                                    <label>Batch No</label>
                                    <input type="text" class="form-control" name="batch_no" style="border-color: rgba(140, 133, 199);" placeholder="batch no">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Created By</label>
                                    <input type="text" name="created_by" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{Auth::user()->username}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                     <!-- /.card-body -->

            <div class="card-footer" id="gradcard">
                <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white"><i class= "fa fa-layer-group"></i> Save Stock</button>
            </div>
        </form>

      

    </div>
</div>
            <!-- /.container-fluid -->
</section>
@endsection
