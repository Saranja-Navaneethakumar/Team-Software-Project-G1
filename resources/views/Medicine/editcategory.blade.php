@extends('dashboard.admindashboard')
@section('editcategory')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-tablets"></span> Category Edit</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category Edit</li>
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
               <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('categories.index')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
            </div></br>
         <div class="container-fluid">
               <div class="card card-info" id="gradcard">
                  <div class="card-header">
                     <h3 class="card-title"><i class="fa fa-tablets fa-xs"></i>Category Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('categories.update', $category->id)}}" method="post">
                    @method('PUT')
                    @csrf
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-9">
                              <div class="card-header">
                                 <h5><span class="fa fa-tablets"></span> Category Information</h5>
                              </div>
                              <div class="row">
                              <div class="col-md-20">
                                    <div class="form-group">
                                       <label>Category ID</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name ="id" value="{{$category->id}}" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-20">
                                    <div class="form-group">
                                       <label>Category Name</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name ="category_name" value="{{$category->category_name}}">
                                    </div>
                                 </div>
                                 <label>Status</label>
                                 <div class="col-md-20">
                                    <div class="form-check">
                                       <label class="form-check-label">
                                       <input type="radio" name="status" value="Active" <?php if ($category->status == 'Active') echo 'checked="checked"'; ?>" /> Active</label>
                                    </div>
                                 </div>

                                 <div class="col-md-20">
                                    <div class="form-check">
                                       <label class="form-check-label">
                                       <input type="radio" name="status" value="Inactive" <?php if ($category->status == 'Inactive') echo 'checked="checked"'; ?>" /> Inactive</label>
                                    </div>
                                 </div>
                                 <!--<div class="col-md-20">
                                    <div class="form-group">
                                       <label>Created Date</label>
                                       <input type="date" name ="created_time" class="form-control" value="{{$category->created_time}}" readonly>
                                    </div>
                                 </div>-->
                                 <div class="col-md-20">
                                    <div class="form-group">
                                       <label>Created By</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name ="created_by" value="{{Auth::user()->username}}" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white"><i class= "fa fa-pen-fancy"></i> Update Category</button>
                              </div>
                  </form>
               </div>
@endsection