<?php /* Code Date 14-Jan-2018 By-Mniash Kumar Code For insert Exam marks */ 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/SugarView.php');
class te_Exam_resultViewExamresultsscreen extends SugarView {
	
		public function __construct() {
			parent::SugarView();
		}
		
		public function display() {
			global $db;
			$reportDataList=array();
			$search_date="";
			$index=0;
			if(isset($_POST['button']) && $_POST['button']=="Submit" && $_REQUEST['form']==002){
					if($_POST['search_student_exam']!=""){
							$form=$_REQUEST['form'];
							$searchData['search_student_exam']=$_POST['search_student_exam'];
							$search_examsearch_exam=$_POST['search_student_exam'];
							$_SESSION['regID']=$search_examsearch_exam;
							
							/* Student personal information  for display*/
							$sqls="SELECT s.`name`,s.email,s.id AS studentid,s.mobile,sb.added_specialization,sb.te_pr_programs_id_c AS course_id,b.name as course,sb.id,sb.current_sems,csem.name AS currentsemname FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb INNER JOIN te_ba_batch AS b ON b.id=sb.te_ba_batch_id_c INNER JOIN te_te_semester AS csem ON sb.current_sems = csem.id WHERE s.deleted=0 AND s.`registration_no`='".$search_examsearch_exam."'";
							$studentObj =$db->query($sqls);
							$studentifo=array();
							while($Srow =$db->fetchByAssoc($studentObj)){ 
								  $studentifo[]=$Srow;
								  $currentsemID =$Srow['current_sems'];
								  $StudentID =$Srow['studentid'];
							}
								  $_SESSION['studentID']=$StudentID;
								  $studentifoCount=count($studentifo);
							if($studentifoCount==0){
								$norecod="No Record Found Or Enrollment ID Wrong !!";	
							}
							

							/*  Student personal Information Information Query  */
							//$sqls="SELECT subj.subject_id AS subjectcode,exam.id AS examId,exam.exam_date AS examdate,exam.description,exam.subject,exam.city,exam.state,exam.te_student_id_c,exam.examnation_time,exam.exam_status,subj.name AS subjectName FROM `te_exammanager` AS exam INNER JOIN te_te_subject AS subj ON exam.subject=subj.id WHERE exam.deleted=0 AND exam.exam_status='Active' AND exam.name='".$search_examsearch_exam."'";
							$sqls="SELECT subj.subject_code AS subjectcode, subj.overall_passing_marks, subj.overall_total_marks, exam.id AS examId, exam.exam_date AS examdate, exam.description, exam.subject, exam.city, exam.state, exam.te_student_id_c, exam.examnation_time, exam.exam_status, subj.name AS subjectName FROM `te_exammanager` AS exam INNER JOIN te_subjects_master AS subj ON exam.subject = subj.id WHERE exam.deleted = 0 AND exam.exam_status = 'Active' AND exam.name ='".$search_examsearch_exam."'";
							$studentObj =$db->query($sqls);
							$studentexaminfo=array();
							$subjectID=array();
							while($Srow =$db->fetchByAssoc($studentObj)){ 
								  $studentexaminfo[]=$Srow;
								  $subjectID[] =$Srow['subject'];
									#$currentsemID =$Srow['current_sems'];
									#$_SESSION['studentsessionid']=$$insERMarksID;	
							}
								
								 $ExamCount=count($subjectID);			 
					}	
				    
					if(!empty($studentexaminfo)){	
					/* Find Unique Program Id According to subject ID */	
					/*$ProgSql="SELECT DISTINCT subject_program_id from te_subjects_master  WHERE id IN('".implode("','",$subjectID)."')";	
					$ProgObj =$db->query($ProgSql);
							$ProgID=array();  
							while($Progrow =$db->fetchByAssoc($ProgObj)){ 
								  $ProgID[]=$Progrow['subject_program_id'];
									}*/	
				
					/*  Examp type scheme Display Here */	
					//echo "<pre>";print_r($studentifo[0]['course_id']);exit();	
				  echo $examsql="SELECT et.*, esp.te_exam_scheme_te_pr_programste_pr_programs_idb AS program_id FROM te_exam_types AS et INNER JOIN te_exam_types_te_exam_scheme_c AS etec ON etec.te_exam_types_te_exam_schemete_exam_types_idb = et.id INNER JOIN te_exam_scheme_te_pr_programs_c AS esp ON esp.te_exam_scheme_te_pr_programste_exam_scheme_ida = etec.te_exam_types_te_exam_schemete_exam_scheme_ida WHERE etec.deleted = 0 AND et.deleted = 0 AND esp.te_exam_scheme_te_pr_programste_pr_programs_idb IN('".$studentifo[0]['course_id']."')";
					$examObj =$db->query($examsql);
						$examtypes=array();
						$examIdCont=array();  
						while($examrow =$db->fetchByAssoc($examObj)){ 
							  $examtypes[]=$examrow; 
							  $examIdCont[]=$examrow['id'];
								}
								
					}
							 $countexamtype=count($examIdCont);
									
				} // End From 002print_r($studentexaminfo);
				//echo "<pre>";print_r($_POST);exit();
					if(isset($_POST['button']) && $_POST['button']=="Submit-Result" && $_REQUEST['form']==004){
								$resultArr = [];
								foreach($_POST['subjectid'] as $val){
										$resultArr[$val]=$this->formate_result($_POST['examtype'][$val],$_POST['examtype_passing_marks'][$val],$_POST['examtype_total_marks'][$val],$_POST['examtype_val'][$val],$_POST['booking'][$val]);
								}
								//echo "<pre>";print_r($_POST);
								//echo "<pre>";print_r($resultArr);exit();
								if($resultArr){
									$InsERQuery = 'INSERT INTO te_exam_result (id,name, date_entered, date_modified, status,total_marks,total_prsent,te_te_subject_id_c,te_student_id_c,description) VALUES ';
									$InsERArr = [];
									
									$InsERMarksQuery = 'INSERT INTO te_exammarks (id,name, date_entered, date_modified, exam_type,total_marks,total_persent) VALUES ';
									$InsERMarksArr = [];
									
									$InsERMarksRelQuery = 'INSERT INTO te_exam_result_te_exammarks_c (id,date_modified,te_exam_result_te_exammarkste_exam_result_ida,te_exam_result_te_exammarkste_exammarks_idb) VALUES ';
									$InsERMarksRelArr = [];
									
									#print_r($resultArr);
									#exit();
									$resultInsertedArr = [];
									foreach($resultArr as $key=>$value){
										$statusRes = 'Fail';
										if($value['fail_status']==0){
											$statusRes = 'Pass';
										}
										$insERID = create_guid();
										$resultInsertedArr[$key]=$insERID;
										$bookingid = $resultArr[$key]['booking_id'];//use this for booking status update@m
										$InsERArr[] = "('".$insERID."','".$_SESSION['regID']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$statusRes."','".$value['total_score_marks']."','".$value['total_percent']."','".$key."','".$_SESSION['studentID']."','".$_POST['examtype_grade'][$key]."')"; 
										$ExamSql = "UPDATE te_exammanager SET date_modified='".date('Y-m-d H:i:s')."',exam_status='".$statusRes."' WHERE id='".$bookingid."'";
										$Queryupdate=$GLOBALS['db']->query($ExamSql);
										unset($resultArr[$key]['total']);
										unset($resultArr[$key]['total_passing_marks']);
										unset($resultArr[$key]['total_score_marks']);
										unset($resultArr[$key]['fail_status']);
										unset($resultArr[$key]['total_percent']);
										unset($resultArr[$key]['booking_id']);
										
									}
										$InsERQuery .=implode(',',$InsERArr);
								}
									foreach($resultArr as $key=>$value){
										foreach($value as $marksKey=>$marksval){
											$insERMarksID = create_guid();
											$InsERMarksRelID = create_guid();
											$InsERMarksArr[$key.$marksKey] = "('".$insERMarksID."','name','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$marksKey."','".$marksval['score_marks']."','".$marksval['score_percent']."')"; 
											$InsERMarksRelArr[$key.$marksKey]= "('".$InsERMarksRelID."','".date('Y-m-d H:i:s')."','".$resultInsertedArr[$key]."','".$insERMarksID."')"; 
										}
								}
									$InsERMarksQuery .= implode(',',$InsERMarksArr);
									$InsERMarksRelQuery .= implode(',',$InsERMarksRelArr);
									//echo "-------------";
									//print_r($resultArr);
									//print_r($InsERMarksArr);
									
									$Queryresult=$GLOBALS['db']->Query($InsERQuery);
									$Querymarks=$GLOBALS['db']->Query($InsERMarksQuery);
									$Queryrel=$GLOBALS['db']->Query($InsERMarksRelQuery);
							
									#echo $InsERQuery.'<br>';
									#echo $InsERMarksQuery.'<br>';
									#echo $InsERMarksRelQuery.'<br>';
									#exit();
							}			
							if($Queryrel){
								unset($_SESSION['regID']);
								unset($_SESSION['studentID']);
								//SugarApplication::appendErrorMessage('Exam Hasbeen Booked Sucessfully');
								echo '<script> alert("You have Sucessfully Submit Result Marks Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_result&action=index"} </script>';
								exit();
								}
							$sugarSmarty = new Sugar_Smarty();
							$sugarSmarty->assign("subject_info",$uniqueSubArr);
							$sugarSmarty->assign("examtypes",$examtypes);
							$sugarSmarty->assign("countexamtype",$countexamtype);
							$sugarSmarty->assign("reportDataList",$reportDataList);
							$sugarSmarty->assign("studentifo",$studentifo);
							$sugarSmarty->assign("studentexaminfo",$studentexaminfo);		
							$sugarSmarty->assign("examifo",$examifo);	
							$sugarSmarty->assign("search_exam",$search_exam);
							$sugarSmarty->assign("search_filter",$search_examsearch_exam);
							$sugarSmarty->assign("ExamCount",$ExamCount);
							$sugarSmarty->assign("form",$form);
							$sugarSmarty->assign("norecod",$norecod);
							$sugarSmarty->assign("studentifoCount",$studentifoCount);
							
							$sugarSmarty->display('custom/modules/te_Exam_result/tpls/examresultsscreen.tpl');
	}
		function formate_result($et,$etPassingMarking,$etMaxMarking,$etScoreMarking,$booking_id){
			$formateArr = [];
			foreach($et as $val){
				$formateArr[$val]['passing_marks']=$etPassingMarking[$val];
				$formateArr[$val]['max_marks']=$etMaxMarking[$val];
				$formateArr[$val]['score_marks']=$etScoreMarking[$val];
				$scorepercent = 0;
				$scorepercent = ($formateArr[$val]['score_marks'] / $formateArr[$val]['max_marks']) * 100;
				$formateArr[$val]['score_percent']=$scorepercent;
				
				if($formateArr[$val]['score_marks']>=$formateArr[$val]['passing_marks']){
					$formateArr[$val]['result_status']='Pass';
				}
				else{
					$formateArr[$val]['result_status']='Fail';
				}
				
			}
			$failstatus = 0;
			foreach($formateArr as $key=> $val){
				$formateArr['total']+=$val['max_marks'];
				$formateArr['total_passing_marks']+=$val['passing_marks'];
				$formateArr['total_score_marks']+=$val['score_marks'];
				if($val['result_status']=='Fail'){
					$failstatus = 1;
					$formateArr['fail_status']=$failstatus;
				}
				else{
					$formateArr['fail_status']=$failstatus;
				}	
			}
			$totalpercent = 0;
			$totalpercent = ($formateArr['total_score_marks'] / $formateArr['total']) * 100;
			$formateArr['total_percent']=$totalpercent;
			$formateArr['booking_id']=$booking_id;
			
			//print_r($formateArr);
			//echo "hi";
			return $formateArr;
			
		}
}
?>
