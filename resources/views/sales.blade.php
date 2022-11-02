@extends('dashboard.admindashboard')
@section('sales')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-arrow-trend-up"></span> Sales</h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sales</li>
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
            <div class="card-info">
                <div class="card-header">
                    <h3 class="card-title"><span class="fa fa-arrow-trend-up fa-xs"></span> Sales Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 pr-5">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" class="form-control"style="border-color: rgba(140, 133, 199); background-color:transparent; color:black">
                            </div>
                        </div>
                  
                        <div class="col-md-3 pr-5">
                        
                            <label>End Date</label>
                            <input type="date" class="form-control"style="border-color: rgba(140, 133, 199); background-color:transparent; color:black">
                            
                        </div>
                        
                    </div>

                    

                    <div class="col-md-3 pt-4">
                        <a class="btn btn-md button1" href="#" style="background-color: rgba(26,123,146); color:white;"><i class="fa fa-magnifying-glass"></i></a>
                        </div>
                    @php
                    $n=0;
                    @endphp
                    <table class="table table-bordered">
                        <caption>Sales</caption>
                        <thead>
                        <tr>
                           <th>Invoice Id</th>
                           <th>Price</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>10001
                           </td>
                           <td>5000
                           </td>
                           <td>10/19/2020
                           </td>
                           <td><form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a style="color: rgb(17,122,139);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-file fa-xl"></i></a>
                                    <a style="color: rgb(0, 128, 0);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                    <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                            </form>
                           </td>
                        </tr>
                        <tr>
                           <td>10002
                           </td>
                           <td>10000
                           </td>
                           <td>9/25/2020
                           </td>
                           <td><form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a style="color: rgb(17,122,139);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-file fa-xl"></i></a>
                                    <a style="color: rgb(0, 128, 0);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                    <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                            </form>
                           </td>
                        </tr>
                        <tr>
                           <td>10003
                           </td>
                           <td>1000
                           </td>
                           <td>2/10/2020
                           </td>
                           <td><form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a style="color: rgb(17,122,139);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-file fa-xl"></i></a>
                                    <a style="color: rgb(0, 128, 0);" class="btn-xs" href="#" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                    <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                            </form>
                           </td>
                        </tr>
                     </tbody>
                     </br>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                    <div class="text-left">
                        <a class="btn button1" style="background-color: rgba(140, 133, 199); color:white" href="{{route('back')}}"><i class="fa fa-arrow-left"></i><b> Back</b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection