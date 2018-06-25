<?php /* Code Date 14-Jan-2018 By-Mniash Kumar Code For insert Exam marks */ 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/SugarView.php');
class te_ExamViewEditexam extends SugarView {
	
		public function __construct() {
			parent::SugarView();
		}
		/*  Institute Drop down */
		function getinstitute(){
			global $db;
			$batchSql="SELECT id,name from te_in_institutes WHERE deleted=0";
			$batchObj =$db->query($batchSql);
			$batchOptions=array();
			while($row =$db->fetchByAssoc($batchObj)){
				$batchOptions[]=$row;
			}
			return $batchOptions;
		}
		
		public function display() {
			global $db;
			
			if(isset($_GET['id'])){
				$row_id=$_GET['id'];
			}
			
			$reportDataList=array();
			$search_date="";
			$index=0;
			$institute=$this->getinstitute();
			
			$sql="select * from te_Exam where id='".$_GET['id']."'";
			$exam_data=$db->query($sql);

			while($Srow =$db->fetchByAssoc($exam_data)){ 
				$studentifo[]=$Srow;
			}
			
			/** Exam detail Info*/
			foreach($studentifo as $stdinfo){
				
				$exam_name=$stdinfo['name'];
				$start_date=$stdinfo['start_date'];
				$end_date=$stdinfo['end_date'];
			}
			
			if(isset($_POST['button']) && $_POST['button']=="SAVE" && $_REQUEST['form']==002){
				
				
				$form=$_REQUEST['form'];
				
				$exam_name=$_POST['name'];
				
				$course=json_encode($_POST['course']);
				$batch=json_encode($_POST['batch']);
				$subject=json_encode($_POST['subject']);
				$semester=json_encode($_POST['semesters']);
				$insERMarksID = create_guid();
				
				$slot_value=count($_POST['slot']);
			
				for($i=1;$i<=($slot_value/2);$i++){
					$slots[]=$_POST['slot']['start_time_'.$i.''].'-'.$_POST['slot']['end_time_'.$i.''];
				}
			
				$listdates=$_POST['listdate'];
				
				$listdates=implode(',',$listdates);
				
				$slots=implode(',',$slots);
				
				$date = new DateTime($_POST['from_date']);
				$from_date=$date->format('Y-m-d');
				
				$date = new DateTime($_POST['to_date']);
				$to_date=$date->format('Y-m-d');
				
				$updateQuery='Update te_exam set name="'.$_POST['name'].'",description="'.$_POST['description'].'",start_date="'.$from_date.'",end_date="'.$to_date.'",number_of_slots="'.$_POST['number_of_slots'].'",list_date="'.$listdates.'",program="'.$course.'",batch_val="'.$batch.'",Subject_val="'.$subject.'",semester_val="'.$semester.'" where id="'.$row_id.'"';
				$GLOBALS['db']->Query($updateQuery);
				
				unset($updateQuery);
				
				echo '<script> alert("Sucessfully Edited your Exam Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam&action=index"} </script>';
				
			} // End From 002
					if(isset($_POST['button']) && $_POST['button']=="Submit-Result" && $_REQUEST['form']==004){
								$resultArr = [];
								foreach($_POST['subjectid'] as $val){
										$resultArr[$val]=$this->formate_result($_POST['examtype'][$val],$_POST['examtype_passing_marks'][$val],$_POST['examtype_total_marks'][$val],$_POST['examtype_val'][$val],$_POST['booking'][$val]);
								}
								#print_r($resultArr);
								if($resultArr){
									$InsERQuery = 'INSERT INTO te_exam_result (id,name, date_entered, date_modified, status,total_marks,total_prsent,te_te_subject_id_c,te_student_id_c) VALUES ';
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
										$bookingid = $resultArr[$key]['booking_id'];//use this for booking status update
										$ExamSql .= "UPDATE te_exammanager SET date_modified='".date('Y-m-d H:i:s')."',exam_status='".$statusRes."' WHERE id='".$bookingid."'";
										$Queryupdate=$GLOBALS['db']->query($ExamSql);
										$InsERArr[] = "('".$insERID."','".$_SESSION['regID']."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$statusRes."','".$value['total_score_marks']."','".$value['total_percent']."','".$key."','".$_SESSION['studentID']."')"; 
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
								echo '<script> alert("You have Sucessfully Submit Result Marks Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam&action=index"} </script>';
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
							$sugarSmarty->assign("institute",$institute);
							$sugarSmarty->assign("start_date",$start_date);
							$sugarSmarty->assign("end_date",$end_date);
							$sugarSmarty->assign("courseprograms",$courseprograms);
							$sugarSmarty->assign("studentifoCount",$studentifoCount);
							$sugarSmarty->assign("exam_name",$exam_name);
							$sugarSmarty->assign("row_id",$row_id);
							$sugarSmarty->display('custom/modules/te_Exam/tpls/editexam.tpl');
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
