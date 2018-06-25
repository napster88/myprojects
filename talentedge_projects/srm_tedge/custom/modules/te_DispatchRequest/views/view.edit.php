<?php
require_once('include/MVC/View/views/view.edit.php');
class te_DispatchRequestViewEdit extends ViewEdit {
	function display(){
		parent::display();
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
			});
		</script>
		<?php
	}
}
?>
