<?php
require_once('include/MVC/View/views/view.edit.php');
class te_student_batchViewEdit extends ViewEdit {
	function display(){
		
		require_once('include/MVC/View/views/view.detail.php');
		require_once('include/utils.php');		
		global $current_user,$db;
		parent::display();
		
		$record_id=$_REQUEST['record'];
		
		$batchSql="SELECT `current_sems` as `sem_id` FROM `te_student_batch` WHERE id='".$record_id."'";
	    $batchObj =$db->query($batchSql);
		$row_batch =$db->fetchByAssoc($batchObj);
		
		$checkRoleSql="SELECT * FROM `acl_roles_users` WHERE user_id='".$current_user->id."' AND `role_id`='30957fe0-3494-e372-656d-58a9a6296516'";
	    $checkRoleObj =$db->query($checkRoleSql);
		$row =$db->fetchByAssoc($checkRoleObj);
		if($row){
			echo "<script>
			$('#assigned_user_name').prop('readonly',true);
			$('#btn_assigned_user_name').hide();
			$('#btn_clr_assigned_user_name').hide();
			</script>";	
		}
		echo "<script>
		
		
		    if($('#status').val()!='Dropout'){
				document.getElementById('detailpanel_21').style.display ='none';
		    }
			
				$('#status').on('change',function(){
						if($(this).val()=='Dropout'){
							document.getElementById('detailpanel_2').style.display ='block';
						}else{
							document.getElementById('detailpanel_2').style.display ='none';
						}
				});
			</script>";	
		if($current_user->designation!="BUH"){
			echo '<script>
			document.getElementById("dropout_status_label").style.display ="none"
			document.getElementById("dropout_status").style.display ="none"
			$("#refund_date_label").hide()
			$("#refund_date").hide()
			$("#refund_date_trigger").hide()
			</script>';	
		}
			
			
	?>
	<script>	
	$(function(){
	$("#status option[value='Inactive_transfer']").remove();
	});		
    $( document ).ready(function() {
	if($('#te_ba_batch_id_c').val()!=''){	
			$.ajax({url: "index.php?entryPoint=paymentplandropdown&batchId="+$('#te_ba_batch_id_c').val()+"", success: function(result){ //alert(result);return false;
				var result = JSON.parse(result);
				if(result.status=='ok'){				
				var batch='';
				 for(var i=0;i<result.res.length;i++){
						var id = result.res[i].id;
						var name = result.res[i].name;
						batch+='<option value="'+id+'">'+name+'</option>'
				 }
				 $("#payment_plan").html(batch);				
				}
			}});
		}
    });
	
	/* $("#btn_batch").click(function(){
		
		var batchid = $('#te_ba_batch_id_c').val();
		alert(batchid);
		
		
		});
		*/
/* ajax */

$(document).ready(function() {
	$("#btn_batch").blur(function(){
		//SUGAR.ajaxUI.showLoadingPanel();
			if($('#te_ba_batch_id_c').val()!=''){		
				$.ajax({url: "index.php?entryPoint=paymentplandropdown&batchId="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
					//$('#ajaxloading_c').hide(); //alert(result);return false;
					//SUGAR.ajaxUI.hideLoadingPanel();
				var result = JSON.parse(result);
				if(result.status=='ok'){			
				var batch='';
				 for(var i=0;i<result.res.length;i++){
						var id = result.res[i].id;
						var name = result.res[i].name;
						batch+='<option value="'+id+'">'+name+'</option>'
				 }
				 $("#payment_plan").html(batch);			
				 
				}
			}});
				/* Current Sem dropdown */
				$.ajax({url: "index.php?entryPoint=paymentplandropdown&batchIdsem="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
				var result = JSON.parse(result);
				if(result.status=='ok'){			
					var batchsem='';
					 for(var i=0;i<result.res.length;i++){
							var id = result.res[i].id;
							var name = result.res[i].name;
							batchsem+='<option value="'+id+'">'+name+'</option>'
					 }
					 $("#current_sems").html(batchsem);			
				}
			}});
		}
	});
	
	if($('#te_ba_batch_id_c').val()!=''){
		
		$.ajax({url: "index.php?entryPoint=paymentplandropdown&batchId="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
					//$('#ajaxloading_c').hide(); //alert(result);return false;
					//SUGAR.ajaxUI.hideLoadingPanel();
				var result = JSON.parse(result);
				if(result.status=='ok'){			
				 var batch='';
				 for(var i=0;i<result.res.length;i++){
						var id = result.res[i].id;
						var name = result.res[i].name;
						batch+='<option value="'+id+'">'+name+'</option>'
				 }
				 $("#payment_plan").html(batch);			
				 
				}
			}});
			
		$.ajax({url: "index.php?entryPoint=paymentplandropdown&batchIdsem="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
				var result = JSON.parse(result);
				if(result.status=='ok'){			
					 var batchsem='';
					 for(var i=0;i<result.res.length;i++){
							var id = result.res[i].id;
							var name = result.res[i].name;
							
							if(id=="<?php echo $row_batch["sem_id"];?>"){
								batchsem+='<option value="'+id+'"  selected="selected" >'+name+'</option>';
							}
							else{
								batchsem+='<option value="'+id+'">'+name+'</option>';
							}
					 }
					 $("#current_sems").html(batchsem);			
				}
			}});
	}
});
	</script>
	<?php
    }
}
?>
