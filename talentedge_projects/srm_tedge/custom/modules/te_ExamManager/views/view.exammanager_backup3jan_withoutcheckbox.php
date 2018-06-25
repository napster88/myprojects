<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
class te_ExamManagerViewExammanager extends SugarView {
	
		public function __construct() {
			parent::SugarView();
		}
		public function display() {
			global $db;
			
			$reportDataList=array();
			$search_date="";
			$index=0;
			if(isset($_POST['button']) && $_POST['button']=="Submit" && $_REQUEST['form']==002){
					if($_POST['search_student']!=""){
							$form=$_REQUEST['form'];
							$searchData['search_student']=$_POST['search_student'];
							$search_date=$_POST['search_student'];
							
							/*  Student Information Query  */
							// OLD $sqls="SELECT s.`name`,s.email,s.id AS studentid,s.mobile,sb.added_specialization,b.name as course,sb.id,sb.current_sems FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb INNER JOIN te_ba_batch AS b ON b.id=sb.te_ba_batch_id_c WHERE s.deleted=0 AND s.`registration_no`='".$search_date."'";
							$sqls="SELECT s.`name`,s.email,s.id AS studentid,s.mobile,sb.added_specialization,b.name as course,sb.id,sb.current_sems,csem.name AS currentsemname FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb INNER JOIN te_ba_batch AS b ON b.id=sb.te_ba_batch_id_c INNER JOIN te_te_semester AS csem ON sb.current_sems = csem.id WHERE s.deleted=0 AND s.`registration_no`='".$search_date."'";
							$studentObj =$db->query($sqls);
							$studentifo=array();
							while($Srow =$db->fetchByAssoc($studentObj)){ 
								  $studentifo[]=$Srow;
								  $currentsemID =$Srow['current_sems'];
								  $studentID =$Srow['studentid'];
								  $_SESSION['studentsessionid']=$studentID;	
							} 
											
					}	
					/* fatch student batch and date using current sem id */
					if(!empty($studentifo)){
							$examsql="SELECT essr.`te_examschedules_te_te_semesterte_examschedules_idb` AS scheduleid ,examdate_rel.te_examschb597hedules_idb AS dateid,exam_dates.name AS subject,exam_dates.te_te_subject_id_c,exam_dates.exam_date,exam_dates.exam_time FROM `te_examschedules_te_te_semester_c` AS essr INNER JOIN te_examschedules AS es ON es.id=essr.`te_examschedules_te_te_semesterte_examschedules_idb` INNER JOIN te_examschedules_te_exam_date_schedules_1_c AS examdate_rel ON examdate_rel.te_examschedules_te_exam_date_schedules_1te_examschedules_ida=essr.`te_examschedules_te_te_semesterte_examschedules_idb` INNER JOIN te_exam_date_schedules AS exam_dates ON exam_dates.id=examdate_rel.te_examschb597hedules_idb WHERE essr.`te_examschedules_te_te_semesterte_te_semester_ida` IN('".$currentsemID."') AND es.deleted=0 AND es.status='Active' ORDER BY exam_dates.exam_date ASC ";
							$examObj =$db->query($examsql);
							$examinfo=array();
	 						$uniqueSubArr=array(); 
							$slotArr=array();   
							while($examrow =$db->fetchByAssoc($examObj)){ 
								  $examinfo[]=$examrow; /* S-1 */
								  $uniqueSubArr[$examrow['te_te_subject_id_c']] = $examrow['subject'];
								  $slotArr[$examrow['te_te_subject_id_c']][$examrow['dateid']] = date('Y-m-d ',strtotime($examrow['exam_date'])).'@'.$examrow['exam_time'];
									}
							$uniqueSubArr = array_unique($uniqueSubArr);
							/*echo "<pre>";
							print_r($uniqueSubArr);
							print_r($slotArr);
							print_r($examinfo);
							exit();					*/
						}
						$examdates=array();
						$examtime=array();
						foreach($examifo as $exam){	
							$examtime[]=str_replace(" ","@",$exam['exam_date']);
							$examdates[]=date('Y-m-d',strtotime($exam['exam_date']));
							/* <----S-2 ---> */
							
							}
						/* Indian Staet Display Here */
						$indiastate=$indiastate[]=$GLOBALS['app_list_strings']['indian_states'];
				} // End From 002
				
					if(isset($_POST['button']) && $_POST['button']=="Book-Exam" && $_REQUEST['form']==004){
							//echo '<pre>';
							//print_r($_POST);
							$sql = "INSERT INTO te_exammanager (id,subject,city,state,examnation_time,date_entered,te_student_id_c) VALUES";
							$postvalus=array();
							for($i=0; $i < count($_POST['subjectid']);$i++){
							$postvalus[] = "('".create_guid()."','".$_POST['subjectid'][$i]."','".$_POST['city'][$i]."','".$_POST['state'][$i]."','".$_POST['date'][$i]."','".date('Y-m-d H:i:s')."','".$_SESSION['studentsessionid']."')";
							}			
							$sql .= join(',', $postvalus);
							$QueryInS=$GLOBALS['db']->Query($sql);
							
							}
							if($QueryInS){
								unset($_SESSION['studentsessionid']);
								//SugarApplication::appendErrorMessage('Exam Hasbeen Booked Sucessfully');
								echo '<script> alert("You have Sucessfully booked your Exam Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_ExamManager&action=index"} </script>';
								exit();
							
								}
				
						$sugarSmarty = new Sugar_Smarty();
						$sugarSmarty->assign("subject_info",$uniqueSubArr);
						$sugarSmarty->assign("slot_info",$slotArr);
						$sugarSmarty->assign("examtime",$examtime);
						$sugarSmarty->assign("reportDataList",$reportDataList);
						$sugarSmarty->assign("indiastate",$indiastate);
						$sugarSmarty->assign("studentifo",$studentifo);		
						$sugarSmarty->assign("examifo",$examifo);	
						$sugarSmarty->assign("selected_date",$search_date);
						$sugarSmarty->assign("form",$form);
						$sugarSmarty->display('custom/modules/te_ExamManager/tpls/exammanager.tpl');
	}
}
?>
