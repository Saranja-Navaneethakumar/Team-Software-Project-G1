@extends('dashboard.admindashboard')
@section('addnewmedicine')
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-capsules"></span> Add Medicine</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
               <li class="breadcrumb-item active">Add Medicine</li>
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
      <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('medicines.index')}}"><i class="fa fa fa-list"></i> Medicine List</a>
   </div>
<div class="container-fluid"></br> 
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title">Medicine Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form  action="{{route('medicines.store')}}" method="post">
                     @csrf
                     <div class="card-header" id="gradcard">
                        <h5><span class="fa fa-capsules"></span> Medicine Information</h5>
                     </div>
                     <div class="card-body" id="gradcard">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row">
                                 <!--<div class="col-md-4">
                                    <div class="form-group">
                                       <label>Item Code</label>
                                       <input type="number" class="form-control" style="border-color: rgba(140, 133, 199);" placeholder="Code">
                                    </div>
                                 </div>-->
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Medical Name</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="medical_name" placeholder="Medical name">
                                    </div>
                                 </div>

                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Commercial Name</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="commercial_name" placeholder="Commercial name">
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Company Name</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name="company_name" placeholder=" Company Name">
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Category</label>
                                       <select class="form-control" style="border-color: rgba(140, 133, 199);" name="category">
                                       <option value="" selected disabled>Select Category</option>
                                          @foreach($categories as $category)
                                          {
                                             <option value="{{$category->category_name}}"><strong>{{$category->category_name}}</strong></option>
                                          }
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Type</label>
                                       <select class="form-control" style="border-color: rgba(140, 133, 199);" name="type">
                                       <option value="" selected disabled>Select Type</option>
                                       <!--<label class="form-label select-label">Select Type</label>-->
                                          @foreach($medicine_types as $medicine_type)
                                          {
                                             <option value="{{$medicine_type->type_name}}"><strong>{{$medicine_type->type_name}}</strong></option>
                                          }
                                          @endforeach
                                       </select>
                                       
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Usage</label>
                                       <select class="form-control" style="border-color: rgba(140, 133, 199);" name="usage">
                                          <option selected disabled>Select Usage</option>
                                          <option>Oral</option>
                                          <option>External</option>
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
                           </div>
                        </div>
                        <div class="text-right">
                        <input type="reset" class="btn btn-lg button1" style="background-color: rgba(16, 117, 134); color:white">
                                       </div>
                     </div>
                     <!-- /.card-body -->

                     <div class="card-footer" id="gradcard">
                        <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white"><i class= "fa fa-pills"></i> Save Medicine</button>
                        <!--button2-->
                     </div>
                  </form>
               </div>
            </div>
            <!-- /.container-fluid -->
</section>
@endsection