<?php /* Code Date 14-Jan-2018 By-Mniash Kumar Code For insert Exam marks */ 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
require_once('include/MVC/View/SugarView.php');
class te_ExamViewCreateexam extends SugarView {
	
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
			$reportDataList=array();
			$search_date="";
			$index=0;
			$institute=$this->getinstitute();
		
			/** IF CLICK ON SAVE BUTTON */
			if(isset($_POST['button']) && $_POST['button']=="SAVE" && $_REQUEST['form']==002){

				$form=$_REQUEST['form'];
				
				$exam_name=$_POST['name'];
				
				if (!array_key_exists("subject",$_POST))
				{
					
					$batchSql="select `subj`.`id` FROM (SELECT `smsj`.`te_te_subject_te_te_semesterte_te_subject_idb` as `id` FROM `te_te_semester` `sem` INNER JOIN `te_te_subject_te_te_semester_c` `smsj` ON `sem`.`id` =`smsj`.`te_te_subject_te_te_semesterte_te_semester_ida` where `sem`.`id` IN ('" . implode("', '",$_POST['semesters']) . "')) as `sem_sj` INNER JOIN `te_te_subject` `subj` ON `sem_sj`.`id`= `subj`.`id`";
					
					$batchObj =$db->query($batchSql);
					$subject=array();
					while($row =$db->fetchByAssoc($batchObj)){
						$subject[]=$row;
					}
					foreach($subject as $k=>$sub){
						$_POST['subject'][$k]=$sub['id'];
					}
				}
				
				$course=json_encode($_POST['course']);
				$batch=json_encode($_POST['batch']);
				$subject=json_encode($_POST['subject']);
				$semester=json_encode($_POST['semesters']);
				$insERMarksID = create_guid();
				
				$slot_value=count($_POST['slot']);
			
				if($slot_value>2){
					for($i=1;$i<=($slot_value/2);$i++){
						$slots[]=$_POST['slot']['start_time_'.$i.''].'-'.$_POST['slot']['end_time_'.$i.''];
					}
				}
				else{
					for($i=0;$i<1;$i++){
						$slots[]=$_POST['slot']['start_time_'.$i.''].'-'.$_POST['slot']['end_time_'.$i.''];
					}
				}
			
				$listdates=$_POST['listdate'];
				
				$listdates=implode(',',$listdates);
				
				$slots=implode(',',$slots);
				
				$date = new DateTime($_POST['from_date']);
				$from_date=$date->format('Y-m-d');
				
				$date = new DateTime($_POST['to_date']);
				$to_date=$date->format('Y-m-d');
				 
				$InsERQuery = 'INSERT INTO te_exam (id,name, description, date_modified,deleted,te_in_institutes_id_c,start_date,end_date,allow_student_submit_choices,number_of_slots,list_date,program,batch_val,Subject_val,semester_val,slots) VALUES ';
				
				$InsERQuery.= "('".$insERMarksID."','".$_POST['name']."','".$_POST['description']."','".date('Y-m-d H:i:s')."','0','".$_POST['university']."','".$from_date."','".$to_date."','".$_POST['submit_choice']."','".$_POST['number_of_slots']."','".$listdates
				."','".$course."','".$batch."','".$subject."','".$semester."','".$slots."')";
				$GLOBALS['db']->Query($InsERQuery);
				unset($InsERQuery);
				//echo "Result Saved!!";
				echo '<script> alert("You have Sucessfully Saved your Exam Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam&action=index"} </script>';
				
			}

