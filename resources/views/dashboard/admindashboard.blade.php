@extends('userpanel')
@section('adminpanel')

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(93, 85, 168);">
                        <!-- Brand Logo -->
   <a href="#" class="brand-link animated swing">
   <img src="/img/pharmacy.png" alt="PSMS Logo" width="200">
   </a>
            <!-- Sidebar -->
   <div class="sidebar" style="margin-top: -65px">
               <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
         <img src="/img/avatar1.jfif" alt="Avatar" class="avatar">
           <!-- <img src="/img/Admin.png" class="img-circle elevation-4" alt="User Image">-->
         </div>
		   </br>
         <div class="info">
            @if(Auth::user()->role=='Admin')
            <a href="#" class="d-block"> {{Auth::user()->username}} </br>ADMIN <i class="fa fa-heart-pulse"></i></a>
            @elseif(Auth::user()->role=='Head Pharmacist')
            <a href="#" class="d-block"> {{Auth::user()->username}} </br>Head Pharmacist <i class="fa fa-heart-pulse"></i></a>
            @elseif(Auth::user()->role=='Stock Manager')
            <a href="#" class="d-block"> {{Auth::user()->username}} </br>Stock Manager <i class="fa fa-heart-pulse"></i></a>
            @elseif(Auth::user()->role=='Employee')
            <a href="#" class="d-block"> {{Auth::user()->username}} </br>Employee <i class="fa fa-heart-pulse"></i></a>
            @endif
         </div>
      </div>
      
          

               <!-- Sidebar Menu -->
      @if(Auth::user()->role=='Admin')
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="{{route('dash')}}" class="nav-link">
                  <i class="nav-icon fa fa-clinic-medical fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('myprofile')}}" class="nav-link">
               <i class="nav-icon fa-regular fa-address-card fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>My Profile</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-users-between-lines fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                     <p>Users <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('users.create')}}" class="nav-link">
                         <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                           <p>Add</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog  fa-lg" style="color: rgb(255, 255, 255);"></i>
                           <p>Manage Employees </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('hp')}}" class="nav-link">
                        <i class="fanav-icon fa fa-hospital-user fa-lg" style="color: rgb(255, 255, 255);"></i>
                           <p>Manage HeadPharmacist </p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-tablets fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Category </p>
               </a>
               
            </li>
            <li class="nav-item">
               <a href="{{route('medicine_types.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-pills fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Type</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-capsules fa-beat" style="color: rgb(255, 255, 255);  --fa-animation-duration: 3s;"></i>
                  <p>Medicine <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('medicines.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add New Medicine</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('medicines.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-truck-medical fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Supplier <i class="right fa fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('suppliers.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('suppliers.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{route('invoices.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-receipt fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Invoice</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-layer-group fa-lg fa-beat" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Stock <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('stocks.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add Stocks</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('showallstock')}}" class="nav-link">
                        <i class="nav-icon fa fa-box-open fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>All stocks</p>
                     </a>
                  </li>
                  <!--<li class="nav-item">
                     <a href="{{route('totalstock')}}" class="nav-link">
                        <i class="nav-icon fa fa-box-open fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Total stocks</p>
                     </a>
                  </li>-->
                  <li class="nav-item">
                     <a href="{{route('stocks.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{route('sales')}}" class="nav-link">
                  <i class="nav-icon fa fa-arrow-trend-up fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Sales</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('searchindex')}}" class="nav-link">
                  <i class="nav-icon fa fa-magnifying-glass fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Search</p>
               </a>
            </li>
            <!--<li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-database fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Database</p>
               </a>
            </li>-->
         </ul>
      </nav>
      @elseif(Auth::user()->role=='Head Pharmacist')
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="{{route('dash')}}" class="nav-link">
                  <i class="nav-icon fa fa-clinic-medical fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('myprofile')}}" class="nav-link">
               <i class="nav-icon fa-regular fa-address-card fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>My Profile</p>
               </a>
            </li>           
            <li class="nav-item">
               <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-pills fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Category </p>
               </a>
               
            </li>
            <li class="nav-item">
               <a href="{{route('medicine_types.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-tablets fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Type</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-capsules fa-beat" style="color: rgb(255, 255, 255);  --fa-animation-duration: 3s;"></i>
                  <p>Medicine <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('medicines.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add New Medicine</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('medicines.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-truck-medical fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Supplier <i class="right fa fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('suppliers.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('suppliers.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{route('invoices.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-receipt fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Invoice</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-layer-group fa-lg fa-beat" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Stock <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('showallstock')}}" class="nav-link">
                        <i class="nav-icon fa fa-box-open fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>All stocks</p>
                     </a>
                  </li>
                  
                  <li class="nav-item">
                     <a href="{{route('stocks.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            <li class="nav-item">
               <a href="{{route('searchindex')}}" class="nav-link">
                  <i class="nav-icon fa fa-magnifying-glass fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Search</p>
               </a>
            </li>
            <!--<li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-database fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Database</p>
               </a>
            </li>-->
         </ul>
      </nav>
      @elseif(Auth::user()->role=='Stock Manager')
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="{{route('dash')}}" class="nav-link">
                  <i class="nav-icon fa fa-clinic-medical fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('myprofile')}}" class="nav-link">
               <i class="nav-icon fa-regular fa-address-card fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>My Profile</p>
               </a>
            </li>
            
            <li class="nav-item">
               <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-pills fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Category </p>
               </a>
               
            </li>
            <li class="nav-item">
               <a href="{{route('medicine_types.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-tablets fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Type</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-capsules fa-beat" style="color: rgb(255, 255, 255);  --fa-animation-duration: 3s;"></i>
                  <p>Medicine <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('medicines.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add New Medicine</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('medicines.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            
            <li class="nav-item">
               <a href="{{route('invoices.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-receipt fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Invoice</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-layer-group fa-lg fa-beat" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Stock <i class="right fas fa-angle-left" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('stocks.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add Stocks</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('showallstock')}}" class="nav-link">
                        <i class="nav-icon fa fa-box-open fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>All stocks</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="{{route('stocks.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-cog fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Manage</p>
                     </a>
                  </li>
               </ul>
            </li>
            
            <li class="nav-item">
               <a href="{{route('searchindex')}}" class="nav-link">
                  <i class="nav-icon fa fa-magnifying-glass fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Search</p>
               </a>
            </li>
            <!--<li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-database fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Database</p>
               </a>
            </li>-->
         </ul>
      </nav>
      @elseif(Auth::user()->role=='Employee')
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="{{route('dash')}}" class="nav-link">
                  <i class="nav-icon fa fa-clinic-medical fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('myprofile')}}" class="nav-link">
               <i class="nav-icon fa-regular fa-address-card fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>My Profile</p>
               </a>
            </li>
            
            
            <li class="nav-item">
            <a href="{{route('medicines.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-capsules fa-beat" style="color: rgb(255, 255, 255);  --fa-animation-duration: 3s;"></i>
                  <p>View Medicine</p>
               </a>

            </li>
            
            <li class="nav-item">
               <a href="{{route('invoices.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-receipt fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Invoice</p>
               </a>
            </li>
            
            <li class="nav-item">
            <a href="{{route('showallstock')}}" class="nav-link">
                        <i class="nav-icon fa fa-box-open fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;""></i>
                        <p>All stocks</p>
                     </a>
         
            </li>
            <!--<li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-database fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Database</p>
               </a>
            </li>-->
         </ul>
      </nav>
      @endif

   </div>
</aside>
<div id="gradback" class="content-wrapper">
   @yield('addnewmedicine')
   @yield('managemedicine')
   @yield('adduser')
   @yield('manageuser')
   @yield('showuser')
   @yield('edituser')
   @yield('addcategory')
   @yield('editcategory')
   @yield('showmedicine')
   @yield('editmedicine')
   @yield('addstock')
   @yield('type')
   @yield('edittype')
   @yield('managestock')
   @yield('showstock')
   @yield('editstock')
   @yield('addsupplier')
   @yield('managesupplier')
   @yield('showsupplier')
   @yield('editsupplier')
   @yield('admindash')
   @yield('searchindex')
   @yield('invoice')
   @yield('medstock')
   @yield('sales')
   @yield('myprofile')
   @yield('expiry')
   @yield('lessqty')
</div>
<!--<div  class = "blend">
   <img src="/img/pharmacy.png"/>
   <h1>Pharmacy</h1>
   
</div>-->
@endsection
