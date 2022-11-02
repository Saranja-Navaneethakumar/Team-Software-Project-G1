@extends('userpanel')
@section('employeepanel')

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
            <img src="/img/users-4.png" alt="User Image">
         </div>
		   </br>
         <div class="info">
            <a href="#" class="d-block"> {{Auth::user()->username}} EMPLOYEE</a>
         </div>
      </div>
               <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-clinic-medical"></i>
                  <p>Dashboard</p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-receipt"></i>
                  <p>Bill</p>
               </a>
            </li>
        </ul>
    </nav>
   </div>
</aside>
<div class="content-wrapper">
  
</div>

@endsection