			/** IF CLICK ON PUBLISH BUTTON */
			if(isset($_POST['button']) && $_POST['button']=="PUBLISH" && $_REQUEST['form']==002){
				
				$form=$_REQUEST['form'];
				
				$exam_name=$_POST['name'];
				
				$validate=1;
				/** INSERT DATA TO EXAM TABLE*/
				
				if (!array_key_exists("subject",$_POST))
				{
					//$batchSql="select `subj`.`id` FROM (SELECT `smsj`.`te_te_subject_te_te_semesterte_te_subject_idb` as `id` FROM `te_te_semester` `sem` INNER JOIN `te_te_subject_te_te_semester_c` `smsj` ON `sem`.`id` =`smsj`.`te_te_subject_te_te_semesterte_te_semester_ida` where `sem`.`id` IN ('" . implode("', '",$_POST['semesters']) . "')) as `sem_sj` INNER JOIN `te_te_subject` `subj` ON `sem_sj`.`id`= `subj`.`id`";
					
					$batchSql="select `subj`.`name`,`subj`.`id` FROM (SELECT `smsj`.`te_subjects_master_te_te_semester_1te_subjects_master_ida` as `id` FROM `te_te_semester` `sem` INNER JOIN `te_subjects_master_te_te_semester_1_c` `smsj` ON `sem`.`id` =`smsj`.`te_subjects_master_te_te_semester_1te_te_semester_idb` where `sem`.`id`IN ('" . implode("', '",$_POST['semesters']) . "')) as `sem_sj` INNER JOIN `te_subjects_master` `subj` ON `sem_sj`.`id`= `subj`.`id`";
					$batchObj =$db->query($batchSql);
					$subject=array();
					while($row =$db->fetchByAssoc($batchObj)){
						$subject[]=$row;
					}
					foreach($subject as $k=>$sub){
						$_POST['subject'][$k]=$sub['id'];
					}
				}
				
				$course=json_encode($_POST['course']);
				$batch=json_encode($_POST['batch']);
				$subject=json_encode($_POST['subject']);
				$semester=json_encode($_POST['semesters']);
				$insERMarksID = create_guid();
				
				$slot_value=count($_POST['slot']);
			
				if($slot_value>2){
					for($i=1;$i<=($slot_value/2);$i++){
						$slots[]=$_POST['slot']['start_time_'.$i.''].'-'.$_POST['slot']['end_time_'.$i.''];
					}
				}
				else{
					for($i=0;$i<1;$i++){
						$slots[]=$_POST['slot']['start_time_'.$i.''].'-'.$_POST['slot']['end_time_'.$i.''];
					}
				}
			
				$listdates=$_POST['listdate'];
				
				$listdate=implode(',',$listdates);
				
				$slot=implode(',',$slots);
				
				$date = new DateTime($_POST['from_date']);
				$from_date=$date->format('Y-m-d');
				
				$date = new DateTime($_POST['to_date']);
				$to_date=$date->format('Y-m-d');
				
				$sql="select * from te_exam where (te_in_institutes_id_c='".$_POST['university']."' AND (start_date='".$from_date."' AND end_date='".$to_date."'))";
				$exam_details_check=$db->query($sql);
		
				//print_r($exam_details_check);
		
				if($exam_details_check->num_rows>1){
					
					$validate=0;
					//echo '<script> alert("You have Sucessfully Saved your Exam Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam&action=index"} </script>';
				}
				
				$InsERQuery = 'INSERT INTO te_exam (id,name, description, date_modified,deleted,te_in_institutes_id_c,start_date,end_date,allow_student_submit_choices,number_of_slots,list_date,program,batch_val,Subject_val,semester_val,slots,status) VALUES ';
				
				$InsERQuery.= "('".$insERMarksID."','".$_POST['name']."','".$_POST['description']."','".date('Y-m-d H:i:s')."','0','".$_POST['university']."','".$from_date."','".$to_date."','".$_POST['submit_choice']."','".$_POST['number_of_slots']."','".$listdate
				."','".$course."','".$batch."','".$subject."','".$semester."','".$slot."','1')";
				
				if($validate==1){
					$GLOBALS['db']->Query($InsERQuery);
					unset($InsERQuery);
				}
				
				/** INSERT DATA TO EXAM DETAILS*/
				
				$result=array();
					
				foreach($_POST['course'] as $course_name){
					foreach($_POST['batch'] as $batch_name){
						$b_value=$batch_name;
					}
					foreach($_POST['semesters'] as $sem){
						
						//echo $sem;
						$batchSql="select `subj`.`name`,`subj`.`id` FROM (SELECT `smsj`.`te_subjects_master_te_te_semester_1te_subjects_master_ida` as `id` FROM `te_te_semester` `sem` INNER JOIN `te_subjects_master_te_te_semester_1_c` `smsj` ON `sem`.`id` =`smsj`.`te_subjects_master_te_te_semester_1te_te_semester_idb` where `sem`.`id`='{$sem}') as `sem_sj` INNER JOIN `te_subjects_master` `subj` ON `sem_sj`.`id`= `subj`.`id`";
	
						$batchObj =$db->query($batchSql);
						$subject=array();
						while($row =$db->fetchByAssoc($batchObj)){
							$subject[]=$row;
						}
						
						foreach($subject as $sub){
							$result['course_name']=$course_name;
							$result['batch']=$batch_name;
							$result['semester']=$sem;
							$result['sub']=$sub['id'];
							
							$data[]=$result;
							
						}
					}
				}
				
				//print_r($data);die;
				if($validate==1){	
					$Examdetails = 'INSERT INTO te_exams_details (id,date_modified,deleted,course,batch,semeters,subjects,start_date,exam_slots) VALUES ';
					
					$Examdetails_relation='INSERT INTO te_exams_details_te_exam_c (id,date_modified,deleted,te_exams_details_te_examte_exam_ida,te_exams_details_te_examte_exams_details_idb) VALUES ';
					
					foreach($data as $data_value){
						
						$exam_details_ID = create_guid();
					
						$Examdetail[]= "('".$exam_details_ID."','".date('Y-m-d H:i:s')."','0','".$data_value['course_name']."','".$data_value['batch']."','".$data_value['semester']."','".$data_value['sub']."','".$listdate."','".$slot."'
						)";
						
						$Examdetail_relation[]="('".$exam_details_ID."_32','".date('Y-m-d H:i:s')."','0','".$insERMarksID."','".$exam_details_ID."')";
					}
					
					$Examdetails.=implode(',',$Examdetail);
					
					$Examdetails_relation.=implode(',',$Examdetail_relation);
					
					$data_error=$GLOBALS['db']->Query($Examdetails);
				
					$GLOBALS['db']->Query($Examdetails_relation);
					
					echo '<script> alert("You have Sucessfully Saved your Exam Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam&action=index"} </script>';
				}
				else
					echo '<script> alert("Already exist with same details !");callPage(); function callPage(){ window.location.href="index.php?module=te_Exam&action=index"} </script>';
			
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
			$sugarSmarty->assign("courseprograms",$courseprograms);
			$sugarSmarty->assign("studentifoCount",$studentifoCount);
			
			$sugarSmarty->display('custom/modules/te_Exam/tpls/createexam.tpl');
		}
}
?>
