<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class te_te_semesterViewEdit extends ViewEdit
{
	public function display(){		
		if(isset($_REQUEST['full_form'])){
			$programObj = new te_pr_Programs();
 			$program=$programObj->retrieve($_REQUEST['relate_id']);
			$this->bean->te_pr_programs_te_te_semester_1_name = $program->name;
			$this->bean->te_pr_programs_te_te_semester_1te_pr_programs_ida =$program->id;
		}		
		parent::display();
		
	}  
	 
}
