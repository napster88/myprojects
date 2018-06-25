<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().$userdata->photo; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $userdata->username; ?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <ul class="sidebar-menu">
        <!--<li class="header">MAIN NAVIGATION</li>-->
        <li class="<?php if($active == 'dashboard'){echo 'active';} ?> treeview">
          <a href="<?php echo base_url('dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>
		
		<li class="<?php if($active == 'user'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'add_user'){echo 'class="active"';} ?>><a href="<?php echo base_url('user/add_user');?>"><i class="fa fa-circle-o"></i> Add User</a></li>
            <li <?php if($active_sub == 'view_user'){echo 'class="active"';} ?>><a href="<?php echo base_url('user/view_users');?>"><i class="fa fa-circle-o"></i> View / Edit Users</a></li>
          </ul>
        </li>
		<li class="<?php if($active == 'driver'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Drivers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'add_driver'){echo 'class="active"';} ?>><a href="<?php echo base_url('driver/add_driver');?>"><i class="fa fa-circle-o"></i> Add Driver</a></li>
            <li <?php if($active_sub == 'view_driver'){echo 'class="active"';} ?>><a href="<?php echo base_url('driver/view_drivers');?>"><i class="fa fa-circle-o"></i> View / Edit Drivers</a></li>
          </ul>
        </li>
		
		
		
		<li class="<?php if($active == 'vehicle'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>Vehicles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'add_vehicle'){echo 'class="active"';} ?>><a href="<?php echo base_url('vehicles/add_vehicle');?>"><i class="fa fa-circle-o"></i> Add Vehicle</a></li>
            <li <?php if($active_sub == 'view_service'){echo 'class="active"';} ?>><a href="<?php echo base_url('vehicles/view_vehicles');?>"><i class="fa fa-circle-o"></i> View / Edit Vehicles</a></li>
          </ul>
        </li>
		<li class="<?php if($active == 'page'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'add_page'){echo 'class="active"';} ?>><a href="<?php echo base_url('pages/add_page');?>"><i class="fa fa-circle-o"></i> Add Page</a></li>
            <li <?php if($active_sub == 'view_page'){echo 'class="active"';} ?>><a href="<?php echo base_url('pages/view_pages');?>"><i class="fa fa-circle-o"></i> View / Edit Pages</a></li>
          </ul>
        </li>
		<li class="<?php if($active == 'plan'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-tasks"></i>
            <span>Plans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'add_plan'){echo 'class="active"';} ?>><a href="<?php echo base_url('plans/add_plan');?>"><i class="fa fa-circle-o"></i> Add Plan</a></li>
            <li <?php if($active_sub == 'view_plan'){echo 'class="active"';} ?>><a href="<?php echo base_url('plans/view_plans');?>"><i class="fa fa-circle-o"></i> View / Edit Plans</a></li>
          </ul>
        </li>
		
		<li class="<?php if($active == 'transaction'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Transaction History</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_transaction'){echo 'class="active"';} ?>><a href="<?php echo base_url('transactions/view_transactions');?>"><i class="fa fa-circle-o"></i> View History</a></li>
          </ul>
        </li>
		
		<li class="<?php if($active == 'order'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_order'){echo 'class="active"';} ?>><a href="<?php echo base_url('orders/view_orders');?>"><i class="fa fa-circle-o"></i> View Orders</a></li>
          </ul>
        </li>
		
		<li class="<?php if($active == 'home'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Homepage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'home'){echo 'class="active"';} ?>><a href="<?php echo base_url('home/home_settings');?>"><i class="fa fa-circle-o"></i> Homepage Settings</a></li>
          </ul>
        </li>
		
		<li class="<?php if($active == 'setting'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_setting'){echo 'class="active"';} ?>><a href="<?php echo base_url('settings');?>"><i class="fa fa-circle-o"></i> Change Settings</a></li>
          </ul>
        </li>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>