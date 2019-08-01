<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{  Auth::user()->name }} <br> {{ Auth::user()->email }}</p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="{{(Request::routeIs('dashboard') ? 'active':'')}}"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="treeview {{Request::is('sales/*') == 'sales' ? 'active':''}}">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Sales</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{(Request::routeIs('sales') ? 'active':'')}}"><a href="{{route('sales')}}"><i class="fa fa-circle-o"></i> New Sales</a></li>
                    <li class="{{(Request::routeIs('invoice_list') ? 'active':'')}}"><a href="{{route('sales')}}"><a href="{{route('invoice_list')}}"><i class="fa fa-circle-o"></i> Invoice List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Due List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sales Ledger</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Purchase</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="#"><i class="fa fa-circle-o"></i> New Purchase</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Invoice List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Due List</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Purchase Ledger</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-edit"></i> <span>Stock</span></a></li>

            <li class="{{(Request::routeIs('product') ? 'active':'')}}"><a href="{{route('product')}}"><i class="fa fa-cube"></i> <span>Product</span></a></li>

            <li class="{{(Request::routeIs('customer') ? 'active':'')}}"><a href="{{route('customer')}}"><i class="fa fa-users"></i> <span>Customer</span></a></li>

            <li class="{{(Request::routeIs('supplier') ? 'active':'')}}"><a href="{{route('supplier')}}"><i class="fa fa-user"></i> <span>Supplier</span></a></li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Sales Reports</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Purchase Reports</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Overview Accounts</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
