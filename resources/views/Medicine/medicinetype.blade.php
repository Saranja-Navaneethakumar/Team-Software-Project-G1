@extends('dashboard.admindashboard')
@section('type')
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
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-pills"></span> Medicines Type</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Medicine Type</li>
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
               <div class="card card-info">
                  <div class="card-header">
                     <h3 class="card-title"> Medicine Type Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{route('medicine_types.store')}}" method="post">
                    @method('POST')
                    @csrf
                     <div class="card-body" id="gradcard">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="card-header">
                                 <h5><span class="fa fa-pills"></span> Medicine Type Information</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Type</label>
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name ="type_name" placeholder="Type">
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
                                       <input type="text" class="form-control" style="border-color: rgba(140, 133, 199);" name ="created_by" value="{{Auth::user()->username}}" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer">
                                 <button type="submit" class="btn button1" style="background-color: rgba(140, 133, 199); color:white"><i class= "fa fa-pills"></i> Save Type</button>
                              </div>
                  </form>
               </div>
               @php
                $n=0;
                @endphp
               <div class="col-md-9" style="border-left: 1px solid #ddd;">
                  <table id="type" class="table table-bordered table-striped">
                     <caption>maedicine types</caption>
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Type</th>
                           <th>Status</th>
                           <th>Created By</th>
                           <th>Date Created</th>
                           @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Head Pharmacist')
                           <th>Action</th>
                           @endif
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($medicine_types as $medicine_type)
                        <tr>
                           <td>{{++$n}}</td>
                           <td>{{$medicine_type->type_name}}</td>
                           @if($medicine_type->status=='Active')
                                <td ><span class="badge-lg badge-pill " style="background-color: rgba(36, 125, 104); color:white">
                                {{$medicine_type->status}}<span></td>
                            @else($medicine_type->status=='Inctive')
                                <td ><span class="badge-lg badge-pill " style="background-color: rgba(150, 30, 30); color:white">
                                {{$medicine_type->status}}<span></td>
                            @endif
                           <td>{{$medicine_type->created_by}}</td>
                           <td>{{$medicine_type->created_time}}</td>

                           @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Head Pharmacist')
                           <td class="text-left">
                              <form action="{{route('medicine_types.destroy',$medicine_type->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <a style="color: rgb(0, 128, 0);" class="btn-xs" href="{{route('medicine_types.edit',$medicine_type->id)}}" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                 <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                                 <!--<a class="btn btn-sm btn-danger btn-circle" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-alt fa-2x"></i></a>-->
                              </form>
                           </td>
                           @endif
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
                  {{$medicine_types->links()}}
               </div>
            </div>
      </div>

   </div>
   <!-- /.card-body -->
   </div>
   
@endsection