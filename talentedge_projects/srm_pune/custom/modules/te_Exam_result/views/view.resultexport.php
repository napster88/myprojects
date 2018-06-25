<?php
if (!defined('sugarEntry') || !sugarEntry)die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php');
class te_Exam_resultViewResultexport extends SugarView {
			public function __construct() {
					parent::SugarView();
				}
				/* To Display The Examschedules */
				public function getBatch(){
					global $db ,$current_user;
					$batchSql="SELECT b.id,b.batch_code from te_ba_batch AS b WHERE b.deleted=0 ";
					$batchObj     = $db->query($batchSql);
					$batchOptions = array();
					while ($row= $db->fetchByAssoc($batchObj))
					{
						$batchOptions[$row['batch_code']] = $row['id'];
					}
					return $batchOptions;
				}
				
				
				public function display(){
					//error_reporting(E_ALL);
					//ini_set('display_errors', 1);
					global $db ,$current_user;
					$logID=$current_user->id;  
					#Get Exam drop down option
					$selected_exams = '';
					$reportDataList=array();
					$search_date="";
					$index=0;
					$batchArr = $this->getBatch();
					if(isset($_POST['button']) && $_POST['button']=="Upload"){
						
						global $db;

						if (!file_exists('./upload/exam_result')) {
						    mkdir('./upload/exam_result', 0777, true);
						}

						$uploads_dir = './upload/exam_result';
						
						$mimes = array('text/csv','text/tsv','application/octet-stream');
						
						
						if(!in_array($_FILES['fileToUpload']['type'],$mimes)){
						  echo '<script> alert("File is not in csv format!!");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_result&action=resultbulk"} </script>';
						  //echo "".$sub_Srow['name']." exam (".$exam_name.")Obtained Marks is greater than given total marks";
						  exit();
						} 

						$tmp_name = $_FILES["fileToUpload"]["tmp_name"];
						$name = basename($_FILES["fileToUpload"]["name"]);
						move_uploaded_file($tmp_name, "$uploads_dir/$name");

						$csv = array();

						/** Converting csv file data to Array*/

						if (($file = fopen("$uploads_dir/$name", 'r')) === false) {
						    echo 'There was an error loading the CSV file.';
						} else {
						   while (($line = fgetcsv($file, 1000)) !== false) {
						      $csv[] = $line;
						   }
						   fclose($handle);
						}
						
						if(count($csv)>1){
							foreach($csv as $k=>$csv_data){
							    if($k!=0){
								
								foreach($csv_data as $k_csv=> $c_data){
									$csv_arr['batch']=$csv_data[2];
									$csv_arr['date']=$csv_data[3];
									$csv_arr['sem']=$csv_data[5];
										
									if($k_csv>6){
										
										$csv_arr[$csv[0][$k_csv]]=$csv_data[$k_csv];
										//$csv_arr['Assignment 1']=$csv_data[$k_csv];
										//$csv_arr['Assignment 2']=$csv_data[$k_csv];
									}
								}

								$csv_array[$csv_data[0]][$csv_data[4]][$csv_data[1]][$csv_data[6]]=$csv_arr;
							    }
							}
						}
						else{
							echo '<script> alert("File must contain atleat one row");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_result&action=resultbulk"} </script>';
			//echo "".$sub_Srow['name']." exam (".$exam_name.")Obtained Marks is greater than given total marks";
						    exit();
						}
						/**/

						$count=0;
						
						$InsERQuery = 'INSERT INTO te_exam_result (id,name, date_entered, date_modified, status,total_marks,total_prsent,te_te_subject_id_c,te_student_id_c,description,semester_id,order_sequence,student_batch_id) VALUES ';
						$InsERArr = [];

						$InsERMarksQuery = 'INSERT INTO te_exammarks (id,name, date_entered, date_modified, exam_type,total_marks,total_persent) VALUES ';
						$InsERMarksArr = [];

						$InsERMarksRelQuery = 'INSERT INTO te_exam_result_te_exammarks_c (id,date_modified,te_exam_result_te_exammarkste_exam_result_ida,te_exam_result_te_exammarkste_exammarks_idb) VALUES ';
						$InsERMarksRelArr = [];
	//echo "<pre>";
//print_r($csv_array);die;
foreach($csv_array as $institute => $ins_arr){
	
	foreach($ins_arr as $course => $course_arr){
		
		if(!$course){
			echo '<script> alert("CSV File format is Wrong!! Fields are not arranged properly");callPage(); function 	callPage(){ window.location.href="index.php?module=te_Exam_result&action=resultbulk"} </script>';
					//echo "".$sub_Srow['name']." exam (".$exam_name.")Obtained Marks is greater than given total marks";
			exit();	
		}
		
		/** Institute Id*/
		$ins_Srow=$this->institute($institute,$course);
		//print_r($ins_Srow);die;
		/** Exam Scheme Info*/
		$schm_Srow=$this->examScheme($ins_Srow['institute_id'],$ins_Srow['course_id']);
		
		$marksrow=$this->getMarkValues($schm_Srow['scheme_id']);
		
		if($schm_Srow['scheme_id']){
		foreach($course_arr as $enroll_id => $data_arr){
			
			if(!$enroll_id){
				echo '<script> alert("CSV File format is Wrong!! Fields are not arranged properly");callPage(); function 	callPage(){ window.location.href="index.php?module=te_Exam_result&action=resultbulk"} </script>';
						//echo "".$sub_Srow['name']." exam (".$exam_name.")Obtained Marks is greater than given total marks";
				exit();
				
			}

			$studentid=$this->student($enroll_id);

			if($studentid){

				foreach($data_arr as $sub_code=>$data_info){
					$fail=0;
					$is_marks=0;
					$zerocal=0;
					/** Array of subject marks */
					foreach($data_info as $k=>$data){
						if($k!='batch' && $k!='sem' && $k!='date')
							$examinfo['marks'][$k]=$data;
					}


					$subjectdata=$this->subjectInfo($sub_code);

					$sub_id=$subjectdata['id'];
					$over_all_total_marks=$subjectdata['overall_total_marks'];
					$overall_passing_marks=$subjectdata['overall_passing_marks'];

					/** Semester Details*/

					$sem_name =$this->semester_info($sub_id,$ins_Srow['course_id']);

					$subjectarr=$this->examBook($enroll_id,$sub_id);

					//if($subjectarr['examId']){
						foreach($examinfo['marks'] as $exam_name=>$marks){
							foreach($marksrow as $valuerow){
								if($valuerow['name']==$exam_name){
									$weight_prsent= $valuerow['min_marks'];
									$total_marks= $valuerow['total_marks'];
									$passing_marks=$valuerow['passing_prsent'];	

									if($marks>$total_marks){
										echo '<script> alert("'.$sub_Srow['name']. ' exam Marks Not in required range!!");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_result&action=resultbulk"} </script>';
									}
									
									if($marks>=$passing_marks){
										$status='Pass';                
									}
									
									if($marks!=0){
										$is_marks=1;
										if($marks<$passing_marks){
											$fail=1;
											$status='Fail';
										}
									}
									else{
										$zerocal++;
									}
									
									
									/** calculate percentage */
					   
									$main=($marks/$total_marks)*100;

									$weightage=($over_all_total_marks*$weight_prsent)/100;

									/** calculate final Marks */
								   
									$final_value=($weightage*$main)/100;

									$marks_array[$sub_id][$exam_name]['score']=round($final_value,2);
									$marks_array[$sub_id][$exam_name]['score_prcnt']=$main;
									
									$marks_array[$sub_id]['status']=$status;
									if($fail==1){ 
										$marks_array[$sub_id]['status']='Fail';
									}	
									/*if($fail=='NA'){
										$marks_array[$sub_id]['status']='TBD';
									}*/
								}
							}			
						}/** end of examname marks array calculation*/
					
						$insERID = create_guid();
		
						foreach($marks_array as $sub_id=> $marks){
							$format['total_marks']=0;
							$status=$marks['status'];
							$subject_ID=$sub_id;
							foreach($marks as $km=>$m){
								if($km!='status')
									$format['total_marks']+=$m['score'];	    	
							}
						}
						
						if($status=='Pass'){
							if($format['total_marks']<$overall_passing_marks){
								$status='Fail';
							}
						}
						
						if($zerocal>0 && $is_marks==0){
							$status='TBD';
						}

						$total_percent=($format['total_marks']/$over_all_total_marks)*100;
			
						$check_result_data="select `id` from te_exam_result where  te_student_id_c='".$studentid['id']."' AND te_te_subject_id_c='".$subject_ID."' and deleted=0";
			   
						$check_result_data_array=$db->query($check_result_data);
						
						$check_result_data=$db->fetchByAssoc($check_result_data_array);
						
			   		
						if(!$check_result_data_array->num_rows){
							
							$InsERArr[] = "('".$insERID."','".$enroll_id."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$status."','".$format['total_marks']."','".$total_percent."','".$subject_ID."','".$studentid['id']."','A','".$sem_name['id']."','".$sem_name['order_sequence']."','".$studentid['student_batchid']."')";

				$ExamSql = "UPDATE te_exammanager SET date_modified='".date('Y-m-d H:i:s')."',exam_status='".$status."' WHERE id='".$subjectarr['examId']."'";
				$Queryupdate=$GLOBALS['db']->query($ExamSql);

				
							foreach($marks as $km=>$m){
								if($km!='status'){
									$insERMarksID = create_guid();
									$InsERMarksRelID = create_guid();
									
									$InsERMarksArr[] = "('".$insERMarksID."','".$enroll_id."','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$km."','".$m['score']."','".$m['score_prcnt']."')";
									
									$InsERMarksRelArr[]= "('".$InsERMarksRelID."','".date('Y-m-d H:i:s')."','".$insERID."','".$insERMarksID."')";
									
								}
							}
						
						}
						else{		
						
							$ExamIns = "UPDATE te_exam_result SET status='".$status."',total_marks='".$format['total_marks']."',total_prsent='".$total_percent."' WHERE id='".$check_result_data['id']."' AND deleted=0";
							$Queryupdate=$GLOBALS['db']->query($ExamIns);
							
							$te_exam_result=BeanFactory::getBean('te_Exam_result',$check_result_data['id']);

							$te_exam_result->load_relationship('te_exam_result_te_exammarks');
							$assesment=$te_exam_result->te_exam_result_te_exammarks->getBeans();
							//sprint_r($assesment);
							foreach($marks as $km=>$m){
								foreach($assesment as $key=>$val)
								{
									if($val->exam_type==$km){
										//echo $val->id;
										$ExamMarks = "UPDATE te_exammarks SET total_marks='".$m['score']."',total_persent='".$m['score_prcnt']."' WHERE id='".$val->id."' AND deleted=0";
										$Queryupdatemarks=$GLOBALS['db']->query($ExamMarks);
									}
								}
							}
							//die("df");
							
							/*foreach($marks as $km=>$m){
								if($km!='status'){
									/*$insERMarksID = create_guid();
									$InsERMarksRelID = create_guid();
									
									$InsERMarksQuery = 'INSERT INTO te_exammarks (id,name, date_entered, date_modified, exam_type,total_marks,total_persent) VALUES ';
									$InsERMarksArr = [];

									$InsERMarksRelQuery = 'INSERT INTO te_exam_result_te_exammarks_c (id,date_modified,te_exam_result_te_exammarkste_exam_result_ida,te_exam_result_te_exammarkste_exammarks_idb) VALUES ';
									$InsERMarksRelArr = [];
									
									$InsERMarksRelQuery="UPDATE te_exammarks SET ";
									
									$InsERMarksArr[] = "('".$insERMarksID."','name','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."','".$km."','".$m['score']."','".$m['score_prcnt']."')";
									
									$InsERMarksRelArr[]= "('".$InsERMarksRelID."','".date('Y-m-d H:i:s')."','".$insERID."','".$insERMarksID."')";
									
								}
							}*/
							
							$ExamSql = "UPDATE te_exammanager SET date_modified='".date('Y-m-d H:i:s')."',exam_status='".$status."' WHERE id='".$subjectarr['examId']."'";
							$Queryupdate=$GLOBALS['db']->query($ExamSql);
						}
						unset($marks_array);
						$count++;
					//}
					
				}/**end of sub_code array */
			}/** end of student Id */	
		}/** end of student enrollId*/	
		}
	}/** end of $course*/
}/** end of institute array */

/*echo "<pre>";

print_r($InsERArr);

print_r($InsERMarksArr);

print_r($InsERMarksRelArr);

die;*/

$InsERQuery .=implode(',',$InsERArr);
$InsERMarksQuery .= implode(',',$InsERMarksArr);
$InsERMarksRelQuery .= implode(',',$InsERMarksRelArr);

$Queryresult=$GLOBALS['db']->Query($InsERQuery);
$Querymarks=$GLOBALS['db']->Query($InsERMarksQuery);
$Queryrel=$GLOBALS['db']->Query($InsERMarksRelQuery);


if($count>0){
	echo '<script> alert("File Successfully Uploaded");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_result&action=index"} </script>';
}
		
					}
					$sugarSmarty = new Sugar_Smarty();
					$sugarSmarty->assign("examList",$examList);
					$sugarSmarty->assign("docsnum",$docsnum);
					$sugarSmarty->assign("documentifo",$documentifo);
					$sugarSmarty->display('custom/modules/te_Exam_result/tpls/resultexport.tpl');
			}


function student($enroll_id){
	global $db;

	$student_info="SELECT s.id AS id,sb.id as student_batchid FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb WHERE s.deleted=0 AND s.`registration_no`='".$enroll_id."'";
	$std=$db->query($student_info);

	$studentid =$db->fetchByAssoc($std);


	return $studentid ;
}

function examBook($enroll_id,$sub_id){
	global $db;
	
	$sqls="SELECT subj.subject_code AS subjectcode, subj.overall_passing_marks, subj.overall_total_marks, exam.id AS examId, exam.exam_date AS examdate, exam.description, exam.subject, exam.city, exam.state, exam.te_student_id_c, exam.examnation_time, exam.exam_status, subj.name AS subjectName FROM `te_exammanager` AS exam INNER JOIN te_subjects_master AS subj ON exam.subject = subj.id WHERE exam.deleted = 0 AND exam.exam_status = 'Active' AND exam.name ='".$enroll_id."' AND exam.subject='".$sub_id."'";
	
	$studentObj =$db->query($sqls);
	
	return $subjectarr =$db->fetchByAssoc($studentObj);
	
}


function semester_info($sub_id,$prog_id){
	
	global $db;
	
	$sem_info=" SELECT subj.name,subj.id,subj.order_name,t_sbj.te_subjects_master_te_te_semester_1te_subjects_master_ida as subject_id FROM (SELECT t_sem.name,t_sem.id,t_sem.order_name from te_te_semester t_sem INNER JOIN te_pr_programs_te_te_semester_1_c prog_sem ON t_sem.id=prog_sem.te_pr_programs_te_te_semester_1te_te_semester_idb where prog_sem.te_pr_programs_te_te_semester_1te_pr_programs_ida='".$prog_id."') subj INNER JOIN te_subjects_master_te_te_semester_1_c t_sbj ON subj.id=t_sbj.te_subjects_master_te_te_semester_1te_te_semester_idb where t_sbj.te_subjects_master_te_te_semester_1te_subjects_master_ida='".$sub_id."'  GROUP BY subj.name;";
	$get_sem_info=$db->query($sem_info);
	
	return $sem_name =$db->fetchByAssoc($get_sem_info);

}


function getMarkValues($schm_Srow){
	
	global $db;
	
	$type="select et.name,et.passing_prsent,et.total_marks,et.min_marks from (select `etes`.`te_exam_types_te_exam_schemete_exam_types_idb` as `type_id` from te_exam_types_te_exam_scheme_c etes INNER JOIN te_exam_scheme es ON etes.te_exam_types_te_exam_schemete_exam_scheme_ida=es.id where
	etes.te_exam_types_te_exam_schemete_exam_scheme_ida='".$schm_Srow."' and es.deleted=0) rel_type INNER JOIN te_exam_types et ON rel_type.type_id=et.id ";
				   
