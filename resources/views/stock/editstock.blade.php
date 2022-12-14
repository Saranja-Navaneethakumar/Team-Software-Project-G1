@extends('dashboard.admindashboard')
@section('editstock')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-layer-group"></span> Stock Edit</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Stock</li>
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
            <div class="text-left">
               <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('stocks.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
            </div></br>
         <div class="container-fluid">
               <div class="card card-info" id="gradcard">
                  <div class="card-header">
                     <h3 class="card-title"><i class="fa fa-layer-group fa-xs"></i> Stock Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('stocks.update', $stock->id)}}" method="post">
                    @method('PUT')
                    @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><span class="fa fa-layer-group"></span> Stock Information</h5>
                              </div>
                              <div class="row">
                              <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Stock ID</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name ="id" value="{{$stock->id}}" readonly>
                                    </div>
                                 </div>
                                
                                 <div class="col-md-3">
            <div class="form-group">
                <label>Commercial Name</label>
                
                <select class="form-select form-control-border border-width-2" name="medicine_id" style="border-color: rgba(140, 133, 199);" value="{{$stock->medicine_id}}">
                    <option value="" disabled="disabled">Commercial Name</option>
                        @foreach($medicines as $medicine)
                        {
                            <option value="{{$medicine->id}}" {{ ( $medicine->id==$stock->medicine_id) ? 'selected' : '' }}><strong>{{$medicine->commercial_name}}</strong></option>
                            
                        }
                        @endforeach
                        
                </select>
            </div>
        </div>
                                 <div class="col-md-3">
                               <div class="form-group">
                                    <label>Dosage</label>
                                    <input type="number" class="form-control" name="dosage" style="border-color: rgba(140, 133, 199);" value="{{$stock->dosage}}">
                                </div>
                            </div>
                            <div class="col-md-3">
            <div class="form-group">
                <label>Unit</label>
                <select class="form-select form-control-border border-width-2" name="unit" style="border-color: rgba(140, 133, 199);" value="{{$stock->unit}}">
                <option value="" disabled="disabled">Select Unit</option>
                    <option value="{{$stock->unit}}" {{ ( $stock->unit=='mg') ? 'selected' : '' }}><strong>mg</strong></option>
                    <option value="{{$stock->unit}}" {{ ( $stock->unit=='ml') ? 'selected' : '' }}><strong>ml</strong></option>
                    <option value="{{$stock->unit}}" {{ ( $stock->unit=='pc') ? 'selected' : '' }}><strong>pc</strong></option>
                </select>
            </div>
        </div>   
        

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Expiry Date</label>
                                    <input type="date" name="expiry_date" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{$stock->expiry_date}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Unit Price</label>
                                       <input type="text" class="form-control" name="unitprice" style="border-color: rgba(140, 133, 199);" value="{{$stock->unitprice}}">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Unit Cost</label>
                                       <input type="text" class="form-control" name="unitcost" style="border-color: rgba(140, 133, 199);" value="{{$stock->unitcost}}">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Box Size</label>
                                       <input type="number" name="box_size" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{$stock->box_size}}">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Number of boxes</label>
                                       <input type="number" name="noboxes" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{$stock->noboxes}}">
                                    </div>
                                 </div>
                                 <div class="col-md-3">
            <div class="form-group">
                <label>Supplier Name</label>
                <select class="form-select form-control-border border-width-2" name="supplier_name" style="border-color: rgba(140, 133, 199);" value="{{$stock->supplier_name}}">
                <option value="" disabled="disabled">Select Type</option>
                        @foreach($suppliers as $supplier)
                        {
                            <option value="{{$supplier->suppliername}}" {{ ( $supplier->suppliername==$stock->supplier_name) ? 'selected' : '' }}><strong>{{$supplier->suppliername}}</strong></option>
                            
                        }
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
                               <div class="form-group">
                                    <label>Batch No</label>
                                    <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="batch_no" value="{{$stock->batch_no}}"  placeholder="{{$stock->batch_no}}">
                                </div>
                            </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Created By</label>
                                       <input type="text" class="form-control" name ="created_by" value="{{$stock->created_by}}" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white"><i class= "fa fa-pen-fancy"></i> Update Stock</button>
                              </div>
                  </form>
               </div>
@endsection