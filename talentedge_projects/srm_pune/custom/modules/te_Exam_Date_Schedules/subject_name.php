<?php
/* This Code create logic hooks For Status Date 6-dec-17  By-Manish*/
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
	
	class subject
	{
				function namedb($bean, $event, $argument)
				{	
					if(!empty($bean->te_te_subject_id_c)){
						//$this->name=$bean->subject;;
						$newQuery = 'UPDATE  te_exam_date_schedules SET name = "'.$bean->subject.'" where id = "'.$bean->id.'" ';
						$newResult = $GLOBALS['db']->query($newQuery); 
						
				     }
				     	
					
					
				}
					
	}
