@extends('dashboard.admindashboard')
@section('myprofile')
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><i class="fa fa-id-card-clip fa-xs"></i> My Profile</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">My Profile</li>
            </ol>
         </div>
                  <!-- /.col -->
      </div>
               <!-- /.row -->
   </div>
            <!-- /.container-fluid -->
</div>

<section class="content">
   <div class="text-left">
    <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('dash')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
   </div></br>
<div class="container-fluid">
   <div class="card card-info shadow">
         <div class="card-header">
            <h3 class="card-title"><i class="fa fa-id-card-clip"></i>  My Profile</h3>
         </div>
                  <!-- /.card-header -->
   <div class="card-body" id="gradcard">
   <div class="col-md-9 grid-container">
      <form method="post" action="#">
                @method('PUT')
                @csrf
                <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>User Name:</strong>
                           {{Auth::user()->username}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Password:</strong>
                           {{Auth::user()->password}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Name:</strong>
                           {{Auth::user()->name}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Address:</strong>
                           {{Auth::user()->address}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>Role:</strong>
                           {{Auth::user()->role}}
                        </div>
                     </div>
                     
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>NIC No:</strong>
                           {{Auth::user()->nic}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <strong>NIC file:</strong>
                              {{Auth::user()->nicfile}}
                              <image height="150px" width="150px" src="{{'/uploads/nicfiles/'.Auth::user()->nicfile}}"/>
                              <a href="{{'/uploads/nicfiles/'.Auth::user()->nicfile}}"><i class="fa-solid fa-expand" 
                              style="color: rgb(0, 0, 0);"></i></a>
			               </div> 
                     </div>
                     @if(Auth::user()->role=="Head Pharmacist")
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>License :</strong>
                          <image height="150px" width="150px" src="{{'/uploads/license/'.Auth::user()->license}}"/>
                           <a href="{{'/uploads/license/'.Auth::user()->license}}"><i class="fa-solid fa-expand"
                           style="color: rgb(0, 0, 0);"></i></a>
                        </div>
                     </div>
                     @endif
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Mobile No:</strong>
                           {{Auth::user()->mobile}}
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-12 col-md-12">
                         <div class="form-group">
                          <strong>Gender:</strong>
                           {{Auth::user()->gender}}
                        </div>
                     </div>
                     
                  </div>
               
               </div>
                     <!-- /.card-body -->
         <!--<div class="col-md-12">
          <div class="card-footer">
            <a style="background-color: rgba(140, 133, 199); color:white " class="btn" href="{{route('users.edit',Auth::user()->id)}}" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
          </div>
         </div>-->
         
      </form>
   
   

            <!-- /.container-fluid -->
</section>
@endsection