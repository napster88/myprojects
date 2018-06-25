<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/SugarView.php');
require_once('include/MVC/View/views/view.edit.php');
class te_Exam_schemeViewEdit extends ViewEdit {

	function display(){
		
		global $db;
		$Sql="SELECT number_exams from te_exam_scheme WHERE id='".$_REQUEST['record']."' AND deleted=0";
		$Obj =$db->query($Sql);
		$row =$db->fetchByAssoc($Obj);

		$number_exams=$row['number_exams'];

		$type="select * from (select `etes`.`te_exam_types_te_exam_schemete_exam_types_idb` as `type_id` from te_exam_types_te_exam_scheme_c etes INNER JOIN te_exam_scheme es ON etes.te_exam_types_te_exam_schemete_exam_scheme_ida=es.id where
               etes.te_exam_types_te_exam_schemete_exam_scheme_ida='".$_REQUEST['record']."' and es.deleted=0) rel_type INNER JOIN te_exam_types et ON rel_type.type_id=et.id";
       
        	$examtype=$db->query($type);
       
        	while($Srow =$db->fetchByAssoc($examtype)){
			$exam_sch[]=$Srow;
		}
		
		if($number_exams==1){
			$name=$exam_sch[0]['name'];
			$exam_type=$exam_sch[0]['exam_type'];
			$min_marks=$exam_sch[0]['min_marks'];
			$passing_prsent=$exam_sch[0]['passing_prsent'];
			$total_marks=$exam_sch[0]['total_marks'];
		}
		if($number_exams==2){
			$name=$exam_sch[0]['name'];
			$exam_type=$exam_sch[0]['exam_type'];
			$min_marks=$exam_sch[0]['min_marks'];
			$passing_prsent=$exam_sch[0]['passing_prsent'];
			$total_marks=$exam_sch[0]['total_marks'];

			$name1=$exam_sch[1]['name'];
			$exam_type1=$exam_sch[1]['exam_type'];
			$min_marks1=$exam_sch[1]['min_marks'];
			$passing_prsent1=$exam_sch[1]['passing_prsent'];
			$total_marks1=$exam_sch[1]['total_marks'];
		}
		if($number_exams==3){
			$name=$exam_sch[0]['name'];
			$exam_type=$exam_sch[0]['exam_type'];
			$min_marks=$exam_sch[0]['min_marks'];
			$passing_prsent=$exam_sch[0]['passing_prsent'];
			$total_marks=$exam_sch[0]['total_marks'];

			$name1=$exam_sch[1]['name'];
			$exam_type1=$exam_sch[1]['exam_type'];
			$min_marks1=$exam_sch[1]['min_marks'];
			$passing_prsent1=$exam_sch[1]['passing_prsent'];
			$total_marks1=$exam_sch[1]['total_marks'];

			$name2=$exam_sch[2]['name'];
			$exam_type2=$exam_sch[2]['exam_type'];
			$min_marks2=$exam_sch[2]['min_marks'];
			$passing_prsent2=$exam_sch[2]['passing_prsent'];
			$total_marks2=$exam_sch[2]['total_marks'];
		}
		if($number_exams==4){
			$name=$exam_sch[0]['name'];
			$exam_type=$exam_sch[0]['exam_type'];
			$min_marks=$exam_sch[0]['min_marks'];
			$passing_prsent=$exam_sch[0]['passing_prsent'];
			$total_marks=$exam_sch[0]['total_marks'];

			$name1=$exam_sch[1]['name'];
			$exam_type1=$exam_sch[1]['exam_type'];
			$min_marks1=$exam_sch[1]['min_marks'];
			$passing_prsent1=$exam_sch[1]['passing_prsent'];
			$total_marks1=$exam_sch[1]['total_marks'];

			$name2=$exam_sch[2]['name'];
			$exam_type2=$exam_sch[2]['exam_type'];
			$min_marks2=$exam_sch[2]['min_marks'];
			$passing_prsent2=$exam_sch[2]['passing_prsent'];
			$total_marks2=$exam_sch[2]['total_marks'];

			$name3=$exam_sch[3]['name'];
			$exam_type3=$exam_sch[3]['exam_type'];
			$min_marks3=$exam_sch[3]['min_marks'];
			$passing_prsent3=$exam_sch[3]['passing_prsent'];
			$total_marks3=$exam_sch[3]['total_marks'];
		}
		
		
		$this->ss->assign('number_exams', $number_exams); 
		$this->ss->assign('name', $name); 
		$this->ss->assign('exam_type', $exam_type); 
		$this->ss->assign('min_marks', $min_marks); 
		$this->ss->assign('passing_prsent', $passing_prsent); 
		$this->ss->assign('total_marks', $total_marks); 

		$this->ss->assign('name1', $name1); 
		$this->ss->assign('exam_type1', $exam_type1); 
		$this->ss->assign('min_marks1', $min_marks1); 
		$this->ss->assign('passing_prsent1', $passing_prsent1); 
		$this->ss->assign('total_marks1', $total_marks1); 

		$this->ss->assign('name2', $name2); 
		$this->ss->assign('exam_type2', $exam_type2); 
		$this->ss->assign('min_marks2', $min_marks2); 
		$this->ss->assign('passing_prsent2', $passing_prsent2); 
		$this->ss->assign('total_marks2', $total_marks2); 

		$this->ss->assign('name3', $name3); 
		$this->ss->assign('exam_type3', $exam_type3); 
		$this->ss->assign('min_marks3', $min_marks3); 
		$this->ss->assign('passing_prsent3', $passing_prsent3); 
		$this->ss->assign('total_marks3', $total_marks3); 

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
						var c=0;
						for(var j=0;j<result.selected.length;j++){
							if(id==result.selected[j]){
									c++;
								batch+='<option value="'+id+'" selected>'+name+'</option>'
							}
						
							
						}
						if(c==0)
							batch+='<option value="'+id+'">'+name+'</option>'
						
				 }
				 $("#program_lising").html(batch);			
				 
				}
			}});
			
		}
	});	

	if($('#te_in_institutes_id_c').val()!=''){	
				$.ajax({url: "index.php?entryPoint=te_program_data&instituteId="+$('#te_in_institutes_id_c').val()+"", success: function(result){ 
					//alert(result);return false;
				var result = JSON.parse(result);
				if(result.status=='ok'){			
				var batch='';
   				
				 for(var i=0;i<result.res.length;i++){
						var id = result.res[i].id;
						var name = result.res[i].name;
						var c=0;
						for(var j=0;j<result.selected.length;j++){
							if(id==result.selected[j]){
									c++;
								batch+='<option value="'+id+'" selected>'+name+'</option>'
							}
						
							
						}
						if(c==0)
							batch+='<option value="'+id+'">'+name+'</option>'
						
				 }
				 $("#program_lising").html(batch);			
				 
				}
			}});
			
		}
	
});

	</script>	
<?php      	
	//$sugarSmarty = new Sugar_Smarty();
	$this->ss->assign('number_exams', $this->bean->number_exams); 
		//$sugarSmarty->assign("number_exams",$number_exams);
		
		//$sugarSmarty->display('custom/modules/te_Exam_scheme/tpls/EditViewFooter.tpl');
    }
}
?>