	$examtype=$db->query($type);
   
	while($Srow =$db->fetchByAssoc($examtype)){
		$MarkValues[]=$Srow;
	}
	return $MarkValues;
	
	
}

function subjectInfo($sub_code) {
	global $db;

	$subject_info="select `id`,`overall_total_marks`,`name`,`overall_passing_marks` from te_subjects_master where subject_code='".$sub_code."' and deleted=0";
        $subject=$db->query($subject_info);
        return $sub_Srow =$db->fetchByAssoc($subject);
}

 /** Get Institite Id */
function institute($institute,$course){
	
	global $db;
	$sql="Select prog.id as course_id,ins_prog.id as institute_id from (Select ins.id,inp.te_in_institutes_te_pr_programs_1te_pr_programs_idb as course_id from (select `id` from te_in_institutes where institute_code='".$institute."' and deleted=0 ) ins INNER JOIN te_in_institutes_te_pr_programs_1_c inp ON ins.id=inp.te_in_institutes_te_pr_programs_1te_in_institutes_ida) ins_prog INNER JOIN te_pr_programs prog ON ins_prog.course_id=prog.id where prog.course_code='".$course."'";
	$inst_id=$db->query($sql);
        return $ins_Srow =$db->fetchByAssoc($inst_id);  
}

 /** Get Exam Scheme Id*/
function examScheme($ins_Srow,$course){
	global $db;
	
    $scheme="select `id`,`program_lising` from te_exam_scheme where te_in_institutes_id_c='".$ins_Srow."' and is_active='1' and deleted=0";
    $scheme_id=$db->query($scheme);
		//$Srow =$db->fetchByAssoc($scheme_id);
	while($Srow =$db->fetchByAssoc($scheme_id)){
		
		$progrmaIds=$Srow['program_lising'];
		#$prog=array();
		$progrmString=str_replace("^","",$progrmaIds);
		$programArry=explode(",",$progrmString);
		
		foreach($programArry as $course_arr){
			$progrm_id[$Srow['id']][]	=$course_arr;	
		}
	}
	
	$scm=0;
	foreach($progrm_id as $key=>$program){
		if(in_array($course,$program)){
			$scm++;
			$scheme_data['course_id']=$course;
			$scheme_data['scheme_id']=$key;
			
			return $scheme_data;
		}
	}
	if($scm==0){
		
		echo '<script> alert("For Given Course Exam Scheme is not Active!!");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam_result&action=resultbulk"} </script>';
		
	}
}



		}
?>
