<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
class te_student_batchViewDocuments extends SugarView {
	
		public function __construct() {
			parent::SugarView();
		}
		/* To Display The Examschedules */
		
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
			$selected_exams = '';
			$reportDataList=array();
			$search_date="";
			$index=0;
			if($_REQUEST['proid']){
				$ProgramID= $_REQUEST['proid'];
				$sqls="SELECT m.name,m.id FROM te_masterdocument As m INNER JOIN te_masterdocument_te_pr_programs_c AS ms ON m.id=ms.te_masterdocument_te_pr_programste_masterdocument_idb WHERE m.deleted=0 AND ms.deleted=0 AND ms.te_masterdocument_te_pr_programste_pr_programs_ida='".$ProgramID."'";
				
							$ProgramObj =$db->query($sqls);
							$documentifo=array();
							$documentname=array();
							while($Srow =$db->fetchByAssoc($ProgramObj)){ 
								  $documentifo[]=$Srow;
								  $documentname[]=$Srow['name'];
							}
			}			
			$docsnum=count($documentname);	
			if(isset($_POST['button']) && $_POST['button']=="Submit"){
							
						$errors= array();
						$fileCount = count($_FILES['files']['tmp_name']);
						
						
						}
							foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
								$file_name = rand(1000,100000)."-".$_FILES['files']['name'][$key];
								$file_size =$_FILES['files']['size'][$key];
								$file_tmp =$_FILES['files']['tmp_name'][$key];
								$file_type=$_FILES['files']['type'][$key];	
								if($file_size > 2097152){
								   $errors[]='File size must be less than 2 MB';
								}
								$desired_dir="custom/modules/te_student_batch/uploads/";
								$query="INSERT into tbl_uploads (`file`,`size`,`type`) VALUES('$desired_dir'"."'$file_name','$file_size','$file_type'); ";
								#$desired_dir="custom/modules/te_student_batch/uploads/";
								if(empty($errors)==true){
									if(is_dir($desired_dir)==false){
										mkdir("$desired_dir", 0700);// Create directory if it does not exist
									}
									if(is_dir("$desired_dir/".$file_name)==false){
										move_uploaded_file($file_tmp,"custom/modules/te_student_batch/uploads/".$file_name);
									}else{					//rename the file if another one exist
										$new_dir="custom/modules/te_student_batch/uploads/".$file_name.time();
										 rename($file_tmp,$new_dir) ;				
									}
								   $QueryInSR=$GLOBALS['db']->Query($query);		
								}else{
										print_r($errors);
								}
							}
							if(empty($error)){
								echo "Success";
							}
						

			if(isset($_POST['button']) && $_POST['button']=="Submit12"){			
					#$target_dir = "uploads/";
					#$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					#foreach($_FILES['file']['name'] as $doc_val){
					#print_r($doc_val);
					
						$file = rand(1000,100000)."-".$_FILES['file']['name'];
						$file_loc = $_FILES['file']['tmp_name'];
						$file_size = $_FILES['file']['size'];
						$file_type = $_FILES['file']['type'];
						$fileCount = count($_POST['file']);
						$fileCount;
						$folder='custom/modules/te_student_batch/uploads/';
						
						// new file size in KB
						$new_size = $file_size; 
						
						// make file name in lower case
						$new_file_name = strtolower($file);
						// make file name in lower case
						$final_file=str_replace(' ','-',$new_file_name);
						if(move_uploaded_file($file_loc,$folder.$final_file))
						{
							$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
							$QueryInSR=$GLOBALS['db']->Query($sql);
							#$sqlR = "INSERT INTO te_examschedules_te_exam_date_schedules_1_c (id,date_modified,te_examschb597hedules_idb,te_examschedules_te_exam_date_schedules_1te_examschedules_ida) VALUES ";
							?>
							<script>
							alert('successfully uploaded');
							</script>
							<?php
						}
						else
						{
							
							?>
							<script>
							alert('Error');
							</script>
							<?php

						}
			
			#}			
			
				} //End isset
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
						$sugarSmarty->assign("documentifo",$documentifo);
						$sugarSmarty->display('custom/modules/te_student_batch/tpls/documents.tpl');
	}
}
?>
