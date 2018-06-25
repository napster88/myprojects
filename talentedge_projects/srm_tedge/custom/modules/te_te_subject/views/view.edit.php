<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class te_te_subjectViewEdit extends ViewEdit
{
	public function display(){		
		if(isset($_REQUEST['full_form'])){
			$semesterObj = new te_te_semester();
 			$semester=$semesterObj->retrieve($_REQUEST['relate_id']);
			$this->bean->te_te_subject_te_te_semester_name = $semester->name;
			$this->bean->te_te_subject_te_te_semesterte_te_semester_ida = $semester->id;
		}		
		parent::display();
		
	}  
	 
}
