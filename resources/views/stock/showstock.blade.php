@extends('dashboard.admindashboard')
@section('showstock')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><i class="fa fa-layer-group"></i> Stock Detail</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Stock Detail</li>
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
<div class="container-fluid">
    <div class="card card-info" id="gradcard">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-layer-group fa-xs"></i> Stock Information</h3>
        </div>
                  <!-- /.card-header -->
    <div class="card-body">
                  <div class="row">
                     
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Commercial Name:</strong>
                           @foreach($medicines as $medicine)
                              @if($medicine->id == $stock->medicine_id)
                                 <td>{{$medicine->commercial_name}}</td>
                              @endif
                           @endforeach
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Dosage:</strong>
                           {{$stock->dosage}} {{$stock->unit}}
                        </div>
                     </div>
                    
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Unit Price:</strong>
                           {{$stock->unitprice}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Unit Cost:</strong>
                           {{$stock->unitcost}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Box size:</strong>
                           {{$stock->box_size}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>No of boxes:</strong>
                           {{$stock->noboxes}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Quantity:</strong>
                           {{$stock->quantity}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Cost:</strong>
                           {{$stock->cost}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Price:</strong>
                           {{$stock->price}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Expiry_date:</strong>
                           {{$stock->expiry_date}}
                        </div>
                     </div>
                     
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Supplier:</strong>
                           {{$stock->supplier_name}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Batch No:</strong>
                           {{$stock->batch_no}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Created_by:</strong>
                           {{$stock->created_by}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Created Time:</strong>
                           {{$stock->created_time}}
                        </div>
                     </div>
                  </div>
               
               </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                        <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('stocks.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
                        <!--<a style="color: rgb(23, 162, 184);" class="btn-xs" href="{{route('stocks.index')}}" role="button"><i class="fa fa-arrow-left fa-2xl"></i></a>-->
                    </div>
                  
               </div>
            </div>
            <!--/.container-fluid -->
</section>
@endsection