<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/Email/sendmail.php'); 
class te_student_batchViewDocuments extends SugarView {
	
		public function __construct() {
			parent::SugarView();
		}
		/* To Display The Examschedules */
		public function display() {
			global $db ,$current_user;
			#Get Exam drop down option
			$selected_exams = '';
			$reportDataList=array();
			$search_date="";
			$index=0;
			if(isset($_REQUEST['proid']) && !empty($_REQUEST['proid'])){
				$ProgramID= $_REQUEST['proid'];
				$_SESSION['progID']=$_REQUEST['proid'];
				$_SESSION['studentid']=$_REQUEST['record'];
				$studentid=$_SESSION['studentid'];	
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
							$studentid=$_SESSION['studentid'];	
			if(isset($_POST['button']) && $_POST['button']=="Submit"){
						$errors= array();
						$fileCount = count($_FILES['files']['tmp_name']);
						foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
								$doc=$_POST['docname'][$key];
								#$file_name = rand(1000,100000)."-".$_FILES['files']['name'][$key];
								$Origfile_name = $_FILES['files']['name'][$key];
								$file_name = $doc.$_FILES['files'][$key];
								$file_size =$_FILES['files']['size'][$key];
								$file_tmp =$_FILES['files']['tmp_name'][$key];
								$file_type=$_FILES['files']['type'][$key];	
								if($file_size > 2097152){
								   $errors[]='File size must be less than 2 MB';
								}
								
								#$desired_dir="custom/modules/te_student_batch/uploads/";
								$desired_dir="upload/";
								#$query="INSERT into tbl_uploads (`file`,`size`,`type`,`studentid`) VALUES('$desired_dir"."$file_name','$file_size','$file_type','$studentid')";
								$_SESSION['cid']=create_guid();
								$query1="INSERT into te_uploaddocument (`id`,`date_entered`,`document_name`,`filename`,`file_mime_type`,`status_id`,`program_id`,`student_id`) VALUES('".$_SESSION['cid']."','".date('Y-m-d H:i:s')."','$file_name','$Origfile_name','$file_type','Under Review','".$_SESSION['progID']."','".$studentid."')";
								$query2="INSERT into te_uploaddocument_te_student_batch_c (`id`,`date_modified`,`te_uploaddocument_te_student_batchte_student_batch_ida`,`te_uploaddocument_te_student_batchte_uploaddocument_idb`) VALUES('".create_guid()."','".date('Y-m-d H:i:s')."','$studentid','".$_SESSION['cid']."')";
								#$desired_dir="custom/modules/te_student_batch/uploads/";
								if(empty($errors)==true){
									if(is_dir($desired_dir)==false){
										mkdir("$desired_dir", 0700);// Create directory if it does not exist
									}
									if(is_dir("$desired_dir/".$file_name)==false){
										move_uploaded_file($file_tmp,"upload/".$_SESSION['cid']);
									}else{					//rename the file if another one exist
										#$new_dir="custom/modules/te_student_batch/uploads/".$file_name.time();
										$new_dir="upload/".$file_name.time();
										 rename($file_tmp,$new_dir) ;				
									}
								   #$QueryInSR=$GLOBALS['db']->Query($query);
								   $QueryInSR1=$GLOBALS['db']->Query($query1);	
								   $QueryInSR2=$GLOBALS['db']->Query($query2);	
								}
									else{
										print_r($errors);
									}
							}
							if($QueryInSR1){
								unset($studentid);
								unset($_SESSION['cid']);
								unset($_SESSION['progID']);
							echo '<script> alert("You have Sucessfully Uploded your Dcouments Thanks !");callPage(); function callPage(){ window.location.href="index.php?module=te_student_batch&action=index"} </script>';
							exit();
							}
						}
						$sugarSmarty = new Sugar_Smarty();
						$sugarSmarty->assign("examList",$examList);
						$sugarSmarty->assign("docsnum",$docsnum);
						$sugarSmarty->assign("documentifo",$documentifo);
						$sugarSmarty->display('custom/modules/te_student_batch/tpls/documents.tpl');
	}
}
?>
