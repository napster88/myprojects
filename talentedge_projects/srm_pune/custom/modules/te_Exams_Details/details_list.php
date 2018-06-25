<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class ExamlistView{	

						function detailslist($bean, $event, $argument){
							global $db;
							
							/*  Batch Value */
							if($bean->batch!=''){							
							$sqlBatch="SELECT name FROM `te_ba_batch` WHERE id = '".$bean->batch."'"; 
							$SemObj= $GLOBALS['db']->query($sqlBatch);
							$row = $GLOBALS['db']->fetchByAssoc($SemObj);
							$bean->batch=$row['name'];
							}
							/* Progra Val */
							if($bean->course!=''){
							$sqlprogram="SELECT name FROM `te_pr_programs` WHERE id = '".$bean->course."'";
							$progObj= $GLOBALS['db']->query($sqlprogram);
							$rowprog = $GLOBALS['db']->fetchByAssoc($progObj);
							$bean->course=$rowprog['name'];
							}
							/*  Semester */
							if($bean->semeters!=''){
							$sqlsemester="SELECT name FROM `te_te_semester` WHERE id = '".$bean->semeters."'";
							$SemsObj= $GLOBALS['db']->query($sqlsemester);
							$semsrow = $GLOBALS['db']->fetchByAssoc($SemsObj);
							$bean->semeters=$semsrow['name'];
							}
							/*  Subject  */
							if($bean->subjects!=''){
							$subsql="SELECT name FROM `te_subjects_master` WHERE id = '".$bean->subjects."'";
							$subObj= $GLOBALS['db']->query($subsql);
							$subrow = $GLOBALS['db']->fetchByAssoc($subObj);
							$bean->subjects=$subrow['name'];
							}
							$listData=str_replace(",",'<br><font color="green">',$bean->start_date);
							$bean->start_date=$listData;
				
								
					}

}
