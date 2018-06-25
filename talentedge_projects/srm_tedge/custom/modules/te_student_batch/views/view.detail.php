<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.detail.php');
class te_student_batchViewDetail extends ViewDetail {
		public function display(){
			global $current_user,$db;
			$row =$db->query("SELECT SUM(`amount`)amt_paid FROM `te_student_payment` WHERE `te_student_batch_id_c`='".$this->bean->id."'  AND payment_realized=1 AND deleted=0");
			$res =$db->fetchByAssoc($row);
			$this->bean->total_payment=$res['amt_paid'];
			$std=$_REQUEST['record'];
			$this->bean->total_payment=$res['amt_paid'];
			#$this->bean->channel='<a href="index.php?module=te_student_batch&records="Manish"">Upload Documents</a>';
			/* Document Upload */
			#te_pr_programs_id_c
			#$SQLrow ="SELECT m.name,m.id FROM te_masterdocument As m INNER JOIN te_masterdocument_te_pr_programs_c AS ms ON m.id=ms.te_masterdocument_te_pr_programste_masterdocument_idb WHERE m.deleted=0 AND ms.deleted=0 AND ms.te_masterdocument_te_pr_programste_pr_programs_ida='".$this->bean->te_pr_programs_id_c."'";
			#$SQLrow="SELECT * FROM `te_uploaddocument_te_student_batch_c` WHERE `te_uploaddocument_te_student_batchte_student_batch_ida`= '".$this->bean->id."'";
			$SQLrow="SELECT * FROM `te_uploaddocument` WHERE student_id='".$this->bean->id."' AND program_id='".$this->bean->te_pr_programs_id_c."'";
			$Sqlres=$db->query($SQLrow);	
			$progres =$db->fetchByAssoc($Sqlres);
			if($progres ){
			$this->bean->upload_document ='<b style="color:red;">'."You have Already Uploaded".'</b>';
			}
			else
			{
			$this->bean->upload_document = "<a href='index.php?module=te_student_batch&action=documents&record={$std}&proid={$this->bean->te_pr_programs_id_c}'>Upload Documents</a>";
			}
			/*  Current Sem*/
			$row1 =$db->query("SELECT current_sems FROM `te_student_batch` WHERE `id`= '".$this->bean->id."' AND deleted=0");
			$res1 =$db->fetchByAssoc($row1);
			$this->bean->current_sem=$res1['current_sems'];
			parent::display();
			
		}

}
?>


