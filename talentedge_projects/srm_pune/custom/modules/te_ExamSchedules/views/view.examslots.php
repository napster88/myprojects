<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
class te_ExamSchedulesViewExamslots extends SugarView {
	
		public function __construct() {
			parent::SugarView();
		}
		/* To Display The Examschedules */
		function getExamschedule(){
			global $db;
			$examSql="SELECT id,name from te_examschedules WHERE deleted=0 AND status='Active'";
			$examObj =$db->query($examSql);
			$examOptions=array();
			while($row =$db->fetchByAssoc($examObj)){
				$examOptions[]=$row;
			}
			return $examOptions;
		}
		/* Function To display Date-Ranges According To Start Date And End Date */
		function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {
			$dates = array();
			$current = strtotime($first);
			$last = strtotime($last);
			while( $current <= $last ) {
				$dates[] = date($output_format, $current);
				$current = strtotime($step, $current);
			}
			return $dates;
		}
		/* Function To display time Slot Ranges */
		function timeslot($starttime,$endtime,$duration){  
			$array_of_time = array ();
			$start_time    = strtotime ($starttime); 
			$end_time      = strtotime ($endtime);
			$add_mins  = $duration * 60;
			while ($start_time <= $end_time)
			{
			   $array_of_time[] = date ("H:i", $start_time);
			   $start_time += $add_mins; // to check endtie=me
			  
			}
			return $array_of_time;
			
		}
		public function display() {
			global $db ,$current_user;
			#Get Exam drop down option
			$examList=$this->getExamschedule();
			$selected_exams = '';
			$reportDataList=array();
			$search_date="";
			$index=0;
			if(isset($_POST['button']) && $_POST['button']=="Search"){
					if($_POST['examschedule']!=""){
							$form_a=$_REQUEST['form_a'];
							$searchData['examschedule']=$_POST['examschedule'];
							$selected_exams =$_POST['examschedule'];	
							/*Exam Schedules Details */
							$sqls="SELECT subject.id AS subjectid,subject.name AS Subject,exe.name,exe.id AS examscheduleid,exe.start_date,exe.end_date,exe.start_time,exe.end_time,exe.exam_slot from te_te_subject AS subject INNER JOIN te_te_subject_te_te_semester_c AS subjectsem ON subject.id=subjectsem.te_te_subject_te_te_semesterte_te_subject_idb INNER JOIN te_examschedules_te_te_semester_c AS examsched ON examsched.te_examschedules_te_te_semesterte_te_semester_ida=subjectsem.te_te_subject_te_te_semesterte_te_semester_ida INNER JOIN te_examschedules AS exe ON exe.id=examsched.te_examschedules_te_te_semesterte_examschedules_idb WHERE exe.deleted=0 AND subject.deleted=0 AND examsched.te_examschedules_te_te_semesterte_examschedules_idb='".$selected_exams."'";
							$ExamObj =$db->query($sqls);
							$examscheduleifo=array();
							while($Srow =$db->fetchByAssoc($ExamObj)){ 
								  $examscheduleifo[]=$Srow;
									 $first =$Srow['start_date'];	
									 $last =$Srow['end_date'];
									 $examscheduleids=$Srow['examscheduleid'];
									 $_SESSION['examscheduleid']=$examscheduleids;
									 $examschedulename=$Srow['name'];
									 $starttime=$Srow['start_time'];
									 $endtime =$Srow['end_time']; 
									 $duration =$Srow['exam_slot'];	 			
							}
							
							/* Call the Function */ 
							$dateList=$this->date_range($first,$last);
							$timeslots=	$this->timeslot($starttime,$endtime,$duration);	
							
							/* Finish time slot */
							$ftimes=array();
							foreach ($timeslots as $values){
							$finish_time = strtotime($values) + $duration * 60; 
							$ftime=date("H:i", $finish_time);
							$ftimes[$values.'TO'.$ftime]=$values.' TO '.$ftime;
							}											
					}
							/* Dublicate For record */
							$DubSql1="SELECT COUNT(exs.id) AS totalrecords from te_exam_date_schedules AS exs INNER JOIN te_examschedules_te_exam_date_schedules_1_c AS exsr ON exs.id=exsr.te_examschb597hedules_idb WHERE exs.deleted=0 AND exsr.te_examschedules_te_exam_date_schedules_1te_examschedules_ida='".$examscheduleids."'";
							$DubObj1 =$db->query($DubSql1);
							$Drow1 =$db->fetchByAssoc($DubObj1);
							$dublicateform=$Drow1['totalrecords'];
			
				}
			if(isset($_POST['button']) && $_POST['button']=="Assign-Dates"){
					$insertData = [];
					$postvalus =[];
					$postvalusrel = [];
					foreach($_POST['subjectid'] as $subject_val){
						foreach($_POST['date_'.$subject_val] as $dateval){
							foreach($_POST['timeslot_'.$subject_val] as $timeslot_val){
								$insertData[$subject_val][$dateval][] = $timeslot_val;
								$eids=create_guid();
								/* Dublicate Records Insert  !*/
								$DubSql="SELECT COUNT(exs.id) AS totalrecords from te_exam_date_schedules AS exs INNER JOIN te_examschedules_te_exam_date_schedules_1_c AS exsr ON exs.id=exsr.te_examschb597hedules_idb WHERE exs.deleted=0 AND exsr.te_examschedules_te_exam_date_schedules_1te_examschedules_ida='".$_SESSION['examscheduleid']."'";
								$DubObj =$db->query($DubSql);
								$Drow =$db->fetchByAssoc($DubObj);
								if($Drow['totalrecords']==0){
								$postvalus[] = "('".$eids."','".$_POST[$subject_val]."','".$subject_val."','".$dateval."','".$timeslot_val."','".date('Y-m-d H:i:s')."')";
								$postvalusrel[] = "('".create_guid()."','".date('Y-m-d H:i:s')."','".$eids."','".$_SESSION['examscheduleid']."')";
								}
								else{
									echo '<script> alert(" Sorry !! you can not Assigin Dates-Time ! \n You have Already Assigned Dates-Time For This Schedule \n Please Select Another Schedule !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_Date_Schedules&action=index"} </script>';
									exit();
									
									}
							}
							
						}
					}
					//echo "<pre>";
					//print_r($insertData);
					//print_r($postvalus);
					//exit();
					
					/*$newarry=array();
					$postvalus=array();
					for($i=0; $i < count($_POST['subjectid']);$i++){
					
					$newarry[]=$eids;
					$postvalus[] = "('".$eids."','".$_POST['subjectid'][$i]."','".$_POST['date'][$i]."','".$_POST['timeslot'][$i]."','".date('Y-m-d H:i:s')."')";
					}*/
					if($postvalus){
						$sql = "INSERT INTO te_exam_date_schedules (id,name,te_te_subject_id_c,exam_date,exam_time,date_entered) VALUES ";
						$sql .= join(',', $postvalus);
						$QueryInS=$GLOBALS['db']->Query($sql);
						$sqlR = "INSERT INTO te_examschedules_te_exam_date_schedules_1_c (id,date_modified,te_examschb597hedules_idb,te_examschedules_te_exam_date_schedules_1te_examschedules_ida) VALUES ";
						$sqlR .= join(',', $postvalusrel);
						$QueryInSR=$GLOBALS['db']->Query($sqlR);	
					}			
					if($QueryInS){
						unset($_SESSION['studentsessionid']);
						echo '<script> alert("You have Sucessfully Assigned Dates And Times Thanks!");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_Date_Schedules&action=index"} </script>';echo '<script> alert("You have Sucessfully Assigned Dates And Times Thanks!");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_Date_Schedules&action=index"} </script>';
						exit();
						
					}
	
				}
						$sugarSmarty = new Sugar_Smarty();
						$sugarSmarty->assign("examList",$examList);
						$sugarSmarty->assign("selected_exam",$selected_exams);
						$sugarSmarty->assign("examscheduleifo",$examscheduleifo);
						$sugarSmarty->assign("datelist",$dateList);
						$sugarSmarty->assign("timeslot",$timeslots);
						$sugarSmarty->assign("examschedulename",$examschedulename);
						$sugarSmarty->assign("first",$first);
						$sugarSmarty->assign("last",$last);
						$sugarSmarty->assign("ftimes",$ftimes);
						$sugarSmarty->assign("starttime",$starttime);	
						$sugarSmarty->assign("endtime",$endtime);
						$sugarSmarty->assign("duration",$duration);	
						$sugarSmarty->assign("form_a",$form_a);
							
						$sugarSmarty->assign("dublicateform",$dublicateform);	
						$sugarSmarty->assign("selected_date",$search_date);
						$sugarSmarty->display('custom/modules/te_ExamSchedules/tpls/examslots.tpl');
	}
}
?>
