@extends('dashboard.admindashboard')
@section('addsupplier')
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-truck-medical" ></span> Add Supplier</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Add Supplier</li>
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
      <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('suppliers.index')}}"><i class="fa fa fa-list"></i> Supplier List</a>
    </div>
<div class="container-fluid"></br>
    <div class="card card-info">
         <div class="card-header">
            <h3 class="card-title">Supplier Information</h3>
         </div>
                  <!-- /.card-header -->
                  <!-- form start -->
        <form  action="{{route('suppliers.store')}}" method="post">
            @method('POST')
            @csrf
            <div class="card-body" id="gradcard">
				<div class="row">
					<div class="col-md-12">
                    <div class="card-header">
                    <h5><span class="fa fa-truck-medical"></span> Supplier Information</h5>
                    </div>
					</div>
				</div>
                     
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Supplier Name</label>
							<input type="text" name="suppliername" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Supplier Name">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Mobile</label>
							<input type="text" name="mobile" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Mobile">
						</div>
					</div>
                    <div class="col-md-3">
						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Address">
						</div>
					</div>
                    <div class="col-md-3">
                        <label>Status</label></br>
                            <div class="custom-control custom-radio">
                                       <input class="custom-control-input custom-control-input-success" type="radio" name="status" value="Active" id="statusactive">
                                       <label class="custom-control-label" for="statusactive">
                                          Active
                                       </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                       <input class="custom-control-input custom-control-input-danger" type="radio" name="status" value="Inactive" id="statusinactive">
                                       <label class="custom-control-label" for="statusinactive">
                                          Inactive
                                       </label>
                                    </div>  
                    </div></br>
                    <div class="col-md-3">
						<div class="form-group">
							<label>Previous Due</label>
							<input type="text" name="previousdue" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Previous Due">
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
            
                     <!-- /.card-body -->
            <div class="card-footer">
               <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white "><i class="fa fa-truck-medical"></i><i class="fa fa-plus fa-2xs"></i><b> Save Supplier</b></button>
            </div>
        </form>
	</div>
</div>

            <!-- /.container-fluid -->
</section>

@endsection