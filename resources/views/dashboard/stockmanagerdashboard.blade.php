@extends('userpanel')
@section('stockmanagerpanel')
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
            <a href="#" class="d-block"> {{Auth::user()->username}} STOCK </br>MANAGER <i class="fa fa-heart-pulse"></i></a>
         </div>
      </div>
      
          

               <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="{{route('dash')}}" class="nav-link">
                  <i class="nav-icon fa fa-clinic-medical fa-shake  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
               <i class="nav-icon fa-regular fa-address-card fa-shake  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>My Profile</p>
               </a>
            </li>
            
            <li class="nav-item">
               <a href="{{route('categories.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-pills fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Medicine Category </p>
               </a>
               
            </li>
            <li class="nav-item">
               <a href="{{route('medicine_types.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-tablets fa-beat  fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Medicine Type</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-capsules fa-beat" style="color: rgb(255, 255, 255);  --fa-animation-duration: 3s;"></i>
                  <p>Medicine <i class="right fas fa-angle-left  fa-lg" style="color: rgb(255, 255, 255);"></i></p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="{{route('medicines.create')}}" class="nav-link">
                        <i class="nav-icon fa fa-plus  fa-lg" style="color: rgb(255, 255, 255);"></i>
                        <p>Add</p>
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
                  <i class="nav-icon fa fa-cart-shopping fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Purchase List</p>
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
                        <p>Add</p>
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
               <a href="#" class="nav-link">
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
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-database fa-beat fa-lg" style="color: rgb(255, 255, 255); --fa-animation-duration: 3s;"></i>
                  <p>Database</p>
               </a>
            </li>
         </ul>
      </nav>
   </div>
</aside>
<div id="gradback" class="content-wrapper">
   @yield('addnewmedicine')
   @yield('managemedicine')
   @yield('addcategory')
   @yield('showmedicine')
   @yield('addstock')
   @yield('type')
   @yield('managestock')
   @yield('showstock')
   @yield('stmanagerdash')
   @yield('searchindex')
   @yield('invoice')
</div>

@endsection