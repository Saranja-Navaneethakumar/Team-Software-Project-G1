@extends('dashboard.admindashboard')
@section('adduser')
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-users"></span> Add User</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Add User</li>
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
      <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('users.index')}}"><i class="fa fa fa-list"></i> Employee List</a>
      <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('hp')}}"><i class="fa fa fa-list"></i> Head Pharmacist List</a>
    </div>
<div class="container-fluid"></br>
	<div class="tab">
		<button class="tablinks" onclick="openAddUser(event, 'Employees')" id="defaultOpen">Employees</button>
		<button class="tablinks" onclick="openAddUser(event, 'Head Pharmacist')">Head Pharmacist</button>
	</div>

	<div id="Employees" class="tabcontent1">
		<span onclick="this.parentElement.style.display='none'" class="topright">&times</span></br>
		<div class="card card-info shadow">
         <div class="card-header">
            <h3 class="card-title">User Information</h3>
         </div>
                  <!-- /.card-header -->
                  <!-- form start -->
        <form  action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="card-body" id="gradcard">
				<div class="row">
					<div class="col-md-12">
                    <div class="card-header">
                    <h5><span class="fa fa-users"></span> User Information</h5>
                    </div>
					</div>
				</div>
                     
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="username" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="User Name">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Password">
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Name">
						</div>
					</div>
                   
                    <div class="col-md-3">
						<div class="form-group">
                            <label>Address</label>
							<textarea class="form-control" name="address" style="border-color: rgba(140, 133, 199);" placeholder="Address"></textarea>
						</div>
					</div>


					<div class="col-md-3">
						<div class="form-group">
							<label>Role</label>
							<select class="form-select" style="border-color: rgba(140, 133, 199);" name="role">
                                <option selected disabled>Select role</option>
								<option>Stock Manager</option>
								<option>Employee</option>
							</select>
						</div>
					</div>
                     
                    <div class="col-md-3">
						<div class="form-group">
                            <label>Mobile Number</label>
							<input type="text" class="form-control" name="mobile" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>

                    <div class="col-md-3">
						<div class="form-group">
                            <label>NIC Number</label>
							<input type="text" class="form-control" name="nic" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
                            <label>NIC <i class="fa-regular fa-file"></i></label>
							<input type="file" class="form-control"class="form-control-file" name="nicfile" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>
                     
                    <div class="col-md-3">
                        <label>Gender</label>
                       
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="gender" value="Male" id="gender_m">
                            <label class="custom-control-label" for="gender_m">
                                Male
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" name="gender" value="Female" id="gender_f">
                            <label class="custom-control-label" for="gender_f">
                                Female
                            </label>
                        </div> 
                    </div> </div>
				</div>
			</div>       
		</div>
            
                     <!-- /.card-body -->
            <div class="card-footer">
               <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white "><i class="fa fa-user-plus"></i><b> Save User</b></button>
            </div>
        </form>
	</div>
	
	
    <div id="Head Pharmacist" class="tabcontent1">
    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span></br>
		<div class="card card-info shadow">
         <div class="card-header">
            <h3 class="card-title">User Information</h3>
         </div>
                  <!-- /.card-header -->
                  <!-- form start -->
        <form  action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="card-body" id="gradcard">
				<div class="row">
					<div class="col-md-12">
                    <div class="card-header">
                    <h5><span class="fa fa-users"></span> User Information</h5>
                    </div>
					</div>
				</div>
                     
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="username" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="User Name">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Password">
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Name">
						</div>
					</div>
                   
                    <div class="col-md-3">
						<div class="form-group">
                            <label>Address</label>
							<textarea class="form-control" name="address" style="border-color: rgba(140, 133, 199);" placeholder="Address"></textarea>
						</div>
					</div>


					<div class="col-md-3">
						<div class="form-group">
							<label>Role</label>
							<input class="form-control" style="border-color: rgba(140, 133, 199);" name="role" value="Head Pharmacist" readonly/>
						</div>
					</div> 

                    <div class="col-md-3">
						<div class="form-group">
                            <label>Mobile Number</label>
							<input type="text" class="form-control" name="mobile" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>

                    <div class="col-md-3">
						<div class="form-group">
                            <label>NIC Number</label>
							<input type="text" class="form-control" name="nic" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
                            <label>NIC <i class="fa-regular fa-file"></i></label>
							<input type="file" class="form-control"class="form-control-file" name="nicfile" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
                            <label>License <i class="fa-regular fa-file"></i></label>
							<input type="file" class="form-control"class="form-control-file" name="license" style="border-color: rgba(140, 133, 199);">
						</div>
					</div>
                    <div class="col-md-3">
                        <label>Gender</label>
                       
                    <div class="form-group">
                        <div class="form-radio">
                            <input class="form-control-input" type="radio" name="gender" value="Male" id="gender_m">
                            <label class="form-control-label" for="gender_m">
                                Male
                            </label>
                        </div>
                        <div class="form-radio">
                            <input class="form-control-input" type="radio" name="gender" value="Female" id="gender_f">
                            <label class="form-control-label" for="gender_f">
                                Female
                            </label>
                        </div> 
                    </div> </div>
				</div>
			</div>       
		</div>
            
                     <!-- /.card-body -->
            <div class="card-footer">
               <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white "><i class="fa fa-user-plus"></i><b> Save User</b></button>
            </div>
        </form>
    </div>

</div>
            <!-- /.container-fluid -->
            
</section>

@endsection