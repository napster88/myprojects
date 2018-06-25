<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php');
class te_ExamViewExamgrades extends SugarView {
			public function __construct() {
					parent::SugarView();
				}
				/* To Display The Examschedules */
public function get_institutes()
{
	global $db;
	$batchSql="SELECT id,name from te_in_institutes WHERE deleted=0";
	$batchObj =$db->query($batchSql);
	$batchOptions=array();
	while($row =$db->fetchByAssoc($batchObj)){
		$batchOptions[]=$row;
	}
	return $batchOptions;

}

				public function display(){

					global $db ,$current_user;
					$sugarSmarty = new Sugar_Smarty();
					$institutes=$this->get_institutes();
					$sugarSmarty->assign("institutes",$institutes);
					$sugarSmarty->assign("examtypes",$examtypes);
					$sugarSmarty->assign("countexamtype",$countexamtype);
					$sugarSmarty->display('custom/modules/te_Exam/tpls/examgrades.tpl');
					}



		}
?>
