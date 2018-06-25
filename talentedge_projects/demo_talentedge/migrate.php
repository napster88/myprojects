<?php

ini_set('display_errors',1);
error_reporting(-1);
set_time_limit(0);
require_once('wp-load.php');
global $wpdb;
 
echo $sql="SELECT ID as id FROM te_posts WHERE post_date >= '2017-07-01 00:00:00' and post_type='shop_order'"; 
$data=$wpdb->get_results($sql);
 
if($data && count($data)>0){
	
  foreach($data as $dt){
	   
	echo  $billingCountry=get_post_meta($dt->id,'_billing_country',true); 
	 $_billing_state=get_post_meta($dt->id,'_billing_state',true); 
	 if($billingCountry!='IN') continue;  
	 $tax=get_post_meta($dt->id,'_order_tax',true);   
	 $total=get_post_meta($dt->id,'_order_total',true);  
	echo $taxon=($tax*100)/($total-$tax) ;
	echo '<br>';
	 if($taxon>16){
		if($_billing_state=='HR'){
			if(!get_post_meta($dt->id,'_taxtype',true)){
					add_post_meta($dt->id,'_taxtype','cgst');
			} 
			
			if(!get_post_meta($dt->id,'_tax1',true)){
					add_post_meta($dt->id,'_tax1','9');
					add_post_meta($dt->id,'_tax2','9');
			} 	
		}else{
			
			if(!get_post_meta($dt->id,'_taxtype',true)){
					add_post_meta($dt->id,'_taxtype','igst');
			} 
			
			if(!get_post_meta($dt->id,'_tax1',true)){
					add_post_meta($dt->id,'_tax1','18');
					add_post_meta($dt->id,'_tax2','0');
			}			
		}		
		 
	 } 
	   
    }	
	
	
	
}

