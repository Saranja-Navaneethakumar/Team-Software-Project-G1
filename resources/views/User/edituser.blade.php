@extends('dashboard.admindashboard')
@section('edituser')

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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-user-pen"></span> Update Details</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Update</li>
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
    <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('users.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
   </div></br>
<div class="container-fluid">
   <div class="card card-info shadow">
         <div class="card-header">
            <h3 class="card-title"><i class="fa fa-user fa-xs"></i> User Information</h3>
         </div>
                  <!-- /.card-header -->
   <div class="card-body" id="gradcard">
   <div class="col-md-9">
      <form method="post" action="{{route('users.update', $user->id)}}">
                @method('PUT')
                @csrf
        <div class="form-group">
          <label for="username">User Name </label>
          <input type="text" class="form-control" name="username" style="border-color: rgba(140, 133, 199);" value="{{$user->username}}" />
        </div>
        <div class="form-group">
          <label for="name">Name </label>
          <input type="text" class="form-control" name="name" style="border-color: rgba(140, 133, 199);" value="{{$user->name}}" />
        </div>
        <div class="form-group">
          <label for="address">Address </label>
          <input type="text" class="form-control" name="address" value="{{$user->address}}" style="border-color: rgba(140, 133, 199);" />
        </div>
        <div class="form-group">
          <label for="nic">NIC Number </label>
          <input type="text" class="form-control" name="nic" value="{{$user->nic}}" style="border-color: rgba(140, 133, 199);" />
        </div>
        <div class="form-group">
          <label for="mobile">Mobile Number </label>
          <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}" style="border-color: rgba(140, 133, 199);" />
        </div>
        <label>Gender</label>
            <div class="col-md-20">
               <div class="form-check">
                  <label class="form-check-label">
                     <input type="radio" name="gender"value="Male" <?php if ($user->gender == 'Male') echo 'checked="checked"'; ?> /> Male</label>
               </div>
            </div>

            <div class="col-md-20">
               <div class="form-check">
                  <label class="form-check-label">
                  <input type="radio" name="gender" value="Female" <?php if ($user->gender == 'Female') echo 'checked="checked"'; ?> /> Female</label>
               </div>
            </div>

        <div class="form-group">
          <label for="last_name">Password </label>
          <input type="password" class="form-control" name="password" style="border-color: rgba(140, 133, 199);" value="{{$user->password}}" />
        </div>
         
        <div class="form-group">
            <label>NIC <i class="fa-regular fa-file"></i></label></br>
            <image height="20px" width="20px" src="{{'/uploads/nicfiles/'.$user->nicfile}}"/></br>
                              <a href="{{'/uploads/nicfiles/'.$user->nicfile}}"><i class="fa-solid fa-expand" 
                              style="color: rgb(0, 0, 0);"></i></a>
					<input type="file" class="form-control"class="form-control-file" name="nicfile" value="{{'/uploads/nicfiles/'.$user->nicfile}}"style="border-color: rgba(140, 133, 199);">
               
			</div> 
         
        <div class="col-md-20">
            <div class="form-group">
                <label>Role</label>
                <select class="form-select" name="role" style="border-color: rgba(140, 133, 199);" value="{{$user->trole}}">
                    <option value="" disabled="disabled">Select Role</option>
                     <option value="Employee" {{ ( $user->role=="Employee") ? 'selected' : '' }}><strong>{{$user->role}}</strong></option>
                     <option value="Head Pharmacist" {{ ( $user->role=="Head Pharmacist") ? 'selected' : '' }}><strong>{{$user->role}}</strong></option>  
                     <option value="Stock Manager" {{ ( $user->role=="Stock Manager") ? 'selected' : '' }}><strong>{{$user->role}}</strong></option>  
                </select>
            </div>
        </div>
        
        </div>
        </div></div>
                     <!-- /.card-body -->
         <div class="col-md-12">
          <div class="card-footer">
            <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white "><i class="fa fa-pen-fancy"></i><b> Update</b></button>
          </div>
         </div>
         
      </form>
   
   

            <!-- /.container-fluid -->
</section>
@endsection