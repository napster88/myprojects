<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!--<small>Version 2.0</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      
		
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
       
		
         <?php if($userdata->id=='1')
		  { ?>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
		 
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
		  
		<?php   echo $totalusers;  ?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('user/view_users');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
		  
		  
        </div>
		<?php } ?>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalaccount; ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Accounts mapped</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
		
		<div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $gmailaccount; ?><sup style="font-size: 10px"> <?php echo $gmailactivatedaccount;?> Activated</sup></h3>
              <p>Gmail Accounts</p>
            </div>
			
			  <div class="icon">
			  
			   <i class="ion ion-stats-bars"></i>
			     </div>
         			
				 <a href="<?php echo base_url('account/view_users_gmail');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  
			</div>
			
          </div>
		
		
		
		
			<div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $ebayaccount; ?><sup style="font-size: 10px"> <?php echo $ebayactivatedaccount;?> Activated</sup></h3>
              <p>Ebay Accounts</p>
            </div>
			
			  <div class="icon">
			  
			   <i class="ion ion-stats-bars"></i>
			     </div>
          
				
				 <a href="<?php echo base_url('account/view_users_ebay');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  
			</div>
			
          </div>
		
		
		
		
		
		  <!--Start stat small box -->
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $suppliers; ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Suppliers</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
	  <!--Start stat small box -->
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totaltransaction; ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Transactions</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('transactions/view_transactions');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		 <!--End stat small box -->
		 
		   <!--Start stat small box -->
		
		<div class="col-lg-3 col-xs-6 ">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalsubscriptions; ?><sup style="font-size: 20px"></sup></h3>
              <p>Total Subscription Plans</p>
            </div>
			
			  <div class="icon">
			  
			   <i class="ion ion-stats-bars"></i>
			     </div>
            <div class="stat_val">
				<?php 
				//print_r($subscriptiondetail[1]->subscription_id);
				/*  foreach($subscriptiondetail as $sub)
				{
					//base_url('dashboard/view_subscriptions_count');
				}  */
				//print_r($plan);
				foreach($plan as $key =>$val)
				{
					echo $key.": ".$val. " ";
				} ?>
				</div>
				
				 <a href="<?php echo base_url('transactions/view_transactions');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				  
			</div>
			
          </div>
      
		
		 <!--End stat small box -->
		 
		   <!--Start stat small box -->
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalorderfullfill; ?><sup style="font-size: 15px"> <?php echo $orderfulfilauto;?> Auto, <?php echo $totalorderfullfill-$orderfulfilauto;?> Manual  </sup></h3>

              <p>Orders Fullfill</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('transactions/view_transactions');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
	  <!--Start stat small box -->
	  
	  
		   <!--Start stat small box -->
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $orderimport; ?><sup style="font-size: 15px">  </sup></h3>

              <p>Orders Import</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('transactions/view_transactions');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
			<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $ordernotfulfill; ?><sup style="font-size: 15px">  </sup></h3>

              <p>Orders Not fulfilled</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('transactions/view_transactions');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $faketrackingnumber; ?><sup style="font-size: 15px">  </sup></h3>

              <p>Fake Tracking Number</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('transactions/view_transactions');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
	  <!--Start stat small box -->
		 
		 
        <!-- ./col -->
      
          <!-- TABLE: LATEST ORDERS -->
		  
          <!-- /.box -->
       
        <!-- /.col -->

        <div class="col-md-4">
          <!-- PRODUCT LIST -->
           
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <style>
  .stat_val p{
	  padding:10px;
  }
   .stat_val
   {
	   display:flex;
	   padding-left:10px;
   }
  </style>
  