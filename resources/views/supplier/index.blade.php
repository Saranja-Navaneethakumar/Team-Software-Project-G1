@extends('dashboard.admindashboard')
@section('managesupplier')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-truck-medical"></span> Manage Suppliers</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Suppliers</li>
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
<div class="col-sm-3">
         <div class="input-group rounded">
            <form  action="{{route('supplierssearch')}}" method="get">
               @csrf
               <div class="input-group-prepend">
                  <input type="search" class="form-control" style="border-color: rgba(140, 133, 199);"  name="searchsupplier" placeholder="Search Supplier">
                  <button style="color: rgb(65, 74, 187);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-search fa-2xl"></i></button>
                  
               </div>
            </form>
            <div class="input-group-prepend">
               <a href="{{ route('suppliers.index') }}" class=" mt-1">
                  <button style="color: rgb(189, 26, 26);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-sync-alt fa-2xl"></i></button>
               </a>
            </div>
         </div>
      </div>
<div class="text-right">
   <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('suppliers.create')}}"><i class="fa fa-truck-medical"></i> Add New Supplier</a>
</div>
<div class="container-fluid"><br/>
               @php
                $n=0;
                @endphp
               <div class="col-md-12">
                  <table id="supplier" class="table table-bordered table-striped">
                     <caption>Suppliers</caption>
                     <thead>
                        <tr>
                           <th>NO</th>
                           <th>Supplier Name</th>
                           <th>Mobile</th>
                           <th>Address</th>
                           <th>Previous Due</th>
                           <th>Status</th>
                           <th>Created By</th>
                           <th>Created Time</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($suppliers as $supplier)
                        <tr>
                           <td>{{++$n}}</td>
                           <td>{{$supplier->suppliername}}</td>
                           <td>{{$supplier->mobile}}</td>
                           <td>{{$supplier->address}}</td>
                           <td>{{$supplier->previousdue}}</td>
                            @if($supplier->status=='Active')
                                <td ><span class="badge-lg badge-pill " style="background-color: rgba(36, 125, 104); color:white">
                                {{$supplier->status}}<span></td>
                            @else($supplier->status=='Inctive')
                                <td ><span class="badge-lg badge-pill " style="background-color: rgba(150, 30, 30); color:white">
                                {{$supplier->status}}<span></td>
                            @endif
                           <td>{{$supplier->created_by}}</td>
                           <td>{{$supplier->created_time}}</td>
                           <td class="text-center">
                              <form action="{{route('suppliers.destroy',$supplier->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <a style="color: rgb(17,122,139);" class="btn-xs" href="{{route('suppliers.show',$supplier->id)}}" role="button"><i class="fa-regular fa-eye fa-xl"></i></a>
                                 <a style="color: rgb(0, 128, 0);" class="btn-xs" href="{{route('suppliers.edit',$supplier->id)}}" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                 <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                                 <!--<a class="btn btn-sm btn-danger btn-circle" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-alt fa-2x"></i></a>-->
                              </form>  
                           </td>
                        </tr>
                        @endforeach
                        </tbody>    
                  </table>
                  {{$suppliers->links()}}
               </div>
            </div>
      </div>

</section>

@endsection