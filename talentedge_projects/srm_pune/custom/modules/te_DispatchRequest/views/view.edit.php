<?php
require_once('include/MVC/View/views/view.edit.php');
class te_DispatchRequestViewEdit extends ViewEdit {
	function display(){
		
		global $current_user,$db;

		parent::display();
		
		$dispatchdata="SELECT `program_c`,`semester_c` FROM `te_dispatchrequest_cstm` WHERE id_c='".$_REQUEST['record']."'";
	    	$dispatchdataobj =$db->query($dispatchdata);

		
		$row_batch =$db->fetchByAssoc($dispatchdataobj);

		?>
		<script>
			$(document).ready(function() {
				$("#btn_batch_c").blur(function(){
					//SUGAR.ajaxUI.showLoadingPanel();
						if($('#te_ba_batch_id_c').val()!=''){

							//alert($('#te_ba_batch_id_c').val()) ;						
							/* Current Sem dropdown */
							$.ajax({url: "index.php?entryPoint=semesterdropdown&batchIdsem="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
							var result = JSON.parse(result);
							//alert(result);
							
							if(result.status=='ok'){								
							 var batchsem='';
							 for(var i=0;i<result.res.length;i++){
									var id = result.res[i].id;
									var name = result.res[i].name;
									batchsem+='<option value="'+id+'">'+name+'</option>'
							 }
	
							 $("#semester_c").html(batchsem);			
							 
							}
						}});
						
						$.ajax({url: "index.php?entryPoint=semesterdropdown&batchIdcourse="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
			
							var result = JSON.parse(result);
							
							if(result.status=='ok'){								
							 var batchsem='';
							 for(var i=0;i<result.res.length;i++){
									var id = result.res[i].id;
									var name = result.res[i].name;
									batchsem+='<option value="'+id+'">'+name+'</option>'
							 }
							 $("#program_c").html(batchsem);			
							 
							}
						}});
					}
				});

				if($('#te_ba_batch_id_c').val()!=''){

							//alert($('#te_ba_batch_id_c').val()) ;						
							/* Current Sem dropdown */
							$.ajax({url: "index.php?entryPoint=semesterdropdown&batchIdsem="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 

							var result = JSON.parse(result);
							
							
							if(result.status=='ok'){								
							 var batchsem='';
							 for(var i=0;i<result.res.length;i++){
									var id = result.res[i].id;
									var name = result.res[i].name;
									//batchsem+='<option value="'+id+'">'+name+'</option>'
									if(id=="<?php echo $row_batch["semester_c"];?>"){
										
										batchsem+='<option value="'+id+'"  selected="selected" >'+name+'</option>';
									}
									else{
										batchsem+='<option value="'+id+'">'+name+'</option>';
									}
							 }
	
							 $("#semester_c").html(batchsem);			
							 
							}
						}});
						
						$.ajax({url: "index.php?entryPoint=semesterdropdown&batchIdcourse="+$('#te_ba_batch_id_c').val()+"", success: function(result){ 
			
							var result = JSON.parse(result);
							
							if(result.status=='ok'){								
							 var batchprog='';
							 for(var i=0;i<result.res.length;i++){
									var id = result.res[i].id;
									var name = result.res[i].name;
									//batchsem+='<option value="'+id+'">'+name+'</option>'
									if(id=="<?php echo $row_batch["program_c"];?>"){
										batchprog+='<option value="'+id+'"  selected="selected" >'+name+'</option>';
									}
									else{
										batchprog+='<option value="'+id+'">'+name+'</option>';
									}
							 }
							 $("#program_c").html(batchprog);			
							 
							}
						}});
					}
			});
		</script>
		<?php
	}
}
?>
