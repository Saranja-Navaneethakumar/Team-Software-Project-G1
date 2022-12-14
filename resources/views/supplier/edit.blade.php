@extends('dashboard.admindashboard')
@section('editsupplier')

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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-truck-medical"></span> Update Supplier</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Update Supplier</li>
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
    <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('suppliers.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
   </div></br>
<div class="container-fluid">
   <div class="card card-info" id="gradcard">
              
                  <div class="card-header">
                     <h3 class="card-title"><i class="fa fa-truck-medical fa-xs"></i> Supplier Information</h3>
                  </div>
                  <!-- /.card-header -->
   <div class="card-body">
   <div class="col-md-9">
      <form method="post" action="{{route('suppliers.update', $supplier->id)}}">
         @method('PATCH')
         @csrf
      <div class="row">
      
        <div class="col-md-4">
            <div class="form-group">
                <label>Supplier Name</label>
                <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="suppliername" value="{{$supplier->suppliername}}">
             </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="mobile" value="{{$supplier->mobile}}">
             </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="address" value="{{$supplier->address}}">
             </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Previous Due</label>
                <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="previousdue" value="{{$supplier->previousdue}}">
             </div>
        </div>
        <div class="col-md-4">
            <label>Status</label>
                <div class="col-md-20">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" name="status" value="Active" <?php if ($supplier->status == 'Active') echo 'checked="checked"'; ?>" /> Active</label>
                    </div>
                </div>
                <div class="col-md-20">
                    <div class="form-check">
                        <label class="form-check-label">
                         <input type="radio" name="status" value="Inactive" <?php if ($supplier->status == 'Inactive') echo 'checked="checked"'; ?>" /> Inactive</label>
                    </div>
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Created By</label>
                <input type="text" name="created_by" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{Auth::user()->username}}" readonly>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Created Time</label>
                <input type="text" name="created_time" class="form-control" style="border-color: rgba(140, 133, 199);" value="{{$supplier->created_time}}" readonly>
            </div>
        </div>
               </div>
                     <!-- /.card-body -->
         <div class="col-md-12">
          <div class="card-footer">
            <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white "><i class="fa fa-pen-fancy"></i><b> Update</b></button>
          </div>
         </div>
      </form>
   </div>
   
</div>
            <!-- /.container-fluid -->
</section>
@endsection