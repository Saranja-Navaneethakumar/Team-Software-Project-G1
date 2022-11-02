
@extends('dashboard.admindashboard')
@section('addcategory')
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-tablets"></span> Medicine's Category</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{route('dash')}}">Home</a></li>
               <li class="breadcrumb-item active">Category</li>
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
               
            
            
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title"> Medicine Category Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('categories.store')}}" method="post">
                    @method('POST')
                    @csrf
                     <div class="card-body" id="gradcard">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="card-header">
                                 <h5><span class="fa fa-tablets"></span> Add Category</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Category Name</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199); background-color:transparent;" name ="category_name" placeholder="Category name">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                       <label>Status</label>
                                 </div>
                                 <div class="form-group">
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
                                 </div>     
                                 </br>
                                 
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Created By</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199); background-color:transparent;" name ="created_by" value="{{Auth::user()->username}}" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white"><i class= "fa fa-tablets"></i> Save Category</button>
                              </div>
                  </form>
               </div>
               @php
                $n=0;
                @endphp
               <div class="col-md-9" style="border-left: 1px solid #ddd;">
               <h5><span class="fa fa-tablets"></span> Category list</h5>
                  <table id="category" class="table table-bordered table-striped">
                     <caption>category</caption>
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Category Name</th>
                           <th>Status</th>
                           <th>Created By</th>
                           <th>Date Created</th>
                           @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Head Pharmacist')
                           <th>Action</th>
                           @endif
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($categories as $category)
                        <tr>
                           <td>{{++$n}}</td>
                           <td>{{$category->category_name}}</td>
                           @if($category->status=='Active')
                                <td ><span class="badge-lg badge-pill " style="background-color: rgba(36, 125, 104); color:white">
                                {{$category->status}}<span></td>
                            @else($category->status=='Inactive')
                                <td ><span class="badge-lg badge-pill " style="background-color: rgba(150, 30, 30); color:white">
                                {{$category->status}}<span></td>
                            @endif
                           <td>{{$category->created_by}}</td>
                           <td>{{$category->created_time}}</td>
                           @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Head Pharmacist')
                           <td class="text-left">
                              <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <a style="color: rgb(0, 128, 0);" class="btn-xs" href="{{route('categories.edit',$category->id)}}" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                 <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                                 <!--<a class="btn btn-sm btn-danger btn-circle" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-alt fa-2x"></i></a>-->

                              </form>
                           </td>
                           @endif
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
                  {{$categories->links()}}
               </div>
            </div>
      </div>

   </div>
   <!-- /.card-body -->
   </div>
   <!--<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body text-center">
               <img src="/img/alert.png" alt="" width="50" height="46">
               <h3>Are you sure want to delete this Category?</h3>
               <div class="m-t-20"> <a href="#" class="btn btn-outline-dark btn-lg" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-outline-danger btn-lg">Delete</button>
               </div>
            </div>
         </div>
      </div>
   </div>-->
   </section>
@endsection