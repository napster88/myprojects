<?php
require_once('include/MVC/View/views/view.edit.php');
class te_CourierViewEdit extends ViewEdit {
	function display(){
		
		require_once('include/MVC/View/views/view.detail.php');
		require_once('include/utils.php');		
		global $current_user,$db;
		parent::display();
		
		$cities=$cities[]=$GLOBALS['app_list_strings']['cities_list'];
		
		$states=$states[]=$GLOBALS['app_list_strings']['state_list'];
		
		
		foreach($cities as $key_city=>$city){
			$statecode=explode('_',$key_city);
			$code=$statecode[0];
			
			$city_list[$code][]=$city;
		}	
		
		foreach($states as $key_state=>$state){
			$code=explode('_',$key_state);
			$code=$code[0];
			
			$state_list[$code][]=$state;
		}	
		
			
	?>
	<script>	
	$(function(){
		$("#status option[value='Inactive_transfer']").remove();
	});		
    $( document ).ready(function() {
		
		$("#state").html(" ");
		$("#city").html(" ");
		
		var city_count=0;
		$("#country").change(function(){
			var country = $(this).find(':selected')[0].value;
			var $statelist= '<option value="">--Select--</option>' ;
			<?php foreach($state_list as $key=>$val){?>
				
				 if(country =='<?= $key?>'){
					 <?php foreach($val as $k=>$v){
						 
						 $state=explode('_',$v);
						 ?>
						
					   $statelist +='<option value="<?php echo $v ?>"><?php echo $state[1]?></option>';
					 
					 <?php }?>
					 console.log($statelist);
						$("#state").html(" ");
						$("#state").html($statelist);
					 
				 }
				
				 
			<?php }?>
		});
		
		$("#state").change(function(){
			var state_value = $(this).find(':selected')[0].value;
			var result = state_value.split('_');
			var key=result[0];
			
			var $citylist = '<option value="">--Select--</option>' ;
			<?php foreach($city_list as $key1=>$val1){?>
				
				 if(key=='<?= $key1?>'){
					 
					 
					 <?php foreach($val1 as $k1=>$v1){?>
					 
					   $citylist +='<option value="<?php echo $v1 ?>"><?php echo $v1?></option>';
					 
					 <?php }?>
					 
						$("#city").html(" ");
						$("#city").html($citylist);
					 
				 }
				 
				<?php }
				?>
				
				if(city_count>0){
					$("#city").html(" ");
				}
		});
    });
	</script>
	<?php
    }
}
?>
