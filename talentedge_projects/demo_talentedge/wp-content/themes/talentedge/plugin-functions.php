<?php
 


function chpass_admin_head() {
	
	$user = new WP_User(get_current_user_id( ));
    $allRoles=[];
	 if(strlen(array_search('administrator',$user->roles))>0 || strlen(array_search('cchead',$user->roles))>0 || strlen(array_search('ccteam',$user->roles))>0|| strlen(array_search('srm-head',$user->roles))>0 || strlen(array_search('srm-head',$user->sumitbhalla))>0){
		 echo '<style>.toplevel_page_change-password{display:block}</style>';
	}else{
		echo '<style>.toplevel_page_change-password{display:none}</style>';
	}
	
	
	echo '<style>[for="wp_welcome_panel-hide"] {display: none !important;}</style>';
}
add_action( 'admin_head', 'chpass_admin_head' );

add_menu_page('Change Password', 'Change Password', 'read', 'change-password', 'te_change_password',null,30);
	
add_action("wp_ajax_search_email", "search_email");
add_action("wp_ajax_change_email_password", "change_email_password");

function te_change_password(){ ?>
	
	<div class="wrap">
		<h1 class="wp-heading-inline">Change Password</h1>
		<p>Please enter email address</p>
		<input type="email" value="" id="email_pass" />
		<input type="button" value="Search" id="search" >
		<input style="display:none" type="text" value="" id="email_password" placeHolder="Enter Password" />
		<input style="display:none" type="button" value="Change" id="chnage_pass" >
		<div class="erroremail"></div>
		<div class="wrap detstu" style="display:none">
			<label>Name</label>  :  <label class="col_name"></label>   <br>
			<label>Email</label>  :  <label  class="col_email"></label>   <br>  
			<label>Phone</label>   :  <label  class="col_phone"></label>   <br> 
			<label>State</label>   :  <label  class="col_state"></label>   <br>
			<label>Countrty</label>  :  <label  class="col_country"></label>   <br>
		</div>
	</div>
	
	<script>
	jQuery('#search').on('click',function(){
		jQuery('.erroremail').html('');
		if(jQuery.trim(jQuery('#email_pass').val())==''){
			 
			jQuery('.erroremail').html('Please Enter Email'); return false;
		}
		 
		jQuery.post(
			'<?php echo  admin_url('admin-ajax.php')?>', 
			{
				'action': 'search_email',
				'data':  jQuery('#email_pass').val() 
			}, 
			function(response){
				 var obj =eval('(' + response + ')');
				 
				 if(obj.error==0){
					 jQuery('#search').hide();
					 jQuery('.detstu').show();
					 jQuery('#email_password').show();
					 jQuery('#chnage_pass').show();
					 jQuery('#email_pass').css('pointer-events','none');
					 jQuery('#email_pass').css('opacity',0.8);
					 var data=obj.msg;
					 for(var k in data) {
						   jQuery('.col_'+k).html(data[k]);
					  }
					 
				 }else{
					 jQuery('#search').show();
					 jQuery('#email_password').hide();
					 jQuery('#chnage_pass').hide(); 
					 jQuery('.erroremail').html(obj.msg); return false;
					 
				 }
			}
		);
	})
	
	
	jQuery('#chnage_pass').on('click',function(){
		jQuery('.erroremail').html('');
		
		if(jQuery.trim(jQuery('#email_password').val())==''){
			 
			jQuery('.erroremail').html('Please Enter password'); return false;
		}
		 
		jQuery.post(
			'<?php echo  admin_url('admin-ajax.php')?>', 
			{
				'action': 'change_email_password',
				'pass':  jQuery('#email_password').val() ,
				'data':  jQuery('#email_pass').val() 
			}, 
			function(response){
				 var obj =eval('(' + response + ')');
				 
				 if(obj.error==0){
					 alert('Password has changed successfully');
					 jQuery('#email_pass').css('pointer-events','all');
					 jQuery('#email_pass').css('opacity',1);
					 jQuery('#email_pass').val('');
					  jQuery('#search').show();
					  jQuery('#email_password').hide();
					 jQuery('#chnage_pass').hide(); 
					  jQuery('.detstu').hide();
				 }else{
					  
					 jQuery('.erroremail').html(obj.msg); return false;
					 
				 }
			}
		);
	})

	
	</script>

<?php




}

function search_email(){
	$data=$_REQUEST['data'];
	if ($id= email_exists( $data ) ) {
		$users=get_userdata($id);
     if($users->roles[0]=='customer'|| current_user_can( 'manage_options' , $id )){
		 $msg['name']=get_user_meta($id,'first_name',true) . ' ' . get_user_meta($id,'last_name',true);
		 $msg['email']=$data;
		 $msg['phone']=get_user_meta($id,'phone_number',true);
		 $msg['state']=get_user_meta($id,'billing_state',true);
		 $msg['country']=get_user_meta($id,'billing_country',true);
		 echo json_encode(array('error'=>0,'msg'=>$msg)); exit();
	 }else{
       echo json_encode(array('error'=>1,'msg'=>'You can edit only customer password!')); exit();
     }
	}else{
		echo json_encode(array('error'=>1,'msg'=>'Email not found!')); exit();
	}
	
}

function change_email_password(){
	$data=$_REQUEST['data'];
	if ($id= email_exists( $data ) ) {
		$users=get_userdata($id);
		 
     if($users->roles[0]=='customer'|| current_user_can( 'manage_options' , $id )){
		 
		 if($_REQUEST['pass']){
			 	$user = new WP_User(get_current_user_id( ));
	 
			$allRoles=[];
			 if(strlen(array_search('administrator',$user->roles))>0 || strlen(array_search('cchead',$user->roles))>0 || strlen(array_search('ccteam',$user->roles))>0|| strlen(array_search('srm-head',$user->roles))>0 || strlen(array_search('srm-head',$user->sumitbhalla))>0){
			   wp_set_password( $_REQUEST['pass'], $users->ID );
			   echo json_encode(array('error'=>0,'msg'=>'')); exit();	 
			 }else{
				 echo json_encode(array('error'=>1,'msg'=>'Email not found!')); exit();
			 }
			 
			 
		 }else{
			 echo json_encode(array('error'=>1,'msg'=>'Please enter password!')); exit();
		 }
		 
	 }else{
       echo json_encode(array('error'=>1,'msg'=>'You can edit only customer password!')); exit();
     }
	}else{
		echo json_encode(array('error'=>1,'msg'=>'Email not found!')); exit();
	}
	
}
