<?php
require_once('include/MVC/View/views/view.edit.php');
class te_dispatch_request_itemViewEdit extends ViewEdit {
	function display(){
		parent::display();
		?>
		<script>
			$(document).ready(function() {
				$("#btn_semester").blur(function(){
					
					//SUGAR.ajaxUI.showLoadingPanel();
						if($('#te_te_semester_id').val()!=''){					
							/* Current Sem dropdown */
							$.ajax({url: "index.php?entryPoint=semesterdropdown&subjectIdsem="+$('#te_te_semester_id').val()+"", success: function(result){ 
							var result = JSON.parse(result);
							//alert(result);
							
							if(result.status=='ok'){								
							 var batchsem='';
							 for(var i=0;i<result.res.length;i++){
									var id = result.res[i].id;
									var name = result.res[i].name;
									batchsem+='<option value="'+id+'">'+name+'</option>'
							 }
	
							 $("#subject").html(batchsem);			
							 
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
