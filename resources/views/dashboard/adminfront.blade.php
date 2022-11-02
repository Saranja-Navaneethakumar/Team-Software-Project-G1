@extends('dashboard.admindashboard')
@section('admindash')
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
            <h1 style="color: rgb(166, 145, 219);"><span class="fa fa-gauge-high"></span> Dashboard</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            </br>
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
        @if(Auth::user()->role=='Admin') 
        <div class="row">
          
          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(191,151,22); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                            echo $usercount 
                          ?>
                      </h3>
                      <p>Users</p>
                  </div>
                  <div class="icon"><i class="fa fa-users-between-lines"></i></div>
                  <a href="{{ route('users.index') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(20,142,161); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecount
                          ?>
                      </h3>
                      <p>Medicines</p>
                  </div>
                  <div class="icon"><i class="fas fa-capsules"></i></div>
                  <a href="{{ route('medicines.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                      <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(199, 87, 130); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                          echo $medicinetypecount
                          ?>
                      </h3>
                      <p>Medicine Type</p>
                  </div>
                  <div class="icon"><i class="fa fa-tablets"></i></div>
                  <a href="{{ route('medicine_types.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
                  <!-- /.info-box -->
          </div>
     

          <div class="col-3">
              <div class="small-box" style="background-color: rgba(89,82,187); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecategorycount
                          ?>
                      </h3>
                      <p>Medicine Categories</p>
                  </div>
                  <div class="icon"><i class="fa fa-pills"></i></div>
                  <a href="{{ route('categories.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                  <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(193,118,153); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $suppliercount
                          ?>
                      </h3>
                      <p>Suppliers</p>
                  </div>
                  <div class="icon"><i class="fa fa-truck-medical"></i></div>
                  <a href="{{ route('suppliers.index') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(52,143,110); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $stockcount
                          ?>
                      </h3>
                      <p>Stocks</p>
                  </div>
                  <div class="icon"><i class="fa fa-layer-group"></i></div>
                  <a href="{{ route('stocks.index') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
      
        </div>
        @elseif(Auth::user()->role=='Head Pharmacist')
        <div class="row">
          
          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(20,142,161); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecount
                          ?>
                      </h3>
                      <p>Medicines</p>
                  </div>
                  <div class="icon"><i class="fas fa-capsules"></i></div>
                  <a href="{{ route('medicines.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                      <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(199, 87, 130); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                          echo $medicinetypecount
                          ?>
                      </h3>
                      <p>Medicine Type</p>
                  </div>
                  <div class="icon"><i class="fa fa-tablets"></i></div>
                  <a href="{{ route('medicine_types.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
                  <!-- /.info-box -->
          </div>
     

          <div class="col-3">
              <div class="small-box" style="background-color: rgba(89,82,187); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecategorycount
                          ?>
                      </h3>
                      <p>Medicine Categories</p>
                  </div>
                  <div class="icon"><i class="fa fa-pills"></i></div>
                  <a href="{{ route('categories.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                  <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(193,118,153); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $suppliercount
                          ?>
                      </h3>
                      <p>Suppliers</p>
                  </div>
                  <div class="icon"><i class="fa fa-truck-medical"></i></div>
                  <a href="{{ route('suppliers.index') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(52,143,110); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $stockcount
                          ?>
                      </h3>
                      <p>Stocks</p>
                  </div>
                  <div class="icon"><i class="fa fa-layer-group"></i></div>
                  <a href="{{ route('stocks.index') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
        </div>
        @elseif(Auth::user()->role=='Stock Manager')
        <div class="row">
          
          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(20,142,161); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecount
                          ?>
                      </h3>
                      <p>Medicines</p>
                  </div>
                  <div class="icon"><i class="fas fa-capsules"></i></div>
                  <a href="{{ route('medicines.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                      <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(199, 87, 130); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                          echo $medicinetypecount
                          ?>
                      </h3>
                      <p>Medicine Type</p>
                  </div>
                  <div class="icon"><i class="fa fa-tablets"></i></div>
                  <a href="{{ route('medicine_types.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
                  <!-- /.info-box -->
          </div>
     

          <div class="col-3">
              <div class="small-box" style="background-color: rgba(89,82,187); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecategorycount
                          ?>
                      </h3>
                      <p>Medicine Categories</p>
                  </div>
                  <div class="icon"><i class="fa fa-pills"></i></div>
                  <a href="{{ route('categories.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                  <!-- /.info-box -->
          </div>

          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(52,143,110); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $stockcount
                          ?>
                      </h3>
                      <p>Stocks</p>
                  </div>
                  <div class="icon"><i class="fa fa-layer-group"></i></div>
                  <a href="{{ route('stocks.index') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
        </div>
        @elseif(Auth::user()->role=='Employee')
        <div class="row">
          
          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(20,142,161); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $medicinecount
                          ?>
                      </h3>
                      <p>Medicines</p>
                  </div>
                  <div class="icon"><i class="fas fa-capsules"></i></div>
                  <a href="{{ route('medicines.index') }}" class="small-box-footer">
                      More info <i class="fa fa-arrow-right"></i>
                  </a>
                      <!-- /.info-box-content -->
              </div>
                      <!-- /.info-box -->
          </div>


          <div class="col-3">
              <div class="small-box shadow-lg" style="background-color: rgba(52,143,110); color:white">
                  <div class="inner">
                      <h3>
                          <?php
                              echo $stockcount
                          ?>
                      </h3>
                      <p>Stocks</p>
                  </div>
                  <div class="icon"><i class="fa fa-layer-group"></i></div>
                  <a href="{{ route('showallstock') }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-right"></i>
                  </a>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
        </div>
        @endif
    </div> 
    </div>
</section>           
     
@endsection
