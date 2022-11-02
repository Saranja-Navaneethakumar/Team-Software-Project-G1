@extends('dashboard.admindashboard')
@section('managemedicine')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-capsules"></span> Manage Medicines</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Medicines</li>
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
@if(Auth::user()->role!=='Employee')
   <div class="text-right">
      <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('medicines.create')}}"><i class="fa fa-pills"></i> Add New Medicine</a>
   </div>
   @endif
   <div class="container-fluid"><br/>
   <div class="tab">
  <button class="tablinks" onclick="openSearch(event, 'Search Name')">Search by Name</button>
  <button class="tablinks" onclick="openSearch(event, 'Search Category')">Search by Category</button>
  <!--<button class="tablinks" onclick="openSearch(event, 'Search Type')">Search by Type</button>-->
  <button class="tablinks" onclick="openSearch(event, 'Search Supplier')">Search by Supplier</button>
</div>

<!-- Tab content -->
<div id="Search Name" class="tabcontent">
<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
<div class="input-group rounded col-9">
            <form  action="{{route('medicinessearch')}}" method="get">
               @csrf
               <div class="input-group-prepend">
                  <input type="search" class="form-control" style="border-color: rgba(140, 133, 199);"  name="searchmedicine" placeholder="Search Medicine by name or type">
                  <button style="color: rgb(65, 74, 187);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-search fa-2xl"></i></button>
                  
               </div>
            </form>
            <div class="input-group-prepend">
               <a href="{{ route('medicines.index') }}">
                  <button style="color: rgb(189, 26, 26);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-sync-alt fa-2xl"></i></button>
               </a>
            </div>
         </div>
</div>

<div id="Search Category" class="tabcontent">
   <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
<div class="input-group rounded col-9">
   <!--dropdowncategory-->
            <form  action="{{route('medicinessearch')}}" method="get">
               @csrf
               <div class="input-group-prepend">
                  <input type="search" class="form-control" style="border-color: rgba(140, 133, 199);"  name="searchcategory" placeholder="Search Medicine by Category">
                  <button style="color: rgb(65, 74, 187);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-search fa-2xl"></i></button>
                  
               </div>
            </form>
            <div class="input-group-prepend">
               <a href="{{ route('medicines.index') }}">
                  <button style="color: rgb(189, 26, 26);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-sync-alt fa-2xl"></i></button>
               </a>
            </div>
         </div>
</div>
<!--<div id="Search Type" class="tabcontent">
   <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
<div class="input-group rounded col-9">
            <form  action="#" method="get">
               @csrf
               <div class="input-group-prepend">
                  <input type="search" class="form-control"  name="searchtype" placeholder="Search Medicine by Type">
                  <button style="color: rgb(65, 74, 187);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-search fa-2xl"></i></button>
                  
               </div>
            </form>
            <div class="input-group-prepend">
               <a href="{{ route('medicines.index') }}">
                  <button style="color: rgb(189, 26, 26);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-sync-alt fa-2xl"></i></button>
               </a>
            </div>
         </div>
</div>-->
<div id="Search Supplier" class="tabcontent">
   <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
<div class="input-group rounded col-9">
            <form  action="{{route('medicinessearch')}}" method="get">
               @csrf
               <div class="input-group-prepend">
                  <input type="search" class="form-control" style="border-color: rgba(140, 133, 199);"  name="searchsupplier" placeholder="Search Medicine by Supplier">
                  <button style="color: rgb(65, 74, 187);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-search fa-2xl"></i></button>
                  
               </div>
            </form>
            <div class="input-group-prepend">
               <a href="{{ route('medicines.index') }}">
                  <button style="color: rgb(189, 26, 26);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-sync-alt fa-2xl"></i></button>
               </a>
            </div>
         </div>
</div></br>
               @php
                $n=0;
                @endphp
               <div class="col-md-12">
                  <table id="medicine" class="table table-bordered table-striped">
                     <caption>medicine</caption>
                     <thead>
                        <tr>
                           <th>NO</th>
                           <th>Commercial Name</th>
                           <th>Medical Name</th>
                           <th>Company Name</th>
                           <th>Category</th>
                           <th>Type</th>
                           <th>Usage</th>
                           <th>Created By</th>
                           <th>Created Time</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($medicines as $medicine)
                        <tr>
                           <td>{{++$n}}</td>
                           <td>{{$medicine->commercial_name}}</td>
                           <td>{{$medicine->medical_name}}</td>
                           <td>{{$medicine->company_name}}</td>
                           <td>{{$medicine->category}}</td>
                           <td>{{$medicine->type}}</td>
                           <td>{{$medicine->usage}}</td>
                           <td>{{$medicine->created_by}}</td>
                           <td>{{$medicine->created_time}}</td>
                           
                           <td class="text-center">
                           @if(Auth::user()->role=='Admin' || Auth::user()->role=='Head Pharmacist')
                              <form action="{{route('medicines.destroy',$medicine->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <a style="color: rgb(17,122,139);" class="btn-xs" href="{{route('medicines.show',$medicine->id)}}" role="button"><i class="fa-regular fa-eye fa-xl"></i></a>
                                 <a style="color: rgb(0, 128, 0);" class="btn-xs" href="{{route('medicines.edit',$medicine->id)}}" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                 <button style="color: rgb(169, 34, 48);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                                 <!--<a class="btn btn-sm btn-danger btn-circle" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-alt fa-2x"></i></a>-->
                                 </form>
                           @elseif(Auth::user()->role!='Admin')
                                 <a style="color: rgb(17,122,139);" class="btn-xs" href="{{route('medicines.show',$medicine->id)}}" role="button"><i class="fa-regular fa-eye fa-xl"></i></a>
                           @endif
                           </td>
                           
                           
                           
                        </tr>
                        @endforeach
                        </tbody>    
                  </table>
                  {{$medicines->links()}}
               </div>
            </div>
      </div>

</section>
@endsection