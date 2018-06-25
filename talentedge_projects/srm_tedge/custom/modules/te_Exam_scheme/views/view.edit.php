<?php
require_once('include/MVC/View/views/view.edit.php');
class te_Exam_schemeViewEdit extends ViewEdit {
	function display(){
		parent::display();
?>
<script>
$(document).ready(function() {
	$("#btn_university").blur(function(){
			if($('#te_in_institutes_id_c').val()!=''){	
				$.ajax({url: "index.php?entryPoint=te_program_data&instituteId="+$('#te_in_institutes_id_c').val()+"", success: function(result){ 
					//alert(result);return false;
				var result = JSON.parse(result);
				if(result.status=='ok'){			
				var batch='';
				 for(var i=0;i<result.res.length;i++){
						var id = result.res[i].id;
						var name = result.res[i].name;
						batch+='<option value="'+id+'">'+name+'</option>'
				 }
				 $("#program_lising").html(batch);			
				 
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
