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
		
		<?php 
		//echo $userdata->user_type;
		if($userdata->user_type=='1')
		{ ?>
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
		<li class="<?php if($active == 'Account'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <li <?php if($active_sub == 'view_gmail'){echo 'class="active"';} ?>><a href="<?php echo base_url('account/view_user_account/gmail');?>"><i class="fa fa-circle-o"></i> View Gmail</a></li>
			 <li <?php if($active_sub == 'view_ebay'){echo 'class="active"';} ?>><a href="<?php echo base_url('account/view_user_account/ebay');?>"><i class="fa fa-circle-o"></i> View Ebay</a></li>
          </ul>
		  
        </li>
		
		<!--<li class="<?php if($active == 'page'){echo 'active';} ?> treeview">
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
		
		<li class="<?php if($active == 'service'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'add_service'){echo 'class="active"';} ?>><a href="<?php echo base_url('services/add_service');?>"><i class="fa fa-circle-o"></i> Add Service</a></li>
            <li <?php if($active_sub == 'view_service'){echo 'class="active"';} ?>><a href="<?php echo base_url('services/view_services');?>"><i class="fa fa-circle-o"></i> View / Edit Services</a></li>
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
        </li>-->
		
			<li class="<?php if($active == 'Subscription'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Subscription</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_subscription'){echo 'class="active"';} ?>><a href="<?php echo base_url('user/edit_user');?>"><i class="fa fa-circle-o"></i> View Subscription</a></li>
           
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
		<?php } else
		{ ?>
	
	
	
	
	<li class="<?php if($active == 'Account'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_all'){echo 'class="active"';} ?>><a href="<?php  echo base_url('account/view_user_account/all');?>"><i class="fa fa-circle-o"></i> View</a></li>
			<li <?php if($active_sub == 'view_email'){echo 'class="active"';} ?>><a href="<?php  echo base_url('account/view_user_account_email');?>"><i class="fa fa-circle-o"></i> View Emails</a></li>
           
          </ul>
		  
        </li>
	
	
		
			
		
	
	
	
		
	
	<li class="<?php if($active == 'ups'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>UPS Tracking Number</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_ups'){echo 'class="active"';} ?>><a href="<?php echo base_url('ups_tracking/view_ups_software');?>"><i class="fa fa-circle-o"></i>View UPS Tracking Numbers </a></li>
           
     
            <li <?php if($active_sub == 'add_ups'){echo 'class="active"';} ?>><a href="<?php echo base_url('ups_tracking/view_order_fulfill/auto');?>"><i class="fa fa-circle-o"></i>View Auto Fullfilled orders </a></li>
           
          </ul>
		  
        </li>
		<li class="<?php if($active == 'order'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_order'){echo 'class="active"';} ?>><a href="<?php   echo base_url('view_ebay_order/view_ebay_order_detail/1');?>"><i class="fa fa-circle-o"></i>Upload Tracking number</a></li>
           
            <li <?php if($active_sub == 'view_order_status'){echo 'class="active"';} ?>><a href="<?php echo base_url('ups_tracking/view_order_fulfill/all');?>"><i class="fa fa-circle-o"></i> View All Fullfilled orders</a></li>
           
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
		<li class="<?php if($active == 'Subscription'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Subscription</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_subscription'){echo 'class="active"';} ?>><a href="<?php echo base_url('user/edit_user');?>"><i class="fa fa-circle-o"></i> View Subscription</a></li>
           
          </ul>
		  
        </li>
		<li class="<?php if($active == 'setting'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_setting'){echo 'class="active"';} ?>><a href="<?php echo base_url('user/edit_user');?>"><i class="fa fa-circle-o"></i> View</a></li>
           
          </ul>
		  
        </li>
		<li class="<?php if($active == 'referal'){echo 'active';} ?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Referal Link</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($active_sub == 'view_referal'){echo 'class="active"';} ?>><a href="<?php echo base_url('user/edit_user');?>"><i class="fa fa-circle-o"></i>Referal</a></li>
           
          </ul>
		  
        </li>
	
		<?php } ?>
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>