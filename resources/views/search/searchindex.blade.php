@extends('dashboard.admindashboard')
@section('showmedicine')

<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><i class="fa fa-magnifying-glass"></i> Search</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Search</li>
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
                  
<div class="col-sm-3">

            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-pills"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><a href="{{route('medicines.index')}}">Search Medicines</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box shadow-lg">
              <span class="info-box-icon elevation-1" style="background-color: rgba(199, 87, 130); color:white"><i class="fa fa-truck-medical"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><a href="{{route('suppliers.index')}}">Search Suppliers</a></span>
              </div>
              <!-- /.info-box-content -->
            </div>
</div>

          
</div>    <!-- /.container-fluid -->
</section>

@endsection