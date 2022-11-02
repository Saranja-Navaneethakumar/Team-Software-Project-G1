@extends('dashboard.admindashboard')
@section('manageuser')
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
                        <h1 class="m-0" style="color: rgb(166, 145, 219);"><span class="fa fa-users" ></span> Manage Head pharmacist</h1>
                        
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item active">Head Pharmacist</li>
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
              <a class="btn btn-md button1" style="background-color: rgba(26,123,146); color:white;" href="{{route('users.create')}}"><i class="fa fa-user-plus"></i> Add New User</a><br/>
            </div>
            <div class="container-fluid"></br>
                 
                @php
                $n=0;
                @endphp
               <div class="col-md-12">
                  <table id="users" class="table table-bordered table-striped text-center">
                     <caption>Head pharmacists list</caption>
                     <thead>
                        <tr>
                           <th>NO</th>
                           <th>User Name</th>
                           <th>Name</th>
                           <th>Address</th>
                           <th>Role</th>
                           <th>NIC File</th>
                           <th>NIC Number</th>
                           <th>Mobile Number</th>
                           <th>Gender</th>
                           <td>License</td>
                           <th>Action</th>
                        </tr>
                     </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                           <td>{{++$n}}</td>
                           <td>{{$user->username}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->address}}</td>
                           <td>{{$user->role}}</td>
                           <td><image height="20px" width="20px" src="{{'/uploads/nicfiles/'.$user->nicfile}}"/></br>
                              <a href="{{'/uploads/nicfiles/'.$user->nicfile}}">{{$user->username}}</a></td>
                           <td>{{$user->nic}}</td>
                           <td>{{$user->mobile}}</td>
                           <td>{{$user->gender}}</td>
                           <td><image height="20px" width="20px" src="{{'/uploads/license/'.$user->license}}"/></br>
                           <a href="{{'/uploads/license/'.$user->license}}">{{$user->license}}</a></td>
                           <td class="text-center">
                           <form action="{{route('users.destroy',$user->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                                 <a style="color: rgb(17,122,139);" href="{{route('users.show',$user->id)}}" class="btn-xs" role="button"><i class="fa-regular fa-eye fa-xl"></i></a>
                                 <!--<a class="btn btn-sm btn-circle btn-info" href="{{route('users.show',$user->id)}}"><i class="fa fa-eye fa-2x"></i></a>-->
                                 <a style="color: rgb(0, 128, 0);" class="btn-xs" href="{{route('users.edit',$user->id)}}" role="button"><i class="fa-regular fa-pen-to-square fa-xl"></i></a>
                                 <button style="color: rgb(205,54,68);" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa-regular fa-trash-alt fa-xl"></i></button>
                                 <!--<a class="btn btn-sm btn-danger btn-circle" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-alt fa-2x"></i></a>-->
                           </form>  
                           </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{$users->links()}}
               </div>
            
      </div>
      <!--<div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
         
            <div class="modal-body text-center">
               <img src="/img/alert.png" alt="" width="50" height="46">
               <h4>Are you sure want to delete this User?</h4>
               <div class="m-t-20"> <a href="#" class="btn btn-outline-success" data-dismiss="modal">Close</a>
                  <button type="submit" class="btn btn-outline-danger">Yes,Delete</button>
               </div>
            </div>
            
         </div>
      </div>
   </div>-->
   <!-- /.container-fluid -->
   </section>
@endsection