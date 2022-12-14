@extends('dashboard.admindashboard')
@section('showuser')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><i class="fa fa-user"></i> User Detail</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">User Details</li>
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
               <div class="card card-info shadow">
                  <div class="card-header">
                     <h3 class="card-title"><i class="fa fa-user fa-xs"></i> User Information</h3>
                  </div>
                  <!-- /.card-header -->
               <div class="card-body" id="gradcard">
               
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>User Name:</strong>
                           {{$user->username}}
                        </div>
                     </div>
                     
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Name:</strong>
                           {{$user->name}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Address:</strong>
                           {{$user->address}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Role:</strong>
                           {{$user->role}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>NIC <i class="fa-regular fa-file"></i>:</strong>
                          <image height="100px" width="100px" src="{{'/uploads/nicfiles/'.$user->nicfile}}"/>
                              <a href="{{'/uploads/nicfiles/'.$user->nicfile}}"><i class="fa-solid fa-expand" 
                              style="color: rgb(0, 0, 0);"></i></a>
                        </div>
                     </div>
                     @if($user->role=="Head Pharmacist")
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>License <i class="fa-regular fa-file"></i>:</strong>
                          <image height="100px" width="100px" src="{{'/uploads/license/'.$user->license}}"/>
                           <a href="{{'/uploads/license/'.$user->license}}"><i class="fa-solid fa-expand" 
                              style="color: rgb(0, 0, 0);"></i></a>
                        </div>
                     </div>
                     @endif
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>NIC No:</strong>
                           {{$user->nic}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Mobile No:</strong>
                           {{$user->mobile}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Gender:</strong>
                           {{$user->gender}}
                        </div>
                     </div>
                     
                  </div>
               
               </div>
               </div>
                     <!-- /.card-body -->

                     <div class="card-footer">
                        <!--<button type="submit" class="btn btn-outline-info" href="{{route('users.index')}}"><i class="fa-solid fa-arrow-left"></i></i><b>Back</b></button>-->
                        @if($user->role=="Head Pharmacist")
                        <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('hp')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
                        @else
                        <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('users.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
                        @endif
                    </div>
                  
               
            </div>
            <!-- /.container-fluid -->
</section>
@endsection