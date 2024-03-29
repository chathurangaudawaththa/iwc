<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        @isset($auth_user)
            <p>{{ $auth_user->first_name }}</p>
        @endisset
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="@isset($nav_home){{$nav_home}}@endisset">
          <a href="/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="@isset($item){{$item}}@endisset"> 
          <a href="/item"> 
          <i class="fa fa-hdd-o"></i>
            <span>Add New Item</span>
          </a>
        </li>
        <li class="@isset($supemp){{$supemp}}@endisset"> 
          <a href="/supemp"> 
          <i class="fa fa-male"></i>
            <span>Register New Employee</span>
          </a>
        </li>
        <li class="@isset($nav_stock){{$nav_stock}}@endisset"> 
          <a href="/stock"> 
          <i class="fa fa-table"></i>
            <span>Stock Control</span>
          </a>
        </li>
        <li class="@isset($nav_emp){{$nav_emp}}@endisset"> 
          <a href="/emp"> 
          <i class="fa fa-fw fa-gear"></i>
            <span>Supply To Employee</span>
          </a>
        </li>
        <li class="@isset($nav_handoveremp){{$nav_handoveremp}}@endisset">
          <a href="/handoveremp"> 
          <i class="fa fa-fw fa-check-square-o"></i>            
          <span>Handover Employee Items</span>
          </a>
        </li>
        <li class="@isset($nav_rent){{$nav_rent}}@endisset">
          <a href="/rent"> 
          <i class="fa fa-fw fa-users"></i>
            <span>Rental To Customer</span>
          </a>
        </li>
        <li class="@isset($nav_handover){{$nav_handover}}@endisset">
          <a href="/handover"> 
          <i class="fa fa-fw fa-check-square-o"></i>            
          <span>Handover Rental Items</span>
          </a>
        </li>
        <li class="@isset($nav_payment){{$nav_payment}}@endisset">
          <a href="/payments"> 
          <i class="fa fa-fw fa-credit-card"></i>
            <span>Payment History</span>
          </a>
        </li>
        <li class="@isset($rep){{$rep}}@endisset">
          <a href="/rep">
          <i class="fa fa-book"></i>
            <span>Reports</span></a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>rep