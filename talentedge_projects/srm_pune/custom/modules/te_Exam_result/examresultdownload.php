<?php
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
require_once 'include/entryPoint.php';
require_once('modules/ACL/ACLController.php');
?>
<!DOCTYPE html>
<html>
		<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<title>Exam Result</title>
				
				<style type="text/css">
				.modalContentpop th, .modalContentpop td {
					border: none;
					padding: 0;
					
				}
				.modalContentpop {
					background-color: #fff;
					border-bottom-right-radius: 0px ;
					border-bottom-left-radius: 0px ;
					padding: 10px 30px ;
					overflow: auto;
					min-height:none ;
					border:1px solid #d7d7d7;
					border-radius: 0 0 4px 4px;
				}
				hr{border:1px solid #d7d7d7; border-bottom:0px none;}
				.modalContentpop input[type=text]{
					width: 100%;
					box-sizing:border-box;
					margin:0;
					font-size:12px;
					padding:7px 10px;
					border:2px solid #d7d7d7; 
					border-radius:5px;
				}
				.enroll-table{ width: 76%;  margin: auto;}
				.modalContentpop .label-td{width:28%; white-space: nowrap;}
				.modalContentpop input[type=text]:focus{box-shadow:0 0 4px #d7d7d7; outline:0px none;}
				.modalContentpop select {
					width: 100%;
				}
				.modalContentpop textarea {
					width: 100%;
				}
				.dumbBoxpop {
					width: 80% ;
					position: relative;
					margin: 0 auto;
					background-color: white ;
					padding:0px;
					border: 0px solid #009688;
					border-radius: 0px ;
					background-color:#f5f2f2;
				}
				.modalHeaderpop h4 {
					margin: 0 ;
					font-size: 17px;
					color: #333;
				}
				.closeModalpop {
					top: 7px ;
				}
				.head_textpop {
					display: inline-block;
					max-width: 100%;
					margin-top: 8px;
					font-weight: 700;
					font-size:14px;
				}
				.modalHeaderpop {
					background: #f5f5f5 none repeat scroll 0 0 ;
					border-top-left-radius: 0px ;
					border-top-right-radius: 0px ;
					border: 1px solid #ddd;
					text-align: -webkit-center;
					text-align: center;
					padding: 15px ;
					border-bottom:0px none;
					border-radius:4px 4px 0 0;
				}
				.vertical-offsetpop {
					width: 85% ;
				}
				.buttonpop {
					background-color: #ef5350 ;
					margin: 10px 0px ;
					padding: 10px 115px ;
					font-size: 16px ;
				}
				.button {
					background-color: #0356ad ;
					margin: 10px 0px ;
					padding: 9px 10px ;
					font-size: 12px;
					color:#fff;
					border:1px solid  #0356ad; border-radius:4px;
					box-sizing: border-box; width: 100%;
					text-transform:uppercase
				}
				.button:hover{border:1px solid  #0356ad; background-color: transparent;color:#0356ad; cursor:pointer;}
				.text {
					margin:  7px 0px ;
					padding: 6px 21px ;
					font-size: 20px  ;
				}
				
				.dumbBoxWrap table label{color:#000; font-size:16px; font-weight:bold;}
				.dumbBoxWrap{font-family:Arial, Helvetica, sans-serif}
				hr {border: 1px solid #d7d7d7;border-bottom: 0px none;  margin: 0;}
				.list-content-table {font-size:13px; display:flex; flex-direction:row; margin-top:20px; border-top:1px solid #e7e7e7; padding-top:20px; width:100%; flex-wrap:wrap; margin:20px 0 0;}
				.list-content-table .block{ margin-bottom:15px; color:#999; width:33%;}
				.list-content-table .block:first-child{ margin-bottom:0;}
				.list-content-table strong{font-size:13px; margin-right:10px; color:#333}
				.no-content-message{ text-align:center; font-size: 13px; color: #666;  background-color: #f7f7f7; padding: 18px; margin-top: 15px;}
				
				.search-form-table{border:1px solid #e7e7e7; border-collapse:collapse; margin-top:20px;}	
				.search-form-table th{font-size:12px; background-color:#cecece; color:#333; padding:10px; border: 1px solid transparent;}
				.search-form-table td{font-size:12px; color:#333; padding:10px; vertical-align: middle; border: 1px solid #ddd; text-align:center;}
				.search-form-table select{font-size:12px; padding:5px; margin:0;}
				.search-form-table td input[type="checkbox"]{ margin:0 5px 0 0;}
				
				.actions-buttons{ display:flex; width:100%; justify-content:flex-end; margin:20px 0;}
				.actions-buttons .button{width:auto; margin:0; margin-left:15px;  text-decoration:none;}
				.actions-buttons .button:first-child{ margin-left:0;}
				</style>
				<script type="text/javascript">
				Calendar.setup ({
				   inputField : "date_of_prospect_date_d",
				   daFormat : "%Y-%m-%d %I:%M%P",
				   button : "date_of_prospect_trigger_d",
				   singleClick : true,
				   dateStr : "",
				   step : 1,
				   weekNumbers:false,
				});

				Calendar.setup ({
				   inputField : "date_of_callback_date_d",
				   daFormat : "%Y-%m-%d %I:%M%P",
				   button : "date_of_callback_trigger_d",
				   singleClick : true,
				   dateStr : "",
				   step : 1,
				   weekNumbers:false,
				});


				Calendar.setup ({
				   inputField : "date_of_followup_date_d",
				   daFormat : "%Y-%m-%d %I:%M%P",
				   button : "date_of_followup_trigger_d",
				   singleClick : true,
				   dateStr : "",
				   step : 1,
				   weekNumbers:false,
				});
				
				</script></head>
		<body>
				<div class="dumbBoxWrap" id="atomBox"> 
							<div class="dumbBoxOverlay"></div>
								<div class="dumbBox dumbBoxpop">
									<div class="modalHeader modalHeaderpop">
										<h4>Exam Result</h4>
											</div>
												<div class="modalContent modalContentpop">
														<span id="call_status" style="color:red">&nbsp;</span>
														<form name="search_form" id="search_form" class="search_form" method="post" action="">
																		<table width="100%" cellspacing="0" cellpadding="0" border="0" class="enroll-table">
																			 <tbody>
																					<tr>      
																						<td class="label-td">		
																							<label for="batch_basic">Enter Student Enrollment ID :</label>
																						</td>
                                                                                        <td width="20"></td>
																						<td>			
																							<input name="enroll_id" type="text" class="text"  value="" id='enroll_id' required>
																						</td>
																						<td width="20"></td>
																						<td>
																							<input tabindex="2" title="Search" onclick="SUGAR.savedViews.setChooser();" class="button" type="submit" name="search_form" value="Submit" id="search_enrollid">
																						</td>
																						
																					</tr>
																			</tbody>
																		</table>
															</form>
																																
<?php
			if(isset($_POST['search_form']) && !empty($_POST['search_form']) && !empty($_POST['enroll_id'])){
					global $db;		
					if($_POST['enroll_id']!=""){
						$enrollID=$_POST['enroll_id'];
						$_SESSION['registration_no']=$_POST['enroll_id'];
								
						$sqls="SELECT s.`name`,s.email,s.id AS studentid,s.mobile,sb.added_specialization,b.id as batch_id,b.name as course,sb.id,sb.te_pr_programs_id_c as program,sb.te_in_institutes_id_c as institute_id,sb.current_sems AS currentsemid,csem.name AS currentsemname FROM `te_student` AS s INNER JOIN te_student_te_student_batch_1_c as ssbr ON ssbr.te_student_te_student_batch_1te_student_ida=s.id INNER JOIN te_student_batch as sb ON sb.id=ssbr.te_student_te_student_batch_1te_student_batch_idb INNER JOIN te_ba_batch AS b ON b.id=sb.te_ba_batch_id_c INNER JOIN te_te_semester AS csem ON sb.current_sems = csem.id WHERE s.deleted=0 AND s.`registration_no`='".$enrollID."'";
								
								$studentObj =$db->query($sqls);
								$studentifo=array();
								while($Srow =$db->fetchByAssoc($studentObj)){ 
								
									  $studentifo[]=$Srow;
									  $studentID =$Srow['studentid'];
									  $program_id=$Srow['program'];
									  $currenrsemID =$Srow['currentsemid'];
									  $institute_id=$Srow['institute_id'];
									  $_SESSION['student']=$Srow['studentid'];
								
								}
								
								$type_data="SELECT type.name,type.exam_type FROM (SELECT e_t.te_exam_types_te_exam_schemete_exam_types_idb as exam_typeid FROM (SELECT ts.id FROM te_exam_scheme_te_pr_programs_c tep INNER JOIN te_exam_scheme ts ON tep.te_exam_scheme_te_pr_programste_exam_scheme_ida=ts.id where tep.te_exam_scheme_te_pr_programste_pr_programs_idb='".$program_id."') tsch_r INNER JOIN te_exam_types_te_exam_scheme_c e_t ON e_t.te_exam_types_te_exam_schemete_exam_scheme_ida=tsch_r.id) exam_type INNER JOIN te_exam_types type ON exam_type.exam_typeid=type.id;";
								$get_exam_type=$db->query($type_data);
								
								while($Srow_type =$db->fetchByAssoc($get_exam_type)){
									$Srows[]=$Srow_type;
								}

								/* fetch Booked Subject */
									if(!empty($studentifo)){
											
										$data=resultSearch($studentID);
										
										$Inst="SELECT allow_score,allow_grade,allow_both from te_in_institutes where id='".$institute_id."'";
										$instObj =$db->query($Inst);
										$instSrow =$db->fetchByAssoc($instObj);
										
										$course_info="select `name` from te_pr_programs where id='".$program_id."'";
										$get_course_info=$db->query($course_info);
										$course_row =$db->fetchByAssoc($get_course_info);
										
										
										/** FETCH SEMESTER FROM COURSE ID*/
										$sem_info="SELECT t_sem.name,t_sem.id from te_te_semester t_sem INNER JOIN te_pr_programs_te_te_semester_1_c prog_sem  ON t_sem.id=prog_sem.te_pr_programs_te_te_semester_1te_te_semester_idb where prog_sem.te_pr_programs_te_te_semester_1te_pr_programs_ida='".$program_id."'";
										$get_sem_info=$db->query($sem_info);
										
										while($sem_name =$db->fetchByAssoc($get_sem_info)){
											
											$semesters[]=$sem_name;
										}
										
										/**LIST SUBJECT FROM EACH SEMESTER ID */
										foreach($semesters as $sem){
											$sem_data="SELECT te_subjects_master_te_te_semester_1te_subjects_master_ida as sub_id from te_subjects_master_te_te_semester_1_c where te_subjects_master_te_te_semester_1te_te_semester_idb='".$sem['id']."'";
											$te_te_subject=$db->query($sem_data);
											while($subid =$db->fetchByAssoc($te_te_subject)){
												$subjectId[$sem['id']][]=$subid['sub_id'];
											}
										}
										
										foreach($data as $sub_id=>$marks_value){
											foreach($subjectId as $k=>$value){
												if(in_array($sub_id,$value)){
												
													$sql1="select `name` from `te_te_semester` where `id`='".$k."'";
													$te_te_subject=$db->query($sql1);
													$sem_name =$db->fetchByAssoc($te_te_subject);
				
													$sem_name1[$sub_id][]=$sem_name['name'];
												}
											}
											
											foreach($marks_value as $value){
												$marksvalue[$value['exam_type']]=$value['total_marks'];
											}
											
											$data_marks[$sub_id]=$marks_value['exam_type'];
										}
										
										
										?>
										
										<div class="block-wrapper list view table footable-loaded footable default list-content-table">
													
																			<!-- Student Personal information Display -->
															<?php foreach($studentifo as $info){
																
																?>
                                                                    <div class="block"><strong>Name-</strong><?php echo $info['name']?></div>
                                                                    <div class="block"><strong>Email-</strong><?php echo $info['email']?></div>
                                                                    <div class="block"><strong>Course-</strong><?php echo $course_row['name']?></div>
                                                                
                                                                    <div class="block"><strong>Mobile-</strong><?php echo $info['mobile']?></div>
                                                                    <div class="block"><strong>Specialization-</strong><?php echo $info['added_specialization']?></div>
                                                                    <div class="block"><strong>Current Semester-</strong><?php echo $info['currentsemname']?></div>
                                                               
                                                            
                                                        </hr>
																	
																	
																	
									<?php  }?>

									</div>							
									<hr/>	
									<?php if($data){?>
									<table width="100%" cellspacing="0" cellpadding="0" border="0" class="search-form-table">
										<tr>
											<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
												<strong>Semester</strong>
											</th>
											<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
												<strong>Subject</strong>
											</th>
											<?php if($institute_id!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_id!='9710db7f-73f2-d3e0-6227-5afab568feab'){ ?>
												<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
													<strong>External Marks</strong>
												</th>
											<?php }?>
											<?php if($institute_id!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_id!='9710db7f-73f2-d3e0-6227-5afab568feab'){ ?>
												<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
													<strong>Internal Marks</strong>
												</th>
											<?php }?>
											<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
												<strong>Result</strong>
											</th>
											
											<?php if($instSrow['allow_grade']){?>
												<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
													<strong>Grade</strong>
												</th>
											<?php }?>
											
											<?php if($instSrow['allow_score']){?>
												<th scope="col" data-hide="phone" class="footable-visible footable-first-column">
													<strong>Total</strong>
												</th>
											<?php }?>
										</tr>
										
										<?php foreach($data as $item=>$datavalue){ 
										$internalmarks=0;
										?>
											<tr scope="col" data-hide="phone" class="footable-visible footable-first-column">
											
												<td><?php echo $sem_name1[$item][0] ?></td>
												
												<td><?php echo $datavalue['sub_name']?></td>
												
												<?php foreach($data_marks as $itemkey=>$datamarks){
													if($item==$itemkey){
														foreach($datamarks as $item_key=>$datamark_s){
															
															foreach($Srows as $exam_type){
																if($item_key==$exam_type['name']){
																	//$score.= $val->exam_type.'-'.$val->total_persent.'<br/>';
																	//$bean->score_detail=$score;
																	if($exam_type['exam_type']=='Main_Exam')
																	{
																		$externalmarks=$datamark_s;
																	}
																	else {
																		$internalmarks+=$datamark_s;
																	}
																}
															}
														}?>
														<?php if($institute_id!='6bd9b29f-f4fd-c95f-466c-5afab5d415d5' && $institute_id!='9710db7f-73f2-d3e0-6227-5afab568feab'){ ?>
															<td scope="col" <?php if($datavalue['status']!='Pass'){?> style="color:red;"<?php } ?> data-hide="phone" class="footable-visible footable-first-column">
																	<strong><?php echo $externalmarks?></strong>
															</td>
															<td scope="col" <?php if($datavalue['status']!='Pass'){?> style="color:red;"<?php } ?> data-hide="phone" class="footable-visible footable-first-column">
																<strong><?php echo $internalmarks ?></strong>
															</td>
														<?php }?>
													<?php }
												}?>
												
												<?php if($datavalue['status']=='Pass'){?>
												<td><span style="background-color:green; border-radius:4px; padding:5px 10px; color:#fff; text-align:center"><?php echo $datavalue['status']?></span></td>
												<?php }else{?>
												<td><span style="background-color:red;  border-radius:4px;  padding:5px 10px; color:#fff; text-align:center"><?php echo $datavalue['status']?></span></td>
												<?php }?>
												<?php if($instSrow['allow_grade']){?>
													<td><?php echo $datavalue['grade']?></td>
												<?php }?>
												<?php if($instSrow['allow_score']){?>
													<td><?php echo $datavalue['overallmarks']?>
												<?php }?>
												</td>
											</tr>
										<?php }?>
										
									</table>
									
									
									<div class="actions-buttons">
									<a href="index.php?entryPoint=result_download&enrollid=<?php echo $enrollID ?>" value="" class="button" target="_blank">DOWNLOAD RESULT</a>
									</div>
									<?php }else{?>
										<div class="no-content-message">
										<?php echo "Result Not found for this Student";?>
                                        </div>
									<?php }?>
									
										
							<?php					
									}
									if(empty($studentifo)){
										
														echo '<script> alert("Wrong Id Or Record Not Found In dataBase Please Check")</script>';
										}
								
						}
											?>
											
									<?php 
					} 
		
function resultSearch($studentID){
	
	global $db;
	
	$marks="SELECT te_marks.status,te_marks.description,te_marks.id,te_marks.te_te_subject_id_c,te_marks.te_exam_result_te_exammarkste_exammarks_idb,t_marks.exam_type,t_marks.total_marks ,te_marks.total_marks as overallmarks,te_marks.semester_id,te_marks.student_batch_id from (Select ter.id ,ter.status,ter.total_marks,ter.description,ter.semester_id,ter.student_batch_id,ter.te_te_subject_id_c,`te_exam_result_te_exammarkste_exammarks_idb` from te_exam_result ter INNER JOIN te_exam_result_te_exammarks_c term ON ter.id=term.te_exam_result_te_exammarkste_exam_result_ida where ter.`te_student_id_c`='".$studentID."') te_marks INNER JOIN te_exammarks t_marks ON te_marks.te_exam_result_te_exammarkste_exammarks_idb=t_marks.id WHERE te_marks.status!='TBD'";
			$resultObj_marks =$db->query($marks);
			
			$result=array();
			while($Srow =$db->fetchByAssoc($resultObj_marks)){ 
				  $result[]=$Srow;
			}
			
			foreach($result as $result_val){
				
				$sql1="select `name` from `te_subjects_master` where `id`='".$result_val['te_te_subject_id_c']."'";
				$te_te_subject=$db->query($sql1);
				
				if($te_te_subject->num_rows>0){
					$Srow =$db->fetchByAssoc($te_te_subject);
					$sub_name=$Srow['name'];
				}
				$subject_marks['exam_result_id']=$result_val['id'];
				$subject_marks['sub_name']=$sub_name;
				$subject_marks['exam_type'][$result_val['exam_type']]=$result_val['total_marks'];
			
				$subject_marks['status']=$result_val['status'];
				$subject_marks['grade']=$result_val['description'];
				$subject_marks['overallmarks']=$result_val['overallmarks'];
				$subject_marks['semester_id']=$result_val['semester_id'];
				$subject_marks['student_batch_id']=$result_val['student_batch_id'];
				
				$data[$result_val['te_te_subject_id_c']]=$subject_marks;
				
			}
			
			return $data;
}
