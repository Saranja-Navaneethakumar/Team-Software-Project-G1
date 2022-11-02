@extends('dashboard.admindashboard')
@section('editmedicine')

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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-pills"></span> Update Medicine Details</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Update Medicine</li>
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
		<a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('medicines.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
	</div></br>
<div class="container-fluid">
	<div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-pills fa-xs"></i> Medicine Information</h3>
        </div>
                  <!-- /.card-header -->
	<div class="card-body" id="gradcard">
		<div class="col-md-12">
        <form method="post" action="{{route('medicines.update', $medicine->id)}}">
         @method('PATCH')
         @csrf
    <div class="row">
      
        <div class="col-md-3">
            <div class="form-group">
                <label>Commercial Name</label>
                <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="commercial_name" value="{{$medicine->commercial_name}}">
             </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>Medical Name</label>
            <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="medical_name" value="{{$medicine->medical_name}}">
        </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>Company Name</label>
            <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="company_name" value="{{$medicine->company_name}}">
        </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" style="border-color: rgba(140, 133, 199);" name="category"  value="{{$medicine->category}}" aria-label=".form-select example">
                <option value="" disabled="disabled">Select Category</option>
                @foreach($categories as $category)
                {
                    <option value="{{$category->category_name}}" {{ ( $category->category_name==$medicine->category) ? 'selected' : '' }}><strong>{{$category->category_name}}</strong></option>
                }
                @endforeach
                
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" style="border-color: rgba(140, 133, 199);" name="type"  value="{{$medicine->type}}">
                    <option value="" disabled="disabled">Select Type</option>
                        @foreach($medicine_types as $medicine_type)
                        {
                            <option value="{{$medicine_type->type_name}}" {{ ( $medicine_type->type_name==$medicine->type) ? 'selected' : '' }}><strong>{{$medicine_type->type_name}}</strong></option>
                            
                        }
                        @endforeach
                        
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Usage</label>
                <select class="form-control" style="border-color: rgba(140, 133, 199);" name="usage"  value="{{$medicine->usage}}">
                <option value="" disabled="disabled">Select Usage</option>
                    <option value="{{$medicine->usage}}" {{ ( $medicine->usage=='Oral') ? 'selected' : '' }}><strong>Oral</strong></option>
                    <option value="{{$medicine->usage}}" {{ ( $medicine->usage=='External') ? 'selected' : '' }}><strong>External</strong></option>
                </select>
            </div>
        </div>                        
        
        <div class="col-md-3">
            <div class="form-group">
                <label>Created By</label>
                <input type="text" name="created_by" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{Auth::user()->username}}" readonly>
            </div>
        </div>
    </div>
                     <!-- /.card-body -->
         
          <div class="card-footer" id="gradcard">
            <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white "><i class="fa fa-pen-fancy"></i><b> Update</b></button>
          </div>
         
      </form>
   </div>
   
</div>
            <!-- /.container-fluid -->
</section>
@endsection