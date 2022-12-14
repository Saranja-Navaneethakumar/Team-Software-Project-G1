@extends('dashboard.admindashboard')
@section('lessqty')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0" style="color: rgb(166, 145, 219);"><i class="fa fa-bell fa-shake" style="--fa-animation-duration: 3s;"></i> Quantity Alert</h1>
         </div>
                  <!-- /.col -->
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Home</a></li>
               <li class="breadcrumb-item active">Quantity Alert</li>
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

                                    <table  class="table table-bordered table-hover table-striped" 
                                    style="background-color:transparent;">
                                       <thead>
                                          <th>Commercial Name</th>
                                          <th>Quantity</th>
                                          <th>Dosage</th>
                                          <th>Batch No</th>
                                          <th>Expiry date</th>
                                       </thead>
                                       <tbody>
                                          @foreach($lessstocks as $lessstock)
                                          <tr>
                                             @foreach($medicines as $medicine)
                                                @if($medicine->id == $lessstock->medicine_id)
                                                   <td>{{$medicine->commercial_name}}</td>
                                                @endif
                                             @endforeach
                                             <td>{{$lessstock->quantity}}</td>
                                             <td>{{$lessstock->dosage}}</td>
                                             <td>{{$lessstock->batch_no}}</td>
                                             <td>{{$lessstock->expiry_date}}</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
</div>
</section>
                                
@endsection