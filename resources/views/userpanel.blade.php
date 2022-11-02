<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharmacy Stock Management system</title>
   <link rel="icon" type="image/png" sizes="32x32" href="/asset/favicon_io/favicon-32x32.png">

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="/asset/fontawesome6/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus:wght@700&display=swap" rel="stylesheet">
  <link href="/asset/css/adminlte.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/asset/css/style.css">
  <link rel="stylesheet" href="/asset/select2/css/select2.min.css">
  <link rel="stylesheet" href="/asset/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,200,0,0" />-->
  <!--<script src="https://kit.fontawesome.com/9225fb6e68.js" crossorigin="anonymous"></script>-->
  <style>
    body{font-family: 'Gentium Plus', serif;}
  </style>
  
</head>
<body class="hold-transition sidebar-mini-md layout-fixed sidebar-collapse" style="color: rgba(88, 45, 134);">
    <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: rgba(93, 85, 168);">
                   <!-- Left navbar links -->
                   
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" style="color: white;" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   </ul>
   <ul>
      <div class="col-sm-12">
         <div class="input-group rounded">
            <form  action="{{route('medicinessearch')}}" method="get">
               @csrf
               <div class="input-group-prepend">
                  <input type="search" class="form-control"  name="searchmedicine" placeholder="Search Medicine by name or type">
                  <button style="color: white;" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-search fa-xl"></i></button>
                  
               </div>
            </form>
            <div class="input-group-prepend">
               <a href="{{route('dash')}}" class=" mt-1">
                  <button style="color: white;" class="btn-xsmall border-0 bg-transparent" type="submit"><i class="fa fa-sync-alt fa-xl"></i></button>
               </a>
            </div>
         </div>
      </div>
   </ul>
            <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
   
      <!--<li class="nav-item">
      <input type="search" class="form-control"  name="searchmedicine" placeholder="Search Medicine">
      </li>-->
   
      <!--<li class="nav-item">
      <a class="btn"role="button">-->
         <!--<a class="btn" style="color: white;" role="button" id="model-btn" data-toggle="modal" data-target="#notify">
         <i class="fa-regular fa-bell"></i>-->
         <!--</a>
         <span class="nav-item-name" style="color: white;">Notification</span>
      </li>-->
      </li>
      <li class="nav-item dropdown no-arrow" id="alertsDropdown">
        <!-- <a class="btn" style="color: white;" role="button" id="notify" data-toggle="modal">
         <i class="fa fa-bell"></i>
         </a>-->
         <a class="nav-link dropdown-toggle" href="{{route('alerts')}}" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: white;"><i class="fa fa-bell"></i>
                                <!-- Counter - Alerts -->
               <span class="badge badge-warning badge-counter">3+</span>
         </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Medicine Alert
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <table  class="table table-bordered table-hover table-striped" 
                                    style="background-color:rgb(220,237,239);">
                                       <thead>
                                          <th>Commercial Name</th>
                                          <th>Quantity</th>
                                          <th>Dosage</th>
                                          <th>Batch No</th>
                                          <th>Expiry date</th>
                                       </thead>
                                       <tbody>
                                          @foreach($stocks as $stock)
                                          <tr>
                                             @foreach($medicines as $medicine)
                                                @if($medicine->id == $stock->medicine_id)
                                                   <td>{{$medicine->commercial_name}}</td>
                                                @endif
                                             @endforeach
                                             <td>{{$stock->quantity}}</td>
                                             <td>{{$stock->dosage}}</td>
                                             <td>{{$stock->batch_no}}</td>
                                             <td>{{$stock->expiry_date}}</td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                    </table>
                                </a>
                                <!--<a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>-->
                                
                            </div>  
                          
      </li>

      <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="{{route('alerts')}}"style="color: white;" role="button"
         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-triangle-exclamation"></i>
         <span class="badge badge-warning badge-counter">2+</span>
         </a>
         
         
      </li>
      <li class="nav-item">
         <a class="nav-link" style="color: white;" data-widget="fullscreen" href="#" role="button">
         <i class="fa fa-expand"></i>
         </a>
      </li>
      <li class="nav-item">
         <a class="nav-link" style="color: white;" data-widget="fullscreen" href="#">
         <i class="fa fa-power-off"></i>
         </a>
      </li>
      <li class="nav-item">
      <a class="btn" style="color: white;" role="button" id="model-btn" data-toggle="modal">
         <i class="fa fa-user"></i>
         </a>
      </li>
      <div class="modal" id="modal-row" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel" style="color: rgba(88, 45, 134);"><i class="fa fa-address-card fa-lg"></i> My Profile</h5>
								<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="false">&times;</span>
								</button>
						</div>
						<div class="modal-body" style="color: rgba(88, 45, 134);">
                  {{Auth::user()->username}}</br>
                  {{Auth::user()->role}}
						</div>
						<div class="modal-footer">
								<a type="button" id="model-btn" class="btn" style="background-color: rgba(140, 133, 199); color:white" href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</a>
						</div>
					</div>
				</div>
			</div>
      
   </ul>
</nav>
      @yield('adminpanel')
      @yield('employeepanel')
      @yield('stockmanagerpanel')
    </div>
    <script src="/asset/jquery/jquery.min.js"></script>
    <script src="/asset/js/adminlte.js"></script>
    <script src="/asset/js/bootstrap.bundle.min.js"></script>
    <script src="/asset/js/modal.js"></script>
    <script src="/asset/js/tabs.js"></script>
    <script src="/asset/js/tablerowadd.js"></script>
    <script src="/asset/js/datetimeadd.js"></script>
    <script src="/asset/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script>
 $(function () {//Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
   

   })
     
 </script>



</body>

</html>