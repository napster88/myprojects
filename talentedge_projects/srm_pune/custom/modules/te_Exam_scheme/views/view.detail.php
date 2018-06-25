<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/SugarView.php');
require_once('include/MVC/View/views/view.detail.php');
class te_Exam_schemeViewDetail extends ViewDetail {

	function display(){
		parent::display();
	
		$record_id=$_REQUEST['record'];
		
		global $db;
		$Sql="SELECT `te_in_institutes_id_c`,`program_lising`,`program` FROM (SELECT te_in_institutes_id_c,program_lising from te_exam_scheme WHERE id='".$_REQUEST['record']."' AND deleted=0) as FirstSet inner join
(
    SELECT te_in_institutes_id_c as 'ins_id',program
    FROM te_exam
) as SecondSet
on FirstSet.te_in_institutes_id_c = SecondSet.ins_id group by ins_id ";

		$Obj =$db->query($Sql);
		$StatuSresult =$db->fetchByAssoc($Obj);
		$c=0;
		if($StatuSresult){
			$progrmaIds=$StatuSresult['program_lising'];
			#$prog=array();
			$progrmString=str_replace("^","",$progrmaIds);
			$programArry=explode(",",$progrmString);

			$program=$StatuSresult['program'];
			#$prog=array();
			$course = json_decode(stripslashes(html_entity_decode($program)));
			
			foreach($programArry as $pgm){
				if(!in_array($pgm, $course)){
					$c++;				
				}			
			}
			
			if($c==0){
		?>
		<script>
$(document).ready(function() {	
	$("#detail_header_action_menu").hide();
});	
</script>
		<?php }}
		
		//$progrmaIds=$StatuSresult['program_lising'];
		#$prog=array();
		//$progrmString=str_replace("^","",$progrmaIds);
		//$programArry=explode(",",$progrmString);
		
	}
}
?>
