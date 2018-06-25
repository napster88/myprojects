<?php
/* This Code create logic hooks For Status Date 6-dec-17 */
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	
	class activecall
	{
				function activefunc($bean, $event, $argument)
				{	
					global $db;		
							 
			        if(!empty($_REQUEST['te_examschedules_te_te_semesterte_te_semester_ida']) && !empty($bean->name) && $bean->status=='Active')
				    {
								$Semname=$_REQUEST['te_examschedules_te_te_semester_name'];
								$seMID=$_REQUEST['te_examschedules_te_te_semesterte_te_semester_ida'];
								$EXamSql="SELECT exm.id,exm.name,exm.status from te_examschedules exm INNER JOIN te_examschedules_te_te_semester_c sem ON exm.id=sem.te_examschedules_te_te_semesterte_examschedules_idb WHERE exm.deleted=0 AND exm.status='Active' AND sem.deleted=0 AND sem.te_examschedules_te_te_semesterte_te_semester_ida='".$seMID."'";
								$ResultSQl= $db->query($EXamSql);
								$StatuSresult=$db->fetchByAssoc($ResultSQl);
								if($StatuSresult)
								{
								//$this->$bean->te_in_institutes_te_pr_programs_1_name->id;
								SugarApplication::appendErrorMessage('You have Already one Active Record');
								echo '<script> alert("You can\'t Create One More Active Record,Because Already One Record Active Else Change Status !");callPage(); function callPage(){  window.location.href="index.php?action=ajaxui#ajaxUILoc=index.php%3Fmodule%3Dte_te_semester%26action%3DDetailView%26record%3D' . $seMID . '" } </script>';
								exit();
								}
				}
	}

}
?>

