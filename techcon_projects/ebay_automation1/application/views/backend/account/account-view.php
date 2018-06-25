 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 $scope= urlencode('https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly'); 
	// echo $scope; ?>
<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $head_title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Plans</li>
        <li class="active"><?php echo $head_title; ?></li>
      </ol>
    </section>
	<input type="hidden" class="delete_url" value="<?php echo base_url('plans/hide'); ?>" />
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Plans list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <?php if($acc_type!='all')
				  { ?>
					  <th>User</th>
   
					  
				<?php   }?>
				  <th>Account</th>
                  <th>Title</th>
				  
                  <th>Status</th>
                  <th style="width:220px;">Action</th>
                </tr>
                </thead>
                <tbody>
				
				<?php
/* echo "<pre>";
print_r($total_account);
echo "<pre>";  */ 
		if(!empty($total_account)){
					foreach($total_account as $data){ ?>
					<tr id="row_<?php echo $data->id; ?>">
					 <?php if($acc_type!='all')
				  { ?>
					  <td style="word-break: break-word;">
									 
						  <img src="../../<?php echo $data->photo; ?>"  width="40px"><br/>
					    <a href="<?php echo base_url('user/viewuser/'.$data->user_id);?>"><?php echo $data->emailid; ?></a></td>
   
					  
				<?php   }?>
					  <td style="word-break: break-word;"><img src="../../assets/images/<?php echo $data->account_type; ?>.jpg"  width="40px"></td>
					  <td style="word-break: break-word;"><?php echo $data->user_account_name; ?></td>
					 
					  <td><?php if($data->account_status == 'active'){ echo "<span style='padding: 2px 12px;background: #00a65a;color: #fff;border-radius: 10px;line-height: 40px;'>Active</span>";}else{ echo "<span style='padding: 2px 12px;background: #dd4b39;color: #fff;border-radius: 10px;line-height: 40px;'>Inactive</span>"; } ?></td>
					  <td>
						
						<a class="btn btn-app" href="<?php echo base_url('account/account_disable/'.$data->account_id.'/'.$acc_type); ?>"> <i class="fa fa-eye"></i><?php if($data->account_status == 'active'){ echo "Disable"; } else { echo "Enable";} ?></a>
						<a class="btn btn-app" href="<?php echo base_url('account/account_edit/'.$data->account_id.'/'.$acc_type);?>"><i class="fa fa-edit"></i>Edit</a>
						<a class="btn btn-app delete-alert" data-id="<?php echo $data->account_id; ?><?php echo $acc_type; ?>" href="#" ><i class="fa fa-trash"></i> Delete</a>
					  </td>
					</tr>
					<?php }
				}?>
				
				
                </tbody>
                <tfoot>
                <tr>
               <?php if($acc_type!='all')
				  { ?>
					  <th>User</th>
   
					  
				<?php   }?>
				 <th>Account</th>
                  <th>Title</th>
				  
                  <th>Status</th>
                  <th style="width:220px;">Action</th>
                </tr>
                </tfoot>
              </table>
			 
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	  <div class="account_label_tag1">
	 <!-- <div class="account_label_tag">
	 
	  <div class="card-user"><a class="button_type_link" href="https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=offline&client_id=276924124683-bhb27jcgoakolrfo95ed48fgd8lbop8o.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Ftechconlabs.net%2Febay_automation%2Faccount%2Fview_user_token&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fgmail.readonly&approval_prompt=auto"><img src="../../assets/images/add_gmail.jpg" width="100" ><div class="account_label">ADD Gmail Account</div></a>
	 </div> </div> -->
	
	    <div class="account_label_tag">
				<div class="card-user"><a class="button_type_link" href="https://signin.ebay.com/authorize?client_id=kapiltha-EbayAuto-PRD-48e2d25a0-68db18a4&response_type=code&redirect_uri=kapil_thakur-kapiltha-EbayAu-jdomd&scope=".<?php echo $scope; ?>><img src="../../assets/images/add_ebay.png" width="100" ><div class="account_label">ADD Ebay Account</div></a>
	 </div> </div>
	
	

	 
	   <div  class="account_label_tag  btn-primary ">
	   
	
	  
	  <div class="card-user"><img src="../../assets/images/add_gmail.jpg" width="100" ><div class="account_label">ADD Gmail Account</div>
	 </div> </div>
	 
	 <!-- <div class="">
	  
	  <div class=""><a class="" href="https://accounts.google.com/o/oauth2/auth?access_type=offline&approval_prompt=force&client_id=276924124683-3f31tmhb10kfla6jhkpdq59hrm6eovnb.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Febay_track%2Faccount%2Fview_user_token&state&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fgmail.readonly&response_type=code"><img src="../../assets/images/add_gmail.jpg" width="100" ><div class="account_label">ADD Gmail Account</div></a>
	 </div> </div> -->
	 
	 </div>
	  <div class="container">
    </section>
    <!-- /.content -->
  </div>
<style>
   .account_label_tag1
  {
      display: flex;
  }
  .account_label_tag
  {
	  margin:50px;
	  width:300px; 
  }
  .account_label
  {
	  text-align:center;
	  background: #F6F6f6;
	  color:fff;
	padding:15px;
	  font-size:15px;
	  width:300px;
  }
  .card {
    box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px, rgba(63, 63, 68, 0.1) 0px 0px 0px 1px;
    background-color: rgb(255, 255, 255);
    margin-bottom: 30px;
    border-radius: 4px;
	width:300px
}
.card-user img {
    height: 150px;
	width:300px;
}

.card .image {
   
    position: relative;
    transform-style: preserve-3d;
    overflow: hidden;
    border-radius: 4px 4px 0px 0px;
}
.author,
 .content_main {
   
	 padding: 31px ;
}


.card-user .author {
    text-align: center;
    text-transform: none;
    margin-top: 0px;
}

.card .author {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    word-wrap: break-word;
}
  </style>
			  