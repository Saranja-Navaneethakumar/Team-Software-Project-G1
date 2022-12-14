@extends('dashboard.admindashboard')
@section('medstock')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-layer-group"></span>Total Stocks</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Total Stocks</li>
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
         <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('stocks.create')}}"><i class="fa fa-layer-group"></i> Add Stock</a>
    </div>
    <div class="input-group rounded col-9 pb-5">
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
    <div class="container-fluid">
               @php
                $n=0;
                @endphp
               <div class="col-md-12">
                  <table id="stocks" class="table table-bordered table-striped">
                    <caption>All stocks</caption>
                     <thead>
                        <tr> 
                           <th>NO</th>
                           <th>Commercial Name</th>
                           <th>Dosage</th>
                           <th>Unit</th>
                           <th>Quantity</th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($stocks as $stock)
                        <tr>
                           <td>{{++$n}}</td>
                        @foreach($medicines as $medicine)
                              @if($medicine->id == $stock->medicine_id)
                                 <td>{{$medicine->commercial_name}}</td>
                              @endif
                           @endforeach
                           <td>{{$stock->dosage}}</td>
                           <td>{{$stock->unit}}</td>
                           <td>{{$stock->quantity}}</td>
                           @if(Auth::user()->role=='Admin')
                           <td>
                              <a style="color: rgb(17,122,139);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-eye fa-xl"></i></a>
                                 <a style="color: rgb(0, 128, 0);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                 <button style="color: rgb(169, 34, 48);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                           </td>
                           @elseif(Auth::user()->role!='Admin')
                           <td>
                              <a style="color: rgb(17,122,139);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-eye fa-xl"></i></a>
                           </td>
                           @endif
                        </tr>
                        
                        @endforeach
                        </tbody>    
                  </table>
                 
               </div>
            </div>
      </div>

</section>
@endsection