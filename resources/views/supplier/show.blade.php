@extends('dashboard.admindashboard')
@section('showsupplier')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><i class="fa fa-truck-medical"></i> Supplier Detail</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Supplier Detail</li>
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
                     <h3 class="card-title"><i class="fa fa-truck-medical fa-xs"></i> Supplier Information</h3>
                  </div>
                  <!-- /.card-header -->
               <div class="card-body">
               
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>ID:</strong>
                           {{$supplier->id}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Supplier Name:</strong>
                           {{$supplier->suppliername}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Mobile:</strong>
                           {{$supplier->mobile}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Address:</strong>
                           {{$supplier->address}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Previous Due:</strong>
                           {{$supplier->previousdue}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Status:</strong>
                           {{$supplier->status}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Craeted By:</strong>
                           {{$supplier->created_by}}
                        </div>
                     </div>
                     
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Created Time:</strong>
                           {{$supplier->created_time}}
                        </div>
                     </div>
                  </div>
               
               </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                        <!--<button type="submit" class="btn btn-outline-info" href="{{route('users.index')}}"><i class="fa-solid fa-arrow-left"></i></i><b>Back</b></button>-->
                        <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('suppliers.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
                    </div>
                  
               </div>
            </div>
            <!-- /.container-fluid -->
</section>
@endsection